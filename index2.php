<?php
    require_once("includes/config.php");
	require_once("includes/header.php");	
	require_once("includes/check.php");
	require_once("includes/top.php");

	$sql = "SELECT id, cover, name, year, imdb_id FROM movies";
	$sql2 = "SELECT idMovie, c00, c07, c09, c22 FROM movie";
	$result = mysqli_query($db,$sql);
	$result2 = mysqli_query($db2,$sql2);
	$count = mysqli_num_rows($result);
	$count2 = mysqli_num_rows($result2);
?>
<div class="divTable">
	<div class="divTableBody">
		
		<?php
			if($count == 0) 
			{
				echo 	'
						<div class="divTableRow">Nema rezultata</div>';
			}
			else {
				while($row = $result->fetch_array(MYSQLI_ASSOC)) 
				{
					echo 	'<div class="divTableRow">					
							<div class="movie_poster"><img class="poster" src=' . $row["cover"] . '></img></div>
							<div class="movie_name">' . $row["name"] . '</div>
							<div class="movie_year">Godina: ' . $row["year"] . '</div>
							<div class="movie_imdb">IMDB ID: ' . $row["imdb_id"] . '</div>
							<div class="movie_links"><a href="edit.php?id=' . $row["id"] . '">Uredi</a> | <a href="delete.php?id=' . $row["id"] . '">Izbriši</a></div>
							</div>';		
				}	
			}
		?>

	</div>
</div>

<div class="divTable">
	<div class="divTableBody">
		
		<?php
			if($count2 == 0) 
			{
				echo 	'
						<div class="divTableRow">Nema rezultata</div>';
			}
			else {
				while($row = $result2->fetch_array(MYSQLI_ASSOC)) 
				{
					echo 	'<div class="divTableRow">					
							<div class="movie_poster"><img class="poster" src=' . $row["c22"] . '></img></div>
							<div class="movie_name">' . $row["c00"] . '</div>
							<div class="movie_year">Godina: ' . $row["c07"] . '</div>
							<div class="movie_imdb">IMDB ID: ' . $row["c09"] . '</div>
							<div class="movie_links"><a href="edit.php?id=' . $row["idMovie"] . '">Uredi</a> | <a href="delete.php?id=' . $row["idMovie"] . '">Izbriši</a></div>
							</div>';		
				}	
			}
		?>

	</div>
</div>

<?php
	require_once("includes/footer.php");
?>