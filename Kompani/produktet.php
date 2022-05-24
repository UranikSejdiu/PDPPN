<?php include('checkSession.php'); ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="iso-8859-15">
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
                                            <input class="search expandright searchProdukt" id="searchProdukt" type="text" name="p" placeholder="Kërko produktin">
                                            <label class="button searchbutton" for="searchProdukt"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addProdukt"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtProduktet" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Produkti</th>
                                                <th data-orderable="false">Imazhi 1</th>
                                                <th data-orderable="false">Imazhi 2</th>
                                                <th data-orderable="false">Imazhi 3</th>
                                                <th data-orderable="false">Imazhi 4</th>
                                                <th>Kategoria</th>
                                                <th data-orderable="false">Detajet e produktit</th>
                                                <th>Çmimi</th>
                                                <th data-orderable="false">Stoku</th>
                                                <th data-orderable="false">Madhesia</th>
                                                <th data-orderable="false">Ngjyra</th>
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
    <div class="modal fade" id="addProdukt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto produkt të ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_produkt" enctype='multipart/form-data'>
                        <div class="form-group">
                            <input type="hidden" name="kompania" id="kompania" value="<?php echo $id; ?>">
                            <label style="margin-bottom:0;" for="foto">Logoja:</label>
                            <input style="margin-top:0;border:none;" name="foto" id="foto" type="file">
                            <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                            <div id="image-holder"></div>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Emri i produktit:</label>
                            <input style="margin-top:0;" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="kat">Kategoria:</label>
                            <select name="kat" id="kat" required>
                                <option selected="selected" hidden>Zgjedh kategorinë: </option>
                                <?php
                                $res = mysqli_query($con, "CALL selKategorit()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    `<option value="<?php echo $row['kategoriaID']; ?>"><?php echo $row['kategoria']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="pershkrimi">Përshkrimi i produktit:</label>
                            <textarea rows="5" name="pershkrimi" id="pershkrimi"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="qmimi">Çmimi i produktit:</label>
                            <input style="margin-top:0;" type="number" min="1" step="any" name="qmimi" id="qmimi">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="stok">Stoku i produktit:</label>
                            <input style="margin-top:0;" type="number" min="1" name="stok" id="stok">
                        </div>
                        <div class="form-group" id="size">
                            <label style="margin-bottom:0;" for="lokacioni">Madhësia e produktit:</label>
                            <select name="madhesia" id="madhesia">
                            </select>
                        </div>
                        <div class="form-group" id="color">
                            <label style="margin-bottom:0;" for="lokacioni">Ngjyra e produktit:</label>
                            <select name="ngjyra" id="ngjyra">
                            </select>
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

    <div class="modal fade" id="updateProdukt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
    <script src="scriptsProduktet.js"></script>
    <script>
        $('#addProdukt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#size').show();
            $('#color').show();
        });

        $('#updateProdukt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            
        });
    </script>
</body>

</html>