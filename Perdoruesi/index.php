<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Faqja kryesore</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
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
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Feature Product -->
        <section class="htc__feature__product pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
                        <div class="feature foo">
                            <div class="feature__thumb">
                                <a href="product-details.html">
                                    <img src="images/feature-img/1.jpg" alt="feature product">
                                </a>
                            </div>
                            <div class="feature__details">
                                <h4><a href="product-details.html">New Products</a></h4>
                                <div class="feature__btn">
                                    <a class="htc__btn shop__now__btn" href="cart.html">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Left Feature -->
                    <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 xmt-30">
                                <div class="feature foo">
                                    <div class="feature__thumb">
                                        <a href="product-details.html">
                                            <img src="images/feature-img/2.jpg" alt="feature product">
                                        </a>
                                    </div>
                                    <div class="feature__details">
                                        <h4><a href="product-details.html">Latest Lamp</a></h4>
                                        <div class="feature__btn">
                                            <a class="htc__btn shop__now__btn" href="cart.html">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mt--30 hidden-sm hidden-xs">
                                <div class="feature text__pos--top foo">
                                    <div class="feature__thumb--2">
                                        <a href="product-details.html">
                                            <img src="images/feature-img/3.jpg" alt="feature product">
                                        </a>
                                    </div>
                                    <div class="feature__details">
                                        <h4><a href="product-details.html">Bag Collection</a></h4>
                                        <div class="feature__btn">
                                            <a class="htc__btn shop__now__btn" href="cart.html">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 mt--30 col-sm-12 col-xs-12 xmt-30">
                                <div class="feature foo">
                                    <div class="feature__thumb">
                                        <a href="product-details.html">
                                            <img src="images/feature-img/4.jpg" alt="feature product">
                                        </a>
                                    </div>
                                    <div class="feature__details">
                                        <h4><a href="product-details.html">New Clock</a></h4>
                                        <div class="feature__btn">
                                            <a class="htc__btn shop__now__btn" href="cart.html">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Feature Product -->
        <!-- Start Popular Courses -->
        <section class="htc__popular__product pb--130 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Popular Products</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="popular__product__wrap clearfix owl-carousel owl-theme another-product-style">
                        <!-- Start Single Popular Product -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="images/popular-pro/1.jpg" alt="product images">
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
                                    <span class="popular__pro__prize">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Popular Product -->
                        <!-- Start Single Popular Product -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="images/popular-pro/2.jpg" alt="product images">
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
                                    <span class="popular__pro__prize">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Popular Product -->
                        <!-- Start Single Popular Product -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="images/popular-pro/3.jpg" alt="product images">
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
                                    <span class="popular__pro__prize">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Popular Product -->
                        <!-- Start Single Popular Product -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="images/popular-pro/1.jpg" alt="product images">
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
                                    <span class="popular__pro__prize">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Popular Product -->
                        <!-- Start Single Popular Product -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                        <a href="#">
                                            <img src="images/popular-pro/2.jpg" alt="product images">
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
                                    <span class="popular__pro__prize">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Popular Product -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Popular Courses -->
        <!-- Start Blog Area -->
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Latest News</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/1.jpg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/2.jpg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/3.jpg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>

</body>

</html>