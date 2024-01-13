//Shakyla Smith

<html>
  <head>
	<title>Shopping Cart</title>

<style type ="text/css">
h1{
font-size: 50px;
text-align:center;
color: white;
border-style: ridge;
border-color: #1A5276;
width: 350px;
margin-left: 220px;
background: #2471A3;
background-clip: content-box;
}
.prodTable{
width: 1000px;
margin-right: auto;
margin-left:auto;
}
.prodTable, .prdtd{
border-style: ridge;
border-color: #424242;
}
th{
font-size: 25px;
text-align: left;
color: white;
border-style: ridge;
border-color: #424242;
background-color: #2471A3;
}
.prdtd{
font-size: 15px;
text-align: center;
}
.Total{
border: 2px solid black;
width: 200px;
margin: 5px;
margin-left: auto;
margin-right:215px;
}
h1, th, td{
font-family: lucida;
}
h1, th{
text-shadow: -1px 1px 2px #000,
	      1px 1px 2px #000,
              1px -1px 0 #000,
             -1px -1px 0 #000;
}
.delButton{
font-size: 10px;
background-color: white;
color: #B14030;
border: 1px solid #B14030;
}
.delButton:hover{
background-color: #B14030;
color: white;
}
.upButton
{
background-color: #7FB3D5;
color: black;
Border: 1px solid #424242;
}
.upButton:hover{
background-color: #2471A3;
color: white;
}
.contButton
{
font-size: 20px;
float: left;
margin-left: 220px;
background-color: #A9CCE3;
color: black;
border-style: ridge;
border-color: #424242;
}
.contButton:hover{
color: white;
background-color: #2471A3;
border-style: ridge;
border-color: #424242;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.checkButton{
float: right;
font-size: 20px;
margin-right: 220px;
background-color: #5499C7;
color: black;
border-style: ridge;
border-color: #424242;
}
.checkButton:hover{
color: white;
background-color: #2471A3;
border-style: ridge;
border-color: #424242;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
</head>
  <body>
      <?php
	include("login.php"); //similar to secrets.php /contains username and password
	  $subTotal;
	  $Total = 0;
        
      try
      {
        $dsn = "mysql:host=courses;dbname=$username";
        $pdo = new PDO($dsn, $username, $password);

        if(isset($_POST['delProd']))
        {
            $delete = $_POST['delProd'];
            $delQuery = $pdo->query("DELETE FROM `Cart` where `ProdID` = '$delete';");
        }
          
if(isset($_POST['upButton']))
        {
            $Prod_ID = $_POST['upButton'];
            $QTY = $_POST['ProdQty'];
         // prepare sql query to buy the item that the user selected
        $prepared = $pdo->prepare('SELECT ProdQty FROM allProducts WHERE ProdID = ?');

        // execute sql query
    $prepared->execute(array($Prod_ID));
	    $rows = $prepared->fetch();  

	    $prepared2 = $pdo->prepare("UPDATE Cart SET QuantCOUNT = ? WHERE ProdID = ?;");
	    // execute sql query
        $prepared2->execute(array($QTY, $Prod_ID));
}
	
	  $cTable = $pdo->query("SELECT * FROM Cart;");
	  $cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);
          
	  echo "<h1>Shopping Cart</h1>";
	
	  echo '<table class = "prodTable">';
	  echo "<tr>";
	  echo "<th width=10%>Remove</th>",
		   "<th width=20%>Product ID</th>",
           "<th width=20%>Product Name</th>",
           "<th width=20%>Quantity</th>",
           "<th width=10%>Price</th>",
           "<th width=15%>Subtotal</th>";
      echo"</tr>";
          
	 foreach($cRows as $cRow)
     {
         $subTotal = $cRow["QuantCOUNT"] * $cRow["ProdPrice"];
         $Total= $Total + $subTotal;
         
	 echo "<tr>";
	 echo'<form method="POST">';
         echo '<td class="prdtd"><button class="delButton" type="submit" name="delProd" value="'.$cRow['ProdID'].'">X</button></td>';
         echo"</form>";
	     echo "<td class='prdtd'>" . $cRow["ProdID"] . "</td>
	           <td class='prdtd'>" . $cRow["ProdName"] . "</td>";
                 echo '<form method= "POST">'; 
		echo '<td class = "prdtd"><input  class = "qty" type="number" name="ProdQty" value = "'.$cRow["QuantCOUNT"].'" min="1" max="50"><button class="upButton" type="submit" name="upButton" value="'.$cRow['ProdID'].'">Update</button></td>';  
   echo "</form>";	 
         echo"<td class='prdtd'>" . $cRow["ProdPrice"] . "</td>";
                 
         echo "<td class='prdtd'>$subTotal</td>";
         
         echo "</tr>";
         }
    echo "</table>";
          
	echo '<table class = "Total">';
	echo"<td width=80% text-align=left>Total:</td>",
		"<td text-align=right>$Total</td>";
	echo "</table>";
	
	}
        
	catch(PDOexception $e)
    {
	echo "Connection to database failed: " . $e->getMessage();
    }
  ?>
 

  <form action="Storefront.php">
    <button class = "contButton" type="submit">Continue Shopping</button>
  </form>
  <form action="Checkout.php">
    <button class = "checkButton" type="submit">Check Out</button>
  </form>

  </body>
</html>
