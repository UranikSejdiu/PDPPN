<?php include('checkSession.php'); ?>

<?php if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM kompanite WHERE id=$id";
    $query = mysqli_query($con, $sql);
    while ($row = $query->fetch_assoc()) {
        $id= $row['id'];
        $logo = $row['logo'];
        $name = $row['name'];
        $nrfiskal = $row['nrfiskal'];
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
                                            <h4 class="text-center">Të dhënat e kompanisë</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="alerts"></div>
                            <br>
                            <section id="sectionProfili" class="our-checkout-area bg__white" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-10 col-md-offset-1">
                                            <div class="ckeckout-left-sidebar">
                                                <form class="login" action="manageProfili.php" method="POST" enctype='multipart/form-data' style="margin-top:2%;">
                                                    <input type="hidden" name="updateIdKomp" id="updateIdKomp" value="<?php echo $id; ?>">
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updateLogo">Logoja:</label>
                                                        <input style="margin-top:0;border:none;" name="updateLogo" id="updateLogo" type="file">
                                                        <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                                                        <div id="image-holderUP">
                                                            <img width="100" height="100" id="logoUp" src="<?php echo $logo; ?>" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updateName">Emri kompanisë:</label>
                                                        <input style="margin-top:0;" type="text" name="updateName" id="updateName" value="<?php echo $name; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updateEmail">Email adresa:</label>
                                                        <input style="margin-top:0;" type="email" name="updateEmail" id="updateEmail" value="<?php echo $email; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updateFiskal">Numri Fiskal:</label>
                                                        <input style="margin-top:0;" type="number" name="updateFiskal" id="updateFiskal" value="<?php echo $nrfiskal; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updatePhone">Numri telefonit:</label>
                                                        <input style="margin-top:0;" type="tel" name="updatePhone" id="updatePhone" value="<?php echo $telefoni; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom:0;" for="updateLokacioni">Lokacioni</label>
                                                        <input class="updateLokacioni" style="margin-top:0;" name="updateLokacioni" id="updateLokacioni" type="text" value="<?php echo $lokacioni; ?>" autofocus><br>
                                                        <div id="mapContainerUpdate"></div>
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button type="submit" value="ruaj" name="ruaj" class="btn btn-success">Ruaj</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="single-checkout-box" style="padding:1%;margin-top:2%;box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                                Për të përditsuar fjalëkalimin kliko <a href="new-password.php"></i><strong> KËTU!</strong></a>
                            </div>
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
        $('.updateLokacioni').leafletLocationPicker({
            alwaysOpen: true,
            height: 300,
            width: 250,
            cursorSize: '15px',
            mapContainer: "#mapContainerUpdate"
        });
    </script>
</body>

</html>