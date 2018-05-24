$(function(){
	//控制是否上传对照组文件
	$('input[type="checkbox"]').on('change',function(){
		var a = $('input[type="checkbox"]').prop('checked');
		if (!a) {
			$('.control-row').attr('style','display: none;');
		} else{
			$('.control-row').attr('style','display: block;');
			}
		});
		
		//获取推荐药物信息的按钮动作
		$('button[name="action"]').click(function(){
			var form = new FormData(document.getElementById('lung-cancer'));
			$.ajax({
				type:"post",
				url:"/Doctor/front_script/doProcess.php",
				async:true,
				cache:false,
				processData: false,  
      			contentType: false,     			
      			data:form,
      			beforeSend:function(){
      				$('button[name="action"]').addClass('disabled');
					index=layer.load(0, {shade: false});
				},
				success:function(res){
					if (res.status == 1) {
						layer.close(index);
						createTable(res.app,0,'app');
						createTable(res.relocation,0,'relocation');
						createTable(res.app_app,1,'app-app');
						createTable(res.app_relocation,1,'app-relocation');
						$('.show-result').attr('style','display: block;');
						$('button[name="action"]').removeClass('disabled');
						$('input[name="generank"]').attr('value',res.gr);
					} else{
						dialog.error(res.message);
						layer.close(index);
						$('button[name="action"]').removeClass('disabled');
					}
				},
				dataType:'json'
			});
		});
		
		function createTable(input_data,type,table_id){
			if (type == 1) {				
				$('#'+table_id).DataTable({
					dom: 'Bfrtip',
					data:input_data,
					buttons: ['copy', 'csv'],
					responsive: true,					
					paging: true,
					bDestroy: true,
			        'order': [[1,"desc"]],
			        searching: true,
			        info:true,
			        pageLength: 15,					
            		columns: [
						{ data: 'Drug' },
						{ data: 'p-value' },
						{ data: 'DDI'}
					]						       					
				});
			} else{
				$('#'+table_id).DataTable({
					dom: 'Bfrtip',
					data:input_data,
					buttons: ['copy', 'csv'],
					responsive: true,
					paging: true,
					bDestroy: true,
			        'order': [[1,"desc"]],
			        searching: true,
			        info:true,					
			        pageLength: 15,
            		columns: [
						{ data: 'Drug' },
						{ data: 'p-value' }						            
					]					      					
				});
			}
		}
		
		//登录的ajax判断
		$('button[name="login"]').click(function(){
			if($('input[name="user_name"]').val() == ''){
				return	dialog.error('用户名不得为空');
			}
			if($('input[name="password"]').val() == ''){
				return	dialog.error('密码不得为空');
			}
			if($('select option:selected').val() == ''){
				return	dialog.error('必须选择用户类型');
			}
			var data={};
			data['user_name']=$('input[name="user_name"]').val();
			data['password']=$('input[name="password"]').val();
			data['user_type']=$('select option:selected').val();
			data['action']='login';
			$.post('/Login/doLogin.php',data,function(s){
				if (s.status == 1) {
					dialog.success(s.message,'/');					
				} else{
					dialog.error(s.message);
				}
			},'json');
		});
		
		toLogout = function(){
			var data={};
			data['action']='logout';
			$.post('/Login/doLogin.php',data,function(s){
				if (s.status == 1) {
					return dialog.success(s.message,s.url);
				} else{
					return dialog.error(s.message);
				}
			},'json');
		}
				
		//提交信息的判断
		$('button[name="tcga_submit"]').click(function(){
			var data = $('#info_form').serializeArray();
			postData = {}
			$(data).each(function(i){
				postData[this.name] = this.value;
			});
			if(postData['died'] == '否'){
				postData['time_dead']='';
				postData['dead_reason']='';
			}else if(postData['died'] == '是'){
				if(postData['time_dead'] == ''){
					return dialog.error('病人已死亡，请填写死亡时间');
				}
				if(postData['dead_reason']==''){
					return dialog.error('病人已死亡，请填写死亡原因');
				}
			}
			$.ajax({
				type:"post",
				url:"/Doctor/front_script/doInsert.php",
				async:true,
				data:postData,
				beforeSend:function(){
					$('button[name="tcga_submit"]').addClass('disabled');
					index=layer.load(0, {shade: false});
				},
				success:function(s){
					layer.close(index);
					$('button[name="tcga_submit"]').removeClass('disabled');
					if (s.status == 1) {						
						return dialog.success(s.message,s.url);
					} else{						
						return dialog.error(s.message);
					}					
				},
				dataType:'json'
			});
		});
		
		function todelete(url,data){
			$.post(url,data,function(s){
				if (s.status == 1) {
					return dialog.success(s.message,s.url);
				} else{
					return dialog.error(s.message);
				}
			},'json');
		}
		//删除按钮的动作
		$('.tcga_delete').click(function(){
			var id=$(this).attr('attr-id');
			var ID_card=$(this).attr('attr-card');
			var data={};
			data['id']=id;
			data['status']=0;
			data['ID_card']=ID_card;
			layer.open({
			    type : 0,
			    title : '是否提交？',
			    btn: ['确定', '取消'],
			    icon : 3,
			    closeBtn : 2,
			    content: "是否确定删除？",
			    scrollbar: true,
			    yes: function(){
			        // 执行相关跳转
			        todelete('/Doctor/front_script/doDel.php', data);
			    }
		    });
		});
		
		//保存修改内容按钮
		$('button[name="tcga_edit"]').click(function(){
			var data = $('#info_form').serializeArray();
			postData = {}
			$(data).each(function(i){
				postData[this.name] = this.value;
			});
			if(postData['died'] == '否'){
				postData['time_dead']='';
				postData['dead_reason']='';
			}else if(postData['died'] == '是'){
				if(postData['time_dead'] == ''){
					return dialog.error('病人已死亡，请填写死亡时间');
				}
				if(postData['dead_reason']==''){
					return dialog.error('病人已死亡，请填写死亡原因');
				}
			}
			$.ajax({
				type:"post",
				url:"/Doctor/front_script/doInsert.php",
				async:true,
				data:postData,
				beforeSend:function(){
					$('button[name="tcga_submit"]').addClass('disabled');
					index=layer.load(0, {shade: false});
				},
				success:function(s){
					layer.close(index);
					$('button[name="tcga_submit"]').removeClass('disabled');
					if (s.status == 1) {						
						return dialog.success(s.message,s.url);
					} else{						
						return dialog.error(s.message);
					}
					
				},
				dataType:'json'
			});
		});
		
		$('button[name="operator_upload"]').click(function(){
			if($('input[name="upload_by"]').val() == '' || $('input[name="screen_by"]').val() == ''){
				return dialog.error('必要人员信息未填写');
			}
			var data = new FormData(document.getElementById('fpkm_info'));
			$.ajax({
				type:"post",
				url:"/Operator/front_script/doInsert.php",
				data:data,
				async:true,
				cache:false,
				processData:false,
				contentType:false,
				beforeSend:function(){
					$('button[name="operator_upload"]').addClass('disabled');
					index=layer.load(0, {shade: false});
				},
				success:function(s){
					layer.close(index);
					$('button[name="operator_upload"]').removeClass('disabled');
					if (s.status == 1) {
						return dialog.success(s.message,s.url);
					} else{
						return dialog.error(s.message);
					}
				},
				dataType:'json'
			});
		});
		
		
		$('.operator_delete').click(function(){
			var id=$(this).attr('attr-id');			
			var data={};
			data['id']=id;
			data['status']=0;			
			layer.open({
			    type : 0,
			    title : '是否提交？',
			    btn: ['确定', '取消'],
			    icon : 3,
			    closeBtn : 2,
			    content: "是否确定删除？",
			    scrollbar: true,
			    yes: function(){
			        // 执行相关跳转
			        todelete('/Operator/front_script/doDel.php', data);
			    }
		    });
		});
		
		$('button[name="drug_predict"]').click(function(){			
			var data={};
			data['drug1']=$('input[name="drug1"]').val().trim().toUpperCase();
			data['drug2']=$('input[name="drug2"]').val().trim().toUpperCase();
			data['generank']=$('input[name="generank"]').val().trim();
			if($('input[name="drug3"]').val().trim() != ''){
				data['drug3']=$('input[name="drug3"]').val().trim().toUpperCase();
			}
			if(data['drug1'] == "" || data['drug2'] == ""){
				return dialog.error('必须填写至少两个药物名');
			}
			if(data['generank'] == ''){
				return dialog.error('请先预测病人表达谱数据');
			}
			$.ajax({
				type:"post",
				url:'/Doctor/front_script/doAuto.php',
				async:true,
				data:data,
				beforeSend:function(){
					$('button[name="drug_predict"]').addClass('disabled');
					index=layer.load(0, {shade: false});
				},
				success:function(s){
					layer.close(index);
					$('button[name="drug_predict"]').removeClass('disabled');
					if (s.status == 1) {						
						$('#p-value p span').text(s.value);
						$('#p-value').attr('style','display: block;');
					} else{
						return dialog.error(s.message);
					}
				},
				dataType:'json'				
			});
		});
	});
