<?php
    require_once '../db.php';

    // print_r($_POST);

    $id =$_POST['id'];
    $sub_title =$_POST['sub_title'];
    $title_top =$_POST['title_top'];
    $title_bottom =$_POST['title_bottom'];
    $detail =$_POST['detail'];

    $update_banner_query ="UPDATE banners SET sub_title='$sub_title',title_top='$title_top',title_bottom='$title_bottom',detail='$detail' WHERE id=$id";
    mysqli_query($db_connect,$update_banner_query);

    $update_image_name= $_FILES['banner_image']['name'];

    if($update_image_name){

        $uploaded_image_size = $_FILES['banner_image']['size'];

        if ($uploaded_image_size <= 2000000) {
            $uploaded_image_name = $_FILES['banner_image']['name'];
            $after_exploe = explode('.',$uploaded_image_name);
            $uploaded_image_ext = end($after_exploe);
            $allow_extension = array('jpg','png','jpeg','JPG','PNG','JPEG');
            if(in_array($uploaded_image_ext,$allow_extension)){
     
            $image_location_query = "SELECT image_location FROM banners WHERE id=$id";
     
            $image_from_db = mysqli_query($db_connect,$image_location_query);

            $after_assoc_image = mysqli_fetch_assoc($image_from_db);

            unlink("../". $after_assoc_image['image_location']);
     
             $new_name = $id . "." . $uploaded_image_ext;
             $upload_location = "../uploads/banner/". $new_name;
             move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_location);
     
             $db_location = "uploads/banner/". $new_name;
             $upload_location_query = "UPDATE banners SET image_location='$db_location' WHERE id=$id";
     
             mysqli_query($db_connect,$upload_location_query);
             header('location: banner.php');
            }else{
                echo "your file format is not allowed";
            }
         } 
         else {
             echo "insert kora jabe na";
         }
    }
    header('location: banner.php');

?>