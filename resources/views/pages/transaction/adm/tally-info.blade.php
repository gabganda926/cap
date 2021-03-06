<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tally Summary - Transaction | i-Insure</title>
     <link href="../../../css/modal.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../../../material-design-icons-3.0.1/iconfont/material-icons.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="../../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="../../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-teal">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
            <img src="../../../images/logo.png" width="48" height="48" alt="Compreline" style="float:left" />
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="cimis.php"><b>COMPRELINE | INSURANCE</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ma. Gabriella Rola</div>
                    <div class="text" style="color: white;">Administrator</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>My Account</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Switch Account</a></li>
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li> -->
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            
            <!-- Menu -->
            <div class="menu animated bounceInLeft active">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../../dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Maintenance</span>
                        </a>
                        <ul class="ml-menu">                    
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">question_answer</i>
                                    <span>QUOTATION</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../maintenance/sender">
                                            <i class="material-icons">person</i>
                                            <span>Sender</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../../maintenance/vehicle/types">
                                            <i class="material-icons">directions_car</i>
                                            <span>Vehicle Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">view_comfy</i>
                                            <span>Insurance Items</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="../../maintenance/vehicle/model">Vehicle Model</a>
                                            </li>
                                            <li>
                                                <a href="../../maintenance/vehicle/make">Vehicle Make</a>
                                            </li>
                                            <li>
                                                <a href="../../maintenance/vehicle/accessories">Vehicle Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>BILLING</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../maintenance/client/type">
                                            <i class="material-icons">people_outline</i>
                                            <span>Client Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../../maintenance/installment/type">
                                            <i class="material-icons">dns</i>
                                            <span>Installment Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../../maintenance/bank">
                                            <i class="material-icons">account_balance</i>
                                            <span>Bank</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">view_agenda</i>
                                    <span>COMPLAINTS AND TRANSMITTAL</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../maintenance/complaint/type">
                                            <i class="material-icons">subject</i>
                                            <span>Complaint Type</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="../../maintenance/courier">
                                            <i class="material-icons">person_outline</i>
                                            <span>Courier</span></a>
                                    </li>
                                </ul>
                            </li>
<!-- 
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">beenhere</i>
                                    <span>STATUS MAINTENANCE</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status Category</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status</span></a>
                                    </li>
                                </ul>
                            </li> -->
                            
                            
                            <li>
                                <a href="../../maintenance/policyno">
                                    <i class="material-icons">confirmation_number</i>
                                    <span>Policy Number</span></a>
                            </li>
                            <li>
                                <a href="../../maintenance/insurance/company">
                                    <i class="material-icons">business</i>
                                    <span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="../../maintenance/salesagent">
                                    <i class="material-icons">perm_identity</i>
                                    <span>Sales Agent</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../maintenance/employee">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../maintenance/employee/type">
                                    <i class="material-icons">person_outline</i>
                                    <span>Employee Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">work</i>
                            <span>Transactions</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../transaction/adm/insurance">
                                    <i class="material-icons">account_balance_wallet</i>
                                    <span>Insurance Accounts</span>
                                </a>
                            </li>                    
                            <li>
                                <a href="../../transaction/adm/claims">
                                    <i class="material-icons">queue</i>
                                    <span>Claims</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="../../transaction/adm/tally">
                                    <i class="material-icons">multiline_chart</i>
                                    <span>Tally</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../transaction/adm/transmittal">
                                    <i class="material-icons">folder_shared</i>
                                    <span>Transmittal</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../transaction/adm/complaint">
                                    <i class="material-icons">error_outline</i>
                                    <span>Complaint</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Archives</span>
                        </a>
                        <ul class="ml-menu">                    
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">question_answer</i>
                                    <span>QUOTATION</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/sender.php">
                                            <i class="material-icons">person</i>
                                            <span>Sender</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/vehicle type.php">
                                            <i class="material-icons">directions_car</i>
                                            <span>Vehicle Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">view_comfy</i>
                                            <span>Insurance Items</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/archives/vehicle model.php">Vehicle Model</a>
                                            </li>
                                            <li>
                                                <a href="pages/archives/vehicle make.php">Vehicle Make</a>
                                            </li>
                                            <li>
                                                <a href="pages/archives/vehicle accessories.php">Vehicle Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>BILLING</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/clientType.php">
                                            <i class="material-icons">people_outline</i>
                                            <span>Client Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/installment.php">
                                            <i class="material-icons">dns</i>
                                            <span>Installment Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/bank.php">
                                            <i class="material-icons">account_balance</i>
                                            <span>Bank</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">view_agenda</i>
                                    <span>COMPLAINTS AND TRANSMITTAL</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/complaintType.php">
                                            <i class="material-icons">subject</i>
                                            <span>Complaint Type</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="pages/archives/courier.php">
                                            <i class="material-icons">person_outline</i>
                                            <span>Courier</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">beenhere</i>
                                    <span>STATUS MAINTENANCE</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/categoryStatus.php">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status Category</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="pages/archives/courier.php">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <li>
                                <a href="pages/archives/policy numbers.php">
                                    <i class="material-icons">confirmation_number</i>
                                    <span>Policy Number</span></a>
                            </li>
                            <li>
                                <a href="pages/archives/insurance company.php">
                                    <i class="material-icons">business</i>
                                    <span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="pages/archives/salesAgent.php">
                                    <i class="material-icons">perm_identity</i>
                                    <span>Sales Agent</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/archives/employee.php">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/archives/employeeType.php">
                                    <i class="material-icons">person_outline</i>
                                    <span>Employee Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">CIMIS</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <button type="button" class="btn bg-teal waves-effect left" style="float: left; margin-left: 15px;" onclick="window.document.location='../../transaction/adm/tally';">
        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
    </button>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3> Tally Summary</h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="col-md-2" style="margin-bottom: 0px;"></div>
                            <div class="col-md-4" style="margin-bottom: 0px;"><h4><button type="button" class="btn-xs bg-red waves-effect" style="position: right;" onclick="window.document.location='../../transaction/adm/tally-cheques-history';" data-toggle="tooltip" data-placement="bottom" title="View History">
                                    <i class="material-icons">track_changes</i><span style="font-size: 15px;">
                                </button> Cheques Payable </h4></div>
                            <div class="col-md-2" style="margin-bottom: 0px;"></div>
                            <div class="col-md-4" style="margin-bottom: 0px;"><h4><button type="button" class="btn-xs bg-red waves-effect" style="position: right;" onclick="window.document.location='../../transaction/adm/tally-payment-history';" data-toggle="tooltip" data-placement="bottom" title="View History">
                                    <i class="material-icons">track_changes</i><span style="font-size: 15px;">
                                </button> Payment </h4></div>
                        <div class="body table-responsive">
                            <table class="">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">Cheque #</th>
                                        <th>Bank</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th class="col-md-1">Payment #</th>
                                        <th>Bank</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th class="col-md-1">Match?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0003795067</td>
                                        <td>BDO ANTIPOLO</td>
                                        <td>Nov-28-2016</td>
                                        <td>Php 5,919.63</td>
                                        <td>PAY-12937</td>
                                        <td>BDO ANTIPOLO</td>
                                        <td>Nov-27-2016</td>
                                        <td>Php 5,919.63</td>
                                        <td><input type="checkbox" id="1" class="filled-in chk-col-green checkCheckbox"/><label for="1"></label></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/><br/><br/>
                            <label>Sent by: <b>Rola, Ma. Gabriella T.</b></label>
                            <label>Date: <b>Mar-09-2017 (Tuesday, 3:04:23PM)</b></label>
                            <br/><br/><br/><br/>
                                <button type="button" class="btn bg-teal waves-effect right" onclick="window.document.location='../../transaction/adm/tally';">
                                   <span style="font-size: 15px;"> FINISH</span>
                                </button> 
                            </div>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../../../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../../../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../../js/admin.js"></script>
    <script src="../../../js/pages/ui/tooltips-popovers.js"></script>
    <script src="../../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../../js/pages/forms/form-validation.js"></script>
    <script src="../../../js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="../../../js/demo.js"></script>
</body>

</html>
