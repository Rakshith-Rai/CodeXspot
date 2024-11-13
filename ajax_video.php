<?php 
include 'config.php';
$admin=new Admin();
                                     if(isset($_GET['s_id']) && isset($_GET['c_id'])){
                                        $s_id=$_GET['s_id'];
                                        $c_id=$_GET['c_id'];
                               
                                        $stmt=$admin->ret("SELECT * FROM `upload_video` INNER JOIN `course` ON course.c_id=upload_video.c_id INNER JOIN `subject` ON subject.s_id=upload_video.s_id INNER JOIN `lecturer` ON lecturer.l_id=upload_video.l_id WHERE   subject.s_id='$s_id'");
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                 
                              
                                    <div class="col-lg-4 col-md-6 d-flex">
                                        <div class="course-box course-design d-flex ">
                                            <div class="video-sec vid-bg">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="lecturers/controller/<?php echo $row['u_video'] ?>" class="video-thumbnail" data-fancybox="">
                                                            <div class="play-icon">
                                                                <i class="fa-solid fa-play"></i>
                                                            </div>
                                                            <img class="" src="assets/img/video.jpg" alt="">
                                                        </a>
                                                        <div class="video-details">
                                                            <div class="course-fee">
                                                                <h2><?php echo $row['s_name'] ?></h2>

                                                            </div>

                                                        </div>
                                                        
                                                        <div class="product-content">
                                                            <div class="course-group d-flex">
                                                                <div class="course-group-img d-flex">
                                                                    <a href="instructor-profile.html"><img src="assets/img/user/user2.jpg" alt="" class="img-fluid"></a>
                                                                    <div class="course-name">
                                                                        <h4><a href="instructor-profile.html"><?php echo $row['l_name'] ?></a></h4>
                                                                        <p>Instructor</p>
                                                                    </div>
                                                                </div>
                                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                                    <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                            <h3 class="title"><a href="course-details.html"><?php echo $row['desc'] ?></a></h3>
                                                            <hr>

                                                            <div class="all-btn all-category d-flex align-items-center">
                                                                <a href="checkout.html" class="btn btn-primary"><i class="fa fa-eye"></i> View Video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <?php }
                            } ?>
                       

                                 