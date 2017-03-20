<?php
    require_once("includes/config.php");
	require_once("includes/header.php");	
	require_once("includes/check.php");
	require_once("includes/top.php");
	$m_id = $_GET['id'];
	if(!empty($_POST)) {
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$year = mysqli_real_escape_string($db,$_POST['year']); 
		$imdb_id = mysqli_real_escape_string($db,$_POST['imdb_id']);
		$cover = mysqli_real_escape_string($db,$_POST['cover']); 
		$sql = "UPDATE movies SET name='$name', year='$year', imdb_id='$imdb_id', cover='$cover' WHERE id=$m_id";
		if(mysqli_query($db, $sql)){
			$posted = "Uspješno spremljeno";
			header("Refresh:3; url=index.php");
		} else{
			$posted = "Greška: Nije moguće izvršiti zbog greške: " . mysqli_error($db);
		}
	}
	if(isset($_GET['id'])) 
	{		
		$sql = "SELECT id, name, year, imdb_id, cover from movies WHERE id=$m_id";
		$result = mysqli_query($db,$sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
	}
	
?>

<div class="head1">Uredi</div>				
<div id="form_container">    
        
	<form action = "<?php $_PHP_SELF ?>" method = "POST">		
		<label>Ime filma: </label><input type = "text" name = "name" value="<?php echo $row["name"]; ?>" class = "box" /><br /><br />
		<label>Godina: </label><input type = "number" name = "year" value="<?php echo $row["year"]; ?>" class = "box" /><br/><br />
		<label>IMBD ID: </label><input type = "text" name = "imdb_id" value="<?php echo $row["imdb_id"]; ?>" class = "box" /><br /><br />
		<label>Poster link: </label><input type = "text" name = "cover" value="<?php echo $row["cover"]; ?>" class = "box" /><br/><br />
		<input type = "submit" value = "Spremi unos"/><br />
	</form>
	<div><?php echo $posted; ?></div>
</div>		
	
<?php
	require_once("includes/footer.php");
?>