<!DOCTYPE html>
<html>
<head>
	<title>Admin || Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel = "shortcut icon" href = "../images/basket.jpg">
	<link rel="stylesheet" type="text/css" href="../css/style4.css">
	<link rel="stylesheet" type="text/css" href="../css/style5.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel = "shortcut icon" href = "../images/ico.png" />	
</head>
<body>
	<nav>
		<label class="logo">eGrocer - List || Admin</label>
	</nav>

<br><br><br>
<div class="clsDiv">
	<h4><font color="white"><b>Admin </b></font></h4>
	<hr/>
	<form enctype = "multipart/form-data" action = "./includes/login.php" role = "form" method = "POST">
		<label for="email"><font color="white">Email</font></label>
		<input class="clsTxt" type="text" name="username" placeholder="Enter email">
		<label for="password"><font color="white"> Password </font></label>
		<input class="clsTxt" type="text" name="password" placeholder="Enter password">
		<button type="submit" name="login" style=" height: 60px; background-color: #156699; float: none;" class="btn  btn-block"><font color="white"><b>Login</b></font></button>
	</form>
</div>
</body>
</html>
