<?php 
	//test | rfollman | 2.27.18
	//from book -- pp 235 -- connects to database
	require_once 'login.php';
	$conn = new mysqli($hostname, $user, $pword, $database, 3306, '/Applications/MAMP/tmp/mysql/mysql.sock');
	if ($conn->connect_error) die($conn->connect_error);

	/* Handle Form Fields*/
	$username = filter_input(INPUT_POST, 'username');
	$password = filter_input(INPUT_POST, 'password');

	/*$query = "INSERT INTO `Users` (`John`) VALUES ('Joseph')";*/

	$query = "INSERT INTO Work (WorkID, WorkUser, WorkPass, WorkDate) VALUES ('default', '$username', '$password', CURDATE())";
	$result = $conn->query($query);
	$query = "select * from Work";
	$result = $conn->query($query);
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	echo "The Username and Password has been added";
	echo ("<br>");
	echo "There are now " . $rows . " rows in the Work database table.";
 ?>
