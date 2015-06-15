<?php
$page = $_GET['page'];
// Check if session is not registered, redirect back to main page.
session_start();
if(!$_SESSION['logged']){
	header("location:index.php");
}
//echo 'Hello '.$_SESSION['myusername'].'. Your question:';
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
		<h3>Welcome <?php echo $_SESSION['myusername']; ?>! Your Question</h3>
		<div class="quizArea">
			<br><br>What are the three primary colors?<br><br>
		</div>
		
		<div class="question" id="choice">
			<input type="checkbox" name="color[]" id="red" value="red" unchecked>Red<br>
			<input type="checkbox" name="color[]" id="green" value="green">Green<br>
			<input type="checkbox" name="color[]" id="blue" value="blue">Blue<br>
			<input type="checkbox" name="color[]" id="orange" value="orange">Orange<br>
		</div>
		
		<div class="quizArea">	
			<br>
			<input type="button" id="submit" value="Submit"/>
			<form name="next" action="next.php" method="post">
				<input type="submit" id="next" value="Next"/>
			</form>
			<p id="selectAnswer">Oops!Please select at least one answer to proceed.</p>
			<p id="correctAnswer">Correct. The answer is Red, Green and Blue.</p>
			<p id="wrongAnswer">Sorry. The correct answer is Red, Green and Blue.</p>
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