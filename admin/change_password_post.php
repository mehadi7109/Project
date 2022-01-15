<?php
    
    session_start();
//  print_r($_POST);
    require_once '../db.php';


    $user_email = $_POST['user_email'];

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if($new_pass == $confirm_pass){
        if($old_pass == $new_pass){
            echo "Old password can not be as new password";
        }else{
            $en_old_pass = md5($old_pass);
        $checking_old_pass_query = "SELECT COUNT(*) AS total_user FROM users WHERE user_email='$user_email' AND user_pass='$en_old_pass'";

        $from_db = mysqli_query($db_connect,$checking_old_pass_query);

        $after_assoc = mysqli_fetch_assoc($from_db);

        if($after_assoc['total_user'] == 1){

           $enc_new_pass = md5($new_pass);
           $update_pass_query = "UPDATE users SET user_pass='$enc_new_pass' WHERE user_email='$user_email' ";
           mysqli_query($db_connect,$update_pass_query);
           $_SESSION['change_done'] = 'password change successfully';
           header('location: change_password.php');

        }else{
            echo "Old Password did not match";
        }
        }

    }else{
        echo "kora jabe na";
    }



?>