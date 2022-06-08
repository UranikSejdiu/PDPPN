<?php

    include_once 'config.php';

    if (isset($_POST['action'])) {
        $sql = "SELECT * FROM produktet ";
        if (isset($_POST['kategoria'])) {
            $kategoria = $_POST['kategoria'];
            $sql .=" WHERE kategoriaID =$kategoria";
        }

        $result = $con->query($sql);
        $output = '';
        if (!empty($result) && $result->num_rows > 0) {
           while($row=$result->fetch_assoc()){
               $output .= '<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
               <div class="product">
                   <div class="product__inner">
                       <div class="pro__thumb">
                           <a href="detajeProduktit.php?produktID='.$row['produktID'].'">
                              <img style="object-fit: cover;" width="100" height="150" src="'.$row['imazhi1'].'" alt="product images"></a>
                       </div>
                       <div class="product__hover__info">
                           <ul class="product__action" id="produkti">
                               <li><a title="Dërgo në shport" href="#"><span class="ti-shopping-cart"></span></a></li>
                               <li><a title="Ruaj" href="#"><span class="ti-heart"></span></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="product__details">
                      <h2><a href="detajeProduktit.php?produktID='.$row['produktID'].'">'.$row['produkti'].'</a></h2>
                      <ul class="product__price">
                           <li class="new__price">'.$row['qmimi'].'</li>
                       </ul>
                   </div>
               </div>
           </div>';
           }
        }else{
            $output = "<h3>Nuk u gjend asnjë produkt!</h3>";
        }
    }
    echo $output;
