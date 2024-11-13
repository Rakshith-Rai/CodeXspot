<header class="header">
  <div class="header-fixed">
    <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
      <div class="container">
        <div class="navbar-header">
          <a id="mobile_btn" href="javascript:void(0);">
            <span class="bar-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </a>
            <a href="index-2.html" class="navbar-brand logo">
            <img src="assets\img\logo\logo.png" class="img-fluid" alt="Logo">
            </a>
         </div>
<div class="main-menu-wrapper">
<div class="menu-header">
<a href="index-2.html" class="menu-logo">
<img src="assets\img\logo\logo.png" class="img-fluid" alt="Logo">
</a>
<a id="menu_close" class="menu-close" href="javascript:void(0);">
<i class="fas fa-times"></i>
</a>
</div>
          <ul class="main-nav">
            <li class="has-submenu active">
              <a class="" href="index.php">Home </i></a>
              <!-- <ul class="submenu">
<li class="active"><a href="index-2.html">Home</a></li>
<li><a href="index-two.html">Home Two</a></li>
<li><a href="index-three.html">Home Three</a></li>
<li><a href="index-four.html">Home Four</a></li>
</ul> -->
            </li>
            <li class="has-submenu">
              <a href="#">Course <i class="fas fa-chevron-down"></i></a>
              <ul class="submenu">

                <li>
                  <?php
                  $st_id = $_SESSION['stid']; // Assuming you have the student ID stored in the session variable 'stid'
                  $stmt = $admin->ret("SELECT * FROM `course` WHERE `c_id` IN (SELECT `c_id` FROM `student` WHERE `st_id` = '$st_id')");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <a href="course.php?c_id=<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></a>
                    <?php
                  }
                  ?>
                </li>


              </ul>
            </li>
            <li class="has-submenu">
              <a href="#">Video<i class="fas fa-chevron-down"></i></a>
              <ul class="submenu">

                <li>
                  <?php
                  $st_id = $_SESSION['stid']; // Assuming you have the student ID stored in the session variable 'stid'
                  $stmt = $admin->ret("SELECT * FROM `course` WHERE `c_id` IN (SELECT `c_id` FROM `student` WHERE `st_id` = '$st_id')");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <a href="video.php?c_id=<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></a>
                    <?php
                  }
                  ?>
                </li>

              </ul>
            </li>
            <?php

            $stmt = $admin->ret("SELECT * FROM `membership` WHERE `st_id`='$st_id'");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && is_array($row) && $row['pay_status'] == 'Active') {
              // Your code here
            
              ?>
              <li><a href="class_link.php">Class Link</a></li>
            <?php } else { ?>
              <li><a href="pricing-plan.php">Class Link</a></li>
            <?php } ?>
            <li><a href="pricing-plan.php">Member Ship</a></li>




            <li class="has-submenu">
              <a href="#">Account<i class="fas fa-chevron-down"></i></a>
              <ul class="submenu">


                <li>
                  <?php
                  if (isset($_SESSION['stid'])) {
                    ?><a href="profile.php">My Profile</a>

                  <?php } ?>
                </li>



                <?php
                if (!isset($_SESSION['stid'])) {
                  ?>

                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Register</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['stid'])) { ?>
                  <li><a href="controller/logout.php">Logout</a></li>
                <?php } ?>
              </ul>
            </li>

          </ul>
        </div>
        <ul class="nav header-navbar-rht">
          <li class="nav-item noti-nav">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
              <img src="assets/img/icon/notification.svg" alt="img" />
            </a>
            <div class="notifications dropdown-menu dropdown-menu-right">

              <div class="noti-content">
                <ul class="notification-list">
                  <?php
                  $stmt = $admin->ret("SELECT * FROM `membership` WHERE `st_id`='$st_id ' ");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['pay_status'] == 'expired') {

                      ?>
                      <li class="notification-message">
                        <div class="media d-flex">
                          <div>

                          </div>
                          <div class="media-body">
                            <h6>
                              <a href="notifications.html">Hii
                                <span>Your Membership</span> Expired
                              </a>
                            </h6>
                            <a href="pricing-plan.php"><button class="btn btn-accept"> Buy Membership</button></a>

                          </div>
                        </div>
                      </li>
                    <?php }
                  } ?>

                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>