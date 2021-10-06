<?php
error_reporting(E_ERROR);
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin': '*'");
header("Access-Control': 'allow <*>'");

switch ($_GET['type']) {
	case 'price':
		if (preg_match("/[^0-9\.]/is",$_GET['value'])) {
			echo '{"result":"error", "target":"price", "msg":"Price is wrong"}';
		} else {
			echo '{"result":"ok"}';
		};
		break;
	case 'datetime':
		//if (!preg_match("/^\d\d\\.\d\d\\.\d\d\d\d\s\d\d:\d\d:\d\d$/is",$_GET['value'])) {
		if (!preg_match("/^\d{1,2}\.\d{1,2}\.\d{4}\s\d{1,2}:\d{1,2}:\d{1,2}$/is",$_GET['value'])) {
		//if (!preg_match("/^\d{1,2}\.\d{1,2}\.\d{4}\s\d{1,2}:\d{1,2}:\d{1,2}$/is",$_GET['value']) && strtotime($_GET['value'])<time() ) {
			echo '{"result":"error", "target":"datetime", "msg":"Date and time have wrong format"}';
		} else {
			echo '{"result":"ok"}';
		};
		break;
	default:
		echo '{"result":"ok"}';
}

?>