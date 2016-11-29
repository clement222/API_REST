<?php

// Initialisation de notre requete CURL
$curl = curl_init('https://api-2445581154346.apicast.io/positions?user_key=4f6158ef97874d8d49ead880fc6fe756');
// CURL nous retourne le résultat au lieu de l'afficher
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execution de la requete CURL et on recupere le résultat
$orders = curl_exec($curl);
curl_close($curl);

// On souhait avoir le résultat sous forme d'un tableau
$orders = json_decode($orders, true);
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

  <style>
    body {
      background: #fafafa url(http://jackrugile.com/images/misc/noise-diagonal.png);
      color: #444;
      font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
      text-shadow: 0 1px 0 #fff;
    }

    strong {
      font-weight: bold;
    }

    em {
      font-style: italic;
    }

    table {
      background: #f5f5f5;
      border-collapse: separate;
      box-shadow: inset 0 1px 0 #fff;
      font-size: 12px;
      line-height: 24px;
      margin: 30px auto;
      text-align: left;
      width: 800px;
    }

    th {
      background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
      border-left: 1px solid #555;
      border-right: 1px solid #777;
      border-top: 1px solid #555;
      border-bottom: 1px solid #333;
      box-shadow: inset 0 1px 0 #999;
      color: #fff;
      font-weight: bold;
      padding: 10px 15px;
      position: relative;
      text-shadow: 0 1px 0 #000;
    }

    th:after {
      background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, .08));
      content: '';
      display: block;
      height: 25%;
      left: 0;
      margin: 1px 0 0 0;
      position: absolute;
      top: 25%;
      width: 100%;
    }

    th:first-child {
      border-left: 1px solid #777;
      box-shadow: inset 1px 1px 0 #999;
    }

    th:last-child {
      box-shadow: inset -1px 1px 0 #999;
    }

    td {
      border-right: 1px solid #fff;
      border-left: 1px solid #e8e8e8;
      border-top: 1px solid #fff;
      border-bottom: 1px solid #e8e8e8;
      padding: 10px 15px;
      position: relative;
      transition: all 300ms;
    }

    td:first-child {
      box-shadow: inset 1px 0 0 #fff;
    }

    td:last-child {
      border-right: 1px solid #e8e8e8;
      box-shadow: inset -1px 0 0 #fff;
    }

    tr {
      background: url(http://jackrugile.com/images/misc/noise-diagonal.png);
    }

    tr:nth-child(odd) td {
      background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);
    }

    tr:last-of-type td {
      box-shadow: inset 0 -1px 0 #fff;
    }

    tr:last-of-type td:first-child {
      box-shadow: inset 1px -1px 0 #fff;
    }

    tr:last-of-type td:last-child {
      box-shadow: inset -1px -1px 0 #fff;
    }

    tbody:hover td {
      color: transparent;
      text-shadow: 0 0 3px #aaa;
    }

    tbody:hover tr:hover td {
      color: #444;
      text-shadow: 0 1px 0 #fff;
    }
  </style>
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
            <li class="active"><a href="get.php">Récupérer</a></li>
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
          <h2>Les ordres</h2>
          <h3> <?php
            if ($orders) {
              echo "Total ".count($orders);
            }
            else {
              echo "<strong style='color: red'>Service non disponible</strong>";
            }
            ?>
          </h3>
        </div>
      </div>
      <div class="row">
        <table>
          <thead>
          <tr>
            <th style="text-align: center">Identifiant</th>
            <th style="text-align: center">Type</th>
            <th style="text-align: center">Quantité</th>
            <th style="text-align: center">Prix</th>
            <th style="text-align: center">Symbole</th>
          </tr>
          </thead>
          <tbody>
            <?php

            foreach ($orders as $_order) {
              echo "<tr>";
              echo "<td style='text-align: center;'><strong>".$_order["Order"]["OrderID"]."</strong></td>";
              echo "<td style='text-align: center;'><strong>".$_order["Order"]["Side"]."</strong></td>";
              echo "<td style='text-align: center;'><strong>".$_order["Order"]["OrderQty"]."</strong></td>";
              echo "<td style='text-align: center;'><strong>".$_order["Order"]["Price"]."</strong></td>";
              echo "<td style='text-align: center;'><strong>".$_order["Order"]["Symbol"]."</strong></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
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

