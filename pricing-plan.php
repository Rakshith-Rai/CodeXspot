<?php
include 'config.php';
$admin = new Admin();


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/pricing-plan.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CodeXspot MemberShip</title>

    <link rel="shortcut icon" type="" href="assets\img\logo\favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" type="image/x-icon" href="assets\img\logo\favicon.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/feather.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body class="pop-modal">

    <div class="main-wrapper">

        <?php include 'header.php' ?>


        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="breadcrumb-list">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Pages</li>
                                    <li class="breadcrumb-item" aria-current="page">Pricing Plan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="course-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 text-center mx-auto">
                        <div class="title-sec">
                            <h5>We keep it simple</h5>
                            <h2>Choose The Right Plan</h2>
                            <p>Improve the way your work, discover a brand new tool and drop the hassle once and for all.</p>
                        </div>


                    </div>
                </div>
                <?php
                $stmt = $admin->ret("SELECT * FROM `payment`");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="plan-box">
                                <div>
                                    <h4><?php echo $row['p_duration'] ?></h4>
                                    <p><?php echo $row['details'] ?></p>
                                </div>
                                <h3><span>₹</span><?php echo $row['amount'] ?></h3>
                            </div>


                        </div>

                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="main-title text-center">Buy MemberShip</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-price">
                                    <thead>
                                        <tr>
                                            <td></td>

                                            <td colspan="2" class="text-center business-cell">MemberShip Plan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="basic-cell">
                                            <td></td>
                                            <td class="text-center"><?php echo $row['p_duration'] ?></td>
                                        </tr>
                                        <tr>
                                            <?php

                                            $ing = $row['info'];
                                            $eng = explode(',', $ing);
                                            foreach ($eng as $value) {
                                                echo "
                                            <tr>
                                            <td>$value</td>
                                            
                                        <td class='text-center'><img src='assets/img/icon/check-circle.svg' alt='icon'></td>
                                        
                                            </tr>";

                                            ?>

                                            <?php } ?>
                                            <td style="display: flex;justify-content:center;align-items:center">
                                                <div class="settings-btn-grp hvr-sweep-to-right">
                                                    <a href="price.php?pid=<?php echo $row['p_id'] ?>" >Add Payment Method</a>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal<?php echo $row['p_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['p_id'] ?>" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>







        </section>

        <?php include 'footer.php' ?>

    </div>

    <script>
        function cardform(myvalue) {

            if (myvalue == 'card') { //radio button id
                document.getElementById('card_div').style.display = 'block'; //div id
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';
            } else if (myvalue == 'upi') {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'block';
                document.getElementById('cash_div').style.display = 'none';
            } else {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'block';
            }

        }
    </script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/feather/feather.min.js"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/pricing-plan.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:26:58 GMT -->

</html>