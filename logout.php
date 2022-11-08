<?php
        //start and destroy a session
        session_start();
        session_destroy();
        //back to the login page
        header('Location:login.php');
?>