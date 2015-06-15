<?php
$page = $_GET['page'];
// Check if session is not registered, redirect back to main page.
session_start();
if(!$_SESSION['logged']){
	header("location:index.php");
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Quiz-Home</title>
		<script type="text/javascript" src="jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="quiz.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="logoutArea">
			<form name="logout" action="?page=logout" method="post">	
				<input type="submit" id="logout" name="logout" value="Logout"/>
			</form>
		</div>
		<h3><?php echo $_SESSION['myusername']; ?>, Your next Question</h3>
		<div class="quizArea">
			<br><br>Is Blue the only primary color?<br><br>
		</div>
		
		<div class="question">
			<input type="radio" name="radio" value="true">True<br>
			<input type="radio" name="radio" value="false">False<br>
		</div>
		
		<div class="quizArea">	
			<br>
			<input type="button" id="submit" value="Submit"/>
			<p id="selectAnswer">Oops!Please select at least one answer to proceed.</p>
			<p id="correctAnswer">Correct. There are 3 primary colors which are Red, Green and Blue.<br>Please logout</p>
			<p id="wrongAnswer">Sorry. There are 3 primary colors which are Red, Green and Blue.<br>Please logout</p>
		</div>
		
	</body>
</html>

<?php
if($page == "logout"){
	session_start();
	session_destroy();
	echo'<script> window.location="index.php"; </script> ';
}
?>