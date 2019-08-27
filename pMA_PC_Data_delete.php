<?php
    try
    {        
        echo $_POST["short_text"] . "<br>";
        echo $_POST["supplier_name"] . "<br>";

        include('include/db_Conn.php');
        $strSql = "DELETE FROM QSIS_TRN_OTH ";
        $strSql .= "WHERE [Short Text]='" . $_POST["short_text"] . "' ";
        $strSql .= "AND Supplier_Name='" . $_POST["supplier_name"] . "' ";
        echo $strSql . "<br>";
    
        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();

        $nRecCount = $statement->rowCount();
        //echo $nRecCount . "<br>";
    }
    catch(PDOException $e)
    {        
        echo $e->getMessage();        
    }
?>