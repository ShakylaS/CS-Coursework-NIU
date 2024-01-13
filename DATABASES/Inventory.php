//Shakyla Smith

<html><head><title>Inventory</title>
<style type ="text/css">
body{
background: #D7DBDD;
}
.h1{
font-size: 50px;
text-align:center;
color: white;
border-style: ridge;
border-color: #1A5276;
width: 350px;
margin-left: auto;
margin-right:auto;
background: #2471A3;
background-clip: content-box;
text-shadow: -1px 1px 2px #000,
	      1px 1px 2px #000,
              1px -1px 0 #000,
             -1px -1px 0 #000;
}
.h2{
    font-size: 35px;
    text-align:center;
    color: white;
    border-style: ridge;
    border-color: #1A5276;
    width: 350px;
    margin-left: auto;
    margin-right:auto;
    background: #2471A3;
    background-clip: content-box;
    text-shadow: -1px 1px 2px #000,
	      1px 1px 2px #000,
              1px -1px 0 #000,
             -1px -1px 0 #000;
    }
.table, th ,td{
border: 2px solid #353535;
border-collapse: collapse;
margin-right: auto;
margin-left: auto;
font: lucida;
font-size: 25px;
width: 1000px;
text-align: left;
}
th{
color: white;
text-shadow: -1px 1px 2px #000,
	      1px 1px 2px #000,
	      1px -1px 0 #000,
	     -1px -1px 0 #000;
background-color: #5499C7;
}
.frontButton
{
font-size: 20px;
float: left;
background-color: white;
color: black;
border-style: ridge;
border-color: #353535;
}
.frontButton:hover{
color: white;
background-color: #2471A3;
border-style: ridge;
border-color: #424242;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
</head>
    <body>
    <form action="Storefront.php">
    <button class = "frontButton" type="submit">Store Front</button>
    </form>
        <?php
        include("library.php"); // contains functions to draw the tables

	include("login.php"); // contains functions to draw the tables
        try{
            $dsn = "mysql:host=courses;dbname=$username";
            $pdo = new PDO($dsn, $username, $password);
        }
         catch(PDOexception $e){
            echo "Connection to database failed: " . $e->getMessage();
	 }
	    
	if(isset($_GET["submitbutton"])){

        $rs = $pdo->prepare("Insert into allProducts
                       (ProdID, ProdName, ProdPrice, ProdQty)
                        values(?, ?, ?, ?);");
        $rs->execute(array($_GET["type"], $_GET["type2"],$_GET["type3"],$_GET["type4"]));
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

        //draw_tables($rows);
    }


	echo "<h1 class='h1'>Store Inventory<h1>";
        $result = $pdo->query("SELECT ProdID, ProdName, ProdPrice, ProdQty FROM allProducts ORDER BY ProdID;");
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
	// draw the inventory table
	 drawTable($rows);

    echo "<h2 class ='h2'>Products in Stock</h2>";
        $result = $pdo->query("Select * From Pro_Instock;");
        $rows = $result->fetchALL(PDO::FETCH_ASSOC);

        drawTable($rows);

     echo "<h2 class ='h2'>Products Out of Stock</h2>";
        $result = $pdo->query("Select * From Pro_Outstock;");
        $rows = $result->fetchALL(PDO::FETCH_ASSOC);

        drawTable($rows);

    
?>
<h2 class ='h2'>Add New Products</h2>
<form method = "GET">
   ProdID <input type="text" name="type"/> <br>
   Name   <input type="text" name="type2"/> <br>
   Price  <input type="text" name="type3"/> <br>
   Quantity <input type="text" name="type4"/> <br>
    <input type="submit" name="submitbutton" value= "ADD"/> &nbsp;
</form>
    </body>
</html>
