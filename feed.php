<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Feed</title>
    
     <!-- Style Sheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
   

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myScript.js"></script><!--script Javascript scritto da me-->
    <script type="text/javascript" src="js/ajax.js"></script><!--script Javascript scritto da me per l'autocompletamento-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

            
            <div class="container"> 
                <textarea name="latitude" id="latitude"></textarea>
                <textarea name="longitude" id="longitude"></textarea>

                <!--TO MODIFY-->
                <div class="container feed text-center">
                    <h4><a href="userFeed.php?username=Abracadabra">@Abracadabra</a> just commented a pin next to you</h4>
                    <h5>See more&ensp;<a href="mapa_index.php"><span class="glyphicon glyphicon-arrow-right" style="color:black"></span></a></h5>
                </div>

                <div class="container feed text-center">
                    <h4><a href="userFeed.php?username=Fresco">@Fresco</a> just went on a new itinerary near you and rated 10/10</h4>
                    <h5>See more&ensp;<a href="mapa_index.php"><span class="glyphicon glyphicon-arrow-right" style="color:black"></span></a>
                </div>

                <div class="container feed text-center">
                    <h4><a href="userFeed.php?username=Tatiana">@Tatiana</a> just added a pin next to you</h4>
                    <h5>See more&ensp;<a href="mapa_index.php"><span class="glyphicon glyphicon-arrow-right" style="color:black"></span></a>
                </div>
        
                </div>

                

            </div>

            
            <script>

                window.onload=function getLocation() {

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }
                function showPosition(position) {
                    var lat = position.coords.latitude ;
                    var long = position.coords.longitude;

                    document.getElementById("latitude").innerHTML = long;
                    document.getElementById("latitude").style.display = "none";


                    document.getElementById("longitude").innerHTML = lat;
                    document.getElementById("longitude").style.display = "none";
                }
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
                </div>
            </nav>
        
   
    


                    

    

</body>

</html>

