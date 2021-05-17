<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balada Tipográfica</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/geral.css">

    <!-- Links necessários para o mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
   Make sure you put this AFTER Leaflet's CSS
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script> -->

</head>
<?php
$fileContentsnovo = file_get_contents('words.txt');
?>
<body>

<div id="intro">
    <div id="map"></div>

    <div id="welcome">
<!--        <h1>Balada tipográfica</h1>-->

        <div id="divisao">

        </div>
    </div>
</div>

<div id="mapid"></div>

<script src="comp_tipo.js"></script>

<script>
    var novaspalavras=<?php echo $fileContentsnovo ?>;

    compPalavras(novaspalavras);
</script>

<script src="mapa.js"></script>
</body>
</html>

