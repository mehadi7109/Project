<?php

    require_once '../db.php';

    $id =$_GET['id'];

    $image_location_query = "SELECT image_location FROM banners WHERE id=$id";
    $image_from_db = mysqli_query($db_connect,$image_location_query);
    $after_assoc_image = mysqli_fetch_assoc($image_from_db);
    unlink("../". $after_assoc_image['image_location']);

    $delete_banner_query ="DELETE FROM banners WHERE id=$id";
    mysqli_query($db_connect,$delete_banner_query);

    header('location: banner.php');
?>