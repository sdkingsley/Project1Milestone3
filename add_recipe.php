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

//need parsed info
//need to put info in database


// Query:
$title = $_POST['title'];
$time = $_POST['time'];
$meal = $_POST['meal_type'];
$servings = $_POST['servings'];
$description = $_POST['description'];
$steps = $_POST['steps'];

$ing = $_POST['ingredient'];
$amt = $_POST['amt'];
$mes = $_POST['measurement_type'];

$image = $_POST['files_image[]'];
$video = $_POST['files_video[]'];

$sql = "INSERT INTO Recipe values (NULL, $title, $description, $image, $steps, $servings, $time, $meal);";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 

$sql = "INSERT INTO PrepVideo values (NULL, $video);";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 

mysqli_close($conn);
?>