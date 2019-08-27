<?php
    include_once('include/chk_Session.php');
    if($user_email == "")
    {
        echo "<script> 
                alert('Warning! Please Login!'); 
                window.location.href='login.php'; 
            </script>";
    }
    else
    {
?>        
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Criteria</title>

                <?php require_once("include/library.php"); ?>
            </head>
            
            <!--<body style='background-color:black;'>-->
            <body style='background-color:LightSteelBlue;'>
                <!-- Begin Body page -->
                <div class="container">
                    <br>
                    <!-- Begin Static navbar -->
                    <?php require_once("include/menu_navbar.php"); ?>
                    <!-- End Static navbar -->

                    <!-- Begin content page-->
                    <!-- ----------------------------------- -->
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-0">
                            <?php
                            try
                            {        
                                include('include/db_Conn.php');

                                IF ($_POST["condition"] == 'is') {
                                    $strSql = "SELECT [Purchasing Document],[Short Text],[Order Unit],[Order Quantity],[Net price],[Net Order Value],[Supplier_Code],[Supplier_Name] ";
                                    $strSql .= "FROM [pc_webapp].[dbo].[QSIS_TRN_ME2L] ";
                                    $strSql .= "WHERE [Short Text] = '$_POST[ParamShorttext]' ";
                                    $strSql .= "UNION ";
                                    $strSql .= "SELECT [Document No],[Short Text],[Order Unit],[Order Quantity],[Order Price],[Order Amount],[Supplier_Code],[Supplier_Name] ";
                                    $strSql .= "FROM [pc_webapp].[dbo].[QSIS_TRN_OTH] ";
                                    $strSql .= "WHERE [Short Text] = '$_POST[ParamShorttext]' ";
                                    $strSql .= "ORDER BY [Short Text], [Supplier_Name], [Net price]";
                                    //echo $strSql . "<br>";
                                }
                                elseif ($_POST["condition"] == 'in') {
                                    $strSql = "SELECT [Purchasing Document],[Short Text],[Order Unit],[Order Quantity],[Net price],[Net Order Value],[Supplier_Code],[Supplier_Name] ";
                                    $strSql .= "FROM [pc_webapp].[dbo].[QSIS_TRN_ME2L] ";
                                    $strSql .= "WHERE [Short Text] LIKE '%$_POST[ParamShorttext]%' ";
                                    $strSql .= "UNION ";
                                    $strSql .= "SELECT [Document No],[Short Text],[Order Unit],[Order Quantity],[Order Price],[Order Amount],[Supplier_Code],[Supplier_Name] ";
                                    $strSql .= "FROM [pc_webapp].[dbo].[QSIS_TRN_OTH] ";
                                    $strSql .= "WHERE [Short Text] LIKE '%$_POST[ParamShorttext]%' ";
                                    $strSql .= "ORDER BY [Short Text], [Supplier_Name], [Net price]";
                                    //echo $strSql . "<br>";
                                }
                                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                                $statement->execute();  
                                $nRecCount = $statement->rowCount();
                                if ($nRecCount >0)
                                {
                                    echo "<tr>";
                                    echo "<div class='table-responsive'>";
                                    echo "<table class='table table-bordered table-hover' id='myTable'>";        
                                    echo "<thead >";
                                    echo "<tr class='tr-bk'>";
                                    echo "<th style='width:10%;'>PO. No.</th>";
                                    echo "<th style='width:20%;' class='text-center'>Short Text</th>";
                                    echo "<th style='width:5%;' class='text-center'>Order Unit</th>";
                                    echo "<th style='width:5%;' class='text-right'>Qty.</th>";
                                    echo "<th style='width:8%;' class='text-right'>Unit Price</th>";
                                    echo "<th style='width:10%;' class='text-right'>Net Order Value</th>";
                                    //echo "<th style='width:10%;' class='text-right'>Amt.</th>";
                                    echo "<th style='width:10%;'>Supplier Code</th>";        
                                    echo "<th style='width:22%;'>Supplier Name</th>";        
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $ds['Purchasing Document'] . "</td>";
                                        echo "<td>" . $ds['Short Text'] . "</td>";
                                        echo "<td>" . $ds['Order Unit'] . "</td>";
                                        echo "<td class='text-right'>" . $ds['Order Quantity'] . "</td>";
                                        echo "<td class='text-right'>" . $ds['Net price'] . "</td>";
                                        echo "<td class='text-right'>" . $ds['Net Order Value'] . "</td>";
                                        /*
                                        if($ds['Purchasing Document'] == '')
                                        {
                                            echo "<td class='text-right'>-</td>";
                                            echo "<td class='text-right'>" . number_format($ds['Net Order Value'],2,'.',',') . "</td>";
                                        }
                                        else
                                        {
                                            echo "<td class='text-right'>" . $ds['Net Order Value'] . "</td>";
                                            echo "<td class='text-right'>-</td>";
                                        }
                                        */
                                        echo "<td>" . $ds['Supplier_Code'] . "</td>";
                                        echo "<td>" . $ds['Supplier_Name'] . "</td>";
                                        echo "</tr>"; 
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "</div>";
                                }
                                else
                                {
                                    echo "<script> alert('Warning! No Data ! ... ); window.location.href='pMain.php'; </script>";
                                }
                            }
                            catch(PDOException $e)
                            {
                                echo $e->getMessage();
                            }
                            ?>     
                        </div>                        
                    </div>
                    <!-- /.row -->
                    <!-- ----------------------------------- -->
                    <div class="row">
                        
                    </div>
                    <!-- End content page -->
                </div>  
                <!-- End Body page -->          

                <!-- Left slide menu -->
                <?php
                    /*
                    if(strtoupper($_SESSION["ses_user_type"]) == 'A')
                    {                                                
                        require_once("include/menu_admin.php");
                    }
                    */
                ?>
                <!-- End Left slide menu -->


                <!-- Logout Modal-->
                <?php require_once("include/modal_logout.php"); ?>

                <!-- Change Password Modal-->
                <?php require_once("include/modal_chgpassword.php"); ?>

                <script>
                    //--------------------------
                    // javascript for side-menu
                    //--------------------------
                    /*
                    $(document).ready(function () {                        
                        $('#right-slide').BootSideMenu({
                            side: "right",
                            pushBody: false,
                            duration:1000,
                            width:'20%'
                        });
                    });
                    */
                </script>
            </body>
        </html>
<?php
    }
?>