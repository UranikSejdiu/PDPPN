<?php include_once('checkSession.php'); ?>
<?php include_once('checkSession.php'); ?>
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
                                <h4 class="section-title-4">FILTER BY PRICE</h4>
                                <div class="content-shopby">
                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">
                                                    <div class="price--output">
                                                        <span>Price :</span><input type="text" id="amount" readonly>
                                                    </div>
                                                    <div class="price--filter">
                                                        <a href="#">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Range -->
                            <!-- Start Product Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">PRODUCT CATEGORIES</h4>
                                <ul class="sidebar__list">
                                    <li><a href="#">Accessories <span>3</span></a></li>
                                    <li><a href="#">Book <span>4</span></a></li>
                                    <li><a href="#">Clothing <span>3</span></a></li>
                                    <li><a href="#">Homelife <span>6</span></a></li>
                                    <li><a href="#">Kids & Baby <span>10</span></a></li>
                                    <li><a href="#">Stationery <span>3</span></a></li>
                                    <li><a href="#">Health & Beauty <span>12</span></a></li>
                                    <li><a href="#">Home Appliances <span>15</span></a></li>
                                </ul>
                            </div>
                            <!-- End Product Cat -->
                            <!-- Start Color Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">CHOOSE COLOUR</h4>
                                <ul class="sidebar__list">
                                    <li class="black"><a href="#"><i class="zmdi zmdi-circle"></i>Black<span>3</span></a></li>
                                    <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i>Blue <span>4</span></a></li>
                                    <li class="brown"><a href="#"><i class="zmdi zmdi-circle"></i>Brown <span>3</span></a></li>
                                    <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i>Red <span>6</span></a></li>
                                    <li class="orange"><a href="#"><i class="zmdi zmdi-circle"></i>Orange <span>10</span></a></li>
                                </ul>
                            </div>
                            <!-- End Color Cat -->
                            <!-- Start Size Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">PRODUCT CATEGORIES</h4>
                                <ul class="sidebar__list">
                                    <li><a href="#">xl <span>3</span></a></li>
                                    <li><a href="#">l <span>4</span></a></li>
                                    <li><a href="#">lm <span>3</span></a></li>
                                    <li><a href="#">ml <span>6</span></a></li>
                                    <li><a href="#">m <span>10</span></a></li>
                                    <li><a href="#">ml <span>3</span></a></li>
                                </ul>
                            </div>
                            <!-- End Size Cat -->
                            <!-- Start Tag Area -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">Tags</h4>
                                <ul class="htc__tags">
                                    <li><a href="#">All</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Kids</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Stationery</a></li>
                                    <li><a href="#">Homelife</a></li>
                                    <li><a href="#">Appliances</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Baby</a></li>
                                    <li><a href="#">Beauty</a></li>
                                </ul>
                            </div>
                            <!-- End Tag Area -->
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-30">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="producy__view__container">
                                    <!-- Start Short Form -->
                                    <div class="product__list__option">
                                        <div class="order-single-btn">
                                            <select class="select-color selectpicker">
                                                <option>Sort by newness</option>
                                                <option>Match</option>
                                                <option>Updated</option>
                                                <option>Title</option>
                                                <option>Category</option>
                                                <option>Rating</option>
                                            </select>
                                        </div>
                                        <div class="shp__pro__show">
                                            <span>Showing 1 - 4 of 25 results</span>
                                        </div>
                                    </div>
                                    <!-- End Short Form -->
                                    <!-- Start List And Grid View -->
                                    <ul class="view__mode" role="tablist">
                                        <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                        <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                    </ul>
                                    <!-- End List And Grid View -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="shop__grid__view__wrap another-product-style">
                                <!-- Start Single View -->
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <!-- Start Single Product -->
                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/1.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add To Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <!-- End Single View -->
                                <!-- Start Single View -->
                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                    <!-- Start List Content-->
                                    <div class="single__list__content clearfix">
                                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="list__thumb">
                                                <a href="product-details.html">
                                                    <img src="images/product/1.png" alt="list images">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
                                            <div class="list__details__inner">
                                                <h2><a href="product-details.html">Ninja Silhouette</a></h2>
                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet…</p>
                                                <span class="product__price">$15.00</span>
                                                <div class="shop__btn">
                                                    <a class="htc__btn" href="cart.html"><span class="ti-shopping-cart"></span>Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End List Content-->
                                </div>
                                <!-- End Single View -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <!-- QUICKVIEW PRODUCT -->
 <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="yellow"><a title="Black" href="#">Black</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->




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

    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>
</body>

</html>