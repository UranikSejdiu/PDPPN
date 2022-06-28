<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Kategorive</title>
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
                                            <h4 class="text-center">Menaxhimi i madhësive të kategorive</h4>
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
                                            <input class="search expandright searchMadhesi" id="searchMadhesi" type="text" name="p" placeholder="Kërko kategorin">
                                            <label class="button searchbutton" for="searchMadhesi"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addMadhesi"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtMadhesit" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Kategoria</th>
                                                <th>Madhesia</th>
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

        <!-- End Login Register Area -->
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
    </div>
    <!-- End Footer Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->
    <div class="modal fade" id="addMadhesi" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto kategorin e re</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_madhesi">
                        <div class="form-group">
                            <select name="kat" id="kat" required>
                                <option selected="selected" hidden>Zgjedh kategorinë: </option>
                                <?php
                                $res = mysqli_query($con1, "CALL selKategorit()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['kategoriaID']; ?>"><?php echo $row['kategoria']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="madhesia">Madhesia:</label>
                            <input style="margin-top:0;" type="text" name="madhesia" id="madhesia">
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

    <div class="modal fade" id="editMadhesi" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndrysho të dhënat e administratorëve</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_madhesi">
                        <input type="hidden" name="updateIdMadh" id="updateIdMadh" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <select name="uKat" id="uKat" required>
                                <option selected="selected" hidden>Zgjedh kategorinë: </option>
                                <?php
                                $res = mysqli_query($con, "CALL selKategorit()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['kategoriaID']; ?>"><?php echo $row['kategoria']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uMadhesia">Madhesia:</label>
                            <input style="margin-top:0;" type="text" name="uMadhesia" id="uMadhesia">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Ruaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php include_once('scripts.php'); ?>
    <script src="scriptsMadhesit.js"></script>
</body>

</html>