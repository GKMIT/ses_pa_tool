<?php
session_start();
include_once("assets/config/config.php");
include_once("Classes/databasereport.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
if(isset($_POST['employee_stock'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addEmployeeStockOptionScheme($info);
}
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
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                </li>
                <li class="sidebar-search-wrapper">
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
                </li>
                <li class="start">
                    <a href="dashboard.php">
                        <i class="fa fa-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-file-excel-o"></i>
                        <span class="title">
                            Input Sheet
                        </span>
                        <span class="arrow ">
                        </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo $_config['base_url']."InputSheet"; ?>">
                                <span class="title">Upload Input Sheet</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="title">Company</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/add-company.php"; ?>">
                                        Add New Company
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/view-edit-company.php"; ?>">
                                        Edit Company
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="title">Director</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/add-director.php"; ?>">
                                        Add New Director
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director.php"; ?>">
                                        Edit Director
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="title">Input Sheet</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/initialize.php"; ?>">
                                        <span class="title">Initialize</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/director-info.php"; ?>">
                                        Add Director's Info
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director-info.php"; ?>">
                                        Edit Director's Info
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/director-attendance-remuneration.php"; ?>">
                                        Add Director's Attendance and Remuneration
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-director-attendance-remuneration.php"; ?>">
                                        Edit Director's Attendance and Remuneration
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/add-auditor-info.php"; ?>">
                                        Add Auditor's info and Audit fee details
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-auditor-info.php"; ?>">
                                        Edit Auditor's info and Audit fee details
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/add-dividend.php"; ?>">
                                        Add Dividend Info
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/edit-dividend.php"; ?>">
                                        Edit Dividend Info
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_config['base_url']."InputSheet/admin/view-details.php"; ?>">
                                        View Sheet
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."company-and-meeting-details.php"; ?>">
                        <span class="title">Company &amp; Meeting Details</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."ses-recommendations.php"; ?>">
                        <span class="title">SES Recommendations</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."company-background.php"; ?>">
                        <span class="title">Company Background</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."board-of-directors.php"; ?>">
                        <span class="title">Board Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."committee-performance.php"; ?>">
                        <span class="title">Board Commitee Performance</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."remuneration-analysis.php"; ?>">
                        <span class="title">Remuneration Analysis</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_config['base_url']."disclosures.php"; ?>">
                        <span class="title">Disclosures</span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;">
                        <i class="fa fa-sitemap"></i>
                        <span class="title">Resolution Analysis</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo $_config['base_url']."adoption-of-accounts.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Adoption of Accounts</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."declaration-of-dividend.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Declaration of Dividend</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."appointment-of-auditors.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Appointment of Auditors</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."appointment-directors.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Appointment of Directors</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."directors-remuneration.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Directors' Remuneration</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo $_config['base_url']."employee-stock-options-scheme.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">ESOPS</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."related-party-transaction.php"; ?>">
                                <i class="fa fa-briefcase"></i>
								<span class="title">
									Related Party Transactions
								</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."intercorporate-loans-guarantees-investments.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Intercorporate Loans / Guarantees / Investments</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."scheme-of-arrangement-amalgamation.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Scheme of Arrangement / Amalgamation</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."corporate-action.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Corporate Actions</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."issues-of-shares.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Issue of Shares</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."alteration-in-moa-aoa.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Alteration in MOA/AOA</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-gift"></i>
                        <span class="title">Other Resolutions</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo $_config['base_url']."fill-investment-limits.php"; ?>">
                                FII Investment Limits
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."delisting-of-shares.php"; ?>">
                                Delisting of Shares
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."donations-charitable-trusts.php"; ?>">
                                Donation to Charitable Trusts
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $_config['base_url']."office-of-profit.php"; ?>">
                                Office of Profit
                            </a>
                        </li>
                    </ul>
                </li>
                <?php $report_id=$_SESSION['report_id']; ?>
                <li class="last">
                    <a href="<?php echo $_config['base_url']."phpdocx/template/burn-docx.php?report_id=".$report_id; ?>" target="_blank">
                        <i class="fa fa-file-word-o"></i>
                        <span class="title">Burn Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">
                        Employee Stock Options Scheme
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
                                Employee Stock Options Scheme
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <div class="panel-group accordion general-view" id="accordion3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
                                                General View
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                ESOPs are useful for retaining employees and aligning their interests with shareholders’ interests. SES will evaluate the terms of the scheme and the quality of disclosures made while making voting recommendations. SES will analyze any amendment(s) in ESOPs taking into account the fairness and impact of the proposed amendment.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="employee-stock-options-scheme.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" name="main_section" id="main_section" value="Employee Stock Options Scheme">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" class="check-trigger checkbox" hidden-id="check_1" value="Approval of ESOP Scheme"/> Approval of ESOP Scheme
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" class="check-trigger checkbox" hidden-id="check_2" value="ESOP Re-pricing"/> ESOP Re-pricing
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <p><strong>Approval of ESOP Scheme</strong></p>
                                    <div class="panel-group accordion general-view" id="accordion2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES will look at the disclosures made by the Company to judge compliance with the SEBI ESOP guidelines, potential dilution to shareholders due to the scheme and the fairness of the exercise price
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <h3>ESOP DISCLOSURES</h3>
                                    <h5>Disclosure requirement</h5>
                                    <p><strong>Total options in ESOS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Total options in ESOS" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Employee eligibility</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Employee eligibility" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Employee eligibility"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Vesting period</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Vesting period" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Vesting period"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Exercise period</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Exercise period" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Exercise period"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Exercise price</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Exercise price" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Exercise price"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Appraisal process</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Appraisal process" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Appraisal process"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Max options/employee</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Max options/employee" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Max options/employee"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Conformity with accounting policies</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Conformity with accounting policies" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Conformity with accounting policies"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Valuation methodology</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Valuation methodology" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Valuation methodology"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Transferability of options</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Transferability of options" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Transferability of options"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Dilution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Dilution" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="">[]% due to the proposed Scheme and []% due to unutilized options of existing [Scheme Name] which will lead to a total dilution of []% of existing shareholders</textarea>
                                        </div>
                                    </div>
                                    <p><strong>Route of issue</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Route of issue" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the [Direct / trust]"></textarea>
                                        </div>
                                    </div>
                                    <h4>SCHEME ADMINISTRATION</h4>
                                    <h5>Criteria</h5>
                                    <p><strong>Compensation committee independence</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Compensation committee independence" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter Comment for the Compensation committee independence"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Accelerated vesting</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Accelerated vesting" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter Comment for the Accelerated vesting"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Discretion to board to modify scheme</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Discretion to board to modify scheme" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter Comment for the Discretion to board to modify scheme"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Total outstanding options across all schemes</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Total outstanding options across all schemes" />
                                            <input type="hidden" name="resolution_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter Comment for the Total outstanding options across all schemes"><b>Total outstanding options across all schemes</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>GENERAL</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Board given absolute discretion to modify the ESOP scheme?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="has_the_board_given_absolute_discretion">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="73" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_board_given_absolute_discretion_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Do the Cumulative number of shares allocated to all ESOP schemes of the Company exceeds 5% of the issued shares capital?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="do_the_cumulative_number_of_shares">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="74" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="do_the_cumulative_number_of_shares_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the scheme has provisions to provide discretion to the board to accelerate vesting upon retirement/termination/resignation/Change in control?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="does_the_scheme_has_provisions_to_provide">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="75" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="does_the_scheme_has_provisions_to_provide_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the disclosures made by the Company in accordance with the SEBI ESOP Guidelines?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="are_the_disclosures_made_by_the_company">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="76" class="trigger">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="are_the_disclosures_made_by_the_company_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the composition of the Compensation/ Nomination & Remuneration Committee formed to administer the scheme?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="has_the_company_disclosed_the_composition_of_the_compensation">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="77" class="trigger">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_company_disclosed_the_composition_of_the_compensation_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Nomination & Remuneration/ Compensation Committee has less than 50% independent members?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="is_the_nomination_remuneration">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="78" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="is_the_nomination_remuneration_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the scheme explicitly restrict grant of ESOPs to independent directors?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="does_the_scheme_explicitly_restrict">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="79">Yes</option>
                                                <option value="no"  class="trigger">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="does_the_scheme_explicitly_restrict_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company granted option under a pre-IPO scheme without taking shareholders’ approval for the scheme post-IPO?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="has_the_company_granted_option_under">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="80" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_company_granted_option_under_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the scheme provides the option to the board to re-price ESOPs?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="does_the_scheme_provides_the_option">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="81" class="trigger">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="does_the_scheme_provides_the_option_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the exercise price been disclosed? (Either as a band or as a % discount of market price etc.)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-approval-of-esop-scheme triggers' name="triggers[]" id="has_the_exercise_price_been_disclosed">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="82" class="trigger">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_exercise_price_been_disclosed_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="analysis-not-even-a-single-case ">
                                        <p><strong>Analysis</strong></p>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Approval of ESOP Scheme" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text of the Analysis"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_approval_of_esop_scheme">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Approval of ESOP Scheme" />
                                            <textarea rows="6" class="form-control recommendation-text" name="recommendation_text[]" id="recommendation_text_approval_of_esop_scheme"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body hidden" id="check_2">
                                    <p><strong>ESOP RE-PRICING</strong></p>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        Shareholders have substantial risk in owning stocks, and SES is of the opinion that the employees who receive stock options should be similarly positioned to align their interests with shareholder interests. SES is of the opinion that the safety net provided by re-pricing of stock options may incentivize management to take unjustifiable risks. Additionally, a predictable pattern of option re-pricing by the Company alters the option’s value because such options will practically never expire out of the money.
                                                    </p>
                                                    <p>
                                                        SES may make vote FOR proposals to re-price ESOPs in case the Company’s stock declined dramatically due to macroeconomic or industry trends rather than Company specific issues and adequate justification is provided by the Company. We will compare the stock performance vis-a-vis broad and sectoral benchmarks to determine if the cause of the crash was Company specific or not.
                                                    </p>
                                                    <label>In case the fall is due to macroeconomic or industry trends, we may vote FOR the proposals only if the following conditions are satisfied</label>
                                                    <ol>
                                                        <li><p>Directors and Executives do not participate in the re-pricing</p></li>
                                                        <li><p>Adequate justification is provided by the Company on why the company performed poorly</p></li>
                                                        <li><p>A black-out period should be included and options should start vesting only after the end of the black-out period</p></li>
                                                        <li><p>Other terms of ESOP (except the option price) should remain unchanged</p></li>
                                                        <li><p>The new option price is not at a discount on the market price</p></li>
                                                        <li><p>Vested portion of ESOPs granted should not be re-priced</p></li>
                                                        <li><p>Number of re-pricings done in the last 5 years</p></li>
                                                    </ol>
                                                    <p>Additionally, SES may recommend voting FOR the proposal for ESOP re-pricing if the same is justified due to a corporate action that has had an impact on the market price of the Company.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="ESOP Re-Pricing" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification" />
                                            <input type="hidden" name="resolution_section[]" value="ESOP Re-Pricing" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Company’s Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OPTIONS BEING RE-PRICED</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="vertical-align: middle;" rowspan="2">ESOP Scheme</th>
                                                    <th class="text-center">Options </th>
                                                    <th class="text-center">Current Option </th>
                                                    <th class="text-center">Current Market </th>
                                                    <th class="text-center">Proposed Option</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">outstanding</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="esop-stock">
                                                    <td><input type="text" class="form-control esop_scheme" name="esop_scheme[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control options_outstanding" name="options_outstanding[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_option" name="current_option[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_market" name="current_market[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control proposed_option" name="proposed_option[]"  placeholder=""></td>
                                                </tr>
                                                <tr class="esop-stock">
                                                    <td><input type="text" class="form-control esop_scheme" name="esop_scheme[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control options_outstanding" name="options_outstanding[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_option" name="current_option[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_market" name="current_market[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control proposed_option" name="proposed_option[]"  placeholder=""></td>
                                                </tr>
                                                <tr class="esop-stock">
                                                    <td><input type="text" class="form-control esop_scheme" name="esop_scheme[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control options_outstanding" name="options_outstanding[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_option" name="current_option[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control current_market" name="current_market[]"  placeholder=""></td>
                                                    <td><input type="text" class="form-control proposed_option" name="proposed_option[]"  placeholder=""></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>STOCK PERFORMANCE VERSUS BENCHMARKS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr class="stock-performance">
                                                    <td class="text-center" ></td>
                                                    <td class="text-center" ><input type="text" class="form-control company" name="company[]" value="Company"></td>
                                                    <td class="text-center" ><input type="text" class="form-control sp_cnx" name="sp_cnx[]" value="S&P CNX Nifty"></td>
                                                    <td class="text-center" ><input type="text" class="form-control cnx" name="cnx[]" value="CNX Finance"></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="stock-performance">
                                                    <td class="text-center">Price today</td>
                                                    <td class="text-center"><input type="text" class="form-control company" name="company[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control sp_cnx" name="sp_cnx[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control cnx" name="cnx[]" value=""></td>
                                                </tr>
                                                <tr class="stock-performance">
                                                    <td class="text-center">Price 1 year before</td>
                                                    <td class="text-center"><input type="text" class="form-control company" name="company[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control sp_cnx" name="sp_cnx[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control cnx" name="cnx[]" value=""></td>
                                                </tr>
                                                <tr class="stock-performance">
                                                    <td class="text-center">Price 3 years before</td>
                                                    <td class="text-center"><input type="text" class="form-control company" name="company[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control sp_cnx" name="sp_cnx[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control cnx" name="cnx[]" value=""></td>
                                                </tr>
                                                <tr class="stock-performance">
                                                    <td class="text-center">Price 5 years before</td>
                                                    <td class="text-center"><input type="text" class="form-control company" name="company[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control sp_cnx" name="sp_cnx[]" value=""></td>
                                                    <td class="text-center"><input type="text" class="form-control cnx" name="cnx[]" value=""></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Factors leading to Decline in Stock Price</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Factors leading to decline in stock price" />
                                            <input type="hidden" name="resolution_section[]" value="ESOP Re-Pricing" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Internal/external Factors and comments"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>SES’ OPINION ON RE-PRICING </strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="SES' Opinion on re-pricing" />
                                            <input type="hidden" name="resolution_section[]" value="ESOP Re-Pricing" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="">Shareholders take substantial market risk in owning stocks and SES believes that the employees’ remuneration package should be designed in a way that aligns their interests with shareholder interests. Therefore, Companies grant ESOPs to employees in addition to the existing market determined cash compensation to retain them and reward them for good performance of the Company.
                                                    SES believes that re-pricing of options defeats the entire objective behind equity based payment by eliminating the downside of options. Re-pricing of stock options removes the investment risk attached to such options and may incentivize management to take unjustifiable risks. In effect, re-pricing ensures that employees receive returns without taking any risk and therefore, removes the element of performance based pay from such remuneration.
                                                    SES believes that out of money options should not be re-priced and should be allowed to lapse. Shareholders of the Company have no means to recover their actual losses due to poor performance of the Company in the markets. Similarly, employees and management of the Company should not be able to recoup their losses through the option re-pricing.
                                            </textarea>
                                        </div>
                                    </div>
                                    <p>
                                    </p>
                                    <p><strong>Analysis </strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="ESOP Re-Pricing" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text for Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation </strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="ESOP Re-Pricing" />
                                            <textarea name="recommendation_text[]" rows="4" class="form-control recommendation-text" placeholder="Enter text for Recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" id="directors" name="employee_stock" class="btn blue"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script type="text/javascript" src="Scripts/employee-stock-options-scheme.js"></script>
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initialization();
                object.pageload();
            });
        </script>
</body>
</html>