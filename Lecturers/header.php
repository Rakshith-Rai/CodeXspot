<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images\logo\logo1.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images\logo\favicon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
    
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php
              if(isset($_SESSION['lid'])){
                $lid=$_SESSION['lid'];
              $stmt=$admin->ret("SELECT * FROM `lecturer` WHERE `l_id`='$lid'");
              $row=$stmt->fetch(PDO::FETCH_ASSOC);
              }
              ?>
              <button style="background-color:#C2DEDC;"><?php echo $row['l_name'] ?></button>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="profile.php" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Profile
              </a>
              <?php 
              if(!isset($_SESSION['lid'])){
              ?>
              <a href="register.php" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Registration
              </a>
              <a class="dropdown-item" href="login.php">
                <i class="ti-settings text-primary"></i>
                Login
              </a>
              <?php } ?>
              <a class="dropdown-item" href="controller/logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>