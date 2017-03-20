<?php
	require_once("includes/config.php");
	require_once("includes/header.php");	
       
	if($_SERVER["REQUEST_METHOD"] == "POST") {      
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']); 
		$sql = "select id from users where username = '$username' and password = '$password'";
		$result = mysqli_query($db,$sql);
		$count = mysqli_num_rows($result);
		if($count == 1) 
		{
			$_SESSION['logged_user'] = $username;
			header("location: index.php");
		}
		else 
		{
			$login_error = "Neispravni podaci";
		}
	}
		
?>	
<div id="container">
<div id="login_wrapper">			
<div id="login_container">
	<div class="naslov">Film-<span class="highlight">O</span>-Matik</div>	               
   <form action = "<?php $_PHP_SELF ?>" method = "POST">
   <ul>
	  <li><input type = "text"  placeholder = "Korisničko ime" name = "username" class = "box"/></li>
	  <li><input type = "password" placeholder = "Lozinka" name = "password" class = "box" /><br/><br /></li>
	  <li><input type = "submit" id="submit_button" value = "Submit"/><br /></li>
	</ul>
   </form>               
   <div class="error"><?php echo $login_error; ?></div>					
</div>				
</div>

</div>		  
</body>
</html>