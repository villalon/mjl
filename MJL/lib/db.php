<?php

function getConnection() {
	$config = parse_ini_file('mjl.ini');
	
	$db = new mysqli('localhost',$config['dbuser'],$config['dbpass'],'mjl') or die("Couldn't connect to DB:".$db->error);
	return $db;
}