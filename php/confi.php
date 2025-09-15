<?php

    define("CLIENT_ID", "ActaIP8mQobIc-p4RCEYMrIbTQFfq_5zW3zf0RXUMW_puFkG4YIyQIKZHpaA-Bse2r4IwI54FWkefSCd");
    define("CURRENCY", "MXN");
 
    define("KEY_TOKEN", "GABCY.web-AFNV");
    define("MONEDA", "$");

  $num_cart = 0;
  if(isset($_SESSION['carrito']['productos'])){
    $num_cart = array_sum($_SESSION['carrito']['productos']);
  }

?>