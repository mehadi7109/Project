<?php

    session_start();
    require_once '../db.php';

    print_r($_POST);

    $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL );
    $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING );
    $user_mobile = $_POST['user_mobile'];

    

    $update_query = "UPDATE users SET user_name='$user_name', user_email='$user_email' WHERE user_mobile='$user_mobile'";

    mysqli_query($db_connect,$update_query);
    header('location: profile.php');

?>