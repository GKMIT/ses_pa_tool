<?php
session_start();
include_once("assets/config/config.php");
include_once("config.php");
include_once("Classes/databasereport.php");
if(isset($_POST['related_party_transaction'])) {
    $db = new DatabaseReports();
    $info = $_POST;
    $response = $db->saveRelatedPartyTransaction($info);
}
?>
<!DOCTYPE html>
<html lang="en" class="ie8 no-js">
<html lang="en" class="ie9 no-js">
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title>PA Tool</title>
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
                        <li class="active">
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
                        Related Party Transactions
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
                                Related Party Transactions
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
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
                                                SES is of the opinion that related party transactions form an important aspect in the business and is best left to the decision of the Board. Therefore, detailed analysis of related party transactions in terms of its impact on financial statement of the Company is not within the scope of SES’ activities. SES’ analysis will be aimed at the disclosure aspects of RPT in the notice of AGM/EGM/PB as well as independence of audit committee and auditors. Unless there are concerns about the impact of RPT on shareholders’ value (net worth) or fairness issue of the proposal, SES will not recommend voting against such resolutions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="related-party-transaction.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Related Party Transactions">
                                <div class="form-body">
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>PROPOSED RELATED PARTY TRANSACTIONS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="vertical-align: middle;">Disclosures</th>
                                                    <th class="text-center">Details of Disclosure </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Name of the Related Party">Name of the Related Party</td>
                                                    <td><input type="text" class="form-control " name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Relationship with the Company">Relationship with the Company </td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Consideration for Transaction">Consideration for Transaction</td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Ordinary Course of business">Ordinary Course of business</td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Arm's length">Arm's length</td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Nature of Transaction">Nature of Transaction</td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>
                                                <tr class="party_transaction">
                                                    <td><input type="hidden" name="label_name[]" value="Audit Committee Approval">Audit Committee Approval</td>
                                                    <td><input type="text" class="form-control rpt_value1" name="rpt_value1[]" value="" placeholder=""></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>DETAILS OF TRANSACTIONS WITH RELATED PARTY IN THE PAST</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr class="party_in_past">
                                                    <th class="text-center" style="vertical-align: middle;">
                                                        <input type="hidden" name="label_name[]" value="Disclosures(in Crores)">Disclosures(` in Crores)</th>
                                                    <th class="text-center">
                                                        <select name="value1[]" class="form-control year" id="year1">
                                                            <option>Select Year</option>
                                                            <?php
                                                            for($i=2000;$i<=2020;$i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th class="text-center">
                                                        <select name="value2[]" class="form-control year" id="year2">
                                                            <option>Select Year</option>
                                                            <?php
                                                            for($i=2000;$i<=2020;$i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th class="text-center">
                                                        <select name="value3[]" class="form-control year" id="year3">
                                                            <option>Select Year</option>
                                                            <?php
                                                            for($i=2000;$i<=2020;$i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th class="text-center">
                                                        <select name="value4[]" class="form-control year" id="year4">
                                                            <option>Select Year</option>
                                                            <?php
                                                            for($i=2000;$i<=2020;$i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th class="text-center">
                                                        <select name="value5[]" class="form-control year" id="year5">
                                                            <option>Select Year</option>
                                                            <?php
                                                            for($i=2000;$i<=2020;$i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="table2">
                                                    <td><input type="text" class="form-control" name="label_name[]" placeholder="Nature of Transaction1"></td>
                                                    <td><input type="text" class="form-control n_t_1" id="n_t_1_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_1" id="n_t_1_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_1" id="n_t_1_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_1" id="n_t_1_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_1" id="n_t_1_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="text" class="form-control" name="label_name[]" placeholder="Nature of Transaction2"></td>
                                                    <td><input type="text" class="form-control n_t_2" id="n_t_2_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_2" id="n_t_2_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_2" id="n_t_2_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_2" id="n_t_2_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control n_t_2" id="n_t_2_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="hidden" name="label_name[]" value="Total RPTs' Value">Total RPTs’ Value</td>
                                                    <td><input type="text" class="form-control total_rpt_value" id="total_rpt_value_year_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control total_rpt_value" id="total_rpt_value_year_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control total_rpt_value" id="total_rpt_value_year_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control total_rpt_value" id="total_rpt_value_year_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control total_rpt_value" id="total_rpt_value_year_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="hidden" name="label_name[]" value="Turnover of the Company">Turnover of the Company</td>
                                                    <td><input type="text" class="form-control turnover_company" id="turnover_company_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control turnover_company" id="turnover_company_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control turnover_company" id="turnover_company_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control turnover_company" id="turnover_company_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control turnover_company" id="turnover_company_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="hidden" name="label_name[]" value="RPTs as a % of Turnover">RPTs as a % of Turnover</td>
                                                    <td><input type="text" class="form-control rpt_per_turnover" id="rpt_per_turnover_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control rpt_per_turnover" id="rpt_per_turnover_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control rpt_per_turnover" id="rpt_per_turnover_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control rpt_per_turnover" id="rpt_per_turnover_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control rpt_per_turnover" id="rpt_per_turnover_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="hidden" name="label_name[]" value="Net Profits of the company">Net Profits of the Company</td>
                                                    <td><input type="text" class="form-control net_profit" id="net_profit_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit" id="net_profit_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit" id="net_profit_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit" id="net_profit_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit" id="net_profit_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>
                                                <tr class="table2">
                                                    <td><input type="hidden" name="label_name[]" value="Net Profits as a % of Turnover">Net Profits as a % of Turnover</td>
                                                    <td><input type="text" class="form-control net_profit_per" id="net_profit_per_2" data-col-id="2" name="value1[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit_per" id="net_profit_per_3" data-col-id="3" name="value2[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit_per" id="net_profit_per_4" data-col-id="4" name="value3[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit_per" id="net_profit_per_5" data-col-id="5" name="value4[]" placeholder=""></td>
                                                    <td><input type="text" class="form-control net_profit_per" id="net_profit_per_6" data-col-id="6" name="value5[]" placeholder=""></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Purpose of the Resolution (As Stated by Company)</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Vesting period" />
                                            <input type="hidden" name="resolution_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Vesting period"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Related Directors/ KMPS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Exercise period" />
                                            <input type="hidden" name="resolution_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Exercise period"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>SES View</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Exercise price" />
                                            <input type="hidden" name="resolution_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Exercise price"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>GENERAL RECOMMENDATION GUIDELINES</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company have an Audit Committee? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="does_the_company_have_an_audit_committee">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="152">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_have_an_audit_committee_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_have_an_audit_committee_sub_part">
                                        <label class="col-md-10">Is the Audit Committee compliant as per all relevant provisions?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="is_the_audit_committee_compliant_as_per_all_relevant_provisions">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="153">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Have the Auditors made adverse comments/ qualified opinion in the audit report (last annual report) on the entity with whom RPT is taking place?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="have_the_auditors_made_adverse_comments">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="154">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="have_the_auditors_made_adverse_comments_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company provided a reference of the said RPT in Board’s report along with justification for entering into such contract or arrangement?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="has_the_company_provided_a_reference_of_the_said_rpt">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="155">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_provided_a_reference_of_the_said_rpt_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the Audited Financial Statement (wherever available) for that year/ last year, for the related Party been disclosed?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="are_the_audited_financial_statement">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="156">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_audited_financial_statement_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_audited_financial_statement_sub_part">
                                        <label class="col-md-10">Have the Auditors of the entity raised serious concerns/ made qualified opinion?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="have_the_auditors_of_the_entity_raised">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="157">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="have_the_auditors_of_the_entity_raised_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company seeking related party transactions approval for a fixed term?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="is_the_company_seeking_related_party">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="158">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_seeking_related_party_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>

                                    <p><strong>Key considerations</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company made all the disclosures that are required as per the Act? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="has_the_company_made_all_the_disclosures">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="159">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_all_the_disclosures_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the net worth of the related party less than the total value of transaction?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="is_the_net_worth_of_the_related_party_less">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_net_worth_of_the_related_party_less_sub_part">
                                        <label class="col-md-10">Is the consideration received/ given upfront or not?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="is_the_consideration_received_given_upfront_or_not">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="160">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_consideration_received_given_upfront_or_not_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the Valuation Report?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-rpt' id="has_the_company_disclosed_the_valuation_report">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_valuation_report_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>

                                    <h4 class="form-section">General Analysis</h4>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Related Party Transactions" />
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_rpt">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Related Party Transactions" />
                                            <textarea rows="6" class="form-control recommendation-text" name="recommendation_text[]" id="recommendation_text_rpt"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions fluid">
                                        <div class="col-md-12">
                                            <button type="submit" name="related_party_transaction" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script type="text/javascript" src="Scripts/related-party-transaction.js"></script>
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



















