<?php
    require_once("includes/config.php");
	require_once("includes/header.php");	
	require_once("includes/check.php");
	require_once("includes/top.php");	
	
	if(isset($_FILES['uploadfile']))
	{	
		$file_name = $_FILES['uploadfile']['name'];
		$file_size = $_FILES['uploadfile']['size'];
		$file_tmp = $_FILES['uploadfile']['tmp_name'];
		$file_type = $_FILES['uploadfile']['type'];
		$file_ext=strtolower(end(explode('.',$file_name)));
		$extensions= array("xml");
		if(in_array($file_ext,$extensions)=== false){
			$errors = "Samo XML je dozvoljen!";			
		}
		if(empty($errors)==true) {
			move_uploaded_file($file_tmp, UPLOAD_PATH.$file_name);
			$moved_file = "Datoteka " . $file_name . " je uspješno uploadana na server.";		 
		}
		else
		{
			printf($errors);
		}
		$xml = new DOMDocument(); 
		$xml->load(UPLOAD_PATH . $file_name); 

		libxml_use_internal_errors(true); 
		if (!$xml->schemaValidate(XML_SCHEMA)) 
		{
			$xmlerrors = libxml_get_errors();
			foreach ($xmlerrors as $error) 
			{
				printf('<br><br>XML greška: "%s" [%d] (Code %d) in %s on line %d column %d' . "\n<br><br>", $error->message, $error->level, $error->code, $error->file, $error->line, $error->column);
			}
			libxml_clear_errors();			
		}
		libxml_use_internal_errors(false); 
		
		$xml = simplexml_load_file(UPLOAD_PATH.$file_name);
		$count = 0;
		foreach ($xml->Movie as $movie) 
		{			
			$name = $movie->Name;
			$year = $movie->Year;
			$imdb_id = $movie->IMDB_ID;
			$cover = $movie->Cover;
			$sql = "INSERT INTO movies SET name='$name', year='$year', imdb_id='$imdb_id', cover='$cover'";			
			if(mysqli_query($db, $sql))
			{
				$posted = "Uspješno spremljeno";
				$count++;
			} 
			else
			{
				$posted = "Nije moguće izvršiti zbog greške: " . mysqli_error($db);
			}
		}
		if($count != 0) 
		{			
			header("Refresh:3; url=index.php");
		}		
	}	
?>

<div class="head1">Import datoteke (.xml)</div>				
<div id="form_container">            
	<form action = "<?php $_PHP_SELF ?>" method = "POST" enctype = "multipart/form-data">		
		<label>Izaberi datoteku: </label><input type="file" name="uploadfile" id="uploadfile"><br/><br />
		<input type="submit" value="Upload" name="submit"><br/><br />		
	</form>
	<div class="import_info"><?php echo $moved_file; ?></div>
	<div class="import_info"><?php echo $posted, $count; ?></div>
</div>		
	
<?php
	require_once("includes/footer.php");
?>