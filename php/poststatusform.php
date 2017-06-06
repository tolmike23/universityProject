<!--@Author: John Barraca
	Student ID: 13843117
	Paper Name: Web Development
	Assignment: One
-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<title>poststatusform</title>
	<link rel="stylesheet" type="text/css" href="tvh8833style.css">  
</head>
<body>
	<div>
	<h1>Status Posting System</h1>
	<form action = "poststatusprocess.php" method="post">
		Status Code (required): <input type="text" name="statCode"/>
		<br>
		Status (required): <input type="text" name="stat"/>
		<br>
		Share: <input type="radio" name="share" value="Public"/>Public <input type="radio" name="share" value="Friends"/>Friends <input type="radio" name="share" value="Only Me"/>Only Me
		<br>
		Date: <input type="date" name="dAte" value="<?php echo date('Y-m-d'); ?>" />
		<br>
		Permission Type: <input type="checkbox" name="permType[]" value="Allow Like"/>Allow Like <input type="checkbox" name="permType[]" value="Allow Comment"/>Allow Comment <input type="checkbox" name="permType[]" value="Allow Share"/>Allow Share 
		<br>
		<button type="Submit">Post</button>
		<button type="Reset">Reset</button>
		<br>
		<a href="index.php">Return to Home Page</a>
	</form>
	</div>
</body>
</html>