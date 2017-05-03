<?php
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

$R_ID = $_POST['R_ID'];

$conn->query("DELETE FROM Recipe WHERE R_ID=" . $R_ID);
$conn->query("DELETE FROM PrepVideo WHERE R_ID=" . $R_ID);
$conn->query("DELETE FROM R_I_jtable WHERE R_ID=" . $R_ID);

mysqli_close($conn);
?>
