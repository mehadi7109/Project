<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';
    require_once 'check_admin.php';

    $login_email = $_SESSION['email'];




?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="header-tittle">Password change from</h5>
                </div>
                <div class="card-body">
                <?php
                        if(isset($_SESSION['change_done'])):

                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['change_done'];
                            unset($_SESSION['change_done']);
                        ?>
                    </div>

                    <?php
                        endif
                    ?>

                <form action="change_password_post.php" method="post" >
        
                    <div class="mb-3">
                        <label class="form-label">old Password</label>
                        <input type="hidden" name="user_email" class="form-control" value= "<?= $login_email?>" >
                        <input type="password" name="old_pass" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_pass" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_pass" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-warning">Change</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once '../inc/footer.php';
?>