<?php

$side     = $_POST["side"];
$symbol   = $_POST["symbol"];
$orderQty = $_POST["orderQty"];
$limit    = $_POST["limit"];
$stop     = $_POST["stop"];
$user_key = "3392b37de2eae8db78ce0ed31135acf3";

$values = $stop && $limit ?
  "user_key=" . $user_key . "&Symbol=" . $symbol . "&OrderQty=" . $orderQty . "&Side=" . $side . "&type=ModifiableStopLoss&Stop=" . $stop . "&Limit=" . $limit :
  "user_key=" . $user_key . "&Symbol=" . $symbol . "&OrderQty=" . $orderQty . "&Side=" . $side;

$curl = curl_init("https://api-2445581154346.apicast.io/positions");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $values); //On envoie les valeurs
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Money Push API</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Site web pour utiliser une API REST" />
  <meta name="keywords" content="TP API" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content="" />
  <meta property="og:image" content="" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
  <nav class="fh5co-nav" role="navigation">
    <div class="container">
      <div class="row">
        <div class="left-menu text-right menu-1">
          <ul>
            <li><a href="add.php">Ajouter</a></li>
            <li><a href="get.php">Récupérer</a></li>
          </ul>
        </div>
        <div class="logo text-center">
          <div id="fh5co-logo"><a href="index.php">Money Push</a></div>
        </div>
        <div class="right-menu text-left menu-1">
          <ul>
            <li><a href="put.php">Modifier</a></li>
            <li><a href="delete.php">Supprimer</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <header id="fh5co-header" class="fh5co-cover" role="banner" style="height: 180px;">
    <div class="overlay"></div>
  </header>

  <div id="fh5co-project">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <?php

          //var_dump($result);

          if (!$result) {
            echo "<h2 style='color:darkred'>Service non disponible<i class='icon icon-cross'></i></h2>";
          }
          else {
            $error = false;
            if (array_key_exists("error", $result)) {
              $error = true;
              echo "<h2 style='color:darkred'>Erreur : ". $result["error"]. "<i class='icon icon-cross'></i></h2>";
            }

            if (!$error) {
              if (!$stop && !$limit && array_key_exists("OrderStatus", $result)) {
                if ($result["OrderStatus"] == "Executed") {
                  echo "<h2 style='color:green'>Ordre ajouté <i class='icon icon-check'></i></h2>";
                }
                else {
                  echo "<h2 style='color:darkred'>Service non disponible<i class='icon icon-cross'></i></h2>";
                }
              }
              else {
                if ($result["Order"]["OrderStatus"] == "Executed") {
                  echo "<h2 style='color:green'>Ordre ajouté <i class='icon icon-check'></i></h2>";
                }
                else {
                  echo "<h2 style='color:darkred'>Service non disponible<i class='icon icon-cross'></i></h2>";
                }
              }
            }
          }
          ?>
        </div>
      </div>
      <div class="row">

      </div>
    </div>
  </div>

</div>

<div class="gototop js-top">
  <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>
