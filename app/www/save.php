<?php
error_reporting(E_ERROR);
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin': '*'");
header("Access-Control': 'allow <*>'");


$systempasswords=json_decode(file_get_contents('../auth.json'));
$link=mysqli_connect($systempasswords->dbusers->local->host, $systempasswords->dbusers->local->user, $systempasswords->dbusers->local->password) or die ('I cannot connect to the database because: ' . mysqli_error($link));
mysqli_select_db ($link, $systempasswords->dbusers->local->db);
$hlp=mysqli_query($link,"SET NAMES utf8;") or die("Invalid query SET NAMES: " . mysqli_error($link));


if ($_POST['title'] && $_POST['price']>0 && $_POST['datetime']) {
	$query="INSERT INTO ".$systempasswords->dbusers->local->table." (ff_title, ff_price, ff_datetime) VALUES (?, ?, ?);";
	$stmt = mysqli_prepare($link, $query);
	//$_POST['datetime']=preg_replace("/^(\d{1,2})\.(\d{1,2})\.(\d{4})/is",'$3-$2-$1',$_POST['datetime']);
	mysqli_stmt_bind_param($stmt, "sds", $_POST['title'], $_POST['price'], $_POST['datetime']);
	mysqli_stmt_execute($stmt);// or die('{"result":"error","message":"sql error"}');
	mysqli_stmt_close($stmt);
};

$arr=Array();
$result=mysqli_query($link,"SELECT * FROM ".$systempasswords->dbusers->local->table." WHERE 1 ORDER BY ff_datetime ASC;") or die("Invalid query: " . mysqli_error($link));
while($row=mysqli_fetch_assoc($result)) {
	array_push($arr,$row);
};
echo json_encode($arr);

//mysqli_close($link);
?>