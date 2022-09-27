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

<html>
	<head>
		<meta charset="UTF-8">
	</head>
	
	<body>
		<?php
		/*
		0: your not logged in
		1: you are logged in
		2: your Password doesnt match
		3: your username doesnt match
		4: displays the login details
		*/
		
		$servername = "localhost";
		$username = "root";
		$Password = "";
		$dbname = "pharmacy";
		
		$mysqlconnection = new mysqli($servername,$username,$Password,$dbname);
		if($mysqlconnection === false)
		{
			die("ERROR: Could not connect to the database." . mysqli_connect_error());
		}
		echo "Successful connection. you are now logged in"."<br>";

		if ($_SESSION["CurrentLogin"] == "0" || $_SESSION["CurrentLogin"] == "2" || $_SESSION["CurrentLogin"] == "3")
		{
			$formUserName = $_POST['UserName'];
			$formPassword = $_POST['Password'];
		
			$dbQuery = "SELECT UserName, Password FROM pharmacy.userinformation WHERE UserName = '$formUserName'";
			$dbResult = $mysqlconnection->query($dbQuery);
		
			if($dbResult->num_rows > 0)
			{
				while($row = $dbResult->fetch_assoc())
				{
					echo "Username: ".$row["UserName"]."<br>";
					echo "pass: ".$row["Password"]."<br>";
					
					if($formPassword == $row["Password"])
					{
						$_SESSION["CurrentLogin"] = "1";
						$_SESSION["UserLogin"] = "$formUserName";
						?>
							<script type="text/javascript">
								window.history.go(-1);
							</script>
						<?php 
					}
					
					else
					{
						$_SESSION["CurrentLogin"] = "2";
					}
				}
			}
			else
			{
				$_SESSION["CurrentLogin"] = "3";
				?>
				<script type="text/javascript">
					window.history.go(-1);
				</script>
				<?php 
			}
		}
		
		else if($_SESSION["CurrentLogin"] == "1")
		{
			$_SESSION["CurrentLogin"] = "0";
			$_SESSION["UserLogin"] = "";
			?>
			<script type="text/javascript">
				window.location = "http://localhost:81/WebD/Pharmacy/Pharmacy_HomePage.php";
			</script>
			<?php 
		}
		?>
		<script type="text/javascript">
			window.history.go(-1);
		</script>
		<?php 
			$mysqlconnection->close();
		?>
	</body>
</html>