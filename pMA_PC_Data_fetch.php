<?php
    /*
    echo $_POST['doc_no'];
    echo $_POST['item'];
    */

    include('include/db_Conn.php');

    $strSql = "SELECT * ";
    $strSql .= "FROM QSIS_TRN_OTH ";
    $strSql .= "WHERE [Short Text] ='" . $_POST['short_text'] . "' ";
    $strSql .= "AND [Supplier_Name] ='" . $_POST['supplier_name'] . "' ";
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();

    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        echo json_encode($ds);
    }
?>