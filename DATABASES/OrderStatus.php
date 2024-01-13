//Shakyla Smith

<html><head><title>The Order Status of each user</title></head>
<body>

<?php
    include("login.php"); //similar to secrets.php /contains username and password
    include("library.php"); // contains functions to draw the tables
	include("StylesFormat.php"); //contains styles to be used
    
    try{
        $dsn = "mysql:host=courses;dbname=".$username;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
        echo "Connection to database failed: " . $e->getMessage();
    } 
    
    $subTotal;
	$Total = 0;

    //store the Column data from price in an alocated variable/ProdPrice
    $priceFromCart = $pdo->query("SELECT ProdPrice FROM Cart;");
    $cRows = $priceFromCart->fetchAll(PDO::FETCH_ASSOC);

    //update the empty column in Orders by replaying it with the data from priceFromCart alocated
    $prepared1 = $pdo->prepare('UPDATE Orders SET OrdPayment = $priceFromCart WHERE OrdNum = ?');
    //$prepared1->execute(array($priceFromCart));

    $cTable = $pdo->query("SELECT * FROM Fullfilment;");
	$cRows = $cTable->fetchAll(PDO::FETCH_ASSOC);
	//FETCH BOTH NEEDED TO GET USABLE INDEX	


    echo '<table class="table_to_left">';
	  echo "<tr>";
	  echo "<th width=20%>Tracking NumberID</th>",
           "<th width=20%>Product Price</th>",
           "<th width=15%>Total</th>",
           "<th width=15%>Order Status</th>",
           "<th width=15%>Your Message</th>";
      echo"</tr>";
          

	foreach($cRows as $cRow)
     {
         $subTotal = $cRow["QuantCOUNT"] * $cRow["ProdPrice"];
         $Total= $Total + $subTotal;
         
	 echo "<tr>";
	     echo "<td class='prdtd'>" . $cRow["OrdNum"] . "</td>
               <td class='prdtd'>" . $cRow["OrdPayment"] ."</td>	 
               <td class='prdtd'>" . $cRow["OrdTotal"] ."</td>
         	   <td class='prdtd'>" . $cRow["OrdStatus"] . "</td>
               <td class='prdtd'>" . $cRow["OrdNote"] ."</td>";
                 
         echo "<td class='prdtd'>$subTotal</td>";
         
         echo "</tr>";
         }
	echo "</table>";
          
	echo '<table class="link2_to_bottomLeft">';
	echo"<td width=80% text-align=left>Total:</td>",
		"<td text-align=right>$Total</td>";
	echo "</table>";
	//FETCH BOTH NEEDED TO GET USABLE INDEX	
	draw_table($cRows);
	//go back to main page
    echo '<form action="Storefront.php">';      
        echo '<br/><input class="Total_to_bottomRight" class="submitButtons" type="submit" value="<= take me home"/>';
    echo '</form>';
?>
</body>
</html>
