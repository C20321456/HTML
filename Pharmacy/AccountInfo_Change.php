<?php
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
			Change Details
		</title>
		
		<meta charset="UTF-8">
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
						
						<label for="password">Password:</p></label>
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
					</form>
					
				<?php } ?>
				<?php echo $_SESSION["CurrentLogin"]; ?>
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
		$New_value=$_POST["New_value"];
		$Edit_Options=$_POST["Edit_Options"];
		$UserLogin = $_SESSION["UserLogin"];
		
		
		?>
		
		<div class="banner">
				<img src="banner.jpg" alt="Pharmacy Logo">
				<?php if($_SESSION["CurrentLogin"] == "0") { ?>
					<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">
					
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="Username">
						<br><br>
						
						<label for="password">Password:</p></label>
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
				
			</div>
		
		<?php 
		if($Edit_Options == "0")
		{
			$dbQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$UserLogin'";
			$dbResult = $mysqlconnection->query($dbQuery);
			
			if($dbResult->num_rows != 0)
			{
				$updateQuery = "UPDATE userinformation SET FirstName='$New_value' WHERE UserName= '$UserLogin'";
				if(mysqli_query($mysqlconnection, $updateQuery))
				{
				
				}
				
				else
				{
					echo "Error";
					mysqli_error($mysqlconnection);
				}
				?>
					<p>First Name updated successfully.</p>
				<?php
			}
		} 
		
		if($Edit_Options == "1")
		{
			$dbQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$UserLogin'";
			$dbResult = $mysqlconnection->query($dbQuery);
				
				
			if($dbResult->num_rows != 0) 
			{
					
				$updateQuery = "UPDATE userinformation SET Surename='$New_value' WHERE UserName= '$UserLogin'";
				if(mysqli_query($mysqlconnection, $updateQuery))
				{
					
				}
				
				else
				{
					echo "Error";
					mysqli_error($mysqlconnection);
				}
				?>
					<p>Surename updated successfully.</p>
				<?php
			}
		}

		if($Edit_Options == "2")
		{
			$dbQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$UserLogin'";
			$dbResult = $mysqlconnection->query($dbQuery);
				
			if($dbResult->num_rows != 0)
			{
				$unameQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$New_value'";
				$unameResult = $mysqlconnection->query($unameQuery);
				
				if($unameResult->num_rows == 0)
				{
					$updateQuery = "UPDATE userinformation SET UserName='$New_value' WHERE UserName= '$UserLogin'";
					if(mysqli_query($mysqlconnection, $updateQuery))
					{
						
					}
					
					else
					{
						echo "Error";
						mysqli_error($mysqlconnection);
					}
					$_SESSION["UserLogin"] = "$New_value";
					?>
						<p>Username updated successfully.</p>
					<?php
				}
					
				else 
				{
					?>
						<p>Username already taken. </p>
					<?php
				}
			}
		} 
		
		if($Edit_Options == "4")
		{
			$New_valueConfirmPass=$_POST["New_valueConfirmPass"];
			$dbQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$UserLogin'";
			$dbResult = $mysqlconnection->query($dbQuery);
				
				
			if($dbResult->num_rows != 0) 
			{ 
					
				if($New_value == $New_valueConfirmPass)
				{
					$updateQuery = "UPDATE userinformation SET PassWord='$New_value' WHERE UserName= '$UserLogin'";
					if(mysqli_query($mysqlconnection, $updateQuery))
					{
						
					}
					
					else
					{
						echo "Error";
						mysqli_error($mysqlconnection);
					}
					?>
						<p>Password updated successfully.</p>
					<?php
				}
					
				else 
				{
					?>
						<p>Password does not match.</p>
					<?php
				}
			}
		} 
		
		if($Edit_Options == "4")
		{
			$New_value = "";
			$dbQuery = "SELECT UserName FROM pharmacy.userinformation WHERE UserName = '$UserLogin'";
			$dbResult = $mysqlconnection->query($dbQuery);
				
			if($dbResult->num_rows != 0) 
			{
				$deleteQuery = "DELETE FROM userinformation WHERE UserName= '$UserLogin'";
				if(mysqli_query($mysqlconnection, $deleteQuery))
				{
					
				}
				
				else
				{
					echo "Error";
					mysqli_error($mysqlconnection);
				}
				$_SESSION["UserLogin"] = "";
				$_SESSION["CurrentLogin"] = "0";

				?>
					<script type="text/javascript">
						window.location = "http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php";
					</script>
				<?php 
			}	
		} ?>
	</body>
	<?php } ?>
	<footer>
		<hr>
			<div>
				<p><h3>main page</h3></p>
				<a href="http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php"><p>Homepage</p></a>
			</div>
		</hr>
	</footer>
</html>