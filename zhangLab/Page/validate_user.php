<?php
	function filled_post(array $p){
		$i=0;
		foreach ($p as $key => $value) {
			if(!isset($key) || $value==''){
				$i=$i;
			}else{
				$i+=1;
			}
		}
		if($i==sizeof($p)){
			return true;
		}else{
			return false;
		}
	}
	
?>