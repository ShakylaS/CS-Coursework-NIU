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
    <title>ITEM 4 DETAILS</title>
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
    <h2><u>CAT TOY</u></h1>
    <img src="https://cdn.pixabay.com/photo/2015/04/06/10/21/cat-709013_960_720.jpg" style="width:600px;height:500px"/>
    <p><b> CAT MULTI-USE PLAY TOY</b></p> 
    <div class="box">This toy will keep your cat destracted for hours...as long as you have plenty of batteries.
    <p><b> - 1 TOY </b></p>
    <p><b> - $4.99 </b></p>
    </div>
<form action="Storefront.php" method="POST" target="dummyframe" >
<br/>
<div class="qty-button" id="decrease" onclick="decreaseValue()" value="Decrease"><mark><b>SELECT QUANTITY (PLENTY IN STOCK!)</b></mark></div>
  <input id="box" type="number" name="ProdQty" value="1" min="1" max="50" />
  <div class="qty-button" id="increase" onclick="increaseValue()" value="Increase"></div>
<p>
    <input type="hidden" name="ProdID" value="Pr004">
    <input type="submit" value="ADD TO CART">
    </p>
</form>
<!-- ADD ACTION HERE to go to cart -->    
<form action="ShoppingCart.php" method="GET">
    <input type="submit" value="GO TO CART">
</form>

</body>
</html>