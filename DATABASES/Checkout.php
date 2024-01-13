//Shakyla Smith

<html><head><title>Checkout</title></head>
    <body>
<?php
session_start();
   
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
	$thankYou = "thank you for shopping with us";
	
	$cTable = $pdo->query("SELECT * FROM Cart;");
	$rows = $cTable->fetchAll(PDO::FETCH_ASSOC);
	echo '<table class="table_to_middleRight">';
	  echo "<tr>";
	  echo "<th width=20%>Product ID</th>",
           "<th width=20%>Product Name</th>",
           "<th width=20%>Quantity</th>",
           "<th width=10%>Price</th>",
           "<th width=15%>Subtotal</th>";
      echo"</tr>";
          

	foreach($rows as $cRow)
     {
         $subTotal = $cRow["QuantCOUNT"] * $cRow["ProdPrice"];
         $Total= $Total + $subTotal;
         
	 echo "<tr>";
	     echo "<td class='prdtd'>" . $cRow["ProdID"] . "</td>
	           <td class='prdtd'>" . $cRow["ProdName"] . "</td>
               <td class='prdtd'>" . $cRow["QuantCOUNT"] ."</td>	 
         	   <td class='prdtd'>" . $cRow["ProdPrice"] . "</td>";
                 
         echo "<td class='prdtd'>$subTotal</td>";
         
         echo "</tr>";
         }
	echo "</table>";
          
	echo '<table class="Total_to_bottomRight">';
	echo"<td width=80% text-align=left>Total:</td>",
		"<td text-align=right>$Total</td>";
	echo "</table>";

	//adding style
    echo '<h1 class="h1" style=text-align:center;">';
		echo "YOU ARE NOW CHECKING OUT:";
	echo '</h1>';
		 //adding label to title
	echo '<h3 class="table_to_right">';
	echo "You Are Purchasing These products:";
	echo '</h3>';

    
	CheckOutForm();

   	if(isset($_POST['CustName']))
    	{
            $name = $_POST['CustName'];
       	    $addr = $_POST['CustAddr'];
       	    $card = $_POST['CustCardN'];
            //working insert into Customer table	     
            $prepared2 = $pdo->prepare('INSERT INTO Customer(CustName,CustCardN,CustAddr) VALUE(?,?,?);');
            $prepared2->execute(array($name,$card,$addr));
    	}

	if(isset($_POST['Done']))
        {
            // insert into order
	    $prepared2 = $pdo->prepare('INSERT INTO Orders(OrdTotal) VALUE(?);');
	    $prepared2->execute(array($Total));
            // insert into fullfilment
	    $prepared2 = $pdo->prepare('INSERT INTO Fullfilment(OrdStatus,prodQty) VALUE(?,?);');
	    $prepared2->execute(array('P',$Total));
	     echo "<meta http-equiv='refresh' content='0'>";
	    //subtract how much the user bought from the Instock products
	    $sql = "SELECT prodName,QuantCOUNT FROM Cart;";
	    $result = $pdo->query($sql);	
	    $rows = $result->fetchAll(PDO::FETCH_BOTH);

	    //loop through the array to set the new quantities
	    for($i = 0; $i < sizeof($rows); $i++){
		    for($j = 1; $j<2;$j++){
			    $prepared = $pdo->prepare('UPDATE Cart SET QuantCOUNT = QuantCOUNT - ? WHERE prodName = ?;');
			    $prepared->execute(array($rows[$i][$j],$rows[$i][0]));
		    }
	    }   
	    //reset shopping cart for next customer
            $result = $pdo->query("DELETE FROM Cart WHERE QuantCOUNT <= 0.00");
	}
	
            echo "please submit all information from above";

	echo '<h2>';
	 
		if(isset($result))
		{
			echo $thankYou;
			sleep(0);
	 	}
	echo '</h2>';


//header( 'Content-type: text/html; charset=utf-8' );
        
	echo "<table cellpadding=1>";
		echo "<tr>";
			echo "<th>";
				echo '<a class="link2_to_bottomLeft" href="Storefront.php">'; // could also use form action
					echo "<h2>";
						echo "Return to homepage";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
				echo '<a class="link1_to_bottomLeft" href="OrderStatus.php">'; //connect to status page 
					echo "<h2>";
						echo "View list and  Order status";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";

	//Line to separate the billing information and products bought from shopping cart
	echo '<table class="column_separator">';
			echo "<tc>";
				
			echo "</tc>";

	echo '</table>';
	?>
    </body>
</html>
