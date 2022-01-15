<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $id =$_GET['id'];
    $get_banners_query = "SELECT * FROM banners WHERE id=$id";
    $from_db = mysqli_query($db_connect,$get_banners_query);
    $after_assoc = mysqli_fetch_assoc($from_db);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title">banner and from</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?=$id?>" >
                                <input type="text" class="form-control" name="sub_title" value="<?=$after_assoc['sub_title']?>">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="title_top" value="<?=$after_assoc['title_top']?>">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="title_bottom" value="<?=$after_assoc['title_bottom']?>">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="detail" value="<?=$after_assoc['detail']?>">
                            </div>

                            <div class="mb-3">
                                <input type="file" class="form-control" name="banner_image" >
                            </div>
                            <div class="mb-3">
                                <img src="../<?=$after_assoc['image_location']?>" alt="" width="100px" >
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary w-100">Add</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</section>

<?php
    require_once '../inc/footer.php';
?>