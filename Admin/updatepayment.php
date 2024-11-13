<?php 
include 'config.php';
$admin=new Admin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update payment</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images\logo\favicon.png"" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   <?php include 'header.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <?php
            $pid=$_GET['p_id'];
            $stmt=$admin->ret("SELECT * FROM `payment` WHERE `p_id`='$pid' ");
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment details</h4>
                  
                  <form  action="controller/updatepayment.php" method="POST">
                      <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Duration</label>
                      <input type="text" class="form-control" id="exampleInputName1" required placeholder="duration" name="p_duration" value="<?php echo $row['p_duration']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Amount</label>
                      <input type="number" class="form-control" id="exampleInputEmail3" required placeholder="amount" name="amount" value="<?php echo $row['amount']?>">
                    </div>
                   
                   
                    
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Details</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" required name="details"><?php echo $row['info']?></textarea>
                    </div>
                    <div class="table-responsive">
                      <table class="table " id="dynamic_field">

                        <label for="">Add Details</label>
                        <td class="col-sm-12">
                        <?php 
                        $ing=$row['info'];
                        $eng=explode(',',$ing);
                        foreach($eng as $value){
                            echo "
                            <input type='text' name='var[]' required placeholder='Add Details' class='form-control name_list' value='$value' />
                            ";
                        }
                        ?>
                        </td>
                       
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

                      </table>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="payment">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
           
  </div>    
           
            
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
  <script>
    $(document).ready(function() {
      var i = 1;
      $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="var[]" placeholder="Add Details" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
      });

      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
      });

      $('#submit').click(function() {
        $.ajax({
          url: "name.php",
          method: "POST",
          data: $('#add_name').serialize(),
          success: function(data) {
            alert(data);
            $('#add_name')[0].reset();
          }
        });
      });

    });
  </script>
</body>

</html>
