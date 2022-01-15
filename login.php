<?php
    session_start();
    require_once 'inc/header.php';

    if(isset($_SESSION['user_status'])){
        header('location: admin/dashboard.php');
    }

?>


    <div class="container">
        <div class="row">
            <div class="col-xxl-6 m-auto ">
                <div class="card mt-4">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-tittle">Login from</h5>
                        <a style= "text-decoration: None; " href="register.php">SIGN UP</a>
                    </div>

                    <div class="card-body">

                    <?php
                        if(isset($_SESSION['log_err'])){

                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $_SESSION['log_err'];
                            unset($_SESSION['log_err']);
                        ?>
                    </div>

                    <?php
                        }
                    ?>

                    

                        <form action="login_post.php" method="post" >
        
                            <div class="mb-3">
                                <label class="form-label">User Email</label>
                                <input type="email" name="user_email" class="form-control" >
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">User Password</label>
                                <input type="password" name="user_pass" class="form-control" >
                            </div>
                            <button  type="submit" class="btn btn-info">SIGN-IN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once 'inc/footer.php'
?>    