<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>
    <!---
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> -->

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
                            <li role="presentation" class="register"><a style="pointer-events: none;">Register</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->

                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="register" class="single__tabs__panel">
                                <form class="login" id="submitForm" method="post">
                                    <input type="text" name="name" placeholder="Name*">
                                    <input type="email" name="email" placeholder="Email*">
                                    <input type="password" name="password" placeholder="Password*">
                                    <div class="htc__login__btn">
                                        <button type="submit" class="regBtn">register</button>
                                    </div>
                                </form>
                            </div>
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
    <?php include_once('scripts.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#submitForm").on("submit", function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "signup.php",
                    type: "POST",
                    cache: false,
                    data: formData,
                    success: function(result) {
                        if (result == "yes") {
                            alert("Registration sucessfully Please login");
                            window.location = 'login.php';
                        } else {
                            alert("Registration failed try again!");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>