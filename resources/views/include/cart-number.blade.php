<?php
  if (session('cart.shopping_cart')) {
    $count = count(session('cart.shopping_cart'));
  }else{
    $count = 0;
  }
?>

<span class="cart-num">CART (<span class="cart-num">{{$count}}</span>)</span>