<!--@Author: John Barraca
	Student ID: 13843117
	Paper Name: Web Development
	Assignment: One
-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >
<head>
<title>MySQL Databases with PHP</title>
<link rel="stylesheet" type="text/css" href="tvh8833style.css">
</head>
<body>
	<div>
	<h1>Status Information</h1>
<?php
	// sql info or use require once 'settings.php'
    require_once("/home/tvh8833/public_html/assign1/conf/settings.php");
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
  
	);
	$sql_tble1 = post;
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		// Upon successful connection
		// Get data from the form
		$make = $_GET["search"];
		// Set up the SQL command to add the data into the table
		$query = "select * from $sql_tble1 where stats like '$make%'";
		// executes the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		// checks if the execuion was successfull
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else{
			// Display the retrieved records
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)){
				$date = $row["date"];
				$echDat = date('F d Y', strtotime($date));
				echo "Status:"," ",$row["stats"],"<br>","<br>";
				echo "Status Code: "," ",$row["statuscode"],"<br>","<br>";
				echo "Share:", " ",$row["share"],"<br>","<br>";
				echo "Date Posted:"," ",$echDat,"<br>","<br>";
				echo "Permission:", " ",$row["permissiontype"],"<br>","<br><hr>";
				}	
			}else{
				echo "<p>you're search doesn't match</p>";
			}
			// Frees up the memory, after using the result pointer
			 mysqli_free_result($result);
		} 
		// if successful query operation
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
?>
	<br>
	<a href="searchstatusform.php">Search for another status</a>
	<br>
	<a href="index.php">Return to Home Page</a>
	</div>
</body>
</html>