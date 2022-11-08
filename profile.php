<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Profile</title>
    
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
                            <h4>Profile</h4> 
                        </div>
                    </div>
                </div>

                <div class="nav-menu">
                <div id="burger-wrap">
                    <a class="burger"><span></span></a>
                </div>
                    <div class="menu-list">
                        <ul>
                            <li><a href="settings.html">Settings</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <script src="menu.js"></script>

            </nav>

            <div class="container text-center">
                
                    
                    
                        

                        <?php
                        session_start();
                        //search information about the selected user
                        $username= $_SESSION['loggedName'];

                        //Users saved in user.txt
                        $string = file_get_contents('users.txt');
                        $users_json = json_decode($string);
                        $users_array = $users_json->users;

                        foreach ($users_array as $user) {
                            if( $username == $user->properties->username ){
                                echo '<div class="row">';
                                echo '<h4><b>'.$user->properties->username.'</b></h4><br>';
                                echo '</div>';

                                echo '<div class="row">';

                                echo '<div class="col-xs-6 ">';
                                echo '<div class="box-lavoro-evidenza">';
                                echo '<img src='.$user->properties->photo.' class="img-fluid img-responsive img-thumbnail">';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="col-xs-6">';
                                echo '<div class="row">';
                                echo '<h4><span class="glyphicon glyphicon-map-marker" style="color:black"></span>&nbsp;'.$user->properties->origin.'</h4>';
                                echo '</div>';
                                echo '<div class="row">';
                                echo '<h4>'.$user->properties->age.' years old</h4>';                                
                                echo '</div>';
                                echo '<div class="row">';
                                echo '<h4>27 pins added</h4>';//TO MODIFY
                                echo '</div>';
                                echo '<div class="row">';
                                echo '<h4>10 itineraries</h4>';//TO MODIFY
                                echo '</div>';
                                echo '</div>';

                                echo '</div>';

                                echo '<br><br><br><br><div class="row">';
                                echo '<div class="col-xs-6">';
                                echo '<a href="pins.php?username='.$username.'" class="btn btn-primary btn-lg">'.$username.'\'s<br> pins</a>';
                                echo '</div>';
                                echo '<div class="col-xs-6">';
                                echo '<a href="backlog.html?username='.$username.'" class="btn btn-primary btn-lg">'.$username.'\'s <br>backlogs</a>';
                                echo '</div>';
                                echo '</div>';
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
                            <a href="itinerary.html"><span class="glyphicon glyphicon-transfer glyphicon-nav" style="color:black"></span></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="profile.php"><span class="glyphicon glyphicon-user glyphicon-nav" style="color:blue"></span></a>
                        </div>
                    </div>
                </div>
            </nav>
        
   
    
            

                    

    

</body>

</html>

