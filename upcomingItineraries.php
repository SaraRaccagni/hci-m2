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

                session_start();
                foreach($itineraries_array as $itinerary){
                    if($_SESSION['loggedName'] == $itinerary->owner){
                        echo '<p>';
                        echo '<a href="itineraryDetails.php?id='.$itinerary->id.'" class="btn btn-primary btn-block btn-lg">'.$itinerary->city.'   '.$itinerary->date.'</a>';
                        echo '</p><br>';
                    }
                }
                
                
                ?>
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

