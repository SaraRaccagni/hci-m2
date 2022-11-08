<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Login</title>
    
     <!-- Style Sheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="css/geral.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myScript.js"></script><!--script Javascript scritto da me-->

</head>


<body>

<!-- <div id="intro">

    <div id="logo">
        <img src="img/logo.png" id="logo_img"  width="100" height="100"><br>
    </div>

    <div id="login">

        <form action="index.html" method="post" id="form">
            <label for="username">Username</label>
            <input id="username" type="text" name="username"><br>

            <label for="password">Password</label>
            <input id="password" type="password" name="password"><br>

            <input id="button" type="submit" value="Login">

        </form>

    </div>

</div> -->

<div class="container text-center">

    <div class="row">
        <div class="col-md-12">
            <img src="img/logo.png" id="logo_img" width="150" height="200" style="margin-top: 4em;"\>
        </div>
    </div>

    <div class="row" style="margin-top: 4em;">
        <div class="col-md-6 col-md-offset-3">
            <div>
                
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#login-form" data-toggle="tab">Login</a></li>
                    <li><a href="#register-form" data-toggle="tab">Register</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="login-form">
                        <form id="login-form" name="login-form" action="checkAuth.php" method="post" style="margin-top: 2em;">
                            <div class="form-group">
                                <!-- <label for="username">Username</label> -->
                                <input type="text" id="userNameLog" name="userNameLog" class="form-control" placeholder="Username">
                                <span class="invalid-input" id="invalid-userNameLog"></span>
                            </div>
                            <div class="form-group">
                                <!-- <label for="password">Password</label> -->
                                <input type="password" id="passwordLog" name="passwordLog" class="form-control" placeholder="Password">
                                <span class="invalid-input" id="invalid-passwordLog"></span>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" class="form-control btn btn-primary" value="Login" onclick="event.preventDefault(); checkUserLog()">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">

                                <div class="text-center">
                                    <a href="#" class="forgot-password">Forgot Password?</a>
                                </div>

                            </div> -->
                        </form>
                    </div>

                    <div class="tab-pane" id="register-form">
                        <form enctype="multipart/form-data" id="register-form" name="register-form" action="register.php" method="post" style="margin-top: 2em;">
                            
                             <div class="form-group">
                                <input type="text" id="userNameReg" name="userNameReg" class="form-control" placeholder="Username" />
                                <span class="invalid-input" id="invalid-userName"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" id="emailReg" name="emailReg" class="form-control" placeholder="Email" />
                                <span class="invalid-input" id="invalid-email"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" id="passwordReg" name="passwordReg" class="form-control" placeholder="Password" />
                                <span class="invalid-input" id="invalid-password"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Confirm Password" />
                                <span class="invalid-input" id="invalid-confirm"></span>
                            </div>
                            <!-- <div class="form-group" >
                            
                                <input class="mt-2 form-control" type="file" id="avatar" name="avatar" accept=".jpg, .png" placeholder="Caricare l'avatar dell'utente"/>
                                
                            </div> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" class="form-control btn btn-primary" value="Register Now" onclick="event.preventDefault(); checkUserReg()"/>
                                        <!--invoca la funzione creata in myScript.js. Per disattivare l'azione di defaut "submit"(=fa partire la form) utilizzo event.preventDefault()-->

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>