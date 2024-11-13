<?php 
include 'config.php';
$admin=new Admin();
$lid=$_SESSION['lid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View uploaded video</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
</head>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php 
    include 'header.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php 
      include 'sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Uploaded Video</h4>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            SL.No
                          </th>
                          <th>
                            Video
                          </th>
                          <th>
                            Course
                          </th>
                          <th>
                            Subject
                          </th>
                          <th>
                            Discription
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=0;
                        $stmt=$admin->ret("SELECT * FROM `upload_video` INNER JOIN `course` ON course.c_id=upload_video.c_id INNER JOIN `subject` ON subject.s_id=upload_video.s_id WHERE `l_id`='$lid' ORDER BY `u_id` DESC");
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                          <td>
                            <?php echo $i++?>
                          </td>
                          <td>
                          <video src="controller/<?php echo $row['u_video']?>" width="200" height="200" controls></video>

                          </td>
                          <td>
                            <?php echo $row['c_name']?>
                          </td>
                          <td>
                          <?php echo $row['s_name']?>
                          </td>
                          <td>
                            <textarea name="" id="" cols="30" rows="10"> <?php echo $row['desc']?></textarea>
                          </td>
                          <td>
                            <a href="" data-toggle="modal" onclick="displaySelectedCourse()" data-target="#uploadModal<?php echo $row['u_id']?>"><i class="mdi mdi-pencil" style="font-size: 20px;color:green"></i></a>
                            <a href="controller/delete_video.php?u_id=<?php echo $row['u_id']?>"><i class="mdi mdi-delete" style="font-size: 20px;color:red"></i></a>
                          </td>
                          

<!-- Modal -->
<div class="modal fade" id="uploadModal<?php echo $row['u_id']?>" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Video Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm" action="controller/update_vedio.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="uid" value="<?php echo $row['u_id']?>" id="">
        <div class="form-group">
                    <label>Select Course</label>
                    <select  name="c_id" onchange="showUser(this.value)" class="form-control">
                    <option value="">Select Course</option>
                      <?php $stmt1=$admin->ret("SELECT * FROM `course` ");
                      while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option  hidden selected value="<?php echo $row1['c_name'] ?>"><?php echo $row1['c_name']?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Subject</label>
                    <select class="form-control" name="s_id" id="txtHint">
                    
                      <option selected >Select Subject</option>
                   
                    </select>
                  </div>
          <br>
  
          <div class="form-group">
                      <label for="exampleTextarea1">Discription</label>
                      <textarea class="form-control" name="discription" id="exampleTextarea1" rows="4"><?php echo $row['desc'] ?></textarea>
                    </div>
          <br>
  
          <div class="form-group">
                      <label>Upload Video</label>
                      <input type="file" name="video" class="file-upload-default" accept="video/mp4"  >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" value="<?php echo $row['u_video'] ?>" disabled placeholder="Upload Video">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
          <br>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upload" class="btn btn-primary" onclick="uploadVideo()">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>

                        </tr>
                          <?php } ?>
                      
                        
                       
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
    function displaySelectedCourse() {
  var selectElement = document.querySelector('[name="c_id"]');
  var selectedCourse = selectElement.value;
  var selectedCourseSpan = document.getElementById("selectedCourse");
  selectedCourseSpan.textContent = selectedCourse;
}

  </script>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script>
        function showUser(bid) {
        
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

                }
            }
            xmlhttp.open("GET", "ajax_subject.php?c_id=" + bid, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>
