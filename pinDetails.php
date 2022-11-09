<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Pin</title>
    
     <!-- Style Sheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
   

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myScript.js"></script><!--script Javascript scritto da me-->
    <script type="text/javascript" src="js/ajax.js"></script><!--script Javascript scritto da me per l'autocompletamento-->

</head>

<body>

<?php
$string = file_get_contents('pins.txt');
$pins_json = json_decode($string);
$pins_array = $pins_json->features;

$pin_detailed=null;

foreach($pins_array as $pin){
    if($pin->id == $_GET["id"]){
        $pin_detailed=$pin;
    }
}
?>

            <nav class="navbar-default-top navbar-fixed-top">
        
                <div class="container text-center">
        
                    <div class="header-logo">
                        <img src="img/logo.png" width="41" height="60"\>
                    </div>
        
                    <div class="row">
                        <div class="container text-center">
                            <h4><?php echo $pin_detailed->properties->name;?></h4>
                        </div>
                    </div>
        
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-xs-2" >
                        <span class="glyphicon glyphicon-send " style="font-size: 25px; margin-top: 10px;"></span>
                    </div>
                    <div class="col-xs-10">
                        <h5>
                            R. Vandelli 2, <br>
                            3004-547
                            <?php
                            echo $pin_detailed->properties->city;
                            ?>
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2" >
                        <span class="glyphicon glyphicon-star " style="font-size: 25px; margin-top: 10px;"></span>
                    </div>
                    <div class="col-xs-10">
                        <h5>
                            By <?php echo $pin_detailed->properties->likes ?> people
                        </h5><br>
                    </div>
                </div>

                <div class="row">
                <div class="col-xs-10 col-off-xs-1" >
                    <h5>
                        <?php echo $pin_detailed->properties->description?>
                    </h5><br>
                </div>
                </div>

                <div class="row">
                <div class="col-xs-10 col-off-xs-1" >
                <img src="<?php echo $pin_detailed->properties->photos[0] ?>" class="img-fluid img-responsive img-thumbnail">';
                </div>
                </div>
</div>

            
        
        
        
            <nav class="navbar-default-bottom navbar-fixed-bottom">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="feed.php"><span class="glyphicon glyphicon-home glyphicon-nav" style="color:black"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="mapa_index.php"><span class="glyphicon glyphicon-map-marker glyphicon-nav" style="color:black"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="itinerary.html"><span class="glyphicon glyphicon-transfer glyphicon-nav" style="color:blue"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="profile.php"><span class="glyphicon glyphicon-user glyphicon-nav" style="color:black"></span></a>
                        </div>
                </div>
            </nav>
        
   
    


                    

    

</body>

</html>

