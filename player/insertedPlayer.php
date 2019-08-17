<?php
include('../config.inc.php');
$clientPlayer = new SoapClient(DIRECCION_BASE_PLAYER);
$clientCountry = new SoapClient(DIRECCION_BASE_COUNTRY);
$clientClub = new SoapClient(DIRECCION_BASE_CLUB);

/** addPlayer **/    
$infoPlayer = array(
    'ci' => $_POST['inputCI'],
    'name'  => $_POST['inputName'],
    'gender' => $_POST['selectGender'],
    'position' => $_POST['inputPosition'],
    'aditionalData' => $_POST['inputAditionalData'],
    'countryId' => $_POST['selectCountry'],
    'clubId' => $_POST['selectClub']
);

$dataPlayer = $clientPlayer->addPlayer($infoPlayer);
//var_dump($data);

/** getCountryById **/
$dataCountry = $clientCountry->getCountryById(array('countryId' => $dataPlayer->playerInfo->countryId));

/** getClubById **/
$dataClub = $clientClub->getClubById(array('clubId' => $dataPlayer->playerInfo->clubId));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">TAREA SOAP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../menu.php">Home <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entities</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="../club/club.php">Club</a>
          <a class="dropdown-item" href="../player/player.php">Player</a>
          <a class="dropdown-item" href="country.php">Country</a>        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../logout.php" method="post">      
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
<h1>Inserted Player</h1>
<p><?php echo $dataPlayer->serviceStatusPlayer->message; ?></p>
<h1>Player</h1>
    <form action="#" method="post">
    <div class="form-group">
    <h4>CI</h4>    
    <p><?php echo $dataPlayer->playerInfo->ci; ?></p>
  </div>
  <div class="form-group">
  <h4>Name</h4>
  <p><?php echo $dataPlayer->playerInfo->name; ?></p>
  </div>
  <div class="form-group">
    <h4>Gender</h4>    
    <p><?php echo $dataPlayer->playerInfo->gender; ?></p>
  </div>
  <div class="form-group">
    <h4>Position</h4>    
    <p><?php echo $dataPlayer->playerInfo->position; ?></p>
  </div>
  <div class="form-group">
    <h4>Aditional Data</h4>    
    <p><?php echo $dataPlayer->playerInfo->aditionalData; ?></p>
  </div>
  <div class="form-group">
    <h4>Country</h4>    
    <p><?php echo $dataCountry->countryInfo->name; ?></p>
  </div>
  <div class="form-group">
    <h4>Club</h4>    
    <p><?php echo $dataClub->clubInfo->name; ?></p>
  </div>

  </form>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script><script src="../js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>