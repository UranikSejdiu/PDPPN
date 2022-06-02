<div class="container">
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo/logo.png" alt="logo">
                </a>
            </div>
        </div>
        <!-- Start MAinmenu Ares -->
        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
            <nav class="mainmenu__nav hidden-xs hidden-sm">
                <ul class="main__menu">
                    <li><a href="index.php">Kryefaçja</a></li>
                    <li><a href="produktet.php">Produktet</a></li>
                    <li><a href="kontakto.php">Kontakti</a></li>
                </ul>

            </nav>
            <div class="mobile-menu clearfix visible-xs visible-sm">
                <nav id="mobile_dropdown">
                    <ul>
                        <li><a href="index.php">Kryefaçja</a></li>
                        <li><a href="produkt.php">Produktet</a></li>
                        <li><a href="kontakt.php">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End MAinmenu Ares -->
        <div class="col-md-2 col-sm-4 col-xs-3">
            <ul class="menu-extra">
                <?php echo '<li><a href="profile.php?ID='.$id.'"><span aria-label="Profili" data-cooltipz-dir="bottom"><i class="ti-user"></i></span></a></li>'; ?>
                <li><a href="logout-user.php"><span aria-label="Çkyçu" data-cooltipz-dir="bottom"><i class="ti-unlink"></i></span></a></li>
            </ul>
        </div>
    </div>
    <div class="mobile-menu-area"></div>
</div>