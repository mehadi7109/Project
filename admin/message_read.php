<?php
     require_once '../db.php';

     $id = $_GET['msg_id'];
     $update_query = "UPDATE guest_messages SET read_status = 2 WHERE id=$id";

     mysqli_query($db_connect,$update_query);

     header('location: guest_meassge_show.php');

?>