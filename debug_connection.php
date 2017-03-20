<?php
$db = mysqli_connect("master.doma", "root", "Hacker1981", "WEBAPP", 3306);

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($db) . "<br><br>" . PHP_EOL;

	$sql = "SELECT cover, name, year, imdb_id FROM movies";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

?>
<div class="divTable">
	<div class="divTableBody">
		<div class="divTableRow">
		<div class="divTableCell">Cover</div>
		<div class="divTableCell">Name</div>
		<div class="divTableCell">Year</div>
		<div class="divTableCell">IMDB ID</div>
		</div>
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
							<div class="divTableCell">' . $row["cover"] . '</div>
							<div class="divTableCell">' . $row["name"] . '</div>
							<div class="divTableCell">' . $row["year"] . '</div>
							<div class="divTableCell">' . $row["imdb_id"] . '</div>
							<div class="divTableCell"><a href="edit.php">Edit</a> | <a href="delete.php">Delete</a></div>
							</div>';		
				}	
			}
		?>

	</div>
</div>
<?php
mysqli_close($link);
?>
