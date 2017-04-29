<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Results</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      <link href="css/results-custom.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

      <div class="container">

        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                <p><img  src="img/back.svg" style="width: 16px; margin-right:4px;"><small class="text-muted">Back to Search</small></p>
              </a>
            </div>
          </div>
<?php

$keywords = $_POST['kws'];
$limits = json_decode($_POST(['lim']), TRUE);
$type = $_POST['type'];
$time = $_POST['time'];

echo '<p name="time" style="padding-left:24px;"><small class="text-muted">7 results for search "' . $keywords . '"</small></p></nav>';

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

$cond = '';

for($i=0; $i<count($limits); $i++) {
if($i != 0)
	$cond .= 'AND ';
$cond .= $limits[$i] . '= 1 ';
}

$sql = '';

if($cond)
	$sql = "SELECT * FROM (SELECT * FROM (SELECT T2.R_ID FROM (SELECT T1.R_ID, COUNT(*) AS total FROM (SELECT Ingredient.*,R_I_jtable.R_ID FROM (Ingredient JOIN R_I_jtable ON Ingredient.I_ID = R_I_jtable.I_ID)) AS T1 WHERE $cond GROUP BY T1.R_ID) AS T2, (SELECT R_ID, count(*) AS total FROM R_I_jtable GROUP BY R_ID) AS T3 WHERE T2.total=T3.total AND T2.R_ID = T3.R_ID) AS T4 NATURAL JOIN Recipe) AS T5 ORDER BY levenshtein_ratio(T5.Name, '$keywords') DESC"; 
else 
	$sql = "SELECT * FROM Recipe ORDER BY levenshtein_ratio(T5.Name, '$keywords') DESC";


if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_row($result);
        while ($row = mysqli_fetch_row($result)) {
	if(!strcmp($row[3],'NULL'))
		$row[3] = 'http://images.meredith.com/recipecom/images/home/recipeBG2740x920.jpg.pagespeed.ce.xBgItY8Iod.jpg';
        echo '<!-- GENERATE THIS CARD FOR EACH RESULT -->
        <div class="col-sm-6">
          <div class="card">
            <div class="crop">
              <img class="card-img-top" src="' . $row[3] . '" style="width: 100%;"alt="recipe picture" name="img_url">
            </div>
            <div class="card-block">
              <h4 class="card-title" name="name">' . $row[1] . '</h4>
              <p class="card-text" name="time"><small class="text-muted">' . $row[6] . '</small></p>
              <p class="card-text" name="descr">' . $row[2] . '</p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item" name="calories"><small class="text-muted"><label>Calories:</label>' . $row[12] . '</small></li>
                <li class="list-group-item" name="fat"><small class="text-muted"><label>Fat:</label>' . $row[13] . ' g</small></li>
                <li class="list-group-item" name="protein"><small class="text-muted"><label>Protein:</label>' . $row[19] . '</small></li>
              </ul>
              <a href="#" class="btn btn-primary">View Recipe</a>
            </div>
          </div>
        </div>';
	}
}
?>

      </div>
  </body>
</html>
