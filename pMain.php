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
                <title>TMSC Query Supplier Information System v.0.1</title>

                <?php 
                    require_once("include/library.php");
                    /* --------------------- */
                    /* Setp 0. Call Function */
                    /* --------------------- */                    
                    include_once "function_Graph.php";
                ?>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-database fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <div class="huge"><?php echo number_format(calculate_record_of_me2l(),0,'.',',');?></div>
                                            <div>Total Record From ME2L</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer" style='padding: 5px;'>
                                    <span class="pull-left" style='min-height: 30px; display: inline-flex; align-items: center;'></span>
                                    <span class="pull-right"><!--<i class="fa fa-arrow-circle-right fa-2x"></i>--></span>
                                    <div class="clearfix"></div>
                                </div>                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-database fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo number_format(calculate_record_of_oth(),0,'.',',');?></div>
                                            <div>Total Record From Input By Manual</div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="panel-footer" style='padding: 5px;'>
                                    <span class="pull-left" style='min-height: 30px; display: inline-flex; align-items: center;'></span>
                                    <span class="pull-right"><!--<i class="fa fa-arrow-circle-right fa-2x"></i>--></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo json_encode(calculate_number_of_supplier()[0]);?></div>
                                            <div>Total Number Of Suppliers</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="pView_Supplier_Data.php">
                                    <div class="panel-footer" style='padding: 5px;'>                                        
                                        <span class="pull-left" style='min-height: 30px; display: inline-flex; align-items: center;'>View Details</span>                                        
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- ----------------------------------- -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- BAR CHART -->
                            <div class="panel panel-orange">
                                <div class="panel-header" style="text-align:center;">
                                    <h3><span># Non-Item Purchasing Transaction Per Month</span></h3>
                                    <div class="clearfix"></div>                                    
                                </div>

                                <div class="panel-body">
                                    <?php 
                                        $aData = get_Data_From_DB();
                                        /*
                                        echo json_encode($aData[0]) . "<br>";
                                        echo json_encode($aData[1]) . "<br>";
                                        echo json_encode($aData['labels']) . "<br>";
                                        echo json_encode($aData['datas']) . "<br>";
                                        */
                                    ?>
                                    <canvas id="barChart" height="80px"></canvas>                                    
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
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
                    $(document).ready(function () {
                        /*
                        $('#right-slide').BootSideMenu({
                            side: "right",
                            pushBody: false,
                            duration:1000,
                            width:'20%'
                        });
                        */
                    });

                    var ctx = document.getElementById("barChart");
                    var barChart = new Chart(ctx, 
                    {
                        type: 'bar',
                        data: {
                            //labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            labels: <?php echo json_encode($aData['labels']);?>,
                            datasets: [{
                                label: '# Trans.',
                                //data: [74, 96, 37, 52, 64, 39, 51, 76, 54, 82, 0, 0],
                                data: <?php echo json_encode($aData['datas'], JSON_NUMERIC_CHECK);?>,
                                backgroundColor: 'rgb(200, 128, 128, 1)',
                                borderColor: 'rgb(255, 0, 0, 1)',
                                borderWidth: 1
                                
                                /*
                                backgroundColor: [
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',                                    
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)',
                                    'rgb(255, 159, 64, 0.2)'

                                ],                                
                                borderColor: [
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)',
                                    'rgb(255, 0, 0, 1)'
                                    
                                ],                                
                                borderWidth: 1
                                */
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </body>
        </html>
<?php
    }
?>