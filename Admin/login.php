<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->

            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->

        <!-- End Offset Wrapper -->
        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat center center / cover ;height:100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu">
                            <li role="presentation" class="register"><a style="pointer-events: none;">Login</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="alert alert-success alert-dismissible" style="display: none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="success-message"></span>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->

                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form id="loginForm" class="login" method="post">
                                    <input type="text" name="email" id="email" placeholder="Email*">
                                    <input type="password" name="password" id="password" placeholder="Password*">
                                    <div class="htc__login__btn">
                                        <button type="submit" class="regBtn" id="sendOtp">Login</button>
                                    </div>
                                </form>
                                <div class="tabs__checkbox">
                                    <span class="forget"><a href="#">Forget Pasword?</a></span>
                                </div>
                            </div>

                            <form id="otpForm" style="display:none;">
                                <div class="form-group">
                                    <label for="mobile">Verify:</label>
                                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP" required="" id="otp">
                                    <span class="otp-message" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" id="verifyOtp">Verify OTP</button>
                                </div>
                            </form>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2017 <a href="https://freethemescloud.com/">Free themes Cloud</a>
                                        All Right Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->
    
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Send OTP email jquery
            $("#sendOtp").on("click", function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                $.ajax({
                    url: "send_otp.php",
                    type: "POST",
                    cache: false,
                    data: {
                        email: email,
                        password:password
                    },
                    success: function(result) {
                        if (result == "yes") {
                            $("#loginForm").hide();
                            console.log('here');
                        }
                        if (result == "no") {
                            $(".error-message").html("Please enter valid email");
                        }
                    }
                });
            });

            // Verify OTP email jquery
            $("#verifyOtp").on("click", function(e) {
                e.preventDefault();
                var otp = $("#otp").val();
                $.ajax({
                    url: "verify_otp.php",
                    type: "POST",
                    cache: false,
                    data: {
                        otp: otp
                    },
                    success: function(response) {
                        if (response == "yes") {
                            window.location.href = 'dashboard.php';
                        }
                        if (response == "no") {
                            $(".otp-message").html("Please enter valid OTP");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>