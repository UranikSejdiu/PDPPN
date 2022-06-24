<?php include_once('checkSession.php');

$_SESSION['location']= $_SERVER['REQUEST_URI'];

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Produktet</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('links.php'); ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
                <input type="hidden" id="hiddenEmail" value="<?php $email ?>"></input>
            </div>
            <!-- End Mainmenu Area -->
        </header>

        <div class="body__overlay"></div>
        <section class="htc__shop__sidebar bg__white ptb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="htc__shop__left__sidebar">
                            <!-- Start Range -->
                            <div class="htc-grid-range">
                                <div class="content-shopby">
                                </div>
                            </div>
                            <!-- End Range -->
                            <!-- Kategorit checkboxes -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">Kategorit</h4>
                                <?php
                                $sql = "SELECT * FROM kategoria WHERE kategoriaID > '0' ORDER BY kategoriaID";
                                $result = $con->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <ul class="sidebar__list">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $row['kategoriaID']; ?>" id="kategoria">
                                        <?= $row['kategoria']; ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <!-- End Kategorit checkboxes -->
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-30">
                        
                        <div class="row" id="result">
                            <div class="shop__grid__view__wrap another-product-style">
                                <!-- Start Single View -->
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <!-- Start Single Product -->
                                    <?php
                                    $sql = "SELECT * FROM produktet WHERE stoku > 0";
                                    $result = $con->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 hvr-grow">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <?php echo '<a href="detajeProduktit.php?produktID=' . $row['produktID'] . '">';
                                                        echo  '<img style="object-fit: cover;" width="100" height="150" src="' . $row['imazhi1'] . '" alt="product images"></a>';
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <?php echo '<h2><a href="detajeProduktit.php?produktID=' . $row['produktID'] . '">' . $row['produkti'] . '</a></h2>'; ?>
                                                    <ul class="product__price">
                                                        <li class="new__price"><?= $row['qmimi']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php    } ?>
                                    <!-- End Single Product -->
                                </div>
                                <!-- End Single View -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Start Footer Area -->
        
        <!-- End Footer Area -->
    </div>
    <?php include_once('footer.php'); ?>

    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".product_check").click(function() {
                var action = 'data';
                var kategoria = get_filter_text('kategoria');
                $.ajax({
                    url: 'sortProduktet.php',
                    method: 'POST',
                    data: {
                        action: action,
                        kategoria: kategoria
                    },
                    success: function(response) {
                        $("#grid-view").html(response);

                    }
                });
            });

            function get_filter_text(text_id) {
                var filterData;
                $('#' + text_id + ':checked').each(function() {
                    filterData = $(this).val();
                });
                return filterData;
            }

        });
    </script>
</body>

</html>