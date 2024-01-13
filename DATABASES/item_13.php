<?php
declare(strict_types = 1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITEM 13 DETAILS</title>
</head>
<body>
<style>
    h1{
    font-size: 40px;
    }
    p{
    font-size: 20px;
    }
    .box {
    padding: 5px;
    font-size:14pt;
    border: 5px solid green;
    height: 170px;
    width: 500px;
    }
    input[type=number] {
    font-size:14pt;
     height:40px;
     width:200px;
    }
    input[type=submit] {
    width: 17%;
    background-color: #4CAF50;
    color: black;
    padding: 6px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>   
<form>
     <!-- Javascript to go back to last page in history? Else use image with link? -->
    <input type="button" value="BACK TO STOREFRONT" onclick="history.back()">
</form> 
    <h2><u>PET SHAMPOO</u></h1>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShJWNK4Kd5YkKqQgyqQprgTR_d4RLJqEWKiA&usqp=CAU" style="width:600px;height:500px"/>
    <p><b>NATURAL DOG SHAMPOO</b></p> 
    <div class="box">Our PET SHOP 2-in-1 Shampoo & Conditioner is luxurious and pH balanced for all dogs.
         It helps remove debris and restores shine and softness to your dog's coat and skin. 
         Add this to your cart to to help your dog look and feel their best.  
    <p><b> - 1 32OZ BOTTLE</b></p>
    <p><b> - $7.99 </b></p>
    </div>
<form action="Storefront.php" method="POST" target="dummyframe" >
<br/>
<div class="qty-button" id="decrease" onclick="decreaseValue()" value="Decrease"><mark><b>SELECT QUANTITY (PLENTY IN STOCK!)</b></mark></div>
  <input id="box" type="number" name="ProdQty" value="1" min="1" max="50" />
  <div class="qty-button" id="increase" onclick="increaseValue()" value="Increase"></div>
<p>
    <input type="hidden" name="ProdID" value="Pr013">
    <input type="submit" value="ADD TO CART">
</p>
</form>
<!-- ADD ACTION HERE to go to cart -->    
<form action="ShoppingCart.php" method="GET">
    <input type="submit" value="GO TO CART">
</form>

</body>
</html>
