<?php
    require_once("includes/config.php");	
	require_once("includes/check.php");	
	$m_id = $_GET['id'];
	$sql = "DELETE FROM movies WHERE id=$m_id";
	if(mysqli_query($db, $sql)){
		header("location: index.php");
	} 	
?>
