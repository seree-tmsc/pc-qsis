<?php
    try
    {        
        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM QSIS_TRN_ME2L ";        
        $strSql .= "ORDER BY [Document Date], [Short Text], Supplier_Name ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover' id='myTable'>";            
            /*echo "<thead style='background-color:CornflowerBlue;'>";*/
            echo "<thead>";
            echo "<tr>";
            echo "<th style='width:5%;>No.</th>";
            echo "<th style='width:7%;' class='text-center'>Document Date</th>";            
            echo "<th style='width:30%;' class='text-center'>Short Text</th>";
            echo "<th style='width:5%;' class='text-center'>Order Qty.</th>";
            echo "<th style='width:10%;' class='text-center'>Unit Price</th>";        
            echo "<th style='width:10%;' class='text-center'>Amount</th>";
            echo "<th style='width:25%;' class='text-center'>Supplier Name</th>";            
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $ds = $statement->fetchAll(PDO::FETCH_NAMED);
            
            $nNo = 0;
            foreach($ds as $row)
            {
                //echo json_encode($row) . "<br>";
                /*
                echo "<tr>";
                echo "<td class='text-center'>" . Date('d/M/y',strtotime($row['Document Date'])) . "</td>";
                echo "<td>" . $row['Short Text'] . "</td>";
                echo "<td class='text-right'>" . number_format($row['Order Quantity'], 0, '.', ',') . "</td>";
                echo "<td class='text-right'>" . number_format($row['Net price'], 2, '.', ',') . "</td>";
                echo "<td class='text-right'>" . number_format($row['Net Order Value'], 2, '.', ',') . "</td>";
                echo "<td>" . $row['Supplier_Name'] . "</td>";
                echo "</tr>";                
                */
                echo "<tr>";
                echo "<td>" . ++$nNo . "</td>";
                echo "<td>" . $row['Document Date'] . "</td>";
                echo "<td>" . $row['Short Text'] . "</td>";
                echo "<td>" . $row['Order Quantity'] . "</td>";
                echo "<td>" . $row['Net price'] . "</td>";
                echo "<td>" . $row['Net Order Value'] . "</td>";
                echo "<td>" . $row['Supplier_Name'] . "</td>";
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