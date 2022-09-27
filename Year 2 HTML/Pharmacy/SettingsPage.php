<?php
// Start the session
session_start();
if (!isset($_SESSION['done'])) {
	
    $_SESSION['done'] = 1;
	$_SESSION["CurrentLogin"] = "0";
	$_SESSION["UserLogin"] = "";
}
if (!isset($_SESSION['CurrentLogin'])) {
	
	$_SESSION["CurrentLogin"] = "0";
}
if (!isset($_SESSION['UserLogin'])) {
	
	$_SESSION["UserLogin"] = "";
}
?>


<!DOCTYPE HTML>
<html lang="en">
<html>
	<head>
		<link rel="stylesheet" href="Pharmacy_StyleSheet.css">
		<title>
			User Account Settings
		</title>
		<meta charset="UTF-8">
	</head>
	
	<body>
		<?php
			if($_SESSION["CurrentLogin"] != "1")
		{?>
			
			<div class="banner">
				<img src="banner.jpg" alt="Pharmacy Logo">	
				<?php if($_SESSION["CurrentLogin"] == "0") { ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<input type="submit">
						<br><br>
					</form>
				<?php } 
				
				else if($_SESSION["CurrentLogin"] == "2") { 
				$_SESSION["CurrentLogin"] = "0"; ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<input type="submit">
						
						<p>Incorrect Password has been typed. Try again</p>
						
						<br><br>
					</form>
				<?php } 
				
				else if($_SESSION["CurrentLogin"] == "3") { 
				$_SESSION["CurrentLogin"] = "0"; ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<input type="submit">
						
						<p>Incorrect username has been typed. try again</p>
						
						<br><br>
					</form>
				<?php } 
					
				 else if($_SESSION["CurrentLogin"] == "1") { ?>
					<p>you are logged in as: <?php echo $_SESSION["UserLogin"]; ?></p>
					<a href= "http://localhost:81/WebD/Pharmacy/SettingsPage.php">Edit Account</a>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
					<label for="soutbtn"></label>
					<br>
					<button name="signout" type="submit" value="0">Sign Out</button>
					
				<?php } ?>
					<img src="Shopping_cart.png" alt="Shopping Cart Icon" width="60">
					<?php echo $_SESSION["CurrentLogin"]; ?>
				</span>
			</div>
		
			<h2>User isnt logged in. please log in first.</h2>
			<p>detials are hidden until user logs in. Use the link <a href="http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php"> Home page</a> to return to the home page.</p>
	</body>		
		
		<?php } 
		
		else 
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pharmacy";
			$mysqlconnection = new mysqli($servername,$username,$password,$dbname);
			if($mysqlconnection === false)
			{
				die("ERROR: Could not connect." . mysqli_connect_error());
			}

			$UserLogin = $_SESSION["UserLogin"];
			$loginFname = "";
			$loginLname = "";
			$loginPass = "";
			
			$unameQuery = "SELECT UserName, PassWord, FirstName, Surename FROM pharmacy.userinformation WHERE username = '$UserLogin'";
			$unameResult = $mysqlconnection->query($unameQuery);
			
			while($row = $unameResult->fetch_assoc())
			{
				$loginFname = $row["FirstName"];
				$loginLname = $row["Surename"];
				$loginPass = $row["PassWord"];	
			}
			
			?>
			
			<div class="banner">
				<img src="Banner.jpg" alt="Pharmacy Logo">	
				<?php if($_SESSION["CurrentLogin"] == "0") { ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						
						<input type="submit">
						<br><br>
					</form>
				<?php } 
				
				else if($_SESSION["CurrentLogin"] == "2") { 
				$_SESSION["CurrentLogin"] = "0"; ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<input type="submit">
						
						<p>Incorrect Password typed</p>
						
						<br><br>
					</form>
				<?php } 
				
				else if($_SESSION["CurrentLogin"] == "3") { 
				$_SESSION["CurrentLogin"] = "0"; ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<input type="submit">
						
						<p>Invalid username typed</p>
						
						<br><br>
					</form>
				<?php } 
					
				 else if($_SESSION["CurrentLogin"] == "1") { ?>
					<p>Welcome, <?php echo $_SESSION["UserLogin"]; ?></p>
					<a href= "http://localhost:81/WebD/Pharmacy/SettingsPage.php">Edit Account</a>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="soutbtn"></label>
						<br>
						<button name="signout" type="submit" value="0">Sign Out</button>
					</form>
					
				<?php } ?>
					<img src="Shopping_cart.png" alt="Shopping Cart Icon" width="60">
					<?php echo $_SESSION["CurrentLogin"]; ?>
				</span>
			</div>
			
			<div>
				<h2>Account Details</h2>
				<form action = "http://localhost:81/WebD/Pharmacy/EditAccount.php" method="post">
					<label for ="fname">First Name: <?php echo $loginFname; ?> &nbsp;&nbsp;&nbsp;</label>
					<button name="Edit_Options" type="submit" value="0">Edit First Name</button>
					<br>
					<br>
					
					<label for ="lname">Last Name: <?php echo $loginLname; ?> &nbsp;&nbsp;&nbsp;</label>
					<button name="Edit_Options" type="submit" value="1">Edit Last Name</button>
					<br>
					<br>
					
					<label for ="lname">Userame: <?php echo $UserLogin; ?> &nbsp;&nbsp;&nbsp;</label>
					<button name="Edit_Options" type="submit" value="2">Edit Username</button>
					<br>
					<br>
						
					<label for ="lname">Password: <?php echo $loginPass; ?> &nbsp;&nbsp;&nbsp;</label>
					<button name="Edit_Options" type="submit" value="3">Edit Password</button>
					<br>
					<br>
					
					<button name="Edit_Options" type="submit" value="4">Delete Account</button>
				</form>
			</div>
	</body>
		
		<?php } ?>
		
		<footer>
			<hr>
				<div>
					<p><h3>Main page</h3></p>
					<a href="http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php"><p>Homepage</p></a>
				</div>
		</footer>
</html>
	
	