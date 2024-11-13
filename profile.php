<?php 
include 'config.php';
$admin=new Admin();
$stid=$_SESSION['stid'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/setting-edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot Profile</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

     <?php include 'header.php' ?>


        <div class="page-content">
            <div class="container" style="margin-top: 100px;">
                <div class="row">

                    
<?php 
$stmt=$admin->ret("SELECT * FROM `student` WHERE  `st_id`='$stid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
                    <div class="col-xl-9 col-md-8 ">
                        <div class="settings-widget profile-details">
                            <div class="settings-menu p-0">
                                <div class="profile-heading">
                                    <h3>Profile Details</h3>
                                    <p>You have full control to manage your own account setting.</p>
                                </div>
                                <div class="course-group mb-0 d-flex">
                                    <div class="course-group-img d-flex align-items-center">
                                        
                                        <div class="course-name">
                                            <h4><a href="">Name :</a><?php echo $row['st_name']?></h4>
                                            <h4><a href="">Phone :</a><?php echo $row['s_phone_no']?></h4>
                                            <h4><a href="">Email :</a><?php echo $row['s_email']?></h4>
                                            <h4><a href="">Address :</a><?php echo $row['s_address']?></h4>
                                          
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="checkout-form personal-address add-course-info ">
                                    <div class="personal-info-head">
                                        <h4>Personal Details</h4>
                                        <p>Edit your personal information and address.</p>
                                    </div>
                                    <form action="controller/update_profile.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">First Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $row['st_name'] ?>" placeholder="Enter your first Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['s_phone_no'] ?>" placeholder="Enter your Phone">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?php echo $row['s_email'] ?>" placeholder="Enter your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo $row['s_address'] ?>" placeholder="Address">
                                                </div>
                                            </div>
                                           
                                           
                                           
                                            <div class="update-profile">
                                                <button type="submit" name="prof" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include 'footer.php' ?>
      

    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/feather/feather.min.js"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/setting-edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:48 GMT -->

</html>