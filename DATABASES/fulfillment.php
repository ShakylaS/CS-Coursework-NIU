//Shakyla Smith

<html><head><title>Fullfilment</title></head>
<body>

<?php
    include("login.php"); //similar to secrets.php /contains username and password
    include("groupLibrary.php"); // contains functions to draw the tables
	include("StylesFormat.php"); //contains styles to be used
    try{
        $dsn = "mysql:host=courses;dbname=".$username;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
        echo "Connection to database failed: " . $e->getMessage();
    }   

    // print out the fullfilment page
    $sql = "SELECT * FROM Fullfilment;";
	$result = $pdo->query($sql);
	//FETCH BOTH NEEDED TO GET USABLE INDEX	
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);

    draw_table($rows);

    // initiate form
    Fulfilment_form();

    if(isset($_POST['OrdNum']) AND isset($_POST['OrdStatus']))
    {
        $Stat = $_POST['OrdStatus'];
        $Num = $_POST['OrdNum'];

        // make sure user put in a valid status
        if ($OrdStatus == 'P' OR $OrdStatus == 'S')
        {
            $prepared = $pdo->prepare('UPDATE Fullfilment SET OrdStatus = ? WHERE OrdNum = ?');

            // execute sql query
	        $prepared->execute(array($OrdStatus,$OrdNum));
	        echo "<meta http-equiv='refresh' content='0'>";
        }
        else
        {
            echo 'Erorr input P or S as status';
        }
    }

    $sql = "SELECT ProdQty FROM Fullfilment;";
    $result = $pdo->query($sql);

    //FETCH BOTH NEEDED TO GET USABLE INDEX
    $rows = $result->fetchAll(PDO::FETCH_BOTH);
    $TOTAL = 0.00;
    for($i = 0;$i < sizeof($rows);$i++){
	 for($j = 0; $j <1; $j++){
		$TOTAL+=$rows[$i][$j];
	 }
    }
    echo "<h2>";
    echo "Total of order value: $".$TOTAL;
    echo "</h2>";
    echo "<br/>";
       
    // add notes 
    if(isset($_POST['OrdNote']) AND isset($_POST['OrdNum']))
    {
        $NUM = $_POST['OrdNum'];
        $Note = $_POST['OrdNote'];
        $prepared = $pdo->prepare('UPDATE Fullfilment SET OrdNote = ? WHERE OrdNum = ?');

        // execute sql query
	$prepared->execute(array($Note,$NUM));
	echo "<meta http-equiv='refresh' content='0'>";

        echo "You left a note on order ". $NUM. " Your note was ".$Note;
    }
		?>
	</body>
</html>
