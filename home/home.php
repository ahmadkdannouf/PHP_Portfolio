<?php
require_once('../connection.php');
require('../navbar/navbar.html');
$sqlQuery = "SELECT * FROM projects";
$stmt = $conn->prepare($sqlQuery);
$stmt->execute();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

<body>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h2 class="margin">Who Am I?</h2>
  <img src="bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>I'm a Software Engineer</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h1 class="margin">My Projects</h1><br>
  <div class="row">
  <?php foreach ($stmt as $project): ?>  
    <div class="col-lg-4">
         
      <div class="card">
        <img src=<?=$project['image']?> alt="Generic placeholder image" style="width:100%">
        <h1><?=$project['title']?></h1>
        <p><?=$project['description']?></p> 
        <p><a class="btn btn-primary" href=<?=$project['link']?> role="button">View Website/Code</a></p>
      </div>
  
    </div>
    <?php endforeach; ?>
  </div>
</div>

</body>

</html>