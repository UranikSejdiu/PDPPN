<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Kontakteve</title>
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
        <section class="htc__product__area bg__white ptb--30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-center" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center">Menaxhimi i Kontakteve</h4>
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
                                            <input class="search expandright searchKontakt" id="searchKontakt" type="text" name="p" placeholder="Kërko përdoruesin">
                                            <label class="button searchbutton" for="searchKontakt"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" id="addKon" data-toggle="modal" data-target="#addKontakt"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtKontakt" class="table " style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th data-orderable="false">Subjekti</th>
                                                <th data-orderable="false">Mesazhi</th>
                                                <th >Moduli</th>
                                                <th >Data e dërgimit</th>
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
        <?php include_once('footer.php'); ?>
    </div>
    <!-- End Login Register Area -->
    <!-- Start Footer Area -->
    
    <!-- End Footer Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->
    <div class="modal fade" id="addKontakt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto kontakt të ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_kontakt">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="subjekti">Subjekti:</label>
                            <input style="margin-top:0;" type="text" name="subjekti" id="subjekti">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="mesazhi">Mesazhi:</label>
                            <textarea style="width: 100%;" name="mesazhi" id="mesazhi"></textarea>
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
    <!-- Update Perdorues Modal Start -->
    <div class="modal fade" id="updateKontakt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho të dhënat e kontaktit</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_kontakt">
                        <input type="hidden" name="updateIdKon" id="updateIdKon" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uSubjekti">Subjekti:</label>
                            <input style="margin-top:0;" type="text" name="uSubjekti" id="uSubjekti">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uMesazhi">Mesazhi:</label>
                            <textarea style="width: 100%;" name="uMesazhi" id="uMesazhi"></textarea>
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
    <script src="scriptsKontakt.js"></script>

    <script>
        $('#addKontakt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
        });

        $('#updateKontakt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
        });
    </script>
</body>

</html>