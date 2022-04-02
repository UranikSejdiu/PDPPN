<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Përdoruesve</title>
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
                                            <h4 class="text-center">Menaxhimi i Përdoruesve</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="alerts"></div>
                            <br>
                            <div class="tab-content another-product-style jump">
                                <div class="btn-search mt-5">
                                    <div class="search-container">
                                        <form action="/search" method="get">
                                            <input class="search expandright searchPerdorues" id="searchPerdorues" type="text" name="p" placeholder="Kërko përdoruesin">
                                            <label class="button searchbutton" for="searchPerdorues"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addPerdorues"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtPerdorues" class="table " style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Emri dhe Mbiemri</th>
                                                <th>Qyteti</th>
                                                <th data-orderable="false">Adresa</th>
                                                <th data-orderable="false">Telefoni</th>
                                                <th data-orderable="false">Email-i</th>
                                                <th data-orderable="false">Fjalëkalimi</th>
                                                <th data-orderable="false">Statusi</th>
                                                <th data-orderable="false">Modifiko</th>
                                                <th data-orderable="false">Fshi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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
    <div class="modal fade" id="addPerdorues" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto perdorues të ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_perdorues">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Emri dhe Mbiemri:</label>
                            <input style="margin-top:0;" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="city">Qyteti:</label>
                            <input style="margin-top:0;" type="text" name="city" id="city">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="adress">Adresa:</label>
                            <input style="margin-top:0;" type="text" name="adress" id="adress">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                            <input style="margin-top:0;" type="tel" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="email">Email adresa:</label>
                            <input style="margin-top:0;" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="password">Fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="password" id="password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" id="spanPass"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Shto</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePerdorues" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho të dhënat e kompanisë</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_kompani" enctype='multipart/form-data'>
                        <input type="hidden" name="updateIdKomp" id="updateIdKomp" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateLogo">Logoja:</label>
                            <input style="margin-top:0;border:none;" name="updateLogo" id="updateLogo" type="file">
                            <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                            <div id="image-holderUP">
                                <img width="100" height="100" id="logoUp" src="" alt="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateName">Emri kompanisë:</label>
                            <input style="margin-top:0;" type="text" name="updateName" id="updateName">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateEmail">Email adresa:</label>
                            <input style="margin-top:0;" type="email" name="updateEmail" id="updateEmail">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updatePassword">Fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="updatePassword" id="updatePassword">
                            <span toggle="#updatePassword" class="fa fa-fw fa-eye field-icon toggle-password" id="spanUpass"></span>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateFiskal">Numri Fiskal:</label>
                            <input style="margin-top:0;" type="number" name="updateFiskal" id="updateFiskal" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updatePhone">Numri telefonit:</label>
                            <input style="margin-top:0;" type="tel" name="updatePhone" id="updatePhone">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateLokacioni">Lokacioni</label>
                            <input class="updateLokacioni" style="margin-top:0;" name="updateLokacioni" id="updateLokacioni" type="text"><br>
                            <div id="mapContainerUpdate"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Ndrysho</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php include_once('scripts.php'); ?>
    <script src="perdoruesScripts.js"></script>
   
    <script>
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
        $("#updatePhone").inputmask({
            "mask": "(+383)49/999-999"
        });

        $('#addPerdorues').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanPass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#password').get(0).type = 'password';
        });

        $('#updatePerdorues').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanUpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updatePassword').get(0).type = 'password';
        });
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#updatePassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
    </script>
</body>

</html>