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
              <a class="navbar-brand" href="#">
                <p><img  src="img/back.svg" style="width: 16px; margin-right:4px;"><small class="text-muted">Back to Results</small></p>
              </a>
            </div>
          </div>
        </nav>

        <!-- GENERATE THIS CARD FOR EACH RESULT -->
        <div class="col-sm-12">
          <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1453831362806-3d5577f014a4?ixlib=rb-0.3.5&q=100&fm=jpg&crop=entropy&cs=tinysrgb&s=355e84e23d5a08b98698e3d750682dbf" style="width: 100%;"alt="recipe picture" name="img_url">
            <div class="card-block">
              <h4 class="card-title" name="name">Recipe Name</h4>
              <p class="card-text" name="time"><small class="text-muted">30 mins</small></p>
              <p class="card-text" name="meal-type"><small class="text-muted">Dinner</small></p>
              <p class="card-text" name="descr">(Description) Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porttitor convallis neque, vel consequat augue rhoncus id. Cras sed dui est. Cras ut pharetra elit, vitae semper nulla. Nam luctus scelerisque nisl non ullamcorper. Pellentesque rutrum sit amet magna in feugiat. Sed cursus leo vitae dolor commodo, non cursus ligula finibus. Sed vitae nulla nisl.</p>
              <pre class="card-text" name="steps">
                <span class="pre-style">
                1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                2. Nullam cursus nisi ut nunc porttitor ullamcorper.

                3. Quisque pellentesque enim ut nisi sollicitudin pretium ut in enim.

                4. Integer tristique mi ac urna ultricies, vel imperdiet tellus laoreet.

                5. Praesent luctus justo vel cursus consequat. Cras in quam eget diam feugiat gravida ut quis quam.

                6. Vestibulum auctor diam at elementum semper.

                7. Donec ut lorem eget massa faucibus scelerisque id vel urna.
                
                8. Etiam ut tellus sed neque rutrum lobortis.
                
                9. Sed non sapien non tellus auctor posuere eu ut tellus.

                10. Nam finibus odio at nisi consequat, at volutpat quam facilisis.
                </span>
              </pre>

              <ul class="list-group list-group-flush">
                <li class="list-group-item" name="servings"><small class="text-muted"><label>Servings:</label>xxx cal</small></li>
                <li class="list-group-item" name="calories"><small class="text-muted"><label>Calories:</label>xxx cal</small></li>
                <li class="list-group-item" name="fat"><small class="text-muted"><label>Fat:</label>xxx g</small></li>
                <li class="list-group-item" name="protien"><small class="text-muted"><label>Protien:</label>xxx g</small></li>
                <li class="list-group-item" name="sodium"><small class="text-muted"><label>Sodium:</label>xxx g</small></li>
                <li class="list-group-item" name="cholesterol"><small class="text-muted"><label>Cholesterol:</label>xxx g</small></li>
                <li class="list-group-item" name="fiber"><small class="text-muted"><label>Fiber:</label>xxx g</small></li>
                <li class="list-group-item" name="sugar"><small class="text-muted"><label>Sugar:</label>xxx g</small></li>
                <li class="list-group-item" name="carbs"><small class="text-muted"><label>Carbohydrates:</label>xxx g</small></li>
              </ul>

	       
            </div>
          </div>
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2x0ie9aWIHU"></iframe>
          </div>
        </div>
        <!-- GENERATE IT HERE -->


      </div>
  </body>
</html>
