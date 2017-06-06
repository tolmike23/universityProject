<!--@Author: John Barraca
	Student ID: 13843117
	Paper Name: Web Development
	Assignment: One
-->
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>PostStatusProcess</title>
	<link rel="stylesheet" type="text/css" href="tvh8833style.css">
</head>
<body>
	<div>
	<h1>Posting Infromation</h1>
	<?php
		// sql info or use require_once 'settings.php'
      	require_once("/home/tvh8833/public_html/assign1/conf/settings.php");
		
		// The @ operator suppresses the display of any error messages
		// mysqli_connect returns false if connection failed, otherwise a connection value
		$conn = @mysqli_connect($sql_host,
			$sql_user,
			$sql_pass,
			$sql_db
		);
		//define the database table
		$sql_tble = post;
		//define the pages link
		$linkPost = "poststatusform.php";
		$linkIndex = "index.php";
		// Checks if connection is successful
		if (!$conn) {
		//splays an error message, avoid using die() or exit() as this terminates the execution
		// the PHP script
		echo "<p>Database connection failure</p>";
		}else{
				if(!empty ($_POST["statCode"]) && !empty ($_POST["stat"]) && !empty ($_POST["dAte"])){
				//Variable
				$statCode = $_POST["statCode"];
				$stat = $_POST["stat"];
				$share = $_POST["share"];
				$date = $_POST["dAte"];
				$permType = implode(", ",$_POST["permType"]);

				//Pattern Use for matching
				$patternStat  = "/^[\w\s+?\.+!]+$/";
				$patternStatCode = "/^[S]\d{4}+$/";
				if (preg_match($patternStat, $stat) && preg_match($patternStatCode, $statCode)){
					
					//Set up the SQL command to add the data into the table
					$query = "insert into $sql_tble"
						."(statuscode, stats, share, date, permissiontype)"
					. "values"
						."('$statCode','$stat','$share', '$date', '$permType')";
					
					// executes the query
					$result = mysqli_query($conn, $query);
					//checks if the execution was successful
					if(!$result) {
						echo "<p>Similar post already exist for ",	$query, "</p>";
						echo "<a href='".$linkPost."'>Try Post Again</a>";
					}else{
						// display an operation successful message
						// if successful query operation
						echo "<p>Posted Successfully</p>";
						echo "<a href='".$linkPost."'>Try Post Again</a><br>";
						echo "<a href='".$linkIndex."'>Back To Index Page</a>";
						} 
					}
					else{
						if(!preg_match($patternStat, $stat) && !preg_match($patternStatCode, $statCode)){
							echo "<p>Status $ StatusCode Fields does not match with the required input</p>";
							echo "<a href='".$linkPost."'>Try Post Again</a>";
						}
						elseif(!preg_match($patternStat, $stat)){
							echo "<p>Status Field does not match with the required input</p>";
							echo "<a href='".$linkPost."'>Try Post Again</a>";
						}
						elseif(!preg_match($patternStatCode, $statCode)){
							echo "<p>StatusCode Field does not match with the required input</p>";
							echo "<a href='".$linkPost."'>Try Post Again</a>";
						}
					}					
				}
				else{

					if(empty ($_POST["statCode"]) && empty ($_POST["stat"])){
						echo "<p>Statuscode & Status Fields are empty</p>";
						echo "<a href='".$linkPost."'>Try Post Again</a>";
					}

					elseif(empty ($_POST["statCode"])){
						echo "<p>Statuscode Field is empty</p>";
						echo "<a href='".$linkPost."'>Try Post Again</a>";
					}

					elseif(empty ($_POST["stat"])){
						echo "<p>Status Field is empty</p>";
						echo "<a href='".$linkPost."'>Try Post Again</a>";
					}
				}
			}
			mysqli_close($conn);	
		?>
	</div>
</body>
</html> 