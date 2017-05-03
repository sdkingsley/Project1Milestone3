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
$data = $_POST['ing'];
$id = $_POST['R_ID'];

$cal = 0;
$fat = 0;
$chol = 0;
$sod = 0;
$carb = 0;
$fib = 0;
$sug = 0;
$prot = 0;

$vegan = 1;
$kosher = 1;
$dfree = 1;
$gfree = 1;

for($i = 0; $i< count($data); $i++) {
	//first try exact match search to take advantage of indexing and autocomplete
	$result = $conn->query("SELECT * FROM Ingredient WHERE Name = '" . $data[$i][0] . "'");

	/* In production, we would have a very large database of ingredients. This edit-distance based lookup is a backup 
	should the above sql return an empty set. It selects the closest ingredient name to what was entered. Because 
	we do not currently have that database, though, this is not going to work very well unless the ingredient is in 
	our current db, but the PRINCIPLE is sound*/
	if(!$result->num_rows) {
		$result = $conn->query("SELECT * FROM Ingredient ORDER BY levenshtein_ratio(name, '" . $data[$i][0] . "') DESC LIMIT 1");
	}

	$row = $result->fetch_array(MYSQLI_ASSOC);	
	
	//get conversion factor if applicable, so that nutritional information scales to ingredient amounts
	$cf = $conn->query("SELECT cfactor FROM UnitConversion WHERE meas1 = '" . $data[$i][2] . "' AND meas2 = '" . $row['uom'] . "'");	
	if(!$cf->num_rows)
		$cf = $data[$i][1];
	else
		$cf = $cf->fetch_array(MYSQLI_NUM)[0] * $data[$i][1];
	
	$i_id = $row['I_ID'];		
	$cal += $row['calories']*$cf;
	$fat += $row['fat']*$cf;
	$chol += $row['cholesterol']*$cf;
	$sod += $row['sodium']*$cf;
	$carb += $row['carbs']*$cf;
	$fib += $row['fiber']*$cf;
	$sug += $row['sugar']*$cf;
	$prot += $row['protein']*$cf;
	if(!$row['vegan'])
		$vegan = 0;
	if(!$row['kosher'])
		$kosher = 0;
	if(!$row['dairy_free'])
		$dfree = 0;
	if(!$row['gluten_free'])
		$gfree = 0;
	$res = $conn-> query("INSERT INTO R_I_jtable VALUES ($id, $i_id, " . $data[$i][1] . ", '" . $data[$i][2]. "')");	
}	

$sql = "UPDATE Recipe SET calories = $cal, fat = $fat, cholesterol = $chol, sodium = $sod, carbs = $carb, fiber = $fib, sugar = $sug, protein = $prot, vegan = $vegan, kosher = $kosher, dairy_free = $dfree, gluten_free = $gfree WHERE R_ID = $id";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 

mysqli_close($conn);
?>
