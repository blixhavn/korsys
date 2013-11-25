<?php

include "./../php-header.php";

if(isLoggedIn()){

	umask(0777);


	$title = $_POST['title'];
	$song_id = $_POST['song_id'];
	$filename = basename($_FILES['file']['name']);

	$uploaddir = dirname(__FILE__) . '/../songfiles/';
	
	$replace_from = array('æ','ø','å', 'Æ', 'Ø', 'Å', 'é', 'è', 'ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', ' ', '	', 'î', 'ñ', 'ï');
	$replace_to = array('ae','o','a','Ae','O','A','e','e','a','o','u','A','O','U','','','i','n','i');
	
	$filename = str_replace($replace_from, $replace_to, $filename);
	
	$valid_filetypes = array ('audio/midi', 'audio/mid', 'audio/mp3', 'audio/wav', 'audio/mpeg', 'audio/mpeg3');
	$uploadfile = $uploaddir.generate_code(10).$filename;
	
	if(in_array($_FILES['file']['type'], $valid_filetypes)) {
		if(is_dir($uploaddir)){
			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				if(!chmod($uploadfile, 0666)){
					$err = "chmod";
				}
			} else {
				$err = "file";
			}

		} else {
			$err = "dir";
		}
	}else{
		$err = "filetype";
	}

	if(!isset($err)){
		$showing_name = $_POST['showing_name'];
		
		$query = sprintf("INSERT INTO songfiles (showing_name,link,parent_id,voice, auth_code) VALUES ('%s','%s','%s','%s','%s')",

					pg_escape_string(	$showing_name													),
					pg_escape_string(	basename($uploadfile)												),
					pg_escape_string(	$song_id															),
					pg_escape_string(	$_POST['stemmefil'] ? ($_POST['mainvoice'].$_POST['partvoice']) : 0	),
					pg_escape_string(	$_POST['extro'] ? -10 : 0											)
				);

		pg_query($query);


		header("location: ./../?show=songs&id=$song_id&status=success");
	} else {
		header("location: ./../?show=add-songfile&id=$song_id&status=$err");
	}
	
} else{
	header("Location: ./../");
}

	

?>
