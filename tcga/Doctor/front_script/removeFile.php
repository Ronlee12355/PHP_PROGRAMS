<?php
	if(PHP_OS == 'WINNT'){
			define('__ROOT__', str_replace('\\', '/', dirname(__DIR__)));
		}elseif(PHP_OS == 'Linux'){
			define('__ROOT__', dirname(__DIR__));
		}
	$arr = array(
		__ROOT__.'/uploads/Input/',
		__ROOT__.'/uploads/Output/',
		__ROOT__.'/uploads/Control/',
	);
	
	foreach ($arr as $path) {
		removeFile($path);
	}
	
	function removeFile($path)
	{
		$handle = opendir($path);
		while (($item = readdir($handle)) !== false) {
			if ($item != '.' && $item != '..') {
				$filename = $path . $item;
				if (is_dir($filename)) {
					removeFile($filename . '/');
					if (count(scandir($filename))==2) {
						rmdir($filename);
					}
				} else if (is_file($filename)) {
					if (time() - filectime($filename) > 0.5 * 24 * 3600) {
						unlink($filename);
					}
				}
			}
		}
		closedir($handle);
	}