<?php
include 'config.php' ;
$admin=new Admin();
$pid=$_GET['pid'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body >

    <div class="main-wrapper">

       <?php include "header.php" ?>


   


        <section class="course-content">
            <div class="container">
                <div class="title-sec">
                    <div class="row">
                        <div class="col-sm-6 col-lg-5">
                            <h2>Payment Method</h2>
                            
                        </div>
                        
                    </div>
                </div>
                
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Payment Method</h5>

                            </div>
                            <div class="modal-body">
                                <div class="addpaymethod-form add-course-info">
                                    <form action="controller/payment.php" method="POST">
                                        <input type="hidden" name="p_id" value="<?php echo $pid?>" id="">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="wallet-method">
                                                    <input id="credit" name="paymentMethod"  type="radio" class="custom-control-input" value="upi" id="upi" onclick="cardform(this.value)" >
                                                    <label class="custom-control-label" for="credit">UPI/Netbanking</label>
                                                    <div style="display: none;" id="upi_div">
                                                        <b>scan and pay</b>
                                                        <img src="assets/img/qr.png">

                                                        <!-- transaction id input form-->
                                                        <div class="col-md-6 mb-3">
                                                            <p><input type="text" placeholder="Enter Transaction id" class="form-control inputtxt"  name="tans"></p>
                                                        </div>
                                                    </div>
                                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" checked value="card" id="card" onclick="cardform(this.value)" required>
                                                    <label class="custom-control-label" for="paypal">Debit card/Credit card</label>
                                                </div>
                                                <div id="card_div">
                                                    <div class="col-lg-12" >
                                                        <div class="form-group mb-0">
                                                            <label class="form-control-label">Name on Card</label>
                                                            <input type="text" class="form-control"  name="c_name" placeholder="Card Name" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Card Number</label>
                                                        <input type="text" class="form-control" name="c_no" placeholder="XXXX XXXX XXXX XXXX" />
                                                    </div>
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Month</label>
                                                            <input type="text" class="form-control" name="month" placeholder="xx/xx" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">CVV Code </label>
                                                        <input type="text" class="form-control" name="cvv" placeholder="XXXX" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer me-auto">
                                <button type="submit" name="pay" class="btn btn-success">
                                    Pay
                                </button>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



         
        </section>


      <?php include 'footer.php' ?>

    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function cardform(myvalue) {

            if (myvalue == 'card') { //radio button id
                document.getElementById('card_div').style.display = 'block'; //div id
                document.getElementById('upi_div').style.display = 'none';
              
            } else if (myvalue == 'upi') {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'block';
              
            } else {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'none';
                
            }

        }
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:56 GMT -->

</html>