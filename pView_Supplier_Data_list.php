<?php
    try
    {
        //echo "<div class='table-responsive'>";
        echo "<div>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        //echo "<thead style='background-color:CornflowerBlue;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th style='width:10%;' class='text-center'>No.</th>";
        echo "<th style='width:60%;' class='text-center'>Supplier Name</th>";
        echo "<th style='width:30%;' class='text-center'>Search Term</th>";
        echo "<th style='width:30%;' class='text-center'>Supplier Code</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include_once "function_Graph.php";        

        $ds = calculate_number_of_supplier()[1];

        if(sizeof($ds))
        {
            $nNo = 0;
            foreach($ds as $row)
            {
                //echo json_encode($row) . "<br>";
                //echo $row['supplier_name'] . "<br>";

                echo "<tr>";
                echo "<td class='text-center'>" . ++$nNo . "</td>";
                echo "<td>" . $row['supplier_name'] . "</td>";
                echo "<td>" . $row['Search term'] . "</td>";
                echo "<td>" . $row['supplier_code'] . "</td>";
                echo "</tr>"; 
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }        
        else
        {
            echo "Data not found ...!";
            //echo "<script> alert('Warning! No Data ! ... ); window.location.href='pMain.php'; </script>";
        }        
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>    