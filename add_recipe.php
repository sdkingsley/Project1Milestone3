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

$title = $conn->real_escape_string($_POST['title']);
$time = $_POST['time'];
$meal = $_POST['meal_type'];
$servings = $_POST['servings'];
$description = $conn->real_escape_string(htmlspecialchars($_POST['description']));
$steps = $conn->real_escape_string(htmlspecialchars($_POST['steps']));

$ing = $_POST['ingredient'];
$amt = $_POST['amt'];
$mes = $_POST['measure'];

$image = $_POST['image'];
if(!$image)
	$image = 'NULL';
$video = $_POST['video'];


$sql = "INSERT INTO Recipe (R_ID, name, descr, img_url, steps, servings, time, meal_type) values (NULL, '$title', '$description', '$image', '$steps', '$servings', '$time', '$meal');";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Recipe inserted successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
if($video){
$sql = "INSERT INTO PrepVideo values (" . $conn->insert_id . ", '$video');";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Prep Video inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
echo "Submission successful - redirecting"; 
header('Location: '. 'success.html');
mysqli_close($conn);
?>
