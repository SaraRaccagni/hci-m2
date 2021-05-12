

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balada Tipográfica</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/geral.css">

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



<script>
    function initMap(){
        var location = {lat: 40.203316, lng:-8.410257};
        var map= new google.maps.Map(document.getElementById("map"),{
            zoom: 15,
            center: location
        });
        var marker= new google.maps.Marker({
            position: location,
            map:map
        });
    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAetyhucP3_NGC1cSmc-exFYtpvuym_Od8&map_ids=8c9ae4d3da1f0e1&callback=initMap">

</script>
<script src="comp_tipo.js"></script>
<script>
    var novaspalavras=<?php echo $fileContentsnovo ?>;

    compPalavras(novaspalavras);
</script>

</body>
</html>

