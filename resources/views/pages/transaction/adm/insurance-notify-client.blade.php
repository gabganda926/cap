<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Notify Client - Manage Insurance Accounts - Transaction | i-Insure</title>
     <link href="../../../css/modal.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../../../material-design-icons-3.0.1/iconfont/material-icons.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="../../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

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
                            <li class="active">
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
                            <li>
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
                    &copy; 2016 <a href="javascript:void(0);">i-Insure</a>.
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
    <button type="button" class="btn bg-teal waves-effect left" style="float: left; margin-left: 15px;" onclick="window.document.location='../../transaction/adm/insurance-expiring-accounts';">
        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
    </button>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3> Notify Client for Renewal </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                    <label>Choose criteria: </label>
                                        <select class="form-control show-tick" multiple="multiple">
                                            <optgroup label="Insurance Company">
                                            <option>FPG Insurance</option>
                                            <option>Standard Insurance</option>
                                            <option>People's General Insurance</option>
                                            </optgroup>
                                            <optgroup label="End of Insurance Date" data-max-options="1">
                                            <option>1-5 day/s before end of insurance</option>
                                            <option>6-10 days before end of insurance</option>
                                            <option>11-15 days before end of insurance</option>
                                            <option>16-20 days before end of insurance</option>
                                            </optgroup>
                                        </optgroup>
                                    </select>
                                    </div>
                                    <br/>
                                </div>
                                <form id="wizard_with_validation" method="POST">
                                <h3> Select Recipients </h3>
                                <fieldset>
                                <select id="optgroup" class="ms" multiple="multiple" style="height: 500px;"  required>
                                    <optgroup label="FPG Insurance">
                                        <option value="AK">Bukid, Gerald</option>
                                        <option value="HI">Rola, Na. Gabriella Tan</option>
                                    </optgroup>
                                    <optgroup label="Standard Insurance">
                                        <option value="CA">Avellaneda, Marynel</option>
                                        <option value="NV">Franco, Edgardo</option>
                                        <option value="OR">Kim, Bok Joo</option>
                                        <option value="WA">Kim, Myung Soo</option>
                                    </optgroup>
                                    <optgroup label="Commonwealth">
                                        <option value="AZ">Dela Cruz, Lyndan Pol</option>
                                        <option value="CO">Pery, Roy Christian</option>
                                        <option value="ID">Reyes, Norman Fernandez</option>
                                    </optgroup>
                                    <optgroup label="People's General Insurance">
                                        <option value="AL">No, Min Woo</option>
                                        <option value="AR">Kim, Jongin</option>
                                        <option value="IL">Park, Bo Gum</option>
                                        <option value="IA">Jeon, Jungkook</option>
                                    </optgroup>
                                </select>
                                <br/><br/>

                                <br/>
                                </fieldset>

                                <h3>Edit Notice</h3>
                                <fieldset>
                                    <textarea style="height: 500px; width: 860px; resize:none;" required>
                                                                                                                <date here>

        Dear Valued Client,

                We have seen that your account will expire soon.
                Please feel free to contact us whenever you want to renew your account.
                More power and God Bless!



        Compreline Insurance Services 
        number here 
        emailhere
                                    </textarea>
                                </fieldset>

                                <h3>Mode of Sending the Notice</h3>
                                <fieldset>
                                                
                                        <div class="demo-radio-button">
                                            <input name="group1" type="radio" class="with-gap radio-col-indigo" id="radio_3" />
                                            <label for="radio_3">Send via E-mail</label>
                                            <input name="group1" type="radio" id="radio_4" class="with-gap radio-col-indigo" />
                                            <label for="radio_4">Send via SMS</label>
                                            <input name="group1" type="radio" id="radio_5" class="with-gap radio-col-indigo" />
                                            <label for="radio_5">Send via Courier</label>
                                        </div><br/>

                                        <!-- VIA EMAIL --> 
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <b>Email Address</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">mail_outline</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control email" placeholder="example@example.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- VIA SMS -->
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <b>Cellphone number</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">perm_phone_msg</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control mobile-phone-number" placeholder="Ex: +63 (905) 308-47-08">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- VIA COURIER --> 
                                        <div class="col-md-3">
                                            <p>
                                                <b>Choose Courier: </b>
                                            </p>
                                            <select class="form-control show-tick" data-live-search="true">
                                                <option>Dela Cruz, Lyndan Pol</option>
                                                <option>Franco, Edgardo</option>
                                                <option>Pery, Roy Christian</option>
                                            </select>
                                        </div>
                                    
                                </fieldset>

                                <h3>Summary</h3>
                                <fieldset>
                                <p>
                                    <b>Criteria: </b> Criteria here
                                </p>
                                <div class="body table-responsive col-md-6">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="col-md-2">Client</th>
                                                <th class="col-md-2">Insurance Company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rola, Ma. Gabriella T.</td>
                                                <td>FPG Insurance</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Mode of Sending Notice
                                            </h2>
                                        </div>
                                        <div class="body">
                                            Send via:
                                                    Via here
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                </form>
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

    <!-- Bootstrap Colorpicker Js -->
    <script src="../../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../../plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../../../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../../plugins/nouislider/nouislider.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../../../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../../js/admin.js"></script>
    <script src="../../../js/pages/forms/form-wizard.js"></script>
    <script src="../../../js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../../js/demo.js"></script> 

    <!-- Custom Js -->
    <script src="../../../js/admin.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../../../plugins/jquery-steps/jquery.steps.js"></script>
</body>
</html>
