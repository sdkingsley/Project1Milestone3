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
          <p name="time" style="padding-left:24px;"><small class="text-muted">7 results for search "Gluten Free Dinner"</small></p>
        </nav>
<?php

if( !isset($_GET['r_id']) ) { echo 'No parameter recieved!'; return; }

$r_id = $_GET['r_id'];
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
$sql = "SELECT * FROM Recipe WHERE R_ID = " . $r_id;
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
              <p class="card-text" name="descr">is porttitor convallis neque, vel consequat augue rhoncus id. Cras sed dui est. Cras ut pharetra elit, vitae semper nulla. Nam luctus scelerisque nisl non ullamcorper. Pellentesque rutrum sit amet magna in feugiat. Sed cursus leo vitae dolor commodo, non cursus ligula finibus. Sed vitae nulla nisl.</p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item" name="calories"><small class="text-muted"><label>Calories:</label>xxx cal</small></li>
                <li class="list-group-item" name="fat"><small class="text-muted"><label>Fat:</label>xxx g</small></li>
                <li class="list-group-item" name="protien"><small class="text-muted"><label>Protien:</label>xxx g</small></li>
              </ul>
              <a href="#" class="btn btn-primary">View Recipe</a>
            </div>
          </div>
        </div>'
	}
}
?>

      </div>
  </body>
</html>
