<?php
include 'config.php';
$admin = new Admin();
$st_id = $_SESSION['stid'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot class link</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <?php include 'header.php' ?>


        


        <section class="course-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <div class="showing-list">
                        <div class="row">
    <?php
    $date = date('Y-m-d');
    $st = $admin->ret("SELECT * FROM `student` WHERE `st_id`='$st_id'");
    $ro = $st->fetch(PDO::FETCH_ASSOC);
    $cs = $ro['c_id'];
    $stmt = $admin->ret("SELECT * FROM `manage_class` INNER JOIN `subject` ON subject.s_id=manage_class.s_id INNER JOIN `lecturer` ON lecturer.l_id=manage_class.l_id WHERE `m_date`='$date' AND manage_class.c_id='$cs'");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $stmt1 = $admin->ret("SELECT * FROM `join_class` WHERE `st_id`='$st_id' AND `mc_id`='$row[mc_id]'");
        $j_status = ''; // Initialize j_status variable
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $j_status = $row1['j_status'];
        }
        $stmt2 = $admin->ret("SELECT * FROM `class_link` WHERE `st_id`='$st_id'");
        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $class = $row2['class_link'];
        }
        ?>
        <div class="col-lg-12 col-md-12 d-flex">
            <div class="course-box course-design list-course d-flex">
                <div class="product">
                    <div class="product-img">
                        <a href="#">
                            <img class="img-fluid" alt="" src="Lecturers/controller/<?php echo $row['img'] ?>" />
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="head-course-title">
                            <h3 class="title">
                                <a href="#"><?php echo $row['s_name'] ?></a>
                            </h3>
                            <div class="all-btn all-category d-flex align-items-center">
                                <?php if ($j_status == 'pending') { ?>
                                    <button class="btn btn-warning">Wait for Link</button>
                                <?php } elseif ($j_status == 'accepted') { ?>
                                    <a href="<?php echo $class ?>" class="btn btn-info">Join Class</a>
                                    <a href="<?php echo $class ?>" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Feedback</a>
                                <?php } else { ?>
                                    <a href="controller/request_link.php?mcid=<?php echo $row['mc_id'] ?>" class="btn btn-primary">Request Link</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="course-info border-bottom-0 pb-0 d-flex align-items-center">
                            <div class="rating-img d-flex align-items-center">
                                <img src="assets/img/icon/icon-01.svg" alt="" />
                                <p><?php echo $row['m_date'] ?></p>
                            </div>
                            <div class="course-view d-flex align-items-center">
                                <img src="assets/img/icon/icon-02.svg" alt="" />
                                <p><?php echo $row['m_time'] ?></p>
                            </div>
                        </div>
                        <div class="course-group d-flex mb-0">
                            <div class="course-group-img d-flex">
                                <a href="#"><img src="assets/img/user/user6.jpg" alt="" class="img-fluid" /></a>
                                <div class="course-name">
                                    <h4>
                                        <a href="#"><?php echo $row['l_name'] ?></a>
                                    </h4>
                                    <p>Instructor</p>
                                </div>
                            </div>
                            <div class="course-share d-flex align-items-center justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controller/feedback.php" method='POST'>
          <input type="hidden" name="lid" value="<?php echo $row['l_id'] ?>" id="">
      <div class="modal-body">
      
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name='msg' id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="feed" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <?php } ?>
</div>

                        </div>




                    </div>
                </div>
            </div>
        </section>





        <?php include 'footer.php' ?>

    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/course-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:00 GMT -->

</html>