<?php

$systempasswords=json_decode(file_get_contents('auth.json'));

//print_r($systempasswords);

$link=mysqli_connect($systempasswords->dbusers->local->host, $systempasswords->dbusers->local->user, $systempasswords->dbusers->local->password) or die ('I cannot connect to the database because: ' . mysqli_error($link));
mysqli_select_db ($link, $systempasswords->dbusers->local->db);
$hlp=mysqli_query($link,"SET NAMES utf8;") or die("Invalid query SET NAMES: " . mysqli_error($link));



$hlp=mysqli_query($link,"CREATE TABLE IF NOT EXISTS ".($systempasswords->dbusers->local->table)." (ff_id bigint(20) NOT NULL AUTO_INCREMENT,ff_title varchar(250) NOT NULL,ff_price decimal(10,2) NOT NULL,ff_datetime varchar(20) NOT NULL, PRIMARY KEY (ff_id), KEY ff_datetime (ff_datetime)) ENGINE=MyISAM DEFAULT CHARSET=utf8;") or die("Invalid query: " . mysqli_error($link));


mysqli_close($link);
?>