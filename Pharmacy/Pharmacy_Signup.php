<!DOCTYPE html>
<head>
	<title> User signup </title>
	
	<link href="Pharmacy_StyleSheet.css" rel="stylesheet">
</head>

<body>
	<h1> 
		Sign up.
	</h1>
	
	<div class="SignUpSheet">
		<form action="Pharmacy_Index.php" method="post">
			
			<label for ="UserName">UserName: </label>
			<input type="text" name="UserName" id="UserName" placeholder="Your UserName...">
			
			
			<label for ="Password">Password: </label>
			<input type="text" name="Password" id="Password" placeholder="Your Password...">
			
			
			<label for ="FirstName">FirstName: </label>
			<input type="text" name="FirstName" id="FirstName" placeholder="Your FirstName...">
			
			
			<label for ="Surename">Surename: </label>
			<input type="text" name="Surename" id="Surename" placeholder="Your Surename...">
			
			
			<input type="submit" value="Submit">
		</form>
	</div>
	
	<div class = "info">
		<img src= "Info.png" alt="Information" style="width:1500px;height:600px;">
	</div>
	
</body>
