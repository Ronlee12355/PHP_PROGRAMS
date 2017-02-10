	$(function(){
		//判断药物搜索里面的内容，并使用自动完成插件，使用ajax技术传递数据
		$("#myTabContent input[name='drug_pred']").keyup(function(){
			if($("#myTabContent input[name='drug_pred']").val()==''){
				window.location.href="index.php";
			}
			$.get('pages/autoComplete.php?type=drug',{'term':$("#myTabContent input[name='drug_pred']").val()},function(data){
				$("#drug_pred").autocomplete({
					source:data
				});
			},'json');			
		});
		//和上面药物相似，这个用于gene搜索框的自动完成处理
		$("#gene_search").keyup(function(){
			if($("#gene_search").val()==''){
				window.location.href="index.php";
			}
			$.get('pages/autoComplete.php?type=gene',{'term':$("#gene_search").val()},function(res){
				$("#gene_search").autocomplete({
					source:res
				});
			},'json');	
		});
		
		//药物活性预测的数据传输，使用ajax，并且加入datatable插件
		$(".pred_input button[type='button']").click(function(){
			var drugs=$("#drug_pred").val();
			var genes=$(".pred_input textarea").val();
			$.ajax({
				type:"post",
				url:"prediction.php",
				data:{'drug':drugs,'genes':genes},
				async:true,
				beforeSend:function(){
					$(".load").attr("style","display: block;");
				},
				success:function(dddd){
					$(".load").attr("style","display: none;");
					if (dddd) {//判断是否有和gene相关的药物信息
					 $("#prediction .table").DataTable({
							dom:'Bfrtip',
							data:dddd,
							"info":true,
							buttons:['copy','excel','csv','pdf'],
							columns: [
						            { data: 'diseases' },
						            { data: 'nb' },
						            { data: 'svm' },
						            {data:'glm'}
						        ],						       
							scrollY: 400
						});						 
						$("#prediction").attr('style','display: block;');
					} else{
						$("#prediction .panel-body").html('<p style="font-size:x-large;">NO DATA IN DATABASES</p>');
						$("#prediction").attr('style','display: block;');
					}					
				},
				dataType:'json',
			});
		});
		
		
		
		//展示搜索gene相关信息
		$("#gene button").click(function(){
			var inputData=$("#gene_search").val();
			$.get('pages/searchDrugOrGene.php?type=gene',{'term':inputData},function(data){
					$("#gene_info tbody td:eq(0) a").text(data.gene.gene_name).attr('href',data.gene.gene_detail);
					$("#gene_info tbody td:eq(1)").text(data.gene.gene_entrez_id);
					if (data.gene.gene_text=='NA') {
							$("#gene_info tbody td:eq(2)").text("没有相关信息");
					} else{
							$("#gene_info tbody td:eq(2)").text(data.gene.gene_text);
					}
					$("#gene_info").attr('style','display: block;');					
					if (data.gd) {//判断是否有和gene相关的药物信息
					 $("#gene_drug_info .table").DataTable({
							dom:'Bfrtip',
							data:data.gd,
							"info":true,
							buttons:['copy','excel','csv','pdf'],
							columns: [
						            { data: 'drug_name' },
						            { data: 'drug_cas_id' },
						            { data: 'drug_text' },
						            {data:'source'}
						        ],						       
							scrollY: 400
						});						 
						$("#gene_drug_info").attr('style','display: block;');
					} else{
						$("#gene_drug_info .table").html('<p style="font-size:x-large;">NO DATA IN DATABASES</p>');
						$("#gene_drug_info").attr('style','display: block;');
					}					
					if (data.gdi) {//判断是否有和gene相关的疾病信息
						$("#gene_disease_info .table").DataTable({
							dom:'Bfrtip',
							data:data.gdi,
							"paging":true,
							"info":true,
							buttons:['copy','excel','csv','pdf'],
							columns: [
						            { data: 'disease_name' },
						            { data: 'disease_text' },
						            { data: 'source' },						          
						        ],						       
							scrollY: 400
						});
						$("#gene_disease_info").attr('style','display: block;');
					} else{
						$("#gene_disease_info .panel-body").html('<p style="font-size:x-large;">NO DATA IN DATABASES</p>');
						$("#gene_disease_info").attr('style','display: block;');
					}
			},'json');
		});

		//展示drug药物相关信息
		$(".drug_button").click(function(){
			var inputDrug=$("#drug_pred").val();
			$.get('pages/searchDrugOrGene.php?type=drug',{'term':inputDrug},function(res){
				$("#drug_info tbody td:eq(0) a").text(res.drug.drug_name).attr('href',res.drug.drug_detail);					
				if (res.drug.drug_text=='NA') {
						$("#drug_info tbody td:eq(1)").text("没有相关信息");
				} else{
						$("#drug_info tbody td:eq(1)").text(res.drug.drug_text);
				}
				$("#drug_info").attr('style','display: block;');
				
				if (res.dd) {
					$("#drug_disease_info .table").DataTable({
						dom:'Bfrtip',
						data:res.dd,
						"paging":true,
						"info":true,
						buttons:['copy','excel','csv','pdf'],
						columns: [
						    { data: 'disease_name' },
						    { data: 'disease_text' },
						    { data: 'source' },						          
						],						       
							scrollY: 400
					});
					$("#drug_disease_info").attr('style','display: block;');
				} else{
					$("#drug_disease_info .panel-body").html('<p style="font-size:x-large;">NO DATA IN DATABASES</p>');
					$("#drug_disease_info").attr('style','display: block;');
				}
				
				if (res.dg) {
					$("#drug_gene_info .table").DataTable({
						dom:'Bfrtip',
						data:res.dg,
						"paging":true,
						"info":true,
						buttons:['copy','excel','csv','pdf'],
						columns: [
						    { data: 'gene_name' },
						    {data:'gene_entrez_id'},
						    { data: 'gene_text' },
						    { data: 'source' },						          
						],						       
							scrollY: 400
					});					
				} else{
					$("#drug_gene_info .panel-body").html('<p style="font-size:x-large;">NO DATA IN DATABASES</p>');
				}
				$("#drug_gene_info").attr('style','display: block;');
				$(".pred_input").attr('style','display: none;');
			},'json');
		});
	});
		