<?php
    function calculate_record_of_me2l()
    {        
        try
        {
            include('include/db_Conn.php');

            $strSql = "SELECT COUNT(*) as 'TotalRecord' ";
            $strSql .= "FROM QSIS_TRN_ME2L ";
            //echo $strSql . "<br>";
    
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);

            $nRecCount = $statement->rowCount();
            if ($nRecCount == 1)
            {
                $nRecord = $result[0]['TotalRecord'];
            }
            else
            {
                $nRecord = 0;
            }
        } 
        catch (Exception $e)
        {
            echo "<label style='color:red'>... Error ...". $e->getMessage() ."</label>" . "<br><br>";
            $nRecord = 0;
        }    
        return $nRecord;
    }

    function calculate_record_of_oth()
    {        
        try
        {
            include('include/db_Conn.php');

            $strSql = "SELECT COUNT(*) as 'TotalRecord' ";
            $strSql .= "FROM QSIS_TRN_OTH ";
            //echo $strSql . "<br>";
    
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);

            $nRecCount = $statement->rowCount();
            if ($nRecCount == 1)
            {
                $nRecord = $result[0]['TotalRecord'];
            }
            else
            {
                $nRecord = 0;
            }
        } 
        catch (Exception $e)
        {
            echo "<label style='color:red'>... Error ...". $e->getMessage() ."</label>" . "<br><br>";
            $nRecord = 0;
        }    
        return $nRecord;
    }

    function calculate_number_of_supplier()
    {        
        try
        {
            include('include/db_Conn.php');
            $strSql = "DELETE FROM tmp_QSIS_TRN_PCDATA ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));            
            $statement->execute();

            $strSql = "INSERT INTO tmp_QSIS_TRN_PCDATA ";
            $strSql .= "SELECT * FROM QSIS_TRN_OTH ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
                        
            $strSql = "INSERT INTO tmp_QSIS_TRN_PCDATA ";
            $strSql .= "([Enter Date], [Document No], Item, [Short Text], ";
            $strSql .= "[Order Quantity], [Order Price], [Order Amount], Supplier_Code, Supplier_Name) ";
            $strSql .= "SELECT [Document Date], [Purchasing Document], Item, [Short Text], ";
            $strSql .= "[Order Quantity], [Net price], [Net Order Value], Supplier_Code, Supplier_Name ";
            $strSql .= "FROM QSIS_TRN_ME2L ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();

            $strSql = "SELECT T.supplier_name, T.supplier_code,  M.[Search term] as 'Search term' ";
            $strSql .= "FROM tmp_QSIS_TRN_PCDATA T ";
            $strSql .= "JOIN QSIS_MAS_VENDOR M ON M.Vendor =T.supplier_code ";
            $strSql .= "GROUP BY T.supplier_name, T.supplier_code, M.[Search term] ";
            $strSql .= "ORDER BY T.supplier_name, T.supplier_code, M.[Search term] ";            
            //echo $strSql . "<br>";

            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
            
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);

            $nRecCount = $statement->rowCount();            
        } 
        catch (Exception $e)
        {
            echo "<label style='color:red'>... Error ...". $e->getMessage() ."</label>" . "<br><br>";
            $nRecCount = 0;
        }

        $aSupplierData = array();
        array_push($aSupplierData, $aSupplierData['Sup_Qty']=$nRecCount, $aSupplierData['Sup_Dataset']=$result);
        
        return $aSupplierData;        
    }

    function get_Data_From_DB()
    {
        try
        {
            include('include/db_Conn.php');
            $strSql = "DELETE FROM tmp_QSIS_TRN_PCDATA ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));            
            $statement->execute();

            $strSql = "INSERT INTO tmp_QSIS_TRN_PCDATA ";
            $strSql .= "SELECT * FROM QSIS_TRN_OTH ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
            
            $strSql = "INSERT INTO tmp_QSIS_TRN_PCDATA ";
            $strSql .= "([Enter Date], [Document No], Item, [Short Text], ";
            $strSql .= "[Order Quantity], [Order Price], [Order Amount], Supplier_Code, Supplier_Name) ";
            $strSql .= "SELECT [Document Date], [Purchasing Document], Item, [Short Text], ";
            $strSql .= "[Order Quantity], [Net price], [Net Order Value], Supplier_Code, Supplier_Name ";
            $strSql .= "FROM QSIS_TRN_ME2L ";
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();

            //$strSql = "SELECT YEAR([Enter Date]) as 'cYear', MONTH([Enter Date]) as 'cMonth', SUM([Order Amount]) as 'AMT' ";
            $strSql = "SELECT YEAR([Enter Date]) as 'cYear', MONTH([Enter Date]) as 'cMonth', COUNT(*) as 'REC_NO' ";
            $strSql .= "FROM tmp_QSIS_TRN_PCDATA ";
            $strSql .= "WHERE YEAR([Enter Date]) >= 2018 ";
            $strSql .= "GROUP BY YEAR([Enter Date]), MONTH([Enter Date]) ";
            $strSql .= "ORDER BY YEAR([Enter Date]), MONTH([Enter Date]) ";            
            //echo $strSql . "<br>";
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();            
            $nRecCount = $statement->rowCount();
            if($nRecCount > 0)
            {
                $aLabels = array();
                $aDatas = array();
                $aMonthName = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

                while ($ds = $statement->fetch(PDO::FETCH_BOTH))
                {
                    $cLabel = $ds['cYear'] . "-" . $aMonthName[$ds['cMonth']-1];

                    array_push($aLabels, $cLabel);
                    //array_push($aDatas, round($ds['AMT']/1000000, 2));
                    array_push($aDatas, $ds['REC_NO']);
                }
            }            
            else
            {
                echo "Out of Data!";
            }
        } 
        catch (Exception $e)
        {
            echo "<label style='color:red'>... Error ...". $e->getMessage() ."</label>" . "<br><br>";            
        }

        $aAllData = array();
        array_push($aAllData, $aAllData['labels']=$aLabels, $aAllData['datas']=$aDatas);
                
        //echo json_encode($aAllData);

        return $aAllData;
    }    
?>