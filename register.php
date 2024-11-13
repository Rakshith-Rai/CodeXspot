<?php 
include 'config.php';
$admin=new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Codexspot Register</title>

    <link rel="shortcut icon" type="image/x-icon" href="aassets\img\logo\favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets\img\logo\logo.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>𝒞𝑜𝒹𝑒 𝓎𝑜𝓊𝓇 𝓌𝒶𝓎 𝓉𝑜 𝓈𝓊𝒸𝒸𝑒𝓈𝓈</h2>
                            <p>
Ignite your coding journey and unlock limitless possibilities at our website. From beginners to experts, our platform empowers you to unleash your creativity, master technology, and create your own digital success story. Join us today and embark on a coding adventure like no other.</p>
                        </div>
                   
                    </div>
                </div>
            </div>

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        
                        <h1>Sign up</h1>
                        <form action="controller/register.php" method="POST" novalidate>
                            <div class="form-group">
                                <label class="form-control-label"> Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your Full Name" required  pattern="[a-zA-Z][a-zA-Z ]{2,}">
                                                <div class="invalid-feedback">
                  * Valid  name is required.
                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                                <div class="invalid-feedback">
                  * Valid  Email is required.
                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Phone no</label>
                                <input type="tel" name="phoneno" class="form-control" placeholder="Enter your Phone no" required pattern="[0-9]{10}">
                                                <div class="invalid-feedback">
                  * Valid  Number is required.
                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Address</label>
                                <input type="text" name="add" class="form-control" placeholder="Enter your Address" required>
                                                <div class="invalid-feedback">
                  * Valid  address is required.
                </div>
                            </div>
                            <div class="form-group">
                    <label>Select Course</label>
                    <select  name="c_id"   class="form-control pass-input" required>
                    <option value="" selected hidden>Select Course</option>
                      <?php $stmt=$admin->ret("SELECT * FROM `course` ");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row['c_id'] ?>"><?php echo $row['c_name']?></option>
                    <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                  *Select Course is required.
                </div>
                  </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <div class="pass-group" id="passwordInput">
                                    <input type="password" name="password" class="form-control pass-input" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <div class="invalid-feedback">
                  * Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters
                </div>
                                    <span class="toggle-password feather-eye"></span>
                                    <span class="pass-checked"><i class="feather-check"></i></span>
                                </div>
                                <div class="password-strength" id="passwordStrength">
                                    <span id="poor"></span>
                                    <span id="weak"></span>
                                    <span id="strong"></span>
                                    <span id="heavy"></span>
                                </div>
                                <div id="passwordInfo"></div>
                            </div>
                           
                            <div class="d-grid">
                                <button class="btn btn-primary btn-start" type="submit" name="register">Create Account</button>
                            </div>
                        </form>
                    </div>

                    <p class="mb-0">Already have an account? <a href="login.php">Sign in</a></p>
                </div>
            </div>

        </div>
    </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/validation.js"></script>

    <script src="assets/js/script.js"></script>
    <script>
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByTagName('form')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 06:27:27 GMT -->

</html>