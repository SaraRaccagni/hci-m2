<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Pins</title>
    
     <!-- Style Sheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/saxxtext.min.css" />
   

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--useful to use a map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script src="saxxtext.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>



<body>
            <nav class="navbar-default-top navbar-fixed-top">
        
                <div class="container text-center">
        
                    <div class="header-logo">
                        <img src="img/logo.png" width="41" height="60"\>
                    </div>
        
                    <div class="row">
                        <div class="container text-center">
                            <h4>Feed</h4>
                        </div>
                    </div>
        
                </div>
            </nav>

            

            <div id="intro">

                <div id="mapid"></div>

                <div id="pal">
                    <div id="divisao"></div>
                </div>

            </div>
            

            <?php 
            //search only user's pins
                $string_all_pins = file_get_contents('pins.txt'); 
                $all_pins_json = json_decode($string_all_pins);
                $all_pins_array = $all_pins_json->features;

                $features=array();

                foreach ($all_pins_array as $pin) {
                    if( $_GET['username'] == $pin->owner ){
                        array_push($features, $pin);
                    }
                }
                $pins_user_array=array('type' => "FeatureCollection", 
                                        'features' => $features);
                                        
                $encodedString = json_encode($pins_user_array) . PHP_EOL;


            ?>
            

            <!--This two script works on all map functionalities: map, icons, words, zoom, click on a marker..-->
            <script src="showPins.js"></script>
            <script>
                var pins_string= <?php echo $encodedString ?>;
                var coimbra_string= <?php echo file_get_contents('coimbra.txt');//Coimbra Coordinates ?>;

                compPalavras(pins_string, coimbra_string);//This function is defined in "showPins.js"
            </script>

            
        
            <nav class="navbar-default-bottom navbar-fixed-bottom">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="feed.php"><span class="glyphicon glyphicon-home glyphicon-nav" style="color:blue"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="mapa_index.php"><span class="glyphicon glyphicon-map-marker glyphicon-nav" style="color:black"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="itinerary.html"><span class="glyphicon glyphicon-transfer glyphicon-nav" style="color:black"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="profile.php"><span class="glyphicon glyphicon-user glyphicon-nav" style="color:black"></span></a>
                        </div>
                </div>
            </nav>
        
   
    


                    

    

</body>

</html>

