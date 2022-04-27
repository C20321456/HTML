<?php
// Start the session
session_start();

     if (!isset($_SESSION['done'])) 
	 {
         $_SESSION['done'] = 1;
		 $_SESSION["CurrentLogin"] = "0";
		 $_SESSION["UserLogin"] = "";
     }
	 
	 if (!isset($_SESSION['CurrentLogin'])) 
	 {
		 $_SESSION["CurrentLogin"] = "0";
     }
	 
	 if (!isset($_SESSION['UserLogin'])) 
	 {
		 $_SESSION["UserLogin"] = "";
     }
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<link rel="stylesheet" href="Pharmacy_StyleSheet.css">
		<title>
			Edit account details
		</title>
		<meta charset="UTF-8-BOM">
		
	
	</head>
	
	<body>
		<?php
		
		if($_SESSION["CurrentLogin"] != "1")
		{ ?>
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
						
						<label for="password">Password:</p></label>
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
						
						<label for="password">Password:</p></label>
						<input type="password" id="password" name="password">
						
						<input type="submit">
						<p>Incorrect username typed</p>
						<br><br>
					</form>
				<?php } 
					
				 else if($_SESSION["CurrentLogin"] == "1") { ?>
					<p>Welcome, <?php echo $_SESSION["UserLogin"]; ?></p>
					<a href="http://localhost:81/WebD/Pharmacy/SettingsPage.php">Edit Account</a>
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
			
			$Edit_Options = $_POST["Edit_Options"];
			?>
			
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
						
						<label for="password">Password:</p></label>
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
						<p>Incorrect username typed</p>
						<br><br>
					</form>
				<?php } 
					
				 else if($_SESSION["CurrentLogin"] == "1") { ?>
					<p>you are logged in as: <?php echo $_SESSION["UserLogin"]; ?></p>
					<a href="http://localhost:81/WebD/Pharmacy/SettingsPage.php">Edit Account</a>
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
		
			<?php
			if($Edit_Options == "0")
			{ ?>
			<form action = "http://localhost:81/WebD/Pharmacy/AccountInfo_Change.php" method="post">
			
				<label for ="New_value">New FirstName: </label>
				<input type="text" id="New_value" name="New_value" required placeholder="New_First_Name">
				
				<button name="Edit_Options" type="submit" value="0">Submit changes</button>
			</form>
			<?php } 
		
			else if($Edit_Options == "1")
			{ ?>
			<form action = "http://localhost:81/WebD/Pharmacy/AccountInfo_Change.php" method="post">
			
				<label for ="New_value">New Surename: </label>
				<input type="text" id="New_value" name="New_value" required placeholder="New Surenmae">
				
				<button name="Edit_Options" type="submit" value="1">Submit changes</button>
			</form>
			<?php } 
			
			else if($Edit_Options == "2")
			{ ?>
			<form action = "http://localhost:81/WebD/Pharmacy/AccountInfo_Change.php" method="post">
			
				<label for ="New_value">New Username: </label>
				<input type="text" id="New_value" name="New_value" required placeholder="New Username">
				
				<button name="Edit_Options" type="submit" value="2">Submit changes</button>
			</form>
			<?php } 
			
			else if($Edit_Options == "3")
			{ ?>
			<form action = "http://localhost:81/WebD/Pharmacy/AccountInfo_Change.php" method="post">
			
				<label for ="New_value">New Password: </label>
				<input type="password" id="New_value" name="New_value" required placeholder="New Password">
				<br><br>
				
				<label for ="New_valueConfirmPass">Confirm Password: </label>
				<input type="password" id="New_valueConfirmPass" name="New_valueConfirmPass" required placeholder="Confirm Password">
				<br><br>
				
				<button name="Edit_Options" type="submit" value="3">Submit changes</button>
			</form>
			<?php }
			
			else if($Edit_Options == "4")
			{ ?>
			<form action = "http://localhost:81/WebD/Pharmacy/AccountInfo_Change.php" method="post">
			
				<h2>Are you sure you want to delete this account?</h2>
				<p><strong>This is a permanent action and the account will not be recovered afterwards.</strong></p>
				<br><br>
				
				<button name="Edit_Options" type="submit" value="4">Delete Account.</button>
			</form>
			<?php } ?>
			
		</body>
		<?php } ?>
	
		<footer>
			<hr>
				<div>
					<p><h3>Link to main page</h3></p>
					<a href="http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php"><p>Homepage</p></a>
				</div>
			</hr>
		</footer>
</html>