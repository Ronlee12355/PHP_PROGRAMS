<?php
	function get_md5_passwd($passwd){
		return md5(C('MD5_PRE').$passwd);
	}
	
	function send_email($arr,$address,$subject,$content){		
		$email_smtp=$arr['email_smtp'];
	    $email_username=$arr['email_username'];
	    $email_password=base64_decode(strrev($arr['email_password']));
	    $email_from_name=$arr['email_from_name'];
	    $email_smtp_secure=$arr['email_smtp_secure'];
	    $email_port=intval($arr['email_port']);
	    if(empty($email_smtp) || empty($email_username) || empty($email_password) || empty($email_from_name)){
	        return array("error"=>1,"message"=>'Please check your email config file');
	    }
	    require_once './ThinkPHP/Library/Org/Nx/class.phpmailer.php';
	    require_once './ThinkPHP/Library/Org/Nx/class.smtp.php';
	    $phpmailer=new \Phpmailer();	  
	    $phpmailer->IsSMTP();
		//$phpmailer->SMTPDebug=1;	   
	    $phpmailer->SMTPSecure=$email_smtp_secure;	    
	    $phpmailer->Port=$email_port;	   
	    $phpmailer->IsHTML(C('MAIL_ISHTML'));	   
	    $phpmailer->CharSet=C('MAIL_CHARSET');	    
	    $phpmailer->Host=$email_smtp;	    
	    $phpmailer->SMTPAuth=true;	   
	    $phpmailer->Username=$email_username;	    
	    $phpmailer->Password=$email_password;	    
	    $phpmailer->From=$email_username;	    
	    $phpmailer->FromName=$email_from_name;	    
	    if(is_array($address)){
	        foreach($address as $addressv){
	            $phpmailer->AddAddress($addressv);
	        }
	    }else{
	        $phpmailer->AddAddress($address);
	    }	    
	    $phpmailer->Subject=$subject;	   
	    $phpmailer->Body=$content;	    
	    if(!$phpmailer->Send()) {
	        $phpmailererror=$phpmailer->ErrorInfo;
	        return array("error"=>1,"message"=>$phpmailererror);
	    }else{
	        return array("error"=>0);
	    }
	}

	function check_upload($file){
	    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
	    $contentType = $file['type'];
	    if (is_uploaded_file($file['tmp_name']) && $ext == 'xlsx' && $contentType == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
	        	return true;
	    	} else {
	        	return false;
	    	}
	}
	
	function mk_dirs($dir){
    	return is_dir($dir) or (mkdir($dir,0777));
	}
	
	function get_status($status){
		if(intval($status) == 1){
			return '<span class="glyphicon glyphicon-ok"></span></p>';  
		}elseif(intval($status) == 0){
			return '<span class="glyphicon glyphicon-remove"></span></p>'; 
		}
	}
?>