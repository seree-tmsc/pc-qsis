<?php
    /*
    echo $_POST['qty'];
    echo $_POST['uprice'];    
    echo $_POST['shorttext'];    
    echo $_POST["supname"];
    */
    
    try
    {
        include('include/db_Conn.php');        
        $strSql = "UPDATE QSIS_TRN_OTH SET ";        
        $strSql .= "[Order Quantity]='" . $_POST["qty"] . "', ";
        $strSql .= "[Order Price]='" . $_POST["uprice"] . "', ";
        $strSql .= "[Order Amount]='" . $_POST["qty"] * $_POST["uprice"] . "' ";
        $strSql .= "WHERE [Short Text]='" . $_POST["shorttext"] . "' ";
        $strSql .= "AND [Supplier_Name]='" . $_POST["supname"] . "' ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        //echo $nRecCount . "<br>";
        if ($nRecCount == 1)
        {         
            echo "Edit data complete!";
        }
        else
        {
            echo "Error! Cannot edit data!";
        }    
    }
    catch(PDOException $e)
    {     
        echo substr($e->getMessage(),0,105) ;
    }
?>