<?php
include_once('checkSession.php');
$_SESSION['location'] = $_SERVER['REQUEST_URI'];
?>
<?php
if (isset($_POST['blej'])) {
    $sasia = $_POST['sasia'];
    $produktID =  $_POST['produktID'];

    $sql = "SELECT  produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, produktet.pershkrimi, produktet.qmimi, produktet.stoku, madhesit.madhesia, ngjyrat.ngjyra, produktet.kompaniaID FROM produktet
    LEFT OUTER JOIN madhesit ON produktet.madhesiaID=madhesit.madhesiaID 
    LEFT OUTER JOIN ngjyrat ON produktet.ngjyraID=ngjyrat.ngjyraID
    WHERE  produktet.produktID=$produktID";

    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $produkti = $row['produkti'];
        $foto1 = $row['imazhi1'];
        $foto2 = $row['imazhi2'];
        $foto3 = $row['imazhi3'];
        $foto4 = $row['imazhi4'];
        $pershkrimi = $row['pershkrimi'];
        $qmimi = $row['qmimi'];
        $stoku = $row['stoku'];
        $madhesia = $row['madhesia'];
        $ngjyra = $row['ngjyra'];
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Blerja e produktit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <?php echo $sasia;
        echo $produktID; ?>
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
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Të dhënat tuaja</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Emri">
                                        <input type="email" placeholder="Email-i">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="text" name="tel" id="tel" placeholder="Nr. telefonit">
                                        <input type="email" placeholder="Shteti" disabled value="Kosovë">
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                        <select>
                                            <option>Qyteti</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                        </select>
                                        <input type="text" placeholder="Kodi postar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5">
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Mesazhi juaj"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Box -->
                            <div class="payment-form">
                                <h2 class="section-title-3">Mënyra e pagesës</h2>
                                <p>Mënyra tjera të pagesës do shtohen më vonë</p>

                                <div class="single-checkout-box checkbox">
                                    <input type="text" name="pagesa" id="pagesa" disabled value="Pagesa me para në dorë">

                                </div>
                            </div>
                            <!-- End Payment Box -->
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <div class="our-important-note">
                                    <h2 class="section-title-3"><?php echo $produkti; ?></h2>
                                    <p class="note-desc">
                                        <?php echo  '<img width="250" height="250" style="object-fit: cover;" src="' . $foto1 . '" alt="product images"></a>';
                                        ?>
                                    </p>
                                    <ul class="important-note">
                                        <ul class="product__price">
                                            <li class="new__price">Madhesia: <?php echo $madhesia; ?></li>
                                        </ul>
                                        <ul class="product__price">
                                            <li class="new__price">Ngjyra: <?php echo $ngjyra; ?></li>
                                        </ul>
                                        <ul class="product__price">
                                            <li class="new__price">Çmimi: <?php echo $qmimi; ?>€</li>
                                        </ul>
                                        <ul class="product__price">
                                            <li class="new__price">Sasia: <?php echo $sasia; ?></li>
                                        </ul>
                                        <ul class="product__price">
                                            <?php
                                            $total= $sasia * $qmimi;
                                            echo '<li class="new__price">Totali: ' . $total . '</li>'

                                            ?>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- End Checkout Area -->
    <!-- Start Footer Area -->
    <?php include_once('footer.php'); ?>
    <!-- End Footer Area -->
    </div>
    <?php include_once('scripts.php'); ?>
    <script>
        $(":input").inputmask();
        $("#tel").inputmask({
            "mask": "(+383)49/999-999"
        });
    </script>
</body>

</html>