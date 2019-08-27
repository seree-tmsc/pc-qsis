<?php
    try
    {        
        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM QSIS_TRN_OTH ";        
        $strSql .= "ORDER BY [Enter Date], [Short Text], Supplier_Name ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover' id='myTable'>";        
            echo "<thead style='background-color:CornflowerBlue;'>";
            echo "<tr>";
            echo "<th style='width:7%;' class='text-center'>Enter Date</th>";            
            echo "<th style='width:30%;' class='text-center'>Short Text</th>";
            echo "<th style='width:10%;' class='text-center'>Unit Price</th>";
            echo "<th style='width:5%;' class='text-center'>Order Qty.</th>";            
            echo "<th style='width:10%;' class='text-center'>Amount</th>";
            echo "<th style='width:30%;' class='text-center'>Supplier Name</th>";
            echo "<th style='width:8%;' class='text-center'>Mode</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                
                echo "<tr>";
                echo "<td class='text-center'>" . Date('d/M/y',strtotime($ds['Enter Date'])) . "</td>";
                echo "<td>" . $ds['Short Text'] . "</td>";
                echo "<td class='text-right'>" . number_format($ds['Order Price'], 2, '.', ',') . "</td>";
                echo "<td class='text-right'>" . number_format($ds['Order Quantity'], 0, '.', ',') . "</td>";                
                echo "<td class='text-right'>" . number_format($ds['Order Amount'], 2, '.', ',') . "</td>";
                echo "<td>" . $ds['Supplier_Name'] . "</td>";

                echo "<td class='text-center'>";
                echo "<a href='#' class='view_data' short_text='" . $ds['Short Text'] . "', supplier_name='" . $ds['Supplier_Name'] . "' >";
                echo "<span class='fa fa-sticky-note-o fa-lg'>" . "&nbsp&nbsp" . "</span>";
                echo "</a>";
                echo "<a href='#' class='edit_data' short_text='" . $ds['Short Text'] . "', supplier_name='" . $ds['Supplier_Name'] . "'>";
                echo "<span class='fa fa-pencil-square-o fa-lg'>" . "&nbsp&nbsp" . "</span>";
                echo "</a>";
                echo "<a href='#' class='delete_data' short_text='" . $ds['Short Text'] . "', supplier_name='" . $ds['Supplier_Name'] . "'>";
                echo "<span class='fa fa-trash-o fa-lg'></span>";
                echo "</a>";                            
                echo "</td>";
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