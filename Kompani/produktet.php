<?php include('checkSession.php'); ?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i produkteve</title>
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
                                            <h4 class="text-center">Menaxhimi i produkteve</h4>
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
                                            <input class="search expandright searchAdmin" id="searchAdmin" type="text" name="p" placeholder="Kërko administratorin">
                                            <label class="button searchbutton" for="searchAdmin"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addAdmin"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtAdmin" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Imazhet</th>
                                                <th>Produkti</th>
                                                <th data-orderable="false">Detajet e produktit</th>
                                                <th>Kategoria</th>
                                                <th>Sasia</th>
                                                <th>Çmimi</th>
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


    </div>
    <?php include_once('scripts.php'); ?>
    <script src="scriptsProduktet.js"></script>
    
</body>

</html>