<?php
    session_start();
    require_once '../db.php';

    $sub_title = $_POST['sub_title'];
    $title_top =$_POST['title_top'];
    $title_bottom =$_POST['title_bottom'];
    $detail =$_POST['detail'];

    $uploaded_image_size = $_FILES['banner_image']['size'];

    if ($uploaded_image_size <= 2000000) {
       $uploaded_image_name = $_FILES['banner_image']['name'];
       $after_exploe = explode('.',$uploaded_image_name);
       $uploaded_image_ext = end($after_exploe);
       $allow_extension = array('jpg','png','jpeg','JPG','PNG','JPEG');
       if(in_array($uploaded_image_ext,$allow_extension)){

        $insert_banner_query = "INSERT INTO banners (sub_title,title_top,title_bottom,detail,image_location) VALUES ('$sub_title','$title_top','$title_bottom','$detail','Primary location')";

        $from_bd = mysqli_query($db_connect,$insert_banner_query);

        $id_from_db = mysqli_insert_id($db_connect);

        $new_name = $id_from_db . "." . $uploaded_image_ext;
        $upload_location = "../uploads/banner/" . $new_name;
        move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_location);

        $db_location = "uploads/banner/". $new_name;
        $upload_location_query = "UPDATE banners SET image_location='$db_location' WHERE id=$id_from_db";

        mysqli_query($db_connect,$upload_location_query);
        header('location: banner.php');
       }else{
           echo "your file format is not allowed";
       }
    } 
    else {
        echo "insert kora jabe na";
    }

?>

