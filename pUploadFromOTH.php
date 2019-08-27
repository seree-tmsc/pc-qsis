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
        if($user_user_type == "A" || $user_user_type == "P")
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
                            <div class="panel panel-primary" id="panel-header">
                                <div class="panel-heading">
                                    Upload Data From Other Department
                                </div>

                                <div class="panel-body" style='background-color: PaleTurquoise'>
                                    <form method="post" action="pUploadFromOTH_process.php" enctype="multipart/form-data">
                                        <input type="hidden" name="param_email" value="<?php echo $_SESSION['ses_email'];?>">
                                        <div class="form-group">
                                            <label>Please select file (*.csv):</label>
                                            <input type="file" accept=".xls,.xlsx,.csv" required class="form-control" name="param_fileCSV" id="input_filename">
                                        </div>
                                        <button type="submit" style="float: right; margin:2px;" class="btn btn-success">
                                            <span class="fa fa-check fa-lg">&nbsp&nbspOK</span>
                                        </button>                                        
                                    </form>

                                </div>
                            </div>
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
        else
        {
            echo "<script> alert('You are not authorization for this menu ... Please contact your administrator!'); window.location.href='pMain.php'; </script>";
        }
    }
?>