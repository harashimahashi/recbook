<?php
	$name = pathinfo($_SERVER['SCRIPT_FILENAME']);
	$dfiles = scandir($name['filename'].'/downloaded');
	$files = scandir($name['filename']);
	for($i = 0; $i < count($dfiles); $i++){
		$encodedFilename = iconv('WINDOWS-1251', 'UTF-8', $dfiles[$i]);
		if($encodedFilename == '.' || $encodedFilename == '..' || $encodedFilename == 'downloaded' || $encodedFilename == 'fss') continue;
			echo '<div class = \'file\'>';
			echo $encodedFilename;
			echo '</div>';
			echo "\n";		
	}
	for($i = 0; $i < count($files); $i++){
		$encodedFilename = iconv('WINDOWS-1251', 'UTF-8', $files[$i]);
		if($encodedFilename == '.' || $encodedFilename == '..' || $encodedFilename == 'downloaded' || $encodedFilename == 'fss') continue;
			echo '<div class = \'file\'>';
			echo $encodedFilename;
			echo '</div>';
			echo "\n";
	}
?>