<?php
include 'config.php';
$admin = new Admin();
if (isset($_GET['s_id']) && isset($_GET['c_id'])) {
    $s_id = $_GET['s_id'];
    $c_id = $_GET['c_id'];

    $stmt = $admin->ret("SELECT * FROM `add_content` INNER JOIN `course` ON course.c_id=add_content.c_id INNER JOIN `subject` ON subject.s_id=add_content.s_id INNER JOIN `lecturer` ON lecturer.l_id=add_content.l_id WHERE   subject.s_id='$s_id'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>



                               
                                        <div class="col-lg-12 col-md-12 d-flex">
                                            <div class="course-box course-design list-course d-flex">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank">
                                                            <img class="img-fluid" alt="" src="assets/img/pdf.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="product-content">
                                                        <div class="head-course-title">
                                                            <h3 class="title"><a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank"><?php echo $row['s_name'] ?></a></h3>
                                                            <div class="all-btn all-category d-flex align-items-center g-5">
                                                                <a href="lecturers/controller/<?php echo $row['pdf'] ?>" target="_blank" class="btn btn-primary">View <i class="fa fa-eye"></i></a>
                                                                <a href="lecturers/controller/<?php echo $row['pdf'] ?>" class="btn btn-primary" download> <i class="fas fa-download"></i> Download </a>
                                                            </div>
                                                        </div>
                                                        <div class="course-info border-bottom-0 pb-0  align-items-center">
                                                            <div class="rating-img d-flex align-items-center">
                                                                <img src="assets/img/icon/icon-01.svg" alt="">
                                                                <p><?php echo $row['c_name'] ?></p>
                                                            </div>
                                                            <div class="course-view d-flex align-items-center">
                                                                <img src="assets/img/icon/icon-02.svg" alt="">
                                                                <p><?php echo $row['disc'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="rating"></div>
                                                        <div class="course-group d-flex mb-0">
                                                            <div class="course-group-img d-flex">
                                                                <!-- <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="" class="img-fluid"></a> -->
                                                                <div class="course-name">
                                                                    <h4><a href=""><?php echo $row['l_name'] ?></a></h4>
                                                                    <p>Instructor</p>
                                                                </div>
                                                            </div>
                                                            <div class="course-share d-flex align-items-center justify-content-center">
                                                                <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                

                            </div>

<?php }
} ?>