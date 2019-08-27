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
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?php echo "File name is " . $_FILES["param_fileCSV"]["name"]; ?>
                            <?php //echo $_POST['param_email'];?> 
                        </div>

                        <div class="panel-body">
                            <?php
                                /* ------------------------ */
                                /* Setp 0. Initial Function */
                                /* ------------------------ */                    
                                include_once "function_Upload.php";

                                /* ------------------------------- */
                                /* Setp 1. upload to server folder */
                                /* ------------------------------- */
                                $lPass = upload_to_server_folder();

                                /* ---------------------------------------- */
                                /* Setp 2. ตรวจสอบจำนวน column ของไฟล์ต้นทาง */
                                /* ---------------------------------------- */
                                if($lPass == true)
                                {
                                    $lPass = check_number_of_column(16);
                                    /* --------------------------------------------- */
                                    /* Setp 3. ตรวจสอบจำนวน column name ของไฟล์ต้นทาง */
                                    /* --------------------------------------------- */
                                    
                                    if($lPass == true)
                                    {
                                        $lPass = check_name_of_column_ME2L(array("document date", 
                                        "purchasing document", 
                                        "item", 
                                        "material",
                                        "short text", 
                                        "order quantity", 
                                        "order unit",
                                        "currency",
                                        "net price",
                                        "net order value",
                                        "plant",
                                        "purchasing group",
                                        "purchasing organization",
                                        "price unit",
                                        "supplier_code",
                                        "supplier_name"));

                                        /*$lPass =  check_name_of_column_ME2L1("document date", 
                                        "purchasing document", 
                                        "item", 
                                        "material",
                                        "short text", 
                                        "order quantity", 
                                        "order unit",
                                        "currency",
                                        "net price",
                                        "net order value",
                                        "plant",
                                        "purchasing group",
                                        "purchasing organization",
                                        "price unit",
                                        "supplier_code",
                                        "supplier_name");*/

                                        /* --------------------------------- */
                                        /* Setp 4. ตรวจสอบว่าเคย upload หรือยัง */
                                        /* --------------------------------- */
                                        if($lPass == true)
                                        {
                                            //$aVerifyField = array("Purchasing Document");
                                            //$aVerifyData = array(1);
                                            //$cTableName = "QSIS_TRN_ME2L";
                                            //$lPass = verify_data_ME2L(1, $aVerifyField, $aVerifyData, $cTableName);
                                            
                                            $Purdoc = "";
                                            $lPass = verify_data_ME2L();

                                            /* ------------------------------ */
                                            /* Setp 5. upload csv เข้าสู่ฐานข้อมูล */
                                            /* ------------------------------ */
                                            if($lPass == true)
                                            {

                                                $lPass = upload_ME2L_to_database();

                                                /* --- checking data ----------*/
                                                /*print_r($lPass[0]) . "<br>"; */
                                                /* ----------------------------*/

                                                /* ---------------------------- */
                                                /* Setp 6. update history table */
                                                /* ---------------------------- */
                                                if($lPass[0] == true)
                                                {
                                                    //$lPass = Insert_History_Upload_COA_VF05($lPass[1], $_POST['param_email'], "COA_QcDataDetail");
                                                }
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    
                    <!-- /.row -->
                    <!-- ----------------------------------- -->

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