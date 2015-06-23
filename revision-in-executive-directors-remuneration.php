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
                <?php include_once('side-nav-bar.php'); ?>
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
                        Revision in Executive Director's Remuneration
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
                                Revision in Executive Director's Remuneration
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
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
                                        <label class="col-md-10">Is the increase in remuneration between 25% - 50% of the existing salary and the Company has not provided adequate justification for the same?</label>
                                        <div class="col-md-2">
                                            <select class='form-control'>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the increase in remuneration more than 50% of the existing salary?</label>
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
                                        <label class="col-md-10">Is the remuneration paid to the executive director excessive (as per analysis) and the Company proposes to further increase the remuneration?</label>
                                        <div class="col-md-2">
                                            <select class='form-control'>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company have a Nomination and Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select class='form-control' id="page_10_ques_4">
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="page_10_ques_4_hidden">
                                        <label class="col-md-10">Is the Nomination and Remuneration Committee compliant with the Companies Act, 2013/Clause 49 of the Listing Agreement? </label>
                                        <div class="col-md-2">
                                            <select class='form-control'>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the concerned Executive Director a member/Chairman of the Nomination & Remuneration Committee?</label>
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
                                        <label class="col-md-10">Is the resolution grants the Board discretion to change remuneration without taking further shareholder approval unless a reasonable band is provided?</label>
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
                                        <label class="col-md-10">Does the remuneration package have any performance based pay?</label>
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
                                        <label class="col-md-10">Is the average attendance of director at board meetings held in last 3 years was less than 75%?</label>
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
                                        <label class="col-md-10">Have the remuneration components payable to the director capped? </label>
                                        <div class="col-md-2">
                                            <select class='form-control' id="page_10_ques_9">
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="page_10_ques_9_hidden">
                                        <label class="col-md-10">Is there an overall cap on the remuneration package either in absolute terms or in terms of percentage which is subject to Schedule V of the Companies, 2013?</label>
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
                                        <label class="col-md-10">Are the remuneration components payable to the director disclosed?</label>
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
                                        <label class="col-md-10">Has the Company made incremental losses in the last financial year and remuneration is being increased without justification?</label>
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
                                        <label class="col-md-10">Has the Company defaulted on any of its debt obligations and remuneration is being increased without justification?</label>
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
                                        <label class="col-md-10">Has the Company undergone a Corporate Debt Restructuring and remuneration is being increased without justification?</label>
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
                                        <label class="col-md-10">Is the minimum remuneration payable includes variable pay? </label>
                                        <div class="col-md-2">
                                            <select class='form-control' id="page_10_ques_14">
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="page_10_ques_14_hidden">
                                        <label class="col-md-10">Has the Company disclosed whether the minimum remuneration is within Schedule V of the Companies Act, 2013? </label>
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
                                        <label class="col-md-10">Will the Director receive guaranteed bonus/commission?</label>
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
        <script type="text/javascript" src="Scripts/custom.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initializePage10();
            });
        </script>
</body>
</html>