<?php

if(!isset($_SESSION['user_status'])){
  header('location: ../login.php');
}

?> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="dashboard.php"  text-primary >Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" target="_blank" href="../font-end/index.php">Visit My website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Font-End
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="guest_meassge_show.php">Guest message

            <?php
            require_once '../db.php';

            $get_unread_message_query ="SELECT COUNT(*) AS unread_message FROM guest_messages WHERE read_status = 1 ";
            $unread_message_from_bd = mysqli_query($db_connect,$get_unread_message_query);

            $after_assoc = mysqli_fetch_assoc($unread_message_from_bd)

            ?>  
            
            <span class="badge bg-danger ms-2"><?=$after_assoc['unread_message']?></span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="banner.php">Banner</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
      </ul>

        <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['email']?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="change_password.php">Password Change</a></li>
                <li><a class="dropdown-item text-danger" href="../logout.php">logout</a></li>
            </ul>
        </div>
     
    </div>
  </div>
</nav>