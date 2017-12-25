$(function(){
	$("input[name='optionsRadios2']").click(function(){
		if($("input[name='optionsRadios2']:checked").val() == 'yes'){
			$(".control").attr('style','display: block;');
		}else{
			$(".control").attr('style','display: none;');
		}		
	});
	$('input[id=lefile]').change(function() {  		
		$('#photoCover').val($(this).val().split('\\').pop());
	});
	$('input[id=lefile2]').change(function() { 
		$('#photoCover2').val($(this).val().split('\\').pop());  
	});
	
	$('#pso_submit').click(function(){
		var index;
		var data = $('#pso_form').serializeArray();
		postData = {}
		$(data).each(function(i){
			postData[this.name] = this.value;
		});
		$.ajax({
			type:"post",
			url:SCOPE.save_url,
			data:postData,
			async:true,
			beforeSend:function(){
				index=layer.load(0, {shade: false});
			},
			success:function(res){
				layer.close(index);
				if (res.status==1) {
					return dialog.success(res.msg,SCOPE.jump_url);
				} else{
					return dialog.error(res.msg);
				}
			},
			dataType:'json'
		});
	});
	
	$('#screen_drug').click(function(){
		var i;
		var url;
		var data = new FormData(document.getElementById('upload_form'));
		if($('input[name="optionsRadios2"]:checked').val() == 'yes'){
			url = SCOPE.precess_control_url;
		}else if($('input[name="optionsRadios2"]:checked').val() == 'no'){
			url = SCOPE.precess_url;
		}
		$.ajax({
			type:"post",
			url:url,
			async:true,
			data:data,
			cache: false,  
      		processData: false,  
      		contentType: false,
			beforeSend:function(){
				i=layer.load(0, {shade: false});
			},
			success:function(res){
				layer.close(i);
				if (res.status==1) {
					return dialog.success(res.msg,SCOPE.jump_url);
				} else{
					return dialog.error(res.msg);
				}
			},
			dataType:'json'
		});
	});
});