<?php
    session_start();
    require_once 'inc/header.php';

    if(isset($_SESSION['user_status'])){
        header('location: admin/dashboard.php');
    }
?>

<style> 
    .text{
        text-decoration: None;
    }
</style>


    <div class="container">
        <div class="row">
            <div class="col-xxl-6 m-auto ">
                <div class="card mt-4">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-tittle">Register form</h5>
                        <a  class="text" href="login.php" >LOG IN</a>
                    </div>

                    <div class="card-body">

                    <?php
                        if(isset($_SESSION['Reg_err'])){

                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $_SESSION['Reg_err'];
                            unset($_SESSION['Reg_err']);
                        ?>
                    </div>

                    <?php
                        }
                    ?>

                    <?php
                        if(isset($_SESSION['Reg_success'])){

                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['Reg_success'];
                            unset($_SESSION['Reg_success']);
                        ?>
                    </div>

                    <?php
                        }
                    ?>

                        <form action="Register_post.php" method="post" >
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" name="user_name" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User Email</label>
                                <input type="email" name="user_email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User Mobile</label>
                                <input type="text" name="user_mobile" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User Password</label>
                                <input type="password" name="user_pass" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once 'inc/footer.php'
?>    