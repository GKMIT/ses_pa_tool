<?php
session_start();
include_once("Classes/databasereport.php");
include_once("Classes/database.php");
include_once("assets/config/config.php");
include_once("config.php");
if(isset($_POST['intercorporate_loans'])){
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addIntercorporateLoansGuaranteesInvestments($info);
}
?>
<!DOCTYPE html>
<html lang="en" class="ie8 no-js">
<html lang="en" class="ie9 no-js">
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title>SES PA Tool</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
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
                        <li>
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
                        <li class="active">
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
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        INTERCORPORATE LOANS/GUARANTEES/INVESTMENTS
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
                                Intercorporate loans/guarantees/investments
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
                            <form class="form-horizontal" role="form" method="post" action="intercorporate-loans-guarantees-investments.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Intercorporate loans/guarantees/investments">
                                <div class="form-body">
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
                                                        SES is of the opinion that making investments/ guarantees/ loans is a business decision best taken by the Board. For such proposals, SES will analyze the disclosures to determine the fairness and transparency of the proposed transaction. SES will evaluate all proposals for inter-corporate loans/ guarantees and/or investments on a case-by-case basis. Transactions with related parties (especially promoter controlled companies) will attract additional scrutiny. As per Section 186 of the Companies Act, 2013, the scope for investment and loan is not only limited to inter corporate loans and investment but is also extended to include to any person.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong >Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution" name="used_in_text[]"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>THE RECIPIENT</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center">In&nbsp;<i class="fa fa-inr"></i>&nbsp; crore</th>
                                                    <th colspan="2" class="text-center">Lender Company</th>
                                                    <th colspan="2" class="text-center">Recipient Copany</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><input type="text" class="form-control date-picker date1" name="date[]" placeholder="Select date"></td>
                                                    <td class="text-center"><input type="text" class="form-control date-picker date2" name="date[]" placeholder="Select date"></td>
                                                    <td class="text-center"><input type="text" class="form-control date-picker date3" name="date[]" placeholder="Select date"></td>
                                                    <td class="text-center"><input type="text" class="form-control date-picker date4" name="date[]" placeholder="Select date"></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Share Capital</td>
                                                    <td><input type="text" class="form-control share1" name="share[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control share2" name="share[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control share3" name="share[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control share4" name="share[]" placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Reserves and Surplus</td>
                                                    <td><input type="text" class="form-control reserves_and_surplus1" name="reserves_and_surplus[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control reserves_and_surplus2" name="reserves_and_surplus[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control reserves_and_surplus3" name="reserves_and_surplus[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control reserves_and_surplus4" name="reserves_and_surplus[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Total Assets</td>
                                                    <td><input type="text" class="form-control assets1" name="assets[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control assets2" name="assets[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control assets3" name="assets[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control assets4" name="assets[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Total Liabilities</td>
                                                    <td><input type="text" class="form-control liabilities1" name="liabilities[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control liabilities2" name="liabilities[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control liabilities3" name="liabilities[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control liabilities4" name="liabilities[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Revenues</td>
                                                    <td><input type="text" class="form-control revenues1" name="revenues[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control revenues2" name="revenues[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control revenues3" name="revenues[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control revenues4" name="revenues[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Profit After Tax</td>
                                                    <td><input type="text" class="form-control profit_after_tex1" name="profit_after_tex[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control profit_after_tex2" name="profit_after_tex[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control profit_after_tex3" name="profit_after_tex[]" value="" placeholder=""></td>
                                                    <td><input type="text" class="form-control profit_after_tex4" name="profit_after_tex[]" value="" placeholder=""></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="About the Recipient" />
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="About the recipient"><b>About Recipient Company: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Relationship with the Company" />
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Relationship with the Company"><b>Relationship with the Company: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Effect on balance sheet of Lender Company" />
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Effect on balance sheet of Lender Company"><b>Effect on balance sheet of Lender Company: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>EXISTING TRANSACTIONS WITH THE RECIPIENT</strong><input type="checkbox" class="check-trigger checkbox" name="checkbox[]" hidden-id="check_1" value="EXISTING TRANSACTIONS WITH THE RECIPIENT"></p>
                                    <div class="form-group hidden" id="existing_transaction_with_the_recipient">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Transaction Details</th>
                                                    <th class="text-center"><input type="text" class="form-control date-picker selected_date1" name="selected_date[]" placeholder="Select date"></th>
                                                    <th class="text-center"><input type="text" class="form-control date-picker selected_date2" name="selected_date[]" placeholder="Select date"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="existing_transaction">
                                                    <td rowspan="1" style="vertical-align: middle" class="text-center"><input type="text" class="form-control type1" name="type[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="transaction_details[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values2[]" placeholder=""></td>
                                                </tr>
                                                <tr class="existing_transaction">
                                                    <td><input type="hidden"></td>
                                                    <td><input type="text" class="form-control" name="transaction_details[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values2[]" placeholder=""></td>
                                                </tr>
                                                <tr class="existing_transaction">
                                                    <td rowspan="1" style="vertical-align: middle" class="text-center type2"><input type="text" class="form-control" name="type[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="transaction_details[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values2[]" placeholder=""></td>
                                                </tr>
                                                <tr class="existing_transaction">
                                                    <td><input type="hidden"></td>
                                                    <td><input type="text" class="form-control" name="transaction_details[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control" name="details_values2[]" placeholder=""></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>PURPOSE OF THE TRANSACTION</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="PURPOSE OF THE TRANSACTION">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="How is it aligned with the Company’s interests"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>TERMS AND CONDITIONS OF THE TRANSACTION</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="TERMS AND CONDITIONS OF THE TRANSACTION">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="How is it aligned with the Company’s interests"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Source of Funds</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Source of Funds">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="How is it aligned with the Company’s interests"><b>Source of Funds: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>FAIRNESS OF THE TRANSACTION</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="FAIRNESS OF THE TRANSACTION">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="How is it aligned with the Company’s interests"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DIRECTORS’ INTERESTS</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Common Directors</label>
                                        <input type="hidden" name="used_in[]" value="Common Directors">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" ><b>Common Directors: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Directors’ Shareholdings</label>
                                        <input type="hidden" name="used_in[]" value="Directors' Shareholdings">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Intercorporate loans/guarantees/investments" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" ><b>Directors' Shareholdings: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>GENERAL</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company defaulted on any of its existing debt obligations?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_defaulted_on_any">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden triggers" id="has_the_company_defaulted_on_any_sub_part" name="triggers[]">
                                        <label class="col-md-9 col-md-offset-1">Is the loan being made to a material operating subsidiary which is giving positive cash flow?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="is_the_loan_being_made_to_a_material">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="59">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  hidden" id="is_the_loan_being_made_to_a_material_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company undergone a debt restructuring in the last two years?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_undergone_a_debt">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_undergone_a_debt_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Is the loan being made to a material operating subsidiary which is giving positive cash flow?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="is_the_loan_being_made_to_a_material_operating">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="60">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  hidden" id="is_the_loan_being_made_to_a_material_operating_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company a sick company?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_company_a_sick_company">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_a_sick_company_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Is the loan being made to a material operating subsidiary which is giving positive cash flow?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="is_the_loan_being_made">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="61">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  hidden" id="is_the_loan_being_made_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company identified recipients for the proposed transaction?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_identified_recipients">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="62">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_identified_recipients_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the specific amount of the proposed transactions?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_disclosed_the_specific">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="63">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_specific_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed whether the other shareholders of the recipients are making pro-rata contributions? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_disclosed_whether">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="64">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_whether_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_whether_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Are the other shareholders of the recipients making pro-rata contributions?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="are_the_other_shareholders_of_the_recipients">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="65">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_other_shareholders_of_the_recipients_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Audit Committee recommended inter-corporate loans?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_audit_committee_recommended">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="66">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_audit_committee_recommended_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the entity to which the Company intends to provide loans/ guarantees/ investments is not even one-step down subsidiary?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="does_the_entity_to_which_the_company_intends">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="67">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_entity_to_which_the_company_intends_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company has disclosed the rate of interest? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_disclosed_the_rate">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="68">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_rate_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_rate_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Is the rate of interest charged less than the prevailing interest rate of relevant tenure or less than what company pays to other loans?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="is_the_rate_of_interest_charged_less_than">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="69">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  hidden" id="is_the_rate_of_interest_charged_less_than_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company seeks approval by way of omnibus resolution?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="does_the_company_seeks_approval">
                                                <option value="">Select</option>
                                                <option value="yes"  data-recommendation-table-id="70">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_seeks_approval_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company made disclosures required under the Companies Act, 2013?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_made_disclosures_required">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="71">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_disclosures_required_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_disclosures_required_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Has the Company made intercorporate loans/investments in the past?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="has_the_company_made_intercorporate">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_intercorporate_sub_part">
                                        <label class="col-md-9 col-md-offset-1">Is the information related to particulars of loans given, investment made or guarantee given or security provided and the purpose of its utilization by the recipient disclosed in the financial statement/ Director’s Report? </label>
                                        </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-intercorporate-loans triggers' name="triggers[]" id="is_the_information_related_to_particulars_of_loans">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="72">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_information_related_to_particulars_of_loans_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea class="form-control analysis-text" name="analysis_text[]" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_intercorporate_loans">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Intercorporate loans/guarantees/investments">
                                            <textarea rows="6" class="form-control recommendation-text" name="recommendation_text[]" id="recommendation_text_intercorporate_loans"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="intercorporate_loans" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="Scripts/loader-plugin.js" type="text/javascript"></script>
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/intercorporate-loans-guarantees-investments.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initialization();
                object.pageload();
            });
        </script>
</body>
</html>