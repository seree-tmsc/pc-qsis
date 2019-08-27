<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#navbar" 
                aria-expanded="false" 
                aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>            
            <img src="images/tmsc-logo-96x48.png" style="display: block;margin-left: auto;margin-right: auto;">
            <!--<img src="images/tmsc-logo-96x48.png" alt="user image" class="offline">-->
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="pMain.php">
                        <span class="fa fa-home fa-lg" style="color:ForestGreen"></span>
                        Home
                    </a>                            
                </li>                
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-cloud-upload fa-lg" style="color:blue"></span> 
                        Upload Data
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>                             
                            <a href="pUploadFromME2L.php" >
                                <span class="fa fa-cloud-upload" style="color:DeepSkyBlue"></span> 
                                Upload Data From ME2L
                            </a>
                        </li>
                        <li class="divider">
                        <li>             
                            <a href="pUploadFromOTH.php" >
                                <span class="fa fa-cloud-upload" style="color:DeepSkyBlue"></span> 
                                Upload Data From Other
                            </a>
                        </li>                        
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-file-o fa-lg" style="color:blue"></span> 
                        Input Data
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="pMA_PC_Data.php">
                                <span class='fa fa-file-o' style="color:DeepSkyBlue"></span>
                                Input Purchasing Data
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-search-plus fa-lg" style="color:blue"></span> 
                        Query Suppliier Information
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="pQueryByShortText.php">
                                <span class='fa fa-search-plus' style="color:DeepSkyBlue"></span>
                                Query By ShotText
                            </a>
                        </li>
                        <li class="divider">
                        <li>
                            <a href="pQueryBySupplierName.php">
                                <span class='fa fa-search-plus' style="color:DeepSkyBlue"></span>
                                Query By Supplier Name
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-cog fa-spin fa-lg" style="color:blue"></span> 
                        Setting
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="pMA_User.php">
                                <span class='fa fa-users' style="color:DeepSkyBlue"></span>
                                Maintain User-ID
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                        
                        <img src="<?php echo $user_picture?>" style="margin-top: -10px; border-radius: 50%;">
                        Login as ... 
                        <?php echo $_SESSION["ses_email"];?> 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>                                
                            <a href="#" data-toggle="modal" data-target="#chgpasswordModal">
                                <span class='fa fa-pencil-square-o fa-lg' style="color:PeachPuff"></span> 
                                Change Password
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>                                
                            <a href="#" data-toggle="modal" data-target="#logoutModal">
                                <span class="fa fa-sign-out fa-lg" style="color:Crimson"></span> 
                                logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>