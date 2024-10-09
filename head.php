<?php

$dsn = "mysql:host=localhost;dbname=db_cochera;charset=utf8";
$usuario = "root";
$contrasenia = "";
$opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$pdo = new PDO($dsn, $usuario, $contrasenia, $opciones);

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- <link href="assets/font-awesome5/css/all.min.css" media="screen" rel="stylesheet" type="text/css"> -->
<!--<link rel="stylesheet" type="text/css" href="assets/css/kickstart.css" media="all" />  -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" /> -->
<link rel="stylesheet" type="text/css" href="assets/css/main.css" media="all" />
<link rel="stylesheet" type="text/css" href="assets/css/modalFranja.css" media="all" />
<!-- <link rel="stylesheet" type="text/css" href="assets/css/floating-button.css" media="all" /> -->


<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
<!--<script type="text/javascript" src="assets/js/kickstart.js"></script> -->
<!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
<!--<script type="text/javascript" src="assets/js/main.js"></script>-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>