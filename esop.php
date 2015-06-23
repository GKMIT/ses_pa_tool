<?php
include_once("assets/database/Connect.php");
include_once("assets/config/config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ie8 no-js">
<html lang="en" class="ie9 no-js">
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title>Metronic | Form Stuff - Form Controls</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed">
<?php include_once('navbar.php'); ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone">
            </div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <form class="sidebar-search" action="extra_search.html" method="POST">
                <div class="form-container">
                    <div class="input-box">
                        <a href="javascript:;" class="remove">
                        </a>
                        <input type="text" placeholder="Search..."/>
                        <input type="button" class="submit" value=" "/>
                    </div>
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start ">
            <a href="index.html">
                <i class="fa fa-home"></i>
                <span class="title">
                    Dashboard
                </span>
            </a>
        </li>
        <li>
            <a href="company-and-meeting-details.php">
                <span>Company &amp; Meeting Details</span>
            </a>
        </li>
        <li>
            <a href="ses-recommendations.php">
                <span>SES Recommendations</span>
            </a>
        </li>
        <li>
            <a href="company-background.php">
                <span>Company Background</span>
            </a>
        </li>
        <li>
            <a href="appointment-directors.php">
                <span>Appointment/Reappointment of Independent Directors</span>
            </a>
        </li>
        <li>
            <a href="adoption-of-accounts.php">
                <span>Adoption of Accounts</span>
            </a>
        </li>
        <li>
            <a href="declatation-of-dividend.php">
                <span>Declaration of Dividend</span>
            </a>
        </li>
        <li>
            <a href="appointment-of-auditors.php">
                <span>Appointment of Auditors</span>
            </a>
        </li>
        <li>
            <a href="sale-of-assets-business-undertaking.php">
                <span>Sales of Assets/Business/Undertaking</span>
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                Form Controls
                <small>form controls and more</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">
                        Home
                    </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">
                        Form Stuff
                    </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">
                        Form Controls
                    </a>
                </li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <?php
    // $db = new SqlConnect();
    // $db->fetch_query("select * from `companies` where `com_id`=139");
    // $row_company_details = $db->get_row();
    ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-reorder"></i> Employee Stock Options Scheme
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <h4 class="form-section">Full Text of the Resolution</h4>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea rows="4" class="form-control" placeholder="Enter text of the Resolution"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Has the Board been given absolute discretion to modify the ESOP scheme?</label>
                                <div class="col-md-2">
                                    <select class='form-control' id=''>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Do the Cumulative number of shares allocated to all ESOP schemes of the Company exceeds 5% of the issued shares capital?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">The scheme has provisions to provide discretion to the board to accelerate vesting upon retirement/termination/resignation/Change in control.</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Are the disclosures made by the Company not in accordance with the SEBI ESOP Guidelines?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Has the Company not disclosed the composition of the Compensation/ Nomination & Remuneration Committee formed to administer the scheme?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Is the Nomination & Remuneration/ Compensation Committee has less than 50% independent members?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Does the scheme explicitly restrict grant of ESOPs to independent directors?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Has the Company granted option under a pre-IPO scheme without taking shareholders’ approval for the scheme post-IPO?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Does the scheme provides the option to the board to re-price ESOPs?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Has the Exercise price not been disclosed (either as a band or as a % discount of market price etc.)?</label>
                                <div class="col-md-2">
                                    <select class='form-control'>
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footer-inner">
        2014 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
<span class="go-top">
    <i class="fa fa-angle-up"></i>
</span>
    </div>
</div>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/scripts/core/app.js"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
    });
</script>
</body>
</html>