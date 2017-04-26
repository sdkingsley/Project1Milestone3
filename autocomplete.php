<?php

$aResult = "";

if( !isset($_POST['substr']) ) { echo 'No parameter recieved!'; return; }

error_reporting(-1);
ini_set('display_errors', 'On');

$user = "jazarwil";
$pass = "wUW9uBe5";
$servername = "localhost";
$dbname = "jazarwil";

// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT Name FROM Ingredient WHERE Name COLLATE LATIN1_GENERAL_CI LIKE '%" . $_POST['substr'] . "%'";
if ($result = mysqli_query($conn, $sql)) {
	$row = mysqli_fetch_row($result);
	if($row) {	
		$aResult .= $row[0];		
	}
	else
		return;
	while ($row = mysqli_fetch_row($result)) {
		$aResult .= '<>' . $row[0];		
	}
}
echo $aResult;
?>
