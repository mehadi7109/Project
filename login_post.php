 <?php
    
    session_start();
    require_once 'db.php';
 
    // print_r($_POST);
 
    $user_email = $_POST['user_email'];
    $user_pass = md5($_POST['user_pass']);

    if($user_email == NULL || $user_pass == NULL){
        $_SESSION['log_err'] = "All field must filled first";
        header('location: login.php');
    }
    else{
        $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email' AND user_pass='$user_pass' ";
        $result_from_bd = mysqli_query($db_connect,$checking_query);
        $after_assoc = mysqli_fetch_assoc($result_from_bd);

        if($after_assoc['total_users'] == 1){
            $_SESSION['email'] = $user_email;
            $_SESSION['user_status'] = "Yes";
            
            header('location: admin/dashboard.php');
        }else{
            $_SESSION['log_err'] = "Your Creditial are wrong or register firt !";
        header('location: login.php');
        }
    }

 ?>