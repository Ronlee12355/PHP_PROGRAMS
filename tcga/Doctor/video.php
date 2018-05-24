<?php
	session_start();
	if($_SESSION['user_name'] == '' || $_SESSION['user_type'] !== 0){
		header('Location: /');
		exit;
	}
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/header_inner.php';
?>


<?php
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/footer.html';
	?>