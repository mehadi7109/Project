<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';
    require_once 'check_admin.php';

    $login_email = $_SESSION['email'];



    $get_profile_query = "SELECT user_name,user_mobile FROM users WHERE user_email= '$login_email' ";
    $from_bd = mysqli_query($db_connect,$get_profile_query);
    $after_assoc = mysqli_fetch_assoc($from_bd);



?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="header-tittle">Profile Edit from</h5>
                </div>
                <div class="card-body">

                <form action="profile_edit_post.php" method="post" >
        
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="hidden" name="user_email" class="form-control" value= "<?= $login_email?>" >
                        <input type="text" name="user_name" class="form-control" value= "<?=$after_assoc['user_name']?>" >
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">User Mobile</label>
                        <input type="text" name="user_mobile" class="form-control" value= "<?=$after_assoc['user_mobile']?>" >
                    </div>
                    <button type="submit" class="btn btn-info">Edit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once '../inc/footer.php';
?>