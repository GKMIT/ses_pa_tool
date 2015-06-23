<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
if(isset($_POST['corporate_action'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->saveCorporateAction($info);
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
                        <li class="active">
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
                        Corporate Action
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
                               Corporate Action
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" action="corporate-action.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Corporate Action">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Stock Split" hidden-id="check_1"/> Stock Split
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Share Buy-Back" hidden-id="check_2"/> Share Buy-Back
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Capital Reduction" hidden-id="check_3"/> Capital Reduction
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Debt Restructuring" hidden-id="check_4"/> Debt Restructuring
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Variation in terms of use of IPO proceeds" hidden-id="check_5"/> Variation in terms of use of IPO proceeds
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Increase in Borrowing Limits" hidden-id="check_6"/> Increase in Borrowing Limits
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Creation of charge" hidden-id="check_7"/> Creation of charge
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING" hidden-id="check_8"/>SALE OF ASSETS/ BUSINESS/ UNDERTAKING
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Stock Split</h4>
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
                                                        In general, SES will recommend voting FOR a stock split if it meets regulatory requirements and if the historical share price is in a range where a stock split would enhance liquidity.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Trends in Company’s Stock Price</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-2">Current Date </label>
                                        <div class="col-md-3">
                                            <input type="hidden" name="used_in[]" value="Current Date">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <input type="text"  name="used_in_text[]" class="form-control other-text date-picker" placeholder="Select date"/>
                                        </div>
                                        <label class="col-md-2">Current Price </label>
                                        <div class="col-md-3">
                                            <input type="hidden" name="used_in[]" value="Current Price">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <input type="text" name="used_in_text[]" class="form-control other-text" placeholder="Enter company stock price" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">52 week high</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="52 week high">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"  placeholder="Enter value"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">52 week low</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="52 week low">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"  placeholder="Enter value"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">Price appreciation in last year</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Price appreciation in last year">
                                            <input type="hidden" name="resolution_section[]" value="Stock Split">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"  placeholder="Enter value"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Stock Split">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Stock Split">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Share Buy-Back</h4>
                                    <div class="panel-group accordion general-view" id="accordion3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        A share buy-back plan is often used by the Company to increase the company’s stock price, to distribute excess cash to shareholders, or to offset dilution of earnings caused by the exercise of stock options.
                                                    </p>
                                                    <p>
                                                        SES in the normal course of business will recommend voting FOR proposals to institute open-market share buy-back plans in which all shareholders can participate on equal terms; provided the plan meets all regulatory requirements and no governance/ fairness issues are identified.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Rationale for the Buy-Back</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Rationale for the Buy-Back">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Eligibility for Buy-back</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Eligibility for Buy-back">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Size of the Buy-Back</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Size of the Buy-Back">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" >Any issue of securities/increase in Capital during last 1 year: </textarea>
                                        </div>
                                    </div>
                                    <p><strong>Buy-Back price</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Maximum Buy-back price</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Maximum Buy-back price">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Closing Price as on </label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Closing Price as on">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Average Closing price in the last two weeks</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Average Closing price in the last two weeks">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Average Closing price in the last six months</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Average Closing price in the last six months">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4"><strong>Participation of the promoter group</strong></label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Participation of the promoter group">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" ></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Change in Shareholding Pattern</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th rowspan="3"  class="text-center" style="vertical-align: middle">Item</th>
                                                    <th colspan="2" rowspan="2" class="text-center" style="vertical-align: middle">Pre-Buyback of shares</th>
                                                    <th colspan="4"  class="text-center">Post-Buyback of shares</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-center">Minimum buy-back</th>
                                                    <th colspan="2" class="text-center">Maximum buy-back</th>
                                                </tr>
                                                <tr>
                                                    <th  class="text-center">Quantity</th>
                                                    <th class="text-center">Percentage</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Percentage</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="shareholding-pattern">
                                                    <td>Total Shares</td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                </tr>
                                                <tr class="shareholding-pattern">
                                                    <td>Promoter Group</td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control qty"  name="qty[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control percent"  name="percent[]" placeholder="Enter value"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Change in Shareholding Pattern">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Discussion on above table"></textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Impact</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-4">Impact on Debt-Equity Ratio</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Impact on Debt-Equity Ratio">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Impact on Debt-Equity Ratio:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Impact on EPS</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Impact on EPS">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Impact on EPS:</b></textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Disclosures</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-4">Mode of buyback</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Mode of buyback">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Mode of buyback:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Source of funds</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Source of funds">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Source of funds:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Compliance with SEBI Regulations</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Compliance with SEBI Regulations">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Compliance with SEBI Regulations:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Financial position</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Financial position">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" placeholder="Financial position text"><b>Financial position:</b> The Board is of the opinion that post the buy-back there will be no grounds on which the Company could be found unable to pay its debts and that the Company will be able to meet its liabilities as and when they fall due and will not be rendered insolvent within a period of one year.
                                            </textarea>
                                        </div>
                                    </div>
                                    <p><strong>Declaration of defaults</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Declaration of defaults">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" placeholder="Declaration of defaults text"><b>Declaration of defaults:</b> The Company has confirmed that there are no defaults subsisting in repayment of deposits or redemption of debentures or preference shares or repayment of term loans to any financial institutions or banks.
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Timeframe for the buy-back</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Timeframe for the buy-back">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Timeframe for the buy-back:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Auditors’ certificate</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Auditors' certificate">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Auditors' certificate:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Accounting treatment</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Accounting treatment">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea name="used_in_text[]" class="form-control other-text"  rows="4"><b>Accounting treatment:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Further issue of shares</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Further issue of shares">
                                            <input type="hidden" name="resolution_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" ><b>Further issue of shares: </b>The Company would not be allowed to issue fresh equity shares within six months after the completion of the Buyback except by way of bonus issue or in the discharge of subsisting obligations such as conversion of warrants, stock option schemes, sweat equity or conversion of preference shares or debentures into equity shares.
                                            </textarea>
                                        </div>
                                    </div>
                                    <p><strong>Key Consideration</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the size of the buy-back 15% (as per amendment in SEBI buy-back <a href="http://www.sebi.gov.in/cms/sebi_data/attachdocs/1375961931576.pdf">regulation</a> or less of the aggregate of paid-up capital and free reserves of the company?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_size_of_the_buy_back_15">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_size_of_the_buy_back_15_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the ratio of the aggregate of secured and unsecured debts owed by the company after buy-back more than twice the paid-up capital and its free reserves?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_ratio_of_the_aggregate_of_secured">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_ratio_of_the_aggregate_of_secured_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company made another buy-back in the preceding one year?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_made_another_buy_back">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_another_buy_back_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company issued any securities in the last 6 months (except bonus issue, ESOP, conversion of warrants, preference shares or debentures)</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_issued_any_securitie">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_issued_any_securitie_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the percentage of free float shares available in the market decrease more than 25%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_percentage_of_free_float">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_percentage_of_free_float_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="analysis ">
                                        <p><strong>Analysis</strong></p>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Share Buy-Back">
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Analysis text -If No Case is Triggered"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Share Buy-Back">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Recommendation text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Capital Reduction</h4>
                                    <div class="panel-group accordion general-view" id="accordion4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse_4">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES in normal course of business would recommend voting FOR proposals for capital reduction unless specific governance issues are identified and the Company has not defaulted it repayment of deposits. Is the capital reduction uniform to all shareholders or it differentiates between same class of shareholders?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Capital Reduction">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Capital Reduction">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Capital Reduction">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Analysis text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Capital Reduction">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Recommendation text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
                                    <h4 class="form-section">Debt Restructuring</h4>
                                    <div class="panel-group accordion general-view" id="accordion5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion5" href="#collapse_5">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES in normal course of business would recommend voting FOR proposals for recapitalization plans unless specific governance issues are identified.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Debt Restructuring">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Debt Restructuring">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Debt Restructuring">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Debt Restructuring">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Variation in terms of use of IPO proceeds</h4>
                                    <div class="panel-group accordion general-view" id="accordion6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion6" href="#collapse_6">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES will analyze such resolutions on a case by case basis. SES expects the Company to disclose a strong justification for such proposals including how the change in use of IPO proceeds may benefit the shareholders of the Company.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Variation in terms of use of IPO proceeds">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Variation in terms of use of IPO proceeds">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Company’s Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Variation in terms of use of IPO proceeds">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Variation in terms of use of IPO proceeds">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter text of the Recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_6">
                                    <h4 class="form-section"> Increase in Borrowing Limits</h4>
                                        <div class="panel-group accordion general-view" id="accordion16">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion16" href="#collapse_16">
                                                            General View
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_16" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>
                                                            The Companies Act allows companies to borrow up to a limit of aggregate of its paid-up share capital and free reserves. However, the company may want to increase its borrowing limits for various purposes, which may or may not be strategic in nature. SES in normal course of business would recommend voting FOR proposals for increasing borrowing limits unless specific governance issues are identified. Highly leveraged companies and companies increasing their borrowings by over 50% would attract additional scrutiny.
                                                        </p>
                                                        <p>
                                                            If the increase in borrowing limits is related to a CDR package, SES would generally recommend voting FOR the resolution unless specific issues are identified.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p><strong>Resolution</strong></p>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="used_in[]" value="Resolution">
                                                    <input type="hidden" name="resolution_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                                </div>
                                            </div>
                                            <p><strong>Purpose of the Increased Borrowing Limits</strong></p>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="used_in[]" value="Purpose of the Increased Borrowing Limits">
                                                    <input type="hidden" name="resolution_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Purpose of the Increased Borrowing Limits"></textarea>
                                                </div>
                                            </div>
                                            <p><strong>Utilisation of Borrowing Limits</strong></p>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">Quater</th>
                                                            <th class="text-center">year</th>
                                                            <th class="text-center">Existing Borrowing Limits</th>
                                                            <th class="text-center">Unavailed Borrowing Limits</th>
                                                            <th class="text-center">Proposed Borrowing Limits</th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="template-description">
                                                        <tr class="template table-row-copy borrowing-limits">
                                                            <td class="text-center">
                                                                <select class='form-control' name="quater[]">
                                                                    <option value="">Select Month</option>
                                                                    <option value="march">March</option>
                                                                    <option value="june">June</option>
                                                                    <option value="september">September</option>
                                                                    <option value="december">December</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center">
                                                                <select class='form-control' name="year[]">
                                                                    <option value="">Select Year</option>
                                                                    <?php
                                                                    for($i=2010;$i<=2020;$i++) {
                                                                        echo "<option value='$i'>$i</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td class="text-center"><input type="text" class="form-control" name="existing[]" /></td>
                                                            <td class="text-center"><input type="text" class="form-control" name="unavailed[]" /></td>
                                                            <td class="text-center"><input type="text" class="form-control" name="proposed[]" /></td>
                                                            <td class="text-center"><button type="button" class="btn btn-danger delete-row"><i class="fa fa-times"></i></button></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-default blue" id="add_new_row">Add Rows</button>
                                                </div>
                                            </div>
                                            <p><strong>Capacity to sustain and service the borrowings</strong></p>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="used_in[]" value="Capacity to sustain and service the borrowings">
                                                    <input type="hidden" name="resolution_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Capacity to sustain borrowings:</b></textarea>
                                                </div>
                                            </div>
                                            <p><strong>KEY CONSIDERATIONS</strong></p>
                                            <div class="form-group">
                                                <label class="col-md-10">Does the Company has high cash balance and it is debt free and has not disclosed any usage of borrowings?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="does_the_company_has_high_cash_balance">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="does_the_company_has_high_cash_balance_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Is the amount of borrowing not consistent in the resolution and explanatory statement of the Notice i.e. amount of borrowing proposed differs?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]"  id="is_the_amount_of_borrowing_not_consistent">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="is_the_amount_of_borrowing_not_consistent_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <p><strong>GENERAL</strong></p>
                                            <div class="form-group">
                                                <label class="col-md-10">Has the Company defaulted on any of its existing debt obligations?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="has_the_company_defaulted_on_any_of_its_existing_debt_obligation">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="13">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="has_the_company_defaulted_on_any_of_its_existing_debt_obligation_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Has the Company undergone a debt restructuring in the last two years?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="has_the_company_undergone_a_debt_restructuring">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="14">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="has_the_company_undergone_a_debt_restructuring_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Is the Company a sick company?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="is_the_company_a_sick_company">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="15">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="is_the_company_a_sick_company_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Does the Company have a negative net-worth or has the Company made losses in the last two financial years?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="does_the_company_has_a_negative_net_worth">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="16">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="does_the_company_has_a_negative_net_worth_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Is the Company’s more than 50% of the existing borrowing limits unutilized?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="is_the_company_more_than_50">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="17">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="is_the_company_more_than_50_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Are the loans given to related parties (other than 100% subsidiaries) more than 50% of the proposed increase in borrowing limits?</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="are_the_loans_given_to_related_parties">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="18">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="are_the_loans_given_to_related_parties_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-10">Is the borrowing limit proposed to be directly linked to the Net Worth of the Company? (i.e., x times the Net Worth)</label>
                                                <div class="col-md-2">
                                                    <select class='form-control recommendations-fire-increase-in-borrowing-limits triggers' name="triggers[]" id="is_the_borrowing_limit_proposed">
                                                        <option value="">Select</option>
                                                        <option value="yes" data-recommendation-table-id="19">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="na">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="is_the_borrowing_limit_proposed_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Increase in Borrowing Limits">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn" id="btn_recommendation_text_increase_in_borrowing_limits">Get Recommendation Text</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="recommendation_section[]" value="Increase in Borrowing Limits">
                                                        <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_increase_in_borrowing_limits"></textarea>
                                                    </div>
                                                </div>

                                </div>
                                <div class="form-body hidden" id="check_7">
                                    <h4 class="form-section">Creation of charge</h4>
                                    <div class="panel-group accordion general-view" id="accordion8">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion6" href="#collapse_8">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES will recommend voting action on such proposals on a case-by-case basis. If the resolution is linked with a corresponding resolution seeking an increase in borrowing limits, SES will recommend voting for the resolution only if it recommends voting for the resolution seeking an increase in borrowing limits.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Creation of charge">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Creation of charge">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Company's Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Details of the assets being mortgaged</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Details of the assets being mortgaged">
                                            <input type="hidden" name="resolution_section[]" value="Creation of charge">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Details of the assets being mortgaged"><b>Details of the assets being mortgaged:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Details of the borrowings being secured through the assets</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Details of the borrowings being secured through the assets">
                                            <input type="hidden" name="resolution_section[]" value="Creation of charge">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Details of the borrowings being secured through the assets"><b>Details of the borrowings being secured through the assets:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Beneficiary of the borrowings </strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Beneficiary of the borrowings">
                                            <input type="hidden" name="resolution_section[]" value="Creation of charge">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Beneficiary of the borrowings (Placeholder - Company or a related party)"><b>Beneficiary of the borrowings:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General </strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is this resolution an enabling resolution for a proposal to increase the borrowing limits of the Company for which SES has recommended an against vote?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_this_resolution_an_enabling_resolution">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="20">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_this_resolution_an_enabling_resolution_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed details of assets being mortgaged? (For standalone/ specific resolutions for creation of charge)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_detail">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="21">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_detail_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed details of borrowings being secured?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_detail_of_borrowing">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="22">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_detail_of_borrowing_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the assets being used to secure borrowings of a related party whose financial performance is suspect?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="are_the_assets_being_used_to_secure">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="23">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="are_the_assets_being_used_to_secure_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the assets being used to secure borrowings of a related parties (other than 100% subsidiary) and the liability is not shared proportionately amongst the shareholders?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="are_the_assets_being_used_to_secure_borrowings">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="24">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_assets_being_used_to_secure_borrowings_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Creation of Charge more than the borrowing limit of the company?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_creation_of_charge">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="25">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="is_the_creation_of_charge_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Creation of charge">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn" id="btn_recommendation_text">Get Recommendation Text</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="recommendation_section[]" value="Creation of charge">
                                                <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text"></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-body hidden" id="check_8">
                                    <h4 class="form-section">SALE OF ASSETS/ BUSINESS/ UNDERTAKING</h4>
                                    <div class="panel-group accordion general-view" id="accordion9">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion6" href="#collapse_9">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_9" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        Since sale of assets/business is a strategic decision best taken by the Board, SES in normal course of action, will recommend voting FOR such resolutions unless specific governance issues are identified. Sale to a related party will attract additional scrutiny.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DETAILS OF THE PROPOSED SALE</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Assets/undertaking/business being sold</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Assets/undertaking/business being sold">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Assets/undertaking/business being sold:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Valuation</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Valuation">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Valuation:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Price</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Price">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Price:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Buyer</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Buyer">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Buyer:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Relationship of Company with buyer</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Relationship of Company with buyer">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Relationship of Company with buyer:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>RATIONALE FOR THE SALE</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="RATIONALE FOR THE SALE">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Rational for the sale"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>IMPACT OF THE SALE</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">On income statement</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="On income statement">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>On income statement:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">On balance sheet</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="On balance sheet">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>On balance sheet:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Materiality</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Materiality">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control other-text" name="used_in_text[]" rows="4"><b>Materiality:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>USE OF FUNDS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="USE OF FUNDS">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Use of funds"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>FAIRNESS OF SALE</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="FAIRNESS OF SALE">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="used_in_text[]"class="form-control other-text" placeholder="Enter text of the Fairness of sale"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>CONFLICT OF INTEREST ISSUES</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="CONFLICT OF INTEREST ISSUES">
                                            <input type="hidden" name="resolution_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Conflict of interest issues "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General </strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Independent fairness opinion disclosed?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="is_the_independent_fairness">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="26">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_independent_fairness_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed a rationale behind the sale?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_disclosed_a_rationale">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="27">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_a_rationale_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company fully disclosed the assets/ undertaking/ business being sold?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_fully_disclosed_the_assets">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="28">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_fully_disclosed_the_assets_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the price for the sale?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_disclosed_the_price">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="29">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_company_disclosed_the_price_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the details of the buyer?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_disclosed_the_details_of_the_buyer">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="30">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_details_of_the_buyer_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the impact of sale on the Company’s financials? (turnover, profits and working capital)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_disclosed_the_impact_of_sale">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="31">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_company_disclosed_the_impact_of_sale_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the assets/undertaking being sold material w.r.t. the Company and has the Company not disclosed adequate reasons/rationale for such sale?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="are_the_assets_undertaking">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="32">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="are_the_assets_undertaking_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed that how is it going to utilize the funds? ( generated from sale of assets/ business) </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-sales triggers' name="triggers[]" id="has_the_company_disclosed">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="33">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden " id="has_the_company_disclosed_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                            <textarea class="form-control analysis-text" name="analysis_text[]" rows="4"></textarea>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn" id="btn_recommendation_text_sale_of_assets">Get Recommendation Text</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="recommendation_section[]" value="SALE OF ASSETS/ BUSINESS/ UNDERTAKING">
                                                <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_sale_of_assets"></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="corporate_action" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="Scripts/loader-plugin.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/corporate-action.js"></script>
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