<?php
	function checkInput($data){
		$data = trim($data);
        $data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
	
	?>