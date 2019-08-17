<?php
include('../config.inc.php');
$clientPlayer = new SoapClient(DIRECCION_BASE_PLAYER);
$clientCountry = new SoapClient(DIRECCION_BASE_COUNTRY);
$clientClub = new SoapClient(DIRECCION_BASE_CLUB);

/*
* Sacar Gender
*/
$gender = array('MALE' => "MALE", 'FEMALE' => 'FEMALE');

/** getPlayerById **/
$dataPlayer = $clientPlayer->getPlayerById(array('playerId' => $_GET['id']));

/** getAllCountrys **/
$dataCountry = $clientCountry->getAllCountrys();

/** getAllClubs **/
$dataClub = $clientClub->getAllClubs();

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
          <a class="dropdown-item" href="player.php">Player</a>
          <a class="dropdown-item" href="../country/country.php">Country</a>
          </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../logout.php" method="post">      
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
<h1>Update Player</h1>
    <form action="updatedPlayer.php" method="post">
  <div class="form-group">
    <label for="inputCI">C.I.</label>
    <input type="text" class="form-control" id="inputCI" name="inputCI" value="<?php echo $dataPlayer->playerInfo->ci; ?>">    
  </div>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $dataPlayer->playerInfo->name; ?>">
  </div>
  <div class="form-group">
    <label for="selectGender">Gender</label>
    <select class="form-control" id="selectGender" name="selectGender">
    <?php
        foreach ($gender as $keyGender => $valueGender) {
      ?>
      <option value="<?php echo $valueGender; ?>" <?php if ($dataPlayer->playerInfo->gender == $valueGender) { echo 'selected="selected"'; } ?>><?php echo $valueGender; ?></option>
    <?php
        }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="inputPosition">Position</label>
    <input type="text" class="form-control" id="inputPosition" name="inputPosition" value="<?php echo $dataPlayer->playerInfo->position; ?>">
  </div>
  <div class="form-group">
    <label for="inputAditionalData">Aditional Data</label>
    <input type="text" class="form-control" id="inputAditionalData" name="inputAditionalData" value="<?php echo $dataPlayer->playerInfo->aditionalData; ?>">
  </div>
  <div class="form-group">
    <label for="selectCountry">Country</label>
    <select class="form-control" id="selectCountry" name="selectCountry">
      <?php
        foreach ($dataCountry->countryInfo as $valueCountry) {
      ?>
      <option value="<?php echo $valueCountry->countryId; ?>" <?php if ($dataPlayer->playerInfo->countryId == $valueCountry->countryId) { echo 'selected="selected"'; } ?>><?php echo $valueCountry->name; ?></option>
      <?php
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="selectClub">Club</label>
    <select class="form-control" id="selectClub" name="selectClub">
      <?php
        foreach ($dataClub->clubInfo as $valueClub) {
      ?>
      <option value="<?php echo $valueClub->clubId; ?>" <?php if ($dataPlayer->playerInfo->clubId == $valueClub->clubId) { echo 'selected="selected"'; } ?>><?php echo $valueClub->name; ?></option>
      <?php
        }
      ?>
    </select>
  </div>
  <input type=hidden id="inputID" name="inputID" value="<?php echo $dataPlayer->playerInfo->playerId; ?>">
  <button type="submit" class="btn btn-primary">Save</button>
</form>    
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script><script src="../js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>