$(function(){
	toLogout = function(){
			var data={};
			data['action']='admin-logout';
			$.post('/Login/doLogin.php',data,function(s){
				if (s.status == 1) {
					return dialog.success(s.message,s.url);
				} else{
					return dialog.error(s.message);
				}
			},'json');
		}
	
	
	$('button[name="admin_login"]').click(function(){
		var postData={};
		var user_name=$('input[name="user_name"]').val();
		var passwd=$('input[name="password"]').val();
		if(user_name == ''){
			return dialog.error('用户名不得为空');
		}else if(passwd == ''){
			return dialog.error('密码不得为空');
		}
		postData['user_name']=user_name;
		postData['password']=passwd;
		postData['action']='admin-login';
		$.post('/Login/doLogin.php',postData,function(s){
			if (s.status == 1) {
					dialog.success(s.message,s.url);					
				} else{
					dialog.error(s.message);
				}
		},'json');
	});
	
	$('button[name="admin_submit"]').click(function(){
		var data = $('#admin_form').serializeArray();
		var postData={};
		$(data).each(function(i){
			postData[this.name]=this.value;
		});
		
		if(postData['password'] != postData['repassword']){
			return dialog.error('两次填写密码有误');
		}		
		$.post('/Admin/front_script/doAction.php',postData,function(s){
			if (s.status == 1) {
				dialog.success(s.message,s.url);
			} else{
				dialog.error(s.message);
			}
		},'json');
	});
	
	function toDel(url,data){
		$.post(url,data,function(s){
		    if(s.status == 1) {
				return dialog.success(s.message,s.url);
			} else{
				return dialog.error(s.message);
			}
		},'json');
	}
	
	$('.admin_delete').click(function(){
		var data={};
		data['admin_id']=$(this).attr('attr-id');
		data['status']=0;
		data['action']='delete';
		layer.open({
			    type : 0,
			    title : '是否提交？',
			    btn: ['确定', '取消'],
			    icon : 3,
			    closeBtn : 2,
			    content: "是否确定注销？",
			    scrollbar: true,
			    yes: function(){			        
			        toDel('/Admin/front_script/doAction.php', data);
			    }
		    });
	});
});