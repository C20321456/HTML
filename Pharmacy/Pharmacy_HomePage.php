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

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
			<title>
				Cooper Pharmacy
			</title>
		<link href="Pharmacy_StyleSheet.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="banner">
			<img src = "Banner.jpg">
		</div>
		
		<img src="Shopping_cart.png" alt="Shopping Cart Icon" width="40">
		<?php if($_SESSION["CurrentLogin"] == "0") { ?>
			<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_SignIn.php" method="post">
				
				<p style="font-size:2vw;">
				<img src= "arrow.gif" style="height:20px;">login
				</p>
				
				<label for = "username">username:</label>
				<input type = "text" id = "username" name = "UserName">
				<br>
				
				<label for = "password">password:</label>
				<input type = "password" id = "password" name = "Password">
				
				<input type="submit" value="Submit">
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
			</form>
		<?php } 
					
		 else if($_SESSION["CurrentLogin"] == "1") { ?>
			<p>you are logged in as:  <?php echo $_SESSION["UserLogin"]; ?></p>
			<a href="http://localhost:81/WebD/Pharmacy/SettingsPage.php">Edit Account</a>
			<form action = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signin.php" method="post">

			<label for="soutbtn"></label>
			<br>
			<button name="signout" type="submit" value="0">Sign Out</button>
			</form>
		<?php } ?>
		
		
		
		<p style="font-size:2vw;">
			<img src= "arrow.gif" style="height:20px;">register
		</p>
		
		<a href = "http://localhost:81/WebD/Pharmacy/Pharmacy_Signup.php">
			<img src = "Register.png" style="height:80px;">
		</a>
		
		<div class = "info">
			<br><br>
			<img src= "Info.png" alt="Information" style="width:1500px;height:600px;">
		</div>	
		
		<div class = "Medicine">
		
			<div class="item" style="font-size:2vw;">
				<a href = "Headache.html">
					<img class ="itemIamge" src= "Paracetamol.jpg">
				</a>
				
				<div>
					Medicine for Headaches
				</div>
			</div>
			
			
			<div class="item" style="font-size:2vw;">
				<a href = "Cough.html">
					<img class ="itemIamge" src= "Cough_Syrup.jpg">
				</a>
				
				<div>
					Medicine for coughs
				</div>
			</div>
		
			<div class="item" style="font-size:2vw;">
				<a href = "Sore_Throat.html">
					<img class ="itemIamge" src= "Strepsils.jpeg">
				</a>
				
				<div>
					Medicine for sore throat
				</div>
			</div>
			
			<div class="item" style="font-size:2vw;">
				<a href = "Pain_Relief.html">
					<img class ="itemIamge" src= "Deep_Heat.jpg">
				</a>
				
				<div>
					Medicine for pain relief
				</div>
			</div>
			
			<div class="item" style="font-size:2vw;">
				<a href = "Nose_Spray.html">
					<img class ="itemIamge" src= "Nose_Spray.jpg">
				</a>
			
				<div>
					Nose Spray for blocked nose
				</div>
			</div>
			
			<div class="item" style="font-size:2vw;">
				<a href = "Plasters.html">
					<img class ="itemIamge" src= "Plasters.jpeg">
				</a>
			
				<div>
					Pack of plasters
				</div>
			</div>
			
			<div class="item" style="font-size:2vw;">
				<a href = "Thermometer.html">
					<img class ="itemIamge" src= "Thermometer.jpg">
				</a>
			
				<div>
					Infrared Thermometer
				</div>
			</div>
			
			<div class="item" style="font-size:2vw">
				<a href = "Vitamins.html">
					<img class ="itemIamge" src= "Vitamin.jpg">
				</a>
			
				<div>
					Chewable Vitamins
				</div>
			</div>
			
			<div class="item" style="font-size:2vw">
				<a href = "Aid_Kit.html">
					<img class ="itemIamge" src= "Aid_Kit.jpg">
				</a>
			
				<div>
					First aid kit
				</div>
			</div>
			
			<div class="item" style="font-size:2vw">
				<a href = "Gloves.html">
					<img class ="itemIamge" src= "Gloves.jpg">
				</a>
			
				<div>
					Latex Gloves
				</div>
			</div>
		</div>
		
		<div class="moreComingSoon">
			<img src="Coming_Soon.png">
		</div>
		
		<div class="contact">
			<p style="font-size:2vw;">
				<br>
				Please note, more stock is coming soon. there has been a slight shipping problem.
				<br><br>
				For more information Contact us!
				<br>
				Phone: 0874117252
				<br>
				Email: CooperReception@gmail.com
			</p>
		</div>
	</body>
</html>