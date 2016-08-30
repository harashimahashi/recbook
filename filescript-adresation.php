<?php	
	$name = pathinfo($_SERVER['SCRIPT_FILENAME']);
	if (isset($_GET['f_name'])){
		$encodedFilename = iconv('UTF-8', 'WINDOWS-1251', $_GET['f_name']);
		if(is_readable($name['filename'].'\\downloaded\\'.$encodedFilename)){
			$handle = fopen('C:\\Program Files\\Endels\\home\\test1.ru\\www\\'.$name['filename'].'\\downloaded\\'.$encodedFilename, 'a+');
			$text = fread($handle, filesize('C:\\Program Files\\Endels\\home\\test1.ru\\www\\'.$name['filename'].'\\downloaded\\'.$encodedFilename));
			$encodedText = iconv('WINDOWS-1251', 'UTF-8', $text);
			echo '<script>';
				echo 'document.location.href = "filescripts/fss/?f_text='.$encodedText.'&f_name='.$_GET['f_name'].'"';
			echo '</script>';
			fclose($handle);
		}
		else{
			$encodedFname = iconv( 'UTF-8', 'WINDOWS-1251',$_GET['f_name']);
			$handle = fopen('C:\\Program Files\\Endels\\home\\test1.ru\\www\\'.$name['filename'].'\\'.$encodedFname, 'a+');
			$text = fread($handle, filesize('C:\\Program Files\\Endels\\home\\test1.ru\\www\\'.$name['filename'].'\\'.$encodedFname));
			$encodedText = mb_convert_encoding($text, 'WINDOWS-1251', 'UTF-8');
			echo '<script>';
				echo 'document.location.href = "filescripts/fss/?f_text='.$encodedText.'&f_name='.$_GET['f_name'].'"';
			echo '</script>';
		}
	}
?>