<?php include('checkSession.php'); ?>

<?php if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM kompanite WHERE id=$id";
    $query = mysqli_query($con, $sql);
    while ($row = $query->fetch_assoc()) {
        $logo = $row['logo'];
        $name = $row['name'];
        $nrFiskal = $row['nrfiskal'];
        $lokacioni = $row['lokacioni'];
        $telefoni = $row['telefoni'];
        $email = $row['email'];
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Profili</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('links.php'); ?>
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
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Login Register Content -->
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-center" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center">Të dhënat e kompanisë </h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="alerts"></div>
                            <br>
                            <section class="our-checkout-area bg__white">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-10 col-md-offset-1">

                                            <div class="ckeckout-left-sidebar">
                                                <form class="checkout-form">
                                                    <div class="checkout-form-inner">
                                                        <div class="single-checkout-box" style="margin:2% 0 ;">
                                                            <img id="logo" class="img-circle img-responsive center-block" width="200" height="200" src="<?php echo $logo; ?>" alt="" style="object-fit: cover;">
                                                        </div>
                                                        <div class="single-checkout-box">
                                                            <input disabled id="name" type="text" id="name" value="<?php echo $name; ?>">
                                                            <input disabled id="nrfiskal" type="text" value="<?php echo $nrFiskal; ?>">
                                                        </div>
                                                        <div class="single-checkout-box">
                                                            <input disabled id="phone" value="<?php echo $telefoni; ?>" type="email">
                                                            <input disabled id="email" value="<?php echo $email; ?>" type="text">
                                                        </div>
                                                        <div class="single-checkout-box">

                                                        </div>
                                                        <div class="single-checkout-box" style="border-bottom:1px solid #8e8e8e ;">
                                                            <?php echo '<div style="width: 100%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$lokacioni.'+&amp;t=k&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>'; ?>
                                                        </div>
                                                        <div class="single-checkout-box" style="margin-top:1%;">
                                                            <a href="new-password.php" ><i class="ti-pencil"></i> Përditso fjalëkalimin</a>
                                                            <button style="float: right;"><i class="ti-pencil"></i> Përditso te dhënat</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->


    </div>
    <?php include_once('scripts.php'); ?>
    <?php include_once('scriptsProfili.js'); ?>
    <script>
        $('#editAdmin').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanUpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updatePassword').get(0).type = 'password';

            $('#spanUcpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updateCpassword').get(0).type = 'password';
        });
        $('#updatePassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#updateCpassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
    </script>
</body>

</html>