//Shakyla Smith

<?php
//This is where the drawing table starts
function drawTable($row)
{
echo '<table class = "table">';
    echo "<tr>";

        foreach($row[0] as $key => $item)
        {
            echo "<th> $key </th>";
        }

    echo "</tr>";

	foreach($row as $row)
	{
		echo"<tr>";
		echo "<td>" . $row["ProdID"] . "</td>
		<td>" . $row["ProdName"] . "</td>
		<td>" . $row["ProdPrice"] . "</td>
		<td>" . $row["ProdQty"] . "</td>";
		echo"</tr>";
	}

	echo "</table>";


}#end of draw function

function draw_table($rows)
{
    if(empty($rows))
    {
        echo "<p>No Results found</p>";
    }

    else
    {
        echo "<table border=2 cellspacing=2>";
        echo "<tr>";

        foreach($rows[0] as $key => $item)
        {
            echo "<th>$key</th>";
        }
        echo "</tr>";

        foreach($rows as $row )
        {
            echo "<tr>";
            foreach($row as $key => $item)
                {
                    echo "<td>$item</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
    }
}

    function CheckOutForm()
    {
    echo '<form method="POST">';
        
    echo "<h3>"."Insert Billing Information"."</h3>";
        echo '<input class="size" type="text" name="CustName"/> NAME '; // Name
        echo '<input class="size" type="text" name="CustAddr"/> ADDRESS ';    // Shipping addess
        echo '<input class="size" type="text" name="CustCardN"/> CardNum <br/>';  // Billing information credit card

    

        echo '<br/><select class="size" name="select" >';
                echo '<option>No</option>)';
                echo '<option>Yes</option>';
        
        echo '<input class="submitButtons" type="submit" value="did you find our products interesting?">';
        echo "\t";
        echo '<input class="size type="text" name="OrdNote"/> Leave a message';    // item select
        echo '<br/><input type="reset" value="clear all fields"/> <br/>';
        echo "<h3 >"."Complete Checkout?"."</h3>";
        echo '<input type="radio" name="Done"/> Yes';  
                
        echo '<br/><input class="submitButtons" type="submit" value="Buy Now"/>';
        echo "</form>";


    }
function drawTableNoHeader($row)
    {
    echo "<table border=1 cellspacing=3>";
    
    foreach($row as $row)
        {
            echo "<tr>";

            foreach($row as $key => $item)
            {
                echo "<td> $item </td>";
            }#end of inner loop

            echo "</tr>";

        }#end of outer loop

            echo "</table>";

    }#end of drawTableNoHeader

function inventory_form()
    {
        // *** inventory selection form *** //
        echo '<form action="" method="POST">';
        
        echo "<h3>"."Select Item and Purchase Quantity"."</h3>";
        //echo $ischecked = type="checkbox";
        //echo 'if($ischecked == true && name="prodID"/> Item IID )'
        echo '<select class="size" name="ProdID">';
                echo '<option value = "Pr001" >Dog Food</option>IID';
		echo '<option value = "Pr002" >Cat Food</option>';
		echo '<option value = "Pr003" >Dog Toy</option>';
		echo '<option value = "Pr004" >Cat Toy</option>';
		echo '<option value = "Pr005" >Potty Pads</option>';
		echo '<option value = "Pr006" >Large Cage</option>';
		echo '<option value = "Pr007" >Small Cage</option>';
		echo '<option value = "Pr008" >Treats</option>';
		echo '<option value = "Pr009" >Food Bowl</option>';
		echo '<option value = "Pr010" >Bed</option>';
		echo '<option value = "Pr011" >Grooming Brush</option>';
		echo '<option value = "Pr012" >Wet Wipes</option>';
		echo '<option value = "Pr013" >Pet Shampoo</option>';
		echo '<option value = "Pr014" >Organic Cat Nip</option>';
		echo '<option value = "Pr015" >Jumbo Bone</option>';
		echo '<option value = "Pr016" >Flea / Tick</option>';
		echo '<option value = "Pr017" >Dog Waste Bags</option>';
		echo '<option value = "Pr018" >Fish Food</option>';
		echo '<option value = "Pr019" >Dog Snow Booties</option>';
		echo '<option value = "Pr020" >Leash</option>';
		echo '<br/>'."product ID" .'<br/>';
	            echo '<input  class = "qty" type="number" name="ProdQty" min="1" max="50">QTY ';
      
        echo '<br/><input class="add" type="submit" value="Add To Cart"/>';
        echo "</form>";
    }

    function Fulfilment_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."Change Order Staus"."</h3>";
        echo '<input type="text" name="OrdNum"/> NUMBER ';    // item select
        echo '<input tupe="text" name="OrdStatus"/> STATUS (insert P or S = processing/shipped) ';         // status input

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";

    // notes from
    echo '<form action="" method="POST">';

    echo "<h3>"."Add a note to order"."</h3>";
        echo '<input type="text" name="OrdNum"/> NUMBER '; 
        echo '<input type="text" name="OrdNote"/> MESSAGE ';    // item select

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
?> 
