//Shakyla Smith

<html><head><title>Pet Store</title>
<style>
.Inventory {
  float: left;
  color: white;
  font-size: 15px;
  height: 60px;
  width: auto;
  padding: 10px;
  background-color: #4CAF50;
  border: none;
 }
.Cart{
 float: right;
 color:white;
 font-size: 15px;
 height: 60px;
 width: auto;
 padding: 10px;
 background-color: #4CAF50;
 border: none;
 color: white; 
}
.Checkout
{
   float: right;
  color: white;
  font-size: 15px;
  height: 60px;
  width: auto;
  padding: 10px; 
 background-color: #4CAF50; /* Green */
  border: none;
  color: white;}
.Inventory:hover, .Cart:hover, .Checkout:hover{
 background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}
table{
  float: left;
  margin-left: 100px;
  margin-top: -1%;i
}
table, th, td {
  text-align: center;
  font: lucida;
  width: 30%;
  border: 1px solid black;
  border-collapse: collapse;
}
th:nth-child(even),td:nth-child(even) {
  background-color: #D6EEEE;
}
.header {

  float: left;
  width: auto;
  height: 35%;
  margin-top: 60px;
  object-fit: cover;
  background: #0DAFBB;
}
h1{
  text-align: center;
  font: lucida;
  color: white;
  width:100%;
  margin-top: 60px;
  background: #0DAFBB;
  padding-top: 100px;
  padding-bottom: 91px;
}
h2{
  font: lucida;
  font-size: 30px;
  margin-left: 80px;
 }
.Form{
  border: 3px solid #0DAFBB;
  border-radius: 25px;
  padding: 20px;
  text-align: center;
  font-size: 20px;
  font: lucidai;
  float: right;
  margin-right: 300px;

}
.qty{
font-size:15px;
}
.add
{
font-size: 15px;
width: auto;
height: 30px;
color: black;
background-color: white;
border: 1px solid #4CAF50;
border-radius: 5px;
}
.add:hover{
color:white;
background-color:#4CAF50
}
</style>

</head>

<?php

     include("library.php"); // contains functions to draw the tables
    	$username = "z1612149";
	$password="1992Aug16";    
		try{
            $dsn = "mysql:host=courses;dbname=".$username;
            $pdo = new PDO($dsn, $username, $password);
        }
        catch(PDOexception $e)
        {
            echo "Connection to database failed: " . $e->getMessage();
	    }
?>

    <body>
    <a href= "Inventory.php"/><button class = "Inventory">Employee View</button></a>
    <a href= "Checkout.php"/><button class = "Checkout">Checkout</button></a>
    <a href= "ShoppingCart.php"/><button class = "Cart">Shopping Cart</button></a>
<br>
    <img src = "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/pet-shop-design-template-455bdf66d037814ea6eb95f9b137c7b5_screen.jpg?ts=1599317196" class = "header"/>

    <h1>Shop all items for your pet!<br>From Food, Grooming, Toys, and More!</h1>
    <h2>Here are all the products in our store:</h2>
   


<table>
  <colgroup>
       <col span="1" style="width: 75%;">
       <col span="1" style="width: 25%;">
    </colgroup>
<caption> For more details on the product click on the product name</caption>
<form method = "GET">
<tr>
    <th>Product Name</th>
    <th>Price</th>
</tr>
<tr>
    <td><a href= "item_1.php"/> Dog Food </a></td>
    <td>  $16.99</td>
</tr>
<tr>
    <td><a href="item_2.php"/> Cat Food </a></td>
    <td> $13.99 </td>
    </tr>
<tr>
    <td><a href="item_3.php"/> Dog Toy </a></td>
    <td> $5.99</td>
    </tr>
<tr>
    <td><a href="item_4.php"/> Cat Toy </a></td>
    <td> $4.99</td>
    </tr>
<tr>
    <td><a href="item_5.php"/> Potty Pads </a></td>
    <td> $13.99</td>
    </tr>
<tr>
    <td><a href="item_6.php"/>  Large Cage </a></td>
    <td> $100.00 </td> 
    </tr>
<tr>
    <td><a href="item_7.php"/>  Small Cage </a></td>
    <td> $50.00 </td>
    </tr>
    <td><a href="item_8.php"/>  Treats </a></td>
    <td> $5.99 </td>
    </tr>
<tr>
    <td><a href="item_9.php"/> Food Bowl </a></td>
    <td> $12.00 </td>
    </tr>
<tr>
    <td><a href="item_10.php"/>  Bed </a></td>
    <td> $30.00 </td>
    </tr>
<tr>
    <td><a href="item_11.php"/>  Groming brush </a></td>
    <td> $10.00 </td>
    </tr>
<tr>
    <td><a href="item_12.php"/>  Wet wipes </a></td>
    <td> $6.99 </td>
   
</tr>
<tr>
    <td><a href="item_13.php"/>  Pet Shampoo</a> </td>
    <td> $7.99 </td>
    </tr>
<tr>
    <td><a href="item_14.php"/>  Organic Cat Nip </a></td>
    <td> $12.99 </td>
    </tr>
<tr>
    <td><a href="item_15.php"/>  Jumbo Bone </a></td>
    <td> $17.99 </td>
    </tr>
<tr>
    <td><a href="item_16.php"/>  Flea / Tick </a></td>
    <td> $35.00 </td>
    </tr>
<tr>
    <td><a href="item_17.php"/>  Dog Waste bags </a></td>
    <td> $7.00 </td>
    </tr>
<tr>
    <td><a href="item_18.php"/>  Fish Food</a> </td>
    <td> $3.00 </td>
    </tr>
<tr>
    <td><a href="item_19.php"/>  Dog snow booties </a></td>
    <td> $20.00 </td>
    </tr>
<tr>
    <td><a href="item_20.php"/>  Leash </a></td>
    <td> $10.00 </td>
    
</tr>

</form>

</table>
<div class="Form">
<?php
    inventory_form();
if (isset($_POST['ProdID']))
    {
        // decalare varaiables
    $Prod_ID = $_POST['ProdID'];
    $QTY = $_POST['ProdQty'];
    
        // prepare sql query to buy the item that the user selected
        $prepared = $pdo->prepare('SELECT ProdPrice,ProdName, ProdQty FROM allProducts WHERE ProdID = ?');

        // execute sql query
    $prepared->execute(array($Prod_ID));
    $rows = $prepared->fetch();
    // get name and cost
    $Prod_Cost = $rows[0];
    $Prod_name = $rows[1]; 
    $Prod_Qty = $rows[2];

    if($Prod_Qty == 0)
    {
	    Print("Sorry, this item is currently unavaible");
    }
    else{
 	   

    // insert new part
        $prepared2 = $pdo->prepare('INSERT INTO Cart(ProdID, ProdPrice,ProdName,QuantCOUNT) VALUE(?,?,?,?)');

    // execute sql query
	$prepared2->execute(array($Prod_ID, $Prod_Cost,$Prod_name,$QTY));
	echo "You added " .$QTY. " " .$Prod_name."(s) to your cart.";
    }
}
?>
<div>
</body>
</html>
