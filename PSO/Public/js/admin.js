function todelete(url,data){
	$.post(url,data,function(s){
		if(s.status==1){
				return dialog.success(s.msg,SCOPE.jump_url);
			}else if(s.status==0){
				return dialog.error(s.msg);
			}
		},"JSON");
}

$(".pso_delete").on('click',function(){
	var id=$(this).attr('attr-id');
	var message=$(this).attr('attr-message');	
	data={};
	data['id']=id;
	data['status']=-1;
	layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定"+message,
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(SCOPE.delete_url, data);
        }
	});
});

$(".pso_edit").on("click", function() {
	var menu_id = $(this).attr("attr-id");
	window.location.href = SCOPE.edit_url + "?id=" + menu_id;
});

$("#pso_submit").click(function(){
	    var index;
		var data = $('#pso_form').serializeArray();
		postData = {}
		$(data).each(function(i){
			postData[this.name] = this.value;
		});
		$.ajax({
			type:"post",
			url:SCOPE.edit_url,
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