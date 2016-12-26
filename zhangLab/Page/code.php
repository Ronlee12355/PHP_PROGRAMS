<?php
	session_start();//开启会话
	$width=100;
	$height=30;
	$image=imagecreatetruecolor($width, $height);//创建一个画布
	$bg=imagecolorallocate($image, 255, 255, 255);//背景颜色
	imagefill($image, 0, 0, $bg);//背景颜色填充
	$identify_code='';
	for($i=0;$i<4;$i++){//生成内容
		$font=6;
		$color=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
		$string='abcdefghijkmnpqrstuvwxy3456789';
		$fontcontent=substr($string,rand(0, strlen($string)),1);
		$identify_code.=$fontcontent;
		$x=($i*100/4)+rand(5,10);
		$y=rand(5,10);
		imagestring($image, $font, $x, $y, $fontcontent, $color);
	}
	$_SESSION['identify_code']=$identify_code;
	for($i=0;$i<200;$i++){//生成干扰点
		$color=imagecolorallocate($image, rand(50,200),rand(50,200),rand(50,200));
		imagesetpixel($image, rand(1, 99),rand(1,29), $color);
	}
	
	for($i=0;$i<3;$i++){//生成线干扰元素
		$color=imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
		imageline($image, rand(1,99),rand(1,29),rand(1,99),rand(1,29), $color);
	}
	
	header("content-Type:image/png");
	imagepng($image);//生成png文件
	imagedestroy($image);
?>