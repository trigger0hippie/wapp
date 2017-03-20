<?php
    require_once("includes/config.php");
	require_once("includes/header.php");	
	require_once("includes/check.php");
	require_once("includes/top.php");

	if(!empty($_POST)) {
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$year = mysqli_real_escape_string($db,$_POST['year']); 
		$imdb_id = mysqli_real_escape_string($db,$_POST['imdb_id']);
		$cover = mysqli_real_escape_string($db,$_POST['cover']); 
		$sql = "INSERT INTO movies (name, year, imdb_id, cover) VALUES('$name', '$year', '$imdb_id', '$cover')";
		if(mysqli_query($db, $sql)){
			$posted = "Uspješno spremljeno";
		} else{
			$posted = "Greška: Nije moguće izvršiti zbog greške: " . mysqli_error($db);
		}
	}
	
?>

<div class="head1">Dodaj</div>				
<div id="form_container">         		
	<div class="forma"> 
		
		<form action = "<?php $_PHP_SELF ?>" method = "POST">
			<label>Ime filma: </label><input type = "text" name = "name" class = "box" required/><br /><br />
			<label>Godina: </label><input type = "number" name = "year" class = "box" required/><br/><br />
			<label>IMBD ID: </label><input type = "text" name = "imdb_id" class = "box" required/><br /><br />
			<label>Poster link: </label><input type = "text" name = "cover" class = "box" required/><br/><br />
			<input type = "submit" value = "Spremi unos"/><br />
		</form>
	</div>
	<div><?php echo $posted; ?></div>
</div>		
	
<?php
	require_once("includes/footer.php");
?>