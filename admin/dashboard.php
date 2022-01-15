<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    require_once 'check_admin.php';

    $get_users_query = "SELECT * FROM users";
    $from_bd = mysqli_query($db_connect,$get_users_query);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header ">
                    <h5 class="header-tittle">User list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <th>User Nmae </th>
                            <th>User Email</th>
                            <th>User number</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($from_bd as $user):
                            ?>
                            <tr>
                                <td><?=$user['user_name']?></td>
                                <td><?=$user['user_email']?></td>
                                <td><?=$user['user_mobile']?></td>
                            </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once '../inc/footer.php';
?>