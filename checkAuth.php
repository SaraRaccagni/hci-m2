<?php 
//start a session
session_start();

//Users saved in users.txt
$string = file_get_contents('users.txt');
$users_json = json_decode($string);
// var_dump($users_json);
// echo "<br>"."<br>";
$users_array = $users_json->users;

//User's credential
$username_log = $_POST['userNameLog'];
$password_log = $_POST['passwordLog'];

foreach ($users_array as $user) {
    $user_username = $user->properties->username;
    $user_password = $user->properties->password;

    if( $username_log == $user_username && md5($password_log) == $user_password){//user exists
        $_SESSION['logged']=true;
        $_SESSION['loggedName']= $username_log;
        header('Location:mapa_index.php');
        exit();
    }else{//user doesn't exist
        // header("Location:login.php?notValid=" . urlencode('Username or password not valid'));
        echo "<script type=\"text/javascript\">
            alert('Username or password not valid');
            location=\"login.php\";
            </script>";
    }
    
}

?>