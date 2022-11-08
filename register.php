<?php

//Users saved in users.txt
$string = file_get_contents('users.txt');
$users_json = json_decode($string);
$users_array = $users_json->users;

//Nes user's credential
$username_reg = $_POST['userNameReg'];
$email_reg = $_POST['emailReg'];
$password_reg = $_POST['passwordReg'];

foreach ($users_array as $user) {
    $user_username = $user->properties->username;
    $user_email = $user->properties->email;

    if( $username_reg == $user_username){
        // header("Location:login.php?usernameExists=" . urlencode('Username already exists'));
        // exit();
        echo "<script type=\"text/javascript\">
            alert('Username already exists');
            location=\"login.php\";
            </script>";
        exit();
    }
    if($email_reg == $user_email){
        // header("Location:login.php?emailExists=" . urlencode('Email already exists'));
        // exit();
        echo "<script type=\"text/javascript\">
            alert('Email already exists');
            location=\"login.php\";
            </script>";
        exit();
    }
}

$new_user = array(
    'type' => 'User',
    'properties' => array(
        'username' => $username_reg,
        'email' => $email_reg,
        'password' => md5($password_reg),
    ));
array_push($users_json->users, $new_user);

//array back to json string
$encodedString = json_encode($users_json) . PHP_EOL;

//save text file
file_put_contents('./users.txt', $encodedString);
// header("Location:login.php?SuccessReg=" . urlencode('User successfully saved'));
echo "<script type=\"text/javascript\">
            alert('User successfully saved');
            location=\"login.php\";
            </script>";


?>