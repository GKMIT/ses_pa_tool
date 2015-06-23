<?php
session_start();
include_once("assets/config/config.php");
include_once("Classes/databasereport.php");
include_once("config.php");
if(isset($_POST['issues_of_shares'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addIssuesOfShares($info);
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
                        <li class="active">
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
                        Issues of Shares
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
                                Issues of Shares
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
                                                SES is of the opinion that proper capitalization allows a company to efficiently take advantage of business opportunities and effectively operate as a business. SES also believes that such issues are best left to the judgment and discretion of the Board. However, issuing an excessive amount of additional shares and/or convertible securities can potentially dilute holdings of the existing shareholders. Therefore, SES is of the opinion that companies should seek shareholder approval to justify their use of proceeds from issue of additional shares rather than seeking a blanket authority in the form of discretionary powers to issue shares or convertible securities as the Board deems fit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="issues-of-shares.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Issue of Shares">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Rights Issue/Public Issue" class="check-trigger checkbox" hidden-id="check_1"/> Rights Issue/Public Issue
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Preferential Issue" class="check-trigger checkbox" hidden-id="check_2"/> Preferential Issue
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Bonus Issue" class="check-trigger checkbox" hidden-id="check_3"/> Bonus Issue
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Issue of Securities to Public" class="check-trigger checkbox" hidden-id="check_4"/> Issue of Securities to Public
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Issue of preference shares" class="check-trigger checkbox" hidden-id="check_5"/> Issue of preference shares
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Issue of shares with differential voting Rights" class="check-trigger checkbox" hidden-id="check_6"/>  Issue of shares with differential voting Rights
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Rights Issue/Public Issue</h4>
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
                                                        Since such issues are monitored by SEBI, SES will generally recommend voting FOR such resolutions. SES expects the Company to disclose adequate rationale for raising capital and the potential change in the shareholding pattern of the Company post the issue.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Rights Issue/Public Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification" />
                                            <input type="hidden" name="resolution_section[]" value="Rights Issue/Public Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Rights Issue/Public Issue" />
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Rights Issue/Public Issue" />
                                            <textarea rows="4" class="form-control recommendation-text" name="recommendation_text[]" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Preferential Issue</h4>
                                    <div class="panel-group accordion general-view" id="accordion8">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion8" href="#collapse_8">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES in the normal course of action will recommend AGAINST proposals for preferential issue and/or private placement of shares and/or convertible securities due to their dilutive effect on other shareholders unless compelling justifications for the issue has been disclosed by the Company.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DETAILS OF THE PROPOSED ISSUE</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Securities to be issued</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Securities to be issued" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Securities to be issued: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Proposed allottee</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Proposed alloted" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Proposed allottee: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Size of the issue</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Size of the issue" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Size of the issue: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Price of the issue</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Price of the issue" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Price of the issue: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OBJECTIVE OF THE PROPOSED ISSUE</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Objective of the proposed issue" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Obejective of the proposed issue"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>PAST EQUITY ISSUES</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="vertical-align: middle">Year</th>
                                                        <th class="text-center" style="vertical-align: middle">Capital Raised (<i class="fa fa-rupee"></i> Crore)</th>
                                                        <th class="text-center">Subscriber</th>
                                                        <th class="text-center">No of shares</th>
                                                        <th class="text-center">Issue price/share (<i class="fa fa-rupee"></i>)</th>
                                                        <th class="text-center display-none"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="past-equity-issues">
                                                    <tr class="past-equity-issues-row past-eq-row">
                                                        <td class="text-center">
                                                            <select name="year[]" class="form-control year" id='year'>
                                                                <option>Select Year</option>
                                                                <?php
                                                                for($i=2000;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" name="capital_raised[]" id='capital_raised' value="" class="form-control capital_raised" />
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" name="subscriber[]" id='subscriber' value="" class="form-control subscriber">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" name="no_of_share[]" id='no_of_share' value="" class="form-control no_of_share">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" name="issue_price[]" id='issue_price' value="" class="form-control issue_price">
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-danger disabled btn-delete-past-equity-row"><i class="fa fa-times"></i> </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary" id="btn_add_past_equity_row" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Past Equity Issue" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Discussion"></textarea>
                                        </div>
                                    </div>

                                    <p><strong>DILUTION TO SHAREHOLDING</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Sr. no.</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Class of Shareholder</th>
                                                    <th colspan="2" class="text-center">Pre-allotment of shares</th>
                                                    <th colspan="2" class="text-center">Post-allotment of shares</th>
                                                    <th rowspan="2" class="text-center display-none "></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">No of shares</th>
                                                    <th class="text-center">% of paid up capital</th>
                                                    <th class="text-center">No of shares</th>
                                                    <th class="text-center">% of paid up capital</th>
                                                </tr>
                                                </thead>
                                                <tbody class="dilution-row-desciption">
                                                <tr class="dilution-description-row diluton-row">
                                                    <td class="text-center"><input type="text" class="form-control dilution_sno sno" name="dilution_sno[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control dilution_class" name="dilution_class[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty1 dilution_pre_nos" name="dilution_pre_nos[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty1-percent dilution_pre_paid_up" name="dilution_pre_paid_up[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty2 dilution_post_nos" name="dilution_post_nos[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty2-percent dilution_post_paid_up" name="dilution_post_paid_up[]" value="" placeholder=""></td>
                                                    <td class="text-center"><button class="btn btn-danger disabled btn-delete-dilution-row" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary" id="btn_add_dilution_row" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2">
                                                    <label>Total Shares of Pre-Allotment</label>
                                                    <input type="text" name="" class="form-control total-qty1" id="" readonly>
                                                </div>
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="">Total Shares of Post-Allotment</label>
                                                    <input type="text" name="" id="" class="form-control total-qty2" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Dilution to Shareholding" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Discussion"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OTHER DISCLOSURES</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Change in control</label>
                                        <div class="col-md-11" id="row_text">
                                            <input type="hidden" name="used_in[]" value="Change in control" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Change in control: </b></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" id="hide_row" class="btn yellow btn-delete-row">Hide</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Lock-in period</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Lock-in period" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Lock-in period: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Timeline for allotment</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Timeline for allotment" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea  rows="4" name="used_in_text[]" class="form-control other-text"><b>Timeline for allotment: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Certification from statutory auditors</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Certification from statutory auditors" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Certification from statutory auditors: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6">Shareholders' Rights</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Shareholders' Rights" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Shareholders' Rights: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6">Directors' interests</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Directors' interests" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Directors' interests: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6">Buyback or capital reduction in past</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Buyback or capital reduction in past" />
                                            <input type="hidden" name="resolution_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Buyback or capital reduction in past: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the dilution to public shareholders exceeds 5%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="is_the_dilution_to_public_shareholders_exceed">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="34">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_dilution_to_public_shareholders_exceed_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company going for preferential issue of warrants?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="are_warrants_issued_on_preferential_basis">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="35">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_warrants_issued_on_preferential_basis_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the securities being issued to a strategic investor and the dilution to public shareholders does not exceed 5%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="are_the_securities_being_issued_to_a_strategic_investor">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="36">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_securities_being_issued_to_a_strategic_investor_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the securities being issued to a strategic investor and the dilution to public shareholders exceeds 5%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="are_the_securities_being_issued_to_a_strategic">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="37">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_securities_being_issued_to_a_strategic_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed an urgent need for funds or has justified going for preferential issue instead of a rights issue?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="has_the_company_disclosed_an_urgent">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="37">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_an_urgent_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the preferential issue of equity shares made under a Corporate Debt Restructuring (CDR) scheme?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="is_the_preferential_issue_of_equity_share">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="38">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_preferential_issue_of_equity_share_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the dilution to public shareholders exceeds 5% and the acquirer makes an open offer? (for promoters only)</label><div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="is_the_dilution_to_public_shareholder">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="40">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_dilution_to_public_shareholder_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is Preferential issue made without adequate justification?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-preferential-issue triggers' name="triggers[]" id="is_preferential_issue_made">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="41">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_preferential_issue_made_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">General Analysis</h4>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Preferential Issue" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="SES Analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_preferential_issue">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Preferential Issue" />
                                            <textarea rows="6" class="form-control recommendation-text" name="recommendation_text[]" id="recommendation_text_preferential_issue"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Bonus Issue</h4>
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
                                                        SES in normal course of business will recommend FOR proposals for bonus issues unless specific issues are identified
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DETAILS OF THE PROPOSED ISSUE</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Bonus ratio</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Bonus ratio" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text for Bonus ratio"><b>Bonus ratio: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Shares to be issued</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Shares to be issued" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text for shares to be issued"><b>Shares to be issued: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Amount Capitalized</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Amount Capitalized" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text for amount capitalized"><b>Amount Capitalized: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Past Changes in Share Capital</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Past Changes in Share Capital" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text for Past changes in shares capital"><b>Past Changes in Share Capital: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Impact on EPS</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Impact on EPS" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text for Impact on EPS"><b>Impact on EPS: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OBJECTIVE OF THE PROPOSED ISSUE</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Objective of the proposed issue" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Obejective of the proposed issue"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>FINANCIAL POSITION OF THE COMPANY</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Financial Position of the Company" />
                                            <input type="hidden" name="resolution_section[]" value="Bonus Issue" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Financial possition of the company"></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><GENERAL/h4>
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company has sufficient free reserves, securities premium account or capital redemption reserve account for the bonus issue?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="does_the_company_has_sufficient_free_reserves">
                                                    <option value="" >Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="42">No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="does_the_company_has_sufficient_free_reserves_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Company issuing shares by capitalizing reserves created by the revaluation of assets?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="is_the_company_issuing_shares_by_capitalizing">
                                                    <option value="" >Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="43">No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="is_the_company_issuing_shares_by_capitalizing_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company defaulted in payment of interest or principal in respect of fixed deposits or debt securities issued by it?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="has_the_company_defaulted_in_payment_of_interest">
                                                    <option value="" >Select</option>
                                                    <option value="yes" data-recommendation-table-id="44">Yes</option>
                                                    <option value="no" >No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="has_the_company_defaulted_in_payment_of_interest_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company undergone debt restructuring?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="has_the_company_undergone_debt_restructuring">
                                                    <option value="" >Select</option>
                                                    <option value="yes" data-recommendation-table-id="45">Yes</option>
                                                    <option value="no" >No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="has_the_company_undergone_debt_restructuring_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company defaulted in respect of the payment of statutory dues?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="has_the_company_defaulted_in_respect">
                                                    <option value="" >Select</option>
                                                    <option value="yes" data-recommendation-table-id="46">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="has_the_company_defaulted_in_respect_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company not paid dividend but it is issuing bonus shares?</label>
                                            <div class="col-md-2">
                                                <select class='form-control recommendations-fire-bonus-issues triggers' name="triggers[]" id="has_the_company_not_paid_dividend">
                                                    <option value="" >Select</option>
                                                    <option value="yes" data-recommendation-table-id="47">Yes</option>
                                                    <option value="no" >No</option>
                                                    <option value="na">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="has_the_company_not_paid_dividend_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                            </div>
                                        </div>
                                        <h4 class="form-section">General Analysis</h4>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Bonus Issue" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" name="" placeholder="SES Analysis"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn" id="btn_recommendation_text_bonus_issue">Get Recommendation Text</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="recommendation_section[]" value="Bonus Issue" />
                                                <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_bonus_issue"></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
                                    <h4 class="form-section">ISSUE OF SECURITIES TO PUBLIC</h4>
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
                                                        SES will look at proposals to raise equity on a case by case basis. In normal course of business, SES will recommend voting AGAINST proposals that seek blanket approval for issuance of securities without giving adequate justification for the same.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OBJECTIVE OF THE ISSUE</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Objective of the Issue" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Objective of the Issue"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DETAILS OF THE ISSUE</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Securities to be issued</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Securities to be issued" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name=""><b>Securities to be issued: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Issue Type</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Issue Type" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name=""><b>Issue Type: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Issue Size</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Issue Size" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name=""><b>Issue Size: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Issue Price</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Issue Price" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name=""><b>Issue Price: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Eligible investors</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Eligible investors" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name=""><b>Eligible investors: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>DILUTION TO SHAREHOLDING</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Sr. no.</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Class of Shareholder</th>
                                                    <th colspan="2" class="text-center">Pre-allotment of shares</th>
                                                    <th colspan="2" class="text-center">Post-allotment of shares</th>
                                                    <th rowspan="2" class="text-center display-none "></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">No of shares</th>
                                                    <th class="text-center">% of paid up capital</th>
                                                    <th class="text-center">No of shares</th>
                                                    <th class="text-center">% of paid up capital</th>
                                                </tr>
                                                </thead>
                                                <tbody class="dilution-row-desciption-securities ">
                                                <tr class="dilution-description-row-securities  diluton-row-securities">
                                                    <td class="text-center"><input type="text" class="form-control securities_sno" name="securities_sno[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control securities_class" name="securities_class[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty1-securities securities_pre_nos" name="securities_pre_nos[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty1-percent-securities securities_pre_paid" name="securities_pre_paid[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty2-securities securities_post_nos" name="securities_post_nos[]" value="" placeholder=""></td>
                                                    <td class="text-center"><input type="text" class="form-control qty2-percent-securities securities_post_paid" name="securities_post_paid[]" value="" placeholder=""></td>
                                                    <td class="text-center"><button class="btn btn-danger disabled btn-delete-dilution-row-securities" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary" id="btn_add_dilution_row1_securities" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2">
                                                    <label>Total Shares of Pre-Allotment</label>
                                                    <input type="text" name="" class="form-control total-qty1-securities" id="" readonly>
                                                </div>
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label class="">Total Shares of Post-Allotment</label>
                                                    <input type="text" name="" id="" class="form-control total-qty2-securities" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>CONFLICT OF INTERESTS</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Conflict of Interests" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>OTHER DISCLOSURES</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Compliance with minimum public shareholding norms</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Compliance with minimum public shareholding norms" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Compliance with minimum public shareholding norms: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Relevant Date</label>
                                        <div class="col-md-4">
                                            <input type="hidden" name="used_in[]" value="Relevant Date" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <input type="text" name="used_in_text[]" class="form-control date-picker other-text" placeholder="Select date"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Allotment to promoter group</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Allotment to promoter group" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Allotment to promoter group: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Reservations (in any)</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Reservations" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Reservations (in any): </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Past changes in share capital </label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Past changes in share capital" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Past changes in share capital: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the size of the issue disclosed?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="is_the_size_of_the_issue_disclosed">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="48">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_size_of_the_issue_disclosed_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is dilution to public shareholders exceeds 5%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="is_dilution_to_public_shareholders_exceeds">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="49">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_dilution_to_public_shareholders_exceeds_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company seeking blanket approval for issuance of shares and shares may be issued to directors or companies where directors have an interest?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="is_the_company_seeking_blanket_approval_for_issuance">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="50">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_seeking_blanket_approval_for_issuance_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company proposing to issue shares though QIP at a discounted price and there is no-lock in for the existing and the allotted shareholdings?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="is_the_company_proposing_to_issue_shares_though">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="51">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_proposing_to_issue_shares_though_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company has provided an inadequate justification for the issue?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="does_the_company_has_provided_an_inadequate">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="52">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_has_provided_an_inadequate_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company seeking blanket approval for issuance of shares but provided adequate justification and dilution to public shareholders is also less than 5%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issues-of-security triggers' name="triggers[]" id="is_the_company_seeking_blanket_approval_for_issuance_of_shares">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="108">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_seeking_blanket_approval_for_issuance_of_shares_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">General Analysis</h4>
                                    <div class="form-group" id="">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_issues_of_security">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Issue of Securities to Public" />
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_issues_of_security"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Issue of preference shares</h4>
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
                                                        SES in normal course of business may recommend FOR proposals for issue of preference shares unless specific issues are identified. SES will specifically look into the financial position of the Company and its ability to pay regular dividends to the preference shareholders
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Objective of the Issue</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Objective of the Issue" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Objective of the Issue"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Terms of the issue</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-4">Size of the Issue</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Terms of the issue" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" name="" placeholder="Enter value"><b>Size of the Issue: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Price</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Price" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Price: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Redemption period</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Redemption period" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea class="form-control other-text"  name="used_in_text[]" placeholder="Enter value"><b>Redemption period: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Dividend payable</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Dividend payable" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea class="form-control other-text" name="used_in_text[]" placeholder="Enter value"><b>Dividend payable: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Financial Position (Capacity to pay dividends to preference shareholders)</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Financial Position" />
                                            <input type="hidden" name="resolution_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are preference shares redeemable?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="are_preference_shares_redeemable">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="53">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_preference_shares_redeemable_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is redemption period exceeds 20 years? (not Applicable for infra companies)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="is_redemption_period_exceeds">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="54">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_redemption_period_exceeds_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company defaulted in its existing debt payments?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="has_the_company_defaulted">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="55">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_defaulted_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company undergone Corporate Debt Restructuring?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="has_the_company_undergone">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="56">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_undergone_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company made losses in the last 2 financial years?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="has_the_company_made_losses">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="57">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_losses_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is there an option to convert preferential shares to equity shares?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-issue-of-preference-shares triggers' name="triggers[]" id="is_there_an_option_to_convert_preferential">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="58">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_there_an_option_to_convert_preferential_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">General Analysis</h4>
                                    <div class="form-group " id="">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of preference shares" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_issue_of_preference_shares">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Issue of preference shares" />
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_issue_of_preference_shares"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_6">
                                    <h4 class="form-section">Issue of shares with differential voting Rights</h4>
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
                                                        In case of an equity issue of shares with differential voting rights, SES will analyze the differential rights given under the said issue, along with the other considerations as specified above, on a case to case basis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Issue of shares with differential voting Rights">
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company's Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Issue of shares with differential voting Rights">
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Company's Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Issue of shares with differential voting Rights">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" name="analysis_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Issue of shares with differential voting Rights">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="issues_of_shares" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/scripts/core/app.js"></script>
        <script src="Scripts/loader-plugin.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/issues-of-shares.js"></script>
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












