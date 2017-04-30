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

$data = $_POST['datat'];
for($i = 0; i< count($data); $i++)
echo $data[$i];

/*$sql = '';

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Recipe inserted successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
*/
mysqli_close($conn);
?>
