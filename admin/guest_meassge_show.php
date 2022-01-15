<?php

    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../../login.php');
    }
    $get_messags_query = "SELECT * FROM guest_messages";
    $message_from_bd = mysqli_query($db_connect,$get_messags_query);

?>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-4">
                        <div class="card-header bg-warning">
                            <h5 class="card-title text-capitalize">Guest Message List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Serial</th>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Guest Subject</th>
                                    <th>Guest Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                <?php foreach($message_from_bd as $key=> $meassge): ?>

                                    <tr class="<?=($meassge['read_status'] == 1)? "bg-info" : "text-dark"?>">
                                        <td><?=$key+1?></td>
                                        <td><?=$meassge['guest_name']?></td>
                                        <td><?=$meassge['guest_email']?></td>
                                        <td><?=$meassge['guest_subject']?></td>
                                        <td><?=$meassge['guest_meassage']?></td>
                                        <td>
                                            <?php if($meassge['read_status'] == 1): ?>
                                                <a href="message_read.php?msg_id=<?=$meassge['id']?>" class= "btn btn-sm btn-warning">Mark as read</a>
                                                <?php endif ?>
                                                <a href="message_delete.php?msg_id=<?=$meassge['id']?>" class= "btn btn-sm btn-warning">Delete</a>
                                        </td>
                                    </tr>

                                 <?php endforeach ?>   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

<?php
   require_once '../inc/footer.php';
?>