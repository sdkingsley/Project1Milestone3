<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title name="name">Title of Recipe</title>

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
              <a class="navbar-brand" href="#" id="link">
                <p><img  src="img/back.svg" style="width: 16px; margin-right:4px;"><small class="text-muted">Back to Results</small></p>
              </a>
            </div>
          </div>
        </nav>
	<script>
	$("#link").click(function() {
		event.preventDefault();
		window.history.back();
    	});
	</script>
<?php 

if( !isset($_GET['R_ID']) ) { echo '<h1> No parameter recieved! </h1>'; return; }
              
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

$id = $_GET['R_ID'];
$sql = "SELECT * FROM Recipe WHERE R_ID = $id";


$vid = $conn->query("SELECT vid_url FROM PrepVideo WHERE R_ID = $id");
if(!$vid->num_rows)
	$vid = 0;
else	
	$vid = $vid->fetch_array(MYSQLI_NUM)[0];

$ing = mysqli_query($conn, "SELECT RJ.ingred_amt,RJ.ingred_meas,I.* FROM Ingredient AS I, R_I_jtable AS RJ WHERE RJ.R_ID = $id AND RJ.I_ID = I.I_ID");

if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
        echo '<div class="col-sm-12">
          <div class="card">
            <img class="card-img-top" src="' . $row[3] . '" style="width: 100%;" alt="recipe picture" name="img_url">
            <div class="card-block">
              <h4 class="card-title" name="name">' . $row[1] . '</h4>
              <p class="card-text" name="time" style = "margin-bottom: 0px;"><small class="text-muted">' . $row[6] . '</small></p>
              <p class="card-text" name="meal-type"><small class="text-muted">' . $row[7] . '</small></p>
              <p class="card-text" name="descr">' . $row[2] . '</p><h5>Ingredients</h5><p><ul>';
        while ($irow = mysqli_fetch_row($ing))
              echo '<li><small class="text-muted">' . $irow[3] . ' - ' . $irow[0] . ' ' . $irow[1] . ' </small></li>';      
	echo '</ul></p><h5>Steps</h5>
              <p class="card-text" name="steps">
                <span class="pre-style">' . $row[4] . '</span>
              </p>
	      <pre>
	      </pre>
              <ul class="list-group list-group-flush">
                <li class="list-group-item" name="servings"><small class="text-muted"><label>Servings:</label>' . $row[5] . '</small></li>
                <li class="list-group-item" name="calories"><small class="text-muted"><label>Calories:</label>' . $row[12] . '</small></li>
                <li class="list-group-item" name="fat"><small class="text-muted"><label>Fat:</label>' . $row[13] . ' g</small></li>
                <li class="list-group-item" name="protien"><small class="text-muted"><label>Protien:</label>' . $row[19] . ' g</small></li>
                <li class="list-group-item" name="sodium"><small class="text-muted"><label>Sodium:</label>' . $row[15] . ' mg</small></li>
                <li class="list-group-item" name="cholesterol"><small class="text-muted"><label>Cholesterol:</label>' . $row[14] . ' g</small></li>
                <li class="list-group-item" name="fiber"><small class="text-muted"><label>Fiber:</label>' . $row[17] . ' g</small></li>
                <li class="list-group-item" name="sugar"><small class="text-muted"><label>Sugar:</label>' . $row[18] . ' g</small></li>
                <li class="list-group-item" name="carbs"><small class="text-muted"><label>Carbohydrates:</label>' . $row[16] . ' g</small></li>
              </ul>
            </div>
          </div>';
	  if($vid)
          	echo '<div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="' . $vid . '"></iframe>
          	</div></div>';
	}
}
?>

      </div>
  </body>
</html>
