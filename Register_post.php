<?php
    session_start();
    require_once 'db.php';
    

    $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL) ;
    $user_mobile = $_POST['user_mobile'];
    $user_pass = $_POST['user_pass'];
    
    $after_validate_user_email = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) ;
 

    
    $all_cap = preg_match('@[A-Z]@', $user_pass);
    $all_small = preg_match('@[a-z]@', $user_pass);
    $all_num = preg_match('@[0-9]@', $user_pass);
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    
    $all_charator = preg_match($pattern, $user_pass);
        
    

    // =======>>>>>>>                 


    if($_POST['user_name'] == NULL || $_POST['user_email'] == NULL || $_POST['user_mobile'] == NULL || $_POST['user_pass'] == NULL ){
        $_SESSION['Reg_err'] = "Please all fileds fill first";
        header('location: register.php');
    }
    else{ 
        if(strlen ($user_mobile) == 11){
           $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email'";
           $result_form_db = Mysqli_query($db_connect,$checking_query);
           $after_assoc = Mysqli_fetch_assoc($result_form_db);
          
            if($after_assoc['total_users'] == 0){
                if($after_validate_user_email){
                    if(strlen($user_pass) >=6 && $all_cap == 1 && $all_charator == 1 && $all_small == 1 && $all_num == 1 ){
                        $encrypted_pass = md5($user_pass);
                        $insert_query = "INSERT INTO users (user_name,user_email,user_mobile,user_pass) VALUES('$user_name','$user_email','$user_mobile','$encrypted_pass')";

                        mysqli_query($db_connect,$insert_query);

                        $_SESSION['Reg_success'] = "Congrats ! Register done successfully";

                        header('location: register.php');
                    }
                    else{
                        $_SESSION['Reg_err'] = "must be 6 digit and 1cap and 1num and 1small and 1 special charaters";
                        header('location: register.php');
                    }
                }
                else{
                    $_SESSION['Reg_err'] = "Invalid Email provided";
                    header('location: register.php');
                }
                
            }
            
            else{
                $_SESSION['Reg_err'] = "already registered";
                header('location: register.php');
            }
        }
        else{
            $_SESSION['Reg_err'] = "Enter must 11 digits number..";
            header('location: register.php');
        }
    }

    // if(strlen ($user_mobile) == 11){
    //     $checking_query = "SELECT COUNT(*) AS total_users FORM users WHERE user_email='$user_email'";
    //     $result_form_db = mysqli_query($db_connect,$checking_query);
    //     $after_assoc = mysqli_fetch_assoc($result_form_db);

    //     if($after_assoc['total_users'] == 1){
    //         echo "already registered";
    //     }
    //     else{
    //         $insert_query = "INSERT INTO users (user_name,user_email,user_mobile,user_pass) VALUES('$user_name','$user_email','$user_mobile','$user_pass')";

    //         mysqli_query($db_connect,$insert_query);
            
    //         echo "Done";
    //     }
    // }
    // else{
    //     echo "Enter must 11 digits number..";
    // }

   

?>
