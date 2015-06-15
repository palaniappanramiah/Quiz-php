<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Online Quiz</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
		
	<div class="loginArea">
		<form name="login" action="?page=login" method="post">	
			<p>Ready For the Quiz!</p>
			<table>
			<tr>
				<td><input type="text" id="username" name="username" placeholder="Username" autofocus/></td>
				<td><input type="password" id="password" name="password" placeholder="Password"/><br/></td>
			</tr>
			<tr>
				<td><a href="forgot.html">Forgot Password?</a></td>
				<td><input type="submit" id="login" name="login" value="Login"/></td>
			</tr>
			</table>
		</form>
	</div>
		
	<div class="top">
		<table class="topHeader" width="100%" cellspacing="5" cellpadding="5">
		<tr>
			<td><a href="index.php" class="home">Home</a></td>
			<td><a href="" class="about">FAQ's</a></td>
			<td><a href="" class="about">About</a></td>
			<td><a href="" class="search">Contact</a></td>
		</tr>
		</table>
	</div>
</body>
</html>

<?php
$page = $_GET['page'];
if($page == "login") {
	include('connection.php');

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password") or die("cannot connect");
	mysql_select_db("$db_name") or die("cannot select DB");
	
	// username and password sent from the form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Validating the input
	if(!$username){
        echo("<div class='loginArea'>You must enter the username!</div>");
        exit;
    }
    else if(!($_POST['password'])){
		echo("<div class='loginArea'>You must enter your password!</div>");
        exit;
    }
	
	// To protect MySQL injection
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);
	
	// If result matched $username and $password, table row must be 1 row
	if($count == 1){
		// Register $username, $password and redirect to file "loginSuccess.php"
		session_start();
		$_SESSION['myusername'] = $username;
		$_SESSION['logged'] = TRUE;
		//header("location:loginSuccess.php");
		echo'<script> window.location="loginSuccess.php"; </script> ';
		exit;
	}
	else{
		echo "<div class='loginArea'>Wrong Username or Password</div>";
	}
}
?>