<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Itineraries</title>
    
     <!-- Style Sheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
   

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myScript.js"></script><!--script Javascript scritto da me-->
    <script type="text/javascript" src="js/ajax.js"></script><!--script Javascript scritto da me per l'autocompletamento-->

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
                            <h4>Upcoming itineraries</h4>
                        </div>
                    </div>
        
                </div>
            </nav>

            <div class="container">
                <p>
                    <h3>Your next itineraries:</h3><br>
                </p>
                <?php
                $string = file_get_contents('itineraries.txt');
                $itineraries_json = json_decode($string);
                $itineraries_array = $itineraries_json->itineraries;
                $pins_id=array();

                session_start();
                foreach($itineraries_array as $itinerary){
                    if($_GET["id"] == $itinerary->id){
                        echo '<h4><b>';
                        echo $itinerary->city.'&emsp;&emsp;&emsp;&emsp;&emsp;'.$itinerary->date;
                        echo '</h4><br>';
                        echo '<div class="row"><div class="col-xs-10 col-off-xs-2"><h4>';
                        echo 'Time&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$itinerary->hour.':'.$itinerary->minutes;
                        echo '</h4></div></div>';
                        echo '<div class="row"><div class="col-xs-10 col-off-xs-2"><h4>';
                        echo 'Time Frame&emsp;&emsp;&emsp;&emsp;'.$itinerary->frameHour.'h '.$itinerary->frameMinutes;
                        echo '</h4></div></div>';
                        echo '<div class="row"><div class="col-xs-10 col-off-xs-2"><h4>';
                        echo 'Space Range&emsp;&emsp;&emsp;'.$itinerary->km.'km '.$itinerary->meters;
                        echo '</h4></div></div>';
                        echo '<div class="row"><div class="col-xs-10 col-off-xs-2"><h4>';
                        echo 'Filters&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;'.$itinerary->filters[0].', '.$itinerary->filters[1];
                        echo '</h4></div></div>';
                        echo '<div class="row"><div class="col-xs-10 col-off-xs-2"><h4>';
                        echo 'It will be '.$itinerary->compSettings.'!';
                        echo '</h4></div></div>';
                        foreach($itinerary->pins as $pin_id){
                            array_push($pins_id, $pin_id);
                        }
                        
                    }
                }
                
                ?>
            </div>

            

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

                foreach($pins_id as $pin_id){
                    foreach ($all_pins_array as $pin) {
                    if( $pin_id == $pin->id ){
                        array_push($features, $pin);
                        }
                    }
                }
                
                $pins_itinerary_array=array('type' => "FeatureCollection", 
                                        'features' => $features);
                                        
                $encodedString = json_encode($pins_itinerary_array) . PHP_EOL;


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

