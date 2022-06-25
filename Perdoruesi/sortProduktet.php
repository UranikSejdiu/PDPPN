<?php

    include_once 'config.php';

    if (isset($_POST['action'])) {
        $sql = "SELECT * FROM produktet ";
        if (isset($_POST['kategoria'])) {
            $kategoria = $_POST['kategoria'];
            $sql .=" WHERE kategoriaID =$kategoria ";
            $sql .=" AND stoku > 0";
        }

        $result = $con->query($sql);
        $output = '';
        if (!empty($result) && $result->num_rows > 0) {
           while($row=$result->fetch_assoc()){
               $output .= '<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 hvr-grow">
               <div class="product" style="border:1px solid #b7b7b7;padding-bottom:10px;">
                   <div class="product__inner">
                       <div class="pro__thumb">
                           <a href="detajeProduktit.php?produktID='.$row['produktID'].'">
                              <img style="object-fit: cover;" width="100" height="150" src="'.$row['imazhi1'].'" alt="product images"></a>
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
            $output = '<h3 class="title__line text-center">Nuk u gjend asnjë produkt!</h3>';
        }
    }
    echo $output;
