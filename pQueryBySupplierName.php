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
                        <div class="col-lg-8 col-lg-offset-2">
                            <form method="post" action="pQueryBySupplierName_view.php">
                                <div class="panel panel-query">
                                    <div class="panel-heading">
                                        Query Data By Supplier Name
                                    </div>

                                    <div class="panel-body">
                                        <input type="hidden" name="param_email" value="<?php echo $_SESSION['ses_email'];?>">
                                        <div class="form-group">
                                            <div class="col-lg-9">
                                                <label>Supplier Name :</label>
                                                <input type="text" name='ParamShorttext' required class="form-control">
                                            </div>

                                            <div class="col-lg-3">
                                                <label>Condition :</label>
                                                <select class="form-control" name="condition" required>                                                    
                                                    <option value="in">contain in</option>
                                                    <option value="is">equal to </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>&nbsp</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-success">
                                                    <span class="fa fa-check fa-lg">&nbsp&nbspOK</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </form>
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