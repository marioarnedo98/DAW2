<?php 

session_start();

$_SESSION['user']= (isset($_GET['user'])===true)? (int)$_GET['user']: 0;

//echo $_SESSION['user'];
require 'core/classes/Core.php';
require 'core/classes/Chat.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat room</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="chat">
		<div class="messages"></div>
		<textarea  class="entry" placeholder="Type here and hit return. Use shift + Return for a new line" ></textarea>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="js/chat.js"></script>
</body>
</html>