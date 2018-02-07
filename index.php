<?php
require("php-header.php");
$smarter = new Smarter(dirname(__FILE__)."/templates");


// Check if the user is logged in. Redirect to login.php if not.
if(!isLoggedIn()) header('location: login.php');


// Check for action requests
switch($_GET['action']) {
	case "logout":
		header('location: actions/logout.php');
		break;
	case "getfile":
		header('location: actions/getfile.php?file='.$_GET['file']);
		break;
	case "bekreft-oppdrag":
		header('location: actions/oppdrag.php?action='.$_GET['action'].'&id='.$_GET['id'].'&semesterplan='.$_GET['semesterplan']);
		break;
	case "slett-oppdrag":
		header('location: actions/oppdrag.php?action='.$_GET['action'].'&id='.$_GET['id']);
		break;
}

// Draw page
switch($_GET['show']) {
	// Main links
	case "":
	case "news":
		include("data/news.php");
		$smarter->display("news.tpl.php");
		break;
	case "events":
		include("data/events.php");
		$smarter->display("events.tpl.php");
		break;
	case "piruloger":					// Denne casen kan fjernes
		$smarter->display("piruloger.tpl.php");
		break;
	case "songs":
		include("data/songs.php");
		$smarter->display("songs.tpl.php");
		break;
	case "personlig":
		include("data/personlig.php");
		$smarter->display("personlig.tpl.php");
		break;
	case "tentativ":
		include("data/tentativ.php");
		$smarter->display("tentativ.tpl.php");
		break;

	// User links
	case "change-info":
		$smarter->display("change-info.tpl.php");
		break;
	case "add-news":
		$smarter->display("add-news.tpl.php");
		break;
	case "add-event":
		$smarter->display("add-event.tpl.php");
		break;
	case "minus":
		include("data/minusmeldinger.php");
		$smarter->display("minusmeldinger.tpl.php");
		break;
	case 'admin-personlig':
		include("data/admin-personlig.php");
		$smarter->display("admin-personlig.tpl.php");
		break;
	case 'oppdrag':
		include("data/oppdrag.php");
		$smarter->display("oppdrag.tpl.php");
		break;

	// Extra. Pages that arent in any menu
	case 'add-songfile':
		include("data/add-songfile.php");
		$smarter->display("add-songfile.tpl.php");
		break;
	case "edit-event":
		include("data/edit-event.php");
		$smarter->display("edit-event.tpl.php");
		break;
	case 'add-oppdrag':
		$smarter->display("add-oppdrag.tpl.php");
		break;
	case 'edit-oppdrag':
		include("data/edit-oppdrag.php");
		$smarter->display("edit-oppdrag.tpl.php");
		break;
}
?>
