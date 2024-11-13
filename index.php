
<?php 
include 'config.php';
$admin=new Admin();
if(!isset($_SESSION['stid'])){
   header('location:home.php');    
}
$stid=$_SESSION['stid'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:21:44 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Welcome to CodeXspot</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/aos/aos.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <?php include 'header.php' ?>
<?php 
$stid=1;
$stmt = $admin->ret("SELECT * FROM `membership` WHERE `st_id`='$stid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if a row was returned from the query
if ($row) {
    $ex = $row['pay_date'];
    
    // Get today's date
    $today = new DateTime();
    
    // Check if the pay_date value is not empty
    if (!empty($ex)) {
        // Convert the pay_date string to a DateTime object
        $otherDateTime = DateTime::createFromFormat('Y-m-d', $ex);
        
        // Check if the DateTime object was created successfully
        if ($otherDateTime) {
            // Calculate the difference between the two dates
            $interval = $today->diff($otherDateTime);
            
            // Access the difference in days
              $daysGap = $interval->days;
            
            if ($daysGap >= 30) {
                  $stmt3 = $admin->cud("UPDATE `membership` SET `pay_status`='expired' WHERE `st_id`='$stid'", "updated");
            }
        } else {
            echo "Error: Invalid pay_date format";
        }
    } else {
        echo "Error: Empty pay_date value";
    }
} else {
    // echo "Error: No rows returned from the query";
}

if ($row) {
    $ex1 = $row['pay_date'];
    
    // Get today's date
    $today1 = new DateTime();
    
    // Check if the pay_date value is not empty
    if (!empty($ex1)) {
        // Convert the pay_date string to a DateTime object
        $otherDateTime1 = DateTime::createFromFormat('Y-m-d', $ex1);
        
        // Check if the DateTime object was created successfully
        if ($otherDateTime1) {
            // Calculate the difference between the two dates
            $interval1 = $today->diff($otherDateTime1);
            
            // Access the difference in days
            $daysGap1 = $interval1->days;
            
            if ($daysGap1 >= 180) {
                $stmt4 = $admin->cud("UPDATE `membership` SET `pay_status`='expired' WHERE `st_id`='$stid'", "updated");
            }
        } else {
            echo "Error: Invalid pay_date format";
        }
    } else {
        echo "Error: Empty pay_date value";
    }
} else {
    // echo "Error: No rows returned from the query";
}
if ($row) {
    $ex2 = $row['pay_date'];
    
    // Get today's date
    $today2 = new DateTime();
    
    // Check if the pay_date value is not empty
    if (!empty($ex2)) {
        // Convert the pay_date string to a DateTime object
        $otherDateTime2 = DateTime::createFromFormat('Y-m-d', $ex2);
        
        // Check if the DateTime object was created successfully
        if ($otherDateTime2) {
            // Calculate the difference between the two dates
            $interval2 = $today->diff($otherDateTime2);
            
            // Access the difference in days
            $daysGap2 = $interval2->days;
            
            if ($daysGap2 >= 365) {
                $stmt = $admin->cud("UPDATE `membership` SET `pay_status`='expired' WHERE `st_id`='$stid'", "updated");
            }
        } else {
            echo "Error: Invalid pay_date format";
        }
    } else {
        echo "Error: Empty pay_date value";
    }
} else {
    // echo "Error: No rows returned from the query";
}


?>



        <section class="home-slide d-flex align-items-center">
            <div class="container">
                <div class="row ">
                    <div class="col-md-7">
                        <div class="home-slide-face aos" data-aos="fade-up">
                            <div class="home-slide-text ">
                                <h5>The Leader in Online Learning</h5>
                                <h1>Transform Your Coding Skills at CodeXspot:<br> Learn, Code, and Thrive!</h1>
                                <p>Own your future learning new skills online</p>
                                <p>Welcome to CodexSpot, your ultimate online learning platform for mastering the art of coding! Whether you're a beginner or an experienced programmer, we are here to help you unlock the potential of coding. </P>
                            <p>Join our community of passionate learners and let us guide you towards coding brilliance. With CodexSpot, the language of the future is at your fingertips!</p>
                            </div>
                           
                            
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="girl-slide-img aos" data-aos="fade-up">
                            <img src="assets\img\index\two.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

       


       


        


        <section class="section master-skill">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="section-header aos" data-aos="fade-up">
                            <div class="section-sub-head">
                                <span>What’s New</span>
                                <h2>Master the skills to drive your career</h2>
                            </div>
                        </div>
                        <div class="section-text aos" data-aos="fade-up">
                            <p>Get certified, master modern tech skills, and level up your career — whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>
                        </div>
                        <div class="career-group aos" data-aos="fade-up">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="certified-group blur-border d-flex">
                                        <div class="get-certified d-flex align-items-center">
                                            <div class="blur-box">
                                                <div class="certified-img ">
                                                    <img src="assets/img/icon/icon-1.svg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <p>Stay motivated with engaging instructors</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="certified-group blur-border d-flex">
                                        <div class="get-certified d-flex align-items-center">
                                            <div class="blur-box">
                                                <div class="certified-img ">
                                                    <img src="assets/img/icon/icon-2.svg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <p>Keep up with in the latest in cloud</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="certified-group blur-border d-flex">
                                        <div class="get-certified d-flex align-items-center">
                                            <div class="blur-box">
                                                <div class="certified-img ">
                                                    <img src="assets/img/icon/icon-3.svg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <p>Get certified with 100+ certification courses</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="certified-group blur-border d-flex">
                                        <div class="get-certified d-flex align-items-center">
                                            <div class="blur-box">
                                                <div class="certified-img ">
                                                    <img src="assets/img/icon/icon-4.svg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <p>Build skills your way, from labs to courses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 d-flex align-items-end">
                        <div class="career-img aos" data-aos="fade-up">
                            <img src="assets\img\index\join.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>


       


       


        <!-- <section class="section share-knowledge">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="knowledge-img aos" data-aos="fade-up">
                            <img src="assets/img/share.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="join-mentor aos" data-aos="fade-up">
                            <h2>Want to share your knowledge? Join us a Mentor</h2>
                            <p>High-definition video is video of higher resolution and quality than standard-definition. While there is no standardized meaning for high-definition, generally any video.</p>
                            <ul class="course-list">
                                <li><i class="fa-solid fa-circle-check"></i>Best Courses</li>
                                <li><i class="fa-solid fa-circle-check"></i>Top rated Instructors</li>
                            </ul>
                            <a href="Lecturers\register.php">
                            <button type=submit>Join as Lecturer</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


        <section class="section user-love">
            <div class="container">
                <div class="section-header white-header aos" data-aos="fade-up">
                    <div class="section-sub-head feature-head text-center">
                        <span>Discover the Joy of Coding at CodexSpot:</span>
                        <h2> Where Learning Meets Innovation!</h2>
                        <span> Welcome to CodexSpot, your online destination for mastering coding skills! Join our community of passionate learners and gain access to a comprehensive platform designed to help you learn and excel in coding. With interactive lessons, hands-on projects, and a supportive community, CodexSpot is your gateway to unlocking coding brilliance. Start your coding adventure today and empower your future with CodexSpot!</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section user-love">
            <div class="container">
            <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Timetable(28jun-5july) </h4>
                    <div class="table-responsive">
<style>
  .table {
      background-color:peachpuff;
      font-family:'Times New Roman', Times, serif;
      font-weight:bold;
    border-collapse: collapse;
    border: 2px solid black;
  }

  .table th,
  .table td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }

  .lunch-break {
    background-color: #0000004f;
    writing-mode: vertical-lr;
    padding: 0;
  }
</style>

<table class="table">
  <thead>
    <tr>
      <th rowspan="2">Days</th>
      <th colspan="4">Before Lunch</th>
      <th class="lunch-break"></th>
      <th colspan="2">After Lunch</th>
    </tr>
    <tr>
      <th>9:30-10:30</th>
      <th>10:30-11:30</th>
      <th>11:30-12:30</th>
      <th>12:30-1:30</th>
      <th></th>
      <th>2:30-3:30</th>
      <th>3:30-4:30</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stmt = $admin->ret("SELECT DISTINCT  t_id, day FROM `time_table`");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $day = $row['day'];
      $subjects = $admin->ret("SELECT period_1, period_2, period_3, period_4, period_5, period_6 FROM `time_table` WHERE day = '$day'");
      $subject_ids = $subjects->fetch(PDO::FETCH_ASSOC);
      $subject_names = array();
      foreach ($subject_ids as $subject_id) {
        $subject = $admin->ret("SELECT s_name FROM `subject` WHERE s_id = $subject_id");
        $subject_row = $subject->fetch(PDO::FETCH_ASSOC);
        $subject_names[] = $subject_row['s_name'];
      }
      ?>
      <tr>
        <td><?php echo $day; ?></td>
        <?php
        $before_lunch_subjects = array_slice($subject_names, 0, 4);
        $after_lunch_subjects = array_slice($subject_names, 4);
        foreach ($before_lunch_subjects as $subject) {
        ?>
          <td><?php echo $subject; ?></td>
        <?php
        }
        ?>
        <td class="lunch-break"></td>
        <?php
        foreach ($after_lunch_subjects as $subject) {
        ?>
          <td><?php echo $subject; ?></td>
        <?php
        }
        ?>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>


                  </div>
                </div>
                <!-- <?php
                $s=$admin->ret("SELECT * FROM `time_table`");
                $r=$s->fetch(PDO::FETCH_ASSOC);
                $n=$s->rowCount();
                if ($n<6) { ?>
                  <a href="post_timetable.php?sm_id=<?php echo $smid; ?>">
                    <button class="btn btn-success m-2">Post</button>
                  </a>  
                <?php } ?> -->
              </div>
            </div>  
          </div>
            </div>
        </section>


       

        <!-- <section class="section become-instructors aos" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="student-mentor cube-instuctor ">
                            <h4>Become An Instructor</h4>
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <div class="top-instructors">
                                        <p>Top instructors from around the world teach millions of students on Mentoring.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="mentor-img">
                                        <img class="img-fluid" alt="" src="assets/img/become-02.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="student-mentor yellow-mentor">
                            <h4>Transform Access To Education</h4>
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="top-instructors">
                                        <p>Create an account to receive our newsletter, course recommendations and promotions.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mentor-img">
                                        <img class="img-fluid" alt="" src="assets/img/become-01.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


      
        <?php include 'footer.php' ?>

        
    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.waypoints.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/plugins/slick/slick.js"></script>

    <script src="assets/plugins/aos/aos.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:23:10 GMT -->

</html>