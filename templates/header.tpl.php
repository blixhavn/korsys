<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>Pirums interne sider</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/smoothness/jquery-ui-1.10.2.custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/bootstrapSwitch.css">
	  <!--[if IE 7]>
	  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
	  <![endif]-->
</head>
<body>
	<div id="container" class="clearfix">

<?	if(isset($_GET['debug'])){
		echo "<!-- 
		";
		print_r($data);
		echo"
-->";
}