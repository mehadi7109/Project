 <?php
    
    session_start();
    require_once '../db.php';
    //  print_r($_POST);

     $guest_name = $_POST['guest_name'];
     $guest_email = $_POST['guest_email'];
     $guest_subject = $_POST['guest_subject'];
     $guest_meassage = $_POST['guest_meassage'];

     $flag= true;

     if(!$guest_name){
        $_SESSION['guest_name_err'] = 'guest name filled first';
        $flag = false;
     }
     if(!$guest_email){
        $_SESSION['guest_email_err'] = 'guest email filled first';
        $flag = false;
     } 
     if(!$guest_subject){
        $_SESSION['guest_subject_err'] = 'guest subject filled first';
        $flag = false;
     }
     if(!$guest_meassage){
        $_SESSION['guest_message_err'] = 'guest message filled first';
        $flag = false;
     }


     if($flag){
     $guest_meassage = $_POST['guest_meassage'];

     $message_insert_query = "INSERT INTO guest_messages (guest_name,guest_email,guest_subject,guest_meassage) VALUES ('$guest_name', '$guest_email','$guest_subject','$guest_meassage' ) ";

     mysqli_query($db_connect,$message_insert_query);

     $_SESSION['guest_message_done'] = 'Your message recieved ! we will call you asap';

     header ('location: ../font-end/index.php');

     }
     else{
         header ('location: ../font-end/index.php');
     }


 
 
 
 ?>