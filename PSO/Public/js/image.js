/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png; *.jpeg',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象
                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');
                $("#upload_org_code_img").attr("src",obj.data);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
    
    $('#pdf_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_pdf_url,
        'buttonText': '上传文档',
        'fileTypeDesc': 'PDF Files',
        'fileObjName' : 'pdf_file',
        //允许上传的文件后缀
        'fileTypeExts': '*.pdf',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象
                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');               
                $("#file_upload_pdf").attr('value',obj.data);              
            }else{
                alert('上传失败');
            }
        },
    });
});





