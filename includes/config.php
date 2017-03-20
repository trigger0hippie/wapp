<?php	
	define("URL", "http://master/wapp/");
	define("TITLE", "Film-O-Matik");
	define("UPLOAD_PATH", "storage/");
	define("XML_SCHEMA", "storage/xmlschema.xsd");
	$db = mysqli_connect("master.doma", "user", "pass", "WEBAPP");
	$db2 = mysqli_connect("master.doma", "user", "pass", "MyVideos");
	if (!$db) 
	{
		die("Connection error: " . mysqli_connect_errno());
	}
	session_start();
	
	
?>
