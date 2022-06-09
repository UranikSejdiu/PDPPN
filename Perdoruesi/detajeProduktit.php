<?php include_once('checkSession.php'); ?>

<?php
if (isset($_GET['produktID'])) {
    $produktID = $_GET['produktID'];
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Detajet e produktit</title>
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
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        <div class="body__overlay"></div>
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
        <div id="alerts"></div>
            <div class="container" style="margin-top:2%;">
                <div class="row">
                
                <input type="hidden" name="prodID" id="prodID" value="<?php echo $produktID; ?>">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-1" role="tab" data-toggle="tab">
                                        <img id="foto1" style="object-fit:cover;" width="120" height="140" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-2" role="tab" data-toggle="tab">
                                        <img id="foto2" style="object-fit:cover;" width="120" height="140" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img hidden-xs">
                                    <a href="#img-tab-3" role="tab" data-toggle="tab">
                                        <img id="foto3" style="object-fit:cover;" width="120" height="140" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img hidden-xs hidden-sm">
                                    <a href="#img-tab-4" role="tab" data-toggle="tab">
                                        <img id="foto4" style="object-fit:cover;" width="120" height="140" alt="small-image">
                                    </a>
                                </li>
                            </ul>
                            <!-- End Small images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                        <img id="foto5" width="440" height="590" style="object-fit: cover;" alt="full-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2 id="produktTitulli"></h2>
                            </div>
                            <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Nga totali)</span>
                            </div>
                            <div class="pro__details">
                                <p id="pershkrimi"></p>
                            </div>
                            <ul class="pro__dtl__prize">
                                <li id="qmimi"></li>
                            </ul>
                            <div class="pro__dtl__color">
                                <h2 class="title__5">Ngjyra</h2>
                                <ul class="pro__choose__color">
                                    <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                </ul>
                            </div>
                            <div class="pro__dtl__size">
                                <h2 class="title__5">Madhësia</h2>
                                <ul class="pro__choose__size">
                                    <li><a href="#">xl</a></li>
                                </ul>
                            </div>
                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>Sasia :</span></div>
                                <div class="product-quantity">
                                    <form id='myform' method='POST' action='#'>
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="00">
                                                <input type="hidden" name="produktID" id="produktID">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn"><a href="#">Blej</a></li>
                                <li><a href="#"><span class="ti-heart"></span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
        
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--30">
                            <li role="presentation" class="active">
                                <a href="#reviews">Vlerësimet</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <button type="button" name="add_review" id="add_review" class="">Vlerso</button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div class="review__address__inner" id="review_content">
                                <!-- Start Single Review -->
                                <div class="pro__review">
                                    <div class="review__thumb">
                                        <img src="images/review/1.jpg" alt="review images">
                                    </div>
                                    <div class="review__details">
                                        <div class="review__info">
                                            <h4>Gerald Barnes</h4>
                                            <ul class="rating">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star-half"></i></li>
                                                <li><i class="zmdi zmdi-star-half"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review__date">
                                            <span>27 Jun, 2016 at 2:30pm</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product tab -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2017 <a href="#">your website name</a>
                                        All Right Reserved.</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
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
    <div id="review-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jepni vlerësimin tuaj</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                    <div class="modal-body">
                        <h2 class="text-center mt-2 mb-4" style="margin-bottom:5%;">
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                        </h2>
                        <div class="form-group">
                            <input type="text" name="userName" id="userName" placeholder="Shkruaj emrin tuaj">
                        </div>
                        <div class="form-group">
                            <textarea name="userReview" id="userReview" placeholder="Jepni vlerësimin"></textarea>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="prodID" id="prodID" value="<?php $produktID ?>">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info" id="save_review">Dërgo vlerësimin</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>
    <script src="scriptsProduktet.js"></script>
</body>

</html>