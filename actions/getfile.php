<?


include("./../php-header.php");

if(isLoggedIn()){

	$path_parts = pathinfo($_GET['file']);
	$file_name  = $path_parts['basename'];
	$file_path  = './../songfiles/' . $file_name;

	if (file_exists($file_path)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.substr($file_name, 10, 1000));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		ob_clean();
		flush();
		readfile($file_path);
		exit;
	} else {
		header("Location: ./../?show=songs&status=notfound");
	}
}
else{
	header("Location: ./../");
}
	
?>