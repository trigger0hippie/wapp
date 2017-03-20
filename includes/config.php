<?php	
	define("URL", "http://master/wapp/");
	define("TITLE", "Film-O-Matik");
	define("UPLOAD_PATH", "storage/");
	define("XML_SCHEMA", "storage/xmlschema.xsd");
	$db = mysqli_connect("master.doma", "root", "Hacker1981", "WEBAPP");
	$db2 = mysqli_connect("master.doma", "root", "Hacker1981", "MyVideos93");
	if (!$db) 
	{
		die("Connection error: " . mysqli_connect_errno());
	}
	session_start();
	
	
?>