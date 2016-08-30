<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('recbk') or die(mysql_error());
mysql_query('SET NAMES utf8') or die(mysql_error());

require_once('\\opendoc\\doc.php');
require_once('\\filescripts\\opdcx.php');

$query = 'INSERT INTO '.$_POST['type'].' (rname, recipe) VALUES (\'';

if(!empty($_POST['recipe'])){
	mysql_query($query.$_POST['recipe-name'].'\', \''.$_POST['recipe'].'\')') or die(mysql_error());
}

echo $_FILES['uploadfile']['type'];
$paths_tmp = explode('\\', $_FILES['uploadfile']['tmp_name']);
$dot = explode('.', $_FILES['uploadfile']['name']);
if($_FILES['uploadfile']['error'] == 4) return;
else if(!$_FILES['uploadfile']) return;
else{
	switch($_FILES['uploadfile']['type']){
		case 'application/msword':
			mysql_query($query.$dot[0].'\', \''.doc2text('C:\\Program Files\\Endels\\tmp\\'.$paths_tmp[2]).'\')') or die(mysql_error());
			break;
		case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
			mysql_query($query.$dot[0].'\', \''.docx2text('C:\\Program Files\\Endels\\tmp\\'.$paths_tmp[2]).'\')') or die(mysql_error());
			break;
		case 'text/plain':
			$encodedText = iconv('WINDOWS-1251', 'UTF-8', file_get_contents('C:\\Program Files\\Endels\\tmp\\'.$paths_tmp[2]));
			mysql_query($query.$dot[0].'\', \''.$encodedText.'\')') or die(mysql_error());
			break;
	}
}
?>
<!DOCTYPE html>
<html lang = 'ru'>
<head>
<title>
Test
</title>
<style>

</style>
<meta charset = 'utf-8'/>
</head>
<body>
</body>
</html>