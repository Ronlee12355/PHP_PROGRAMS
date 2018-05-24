var dialog = {
    // 错误弹出层
    error: function(message) {
        layer.open({
            content:message,
            icon:2,
            closeBtn: 0,
            title : '错误信息',
            btn:'确定',
        });
    },
	
	confirm : function(message, url) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                location.href=url;
            },
        });
    },
    //成功弹出层
    success : function(message,url) {
        layer.open({
            content : message,
            icon : 1,
            closeBtn: 0,
            btn:'确定',
            yes : function(){
                location.href=url;
            },
        });
    },
}