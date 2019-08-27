<?php
    /*
    echo $_POST['doc_date'] . "<br>";    
    echo $_POST["doc_no"] . "<br>";
    */

    try
    {
        include('include/db_Conn.php');
        $strSql = "INSERT INTO QSIS_TRN_OTH ";
        $strSql .= "VALUES(";
        $strSql .= "'" . date('Y/m/d') . "','','',";        
        $strSql .= "'" . $_POST["short_text"] . "',";
        $strSql .= "'" . $_POST["order_unit"] . "',"; 
        $strSql .= "" . $_POST["quantity"] . ",";
        $strSql .= "" . $_POST["price"] . ",";
        $strSql .= "" . $_POST["quantity"] * $_POST["price"] . ",";
        $strSql .= "'',";
        $strSql .= "'" . $_POST["supplier_name"] . "',"; 
        $strSql .= "'" . $_POST['ent_by'] . "') "; 
        echo $strSql ;

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        //echo $nRecCount . "<br>";
        if ($nRecCount == 1)
        {            
            echo "Insert data complete!";
        }
        else
        {                   
            echo "Error! Cannot insert data!";            
        }        
    }
    catch(PDOException $e)
    {        
        echo substr($e->getMessage(),0,105) ;
    }
?>