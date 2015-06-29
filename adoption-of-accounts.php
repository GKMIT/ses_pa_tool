<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
if(isset($_POST['adoption_of_accounts'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addAdoptionOfAccounts($info);
}
?>
<!DOCTYPE html>
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
    <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
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
                        <li class="active">
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
                        Adoption of Accounts
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
                                ADOPTION OF ACCOUNTS
                            </a>
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
                                                SES is of the opinion that analysis of accounts is an integral part of financial analysis. Therefore, detailed analysis of accounts is not within the scope of SES’ activities. SES’ analysis will be aimed at enabling shareholders to engage in meaningful discussions with the management during the AGM over the Company’s accounts. Unless there are concerns about the integrity of the financial statements or reports, SES in normal course will not recommend voting against such resolutions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="adoption-of-accounts.php">

                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Adoption of Accounts">
                                <div class="form-body">
                                    <div class="form-group">
                                        <h4 class="col-md-4">Resolution</h4>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Adoption of accounts" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Audit Qualifications</h4>
                                    <div class="form-group">
                                        <label class="col-md-10">Have the auditors made any qualification in their Report ?</label>
                                        <div class="col-md-2">
                                            <select class="form-control triggers" name="triggers[]" id="audit_qualification">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id='audit_show' class='hidden'>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder="Write the qualifications in bullet format. Don't just copy paste the qualification in the report. Understand the qualification and write the same in business lanugage instead of legal language."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder="Company's Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder="SES Opinion"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id='audit_no' class='hidden'>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="The auditors have not made any qualification in their Report."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Auditor's Comments on Standalone Accounts</h4>
                                    <div class="form-group">
                                        <label class="col-md-10">Have the auditors made any comments on standalone accounts ?</label>
                                        <div class="col-md-2">
                                            <select class="form-control triggers" name="triggers[]" id="standalone_accounts">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id='standalone_show' class='hidden'>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id='standalone_no' class='hidden'>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="The Auditors' Report states that in the opinion of the Auditors, the company's financial statements give a true and fair view of the company's state of affairs, profit for the year and cash flows for the year, in conformity with the accounting principles generally accepted in India."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-10">Does the company have consolidated accounts ?</label>
                                        <div class="col-md-2">
                                            <select class="form-control triggers" name="triggers[]" id="consolidated_accounts">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="Consolidated" class='hidden'>
                                            <div class="form-group">
                                                <label class="col-md-10">Have the auditors made any comments on consolidated accounts?</label>
                                                <div class="col-md-2">
                                                    <select class="form-control triggers" name="triggers[]" id="have_the_auditors_made_any_comments">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="consolidated_area" class='hidden'>
                                            <div class="form-group" >
                                                <h4 class="form-section">Auditor's Comments on Consolidated Accounts</h4>
                                                <div class="form-group" id="have_the_auditors_made_any_comments_analysis_text">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                                        <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" ></textarea>
                                                    </div>
                                                </div>
                                                <label class="col-md-10">Have the Company used unaudited statements ?</label>
                                                <div class="col-md-2">
                                                    <select class="form-control triggers" name="triggers[]" id="unaudited_statements">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="unaudited" class='hidden form-group'>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>
                                                                Consolidated Entity<br/>(all figures in <i class="fa fa-rupee"></i> Cr.)
                                                            </th>
                                                            <th>
                                                                Total Assets
                                                            </th>
                                                            <th>
                                                                Total Revenue
                                                            </th>
                                                            <th>
                                                                Net Profit
                                                            </th>
                                                            <th>
                                                                Net Cash Flow
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr id='consolidated1' class="unaudited-statements">
                                                            <th>
                                                                <input type="hidden" name="field_name[]" value="Subsidiaries">
                                                                <label class='label_consolidated'>Subsidiaries</label>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_assets[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_revenue[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_profit[]"/>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_cash_flow[]"/>
                                                            </th>
                                                            <th>
                                                                <button type='button' class='btn btn-danger consolidated_button'><i class='fa fa-times'></i></button>
                                                            </th>
                                                        </tr>
                                                        <tr id='consolidated2' class="unaudited-statements">
                                                            <th>
                                                                <input type="hidden" name="field_name[]" value="Joint Ventures">
                                                                <label class='label_consolidated'>Joint Ventures</label>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_assets[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_revenue[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_profit[]"/>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_cash_flow[]"/>
                                                            </th>
                                                            <th>
                                                                <button type='button' class='btn btn-danger consolidated_button'><i class='fa fa-times'></i></button>
                                                            </th>
                                                        </tr>
                                                        <tr id='consolidated3' class="unaudited-statements">
                                                            <th>
                                                                <input type="hidden" name="field_name[]" value="Associates">
                                                                <label class='label_consolidated'>Associates</label>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_assets[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="total_revenue[]" />
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_profit[]"/>
                                                            </th>
                                                            <th>
                                                                <input class='form-control' name="net_cash_flow[]"/>
                                                            </th>
                                                            <th>
                                                                <button type='button' class='btn btn-danger consolidated_button'><i class='fa fa-times'></i></button>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class='col-md-12'>
                                                <input type="hidden" name="used_in[]" value="Have the Company used unaudited statements ">
                                                <input type="hidden" name="resolution_section[]" value="Adoption Of Accounts">
                                                <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder='The Amount is [material/non-material] with respect to the consolidated accounts of the company.'></textarea>
                                            </div>
                                        </div>
                                        <div class='hidden form-group' id='show_consolidated'>
                                            <div class='col-md-3'>
                                                <select class='form-control' id='label_select_consolidated'>
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                            <div class='col-md-2'>
                                                <button type='button' class='btn' id='recover_row_consolidated'>Recover</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Changes in Accounting Policies</h4>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Changes in Accounting Policies" />
                                            <input type="hidden" name="resolution_section[]" value="Adoption of Accounts" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]"placeholder="Discuss any material variations in accounting policies from the accounting standards"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Financial Indicators</h4>
                                    <div id='' class=' form-group'>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id='financial_indicators'>
                                                    <thead>
                                                    <tr class="tr-td-center">
                                                        <th>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" id="current_year" name="financial_indicators_current_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" id="previous_year" name="financial_indicators_previous_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            Shift
                                                        </th>
                                                        <th>
                                                            Company's Discussion
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr id='tr1' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" name="label_name[]" value="Debtors Turnover"/>
                                                            <label class=''>Debtors Turnover</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' id='debtors15' name='fi_current[]' />
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' id='debtors14' name='fi_previous[]' />
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' id='debtors_shift' name='shift[]' />
                                                        </th>
                                                        <th>
                                                            <textarea  class='form-control' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button no='1' type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr2' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" name="label_name[]" value="Inventory Turnover"/>
                                                            <label class='' >Inventory Turnover</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' id='' name="fi_current[]" />
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button no='2' type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr3' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" name="label_name[]" value="Interest Coverage Ratio"/>
                                                            <label class=''>Interest Coverage Ratio</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' name="fi_current[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control' name="company_discussion[]" ></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr4' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" name="label_name[]" value="Current Ratio"/>
                                                            <label class=''>Current Ratio</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' name="fi_current[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr5' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" name="label_name[]" value="Debt Equity Ratio"/>
                                                            <label class=''>Debt Equity Ratio</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' name="fi_current[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr6' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label_name" name="label_name[]" value="Operating Profit Margin(%)"/>
                                                            <label class=''>Operating Profit Margin(%)</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' id="current_opm" name="fi_current[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' id="previous_opm" name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='tr7' class="table-description financial-indicator tr-td-center">
                                                        <th>
                                                            <input type="hidden" class="add_label label-name" name="label_name[]" value="Net Profit Margin(%)"/>
                                                            <label class=''>Net Profit Margin(%)</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy15' id="current_npm" name="fi_current[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control fy14' id="previous_npm" name="fi_previous[]"/>
                                                        </th>
                                                        <th>
                                                            <input readonly class='form-control shift' name="shift[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control company-discussion' name="company_discussion[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn green" id="addbtn">Add Rows</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='hidden' id='show'>
                                            <div class='col-md-3'>
                                                <select class='form-control' id='label_select'>
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                            <div class='col-md-2'>
                                                <button type='button' class='btn' id='recover_row'> Recover </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='col-md-12'>
                                            <input type="hidden" name="used_in[]" value="Financial Indicators">
                                            <input type="hidden" name="resolution_section[]" value="Adoption Of Accounts">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder='The Amount is [material/non-material] with respect to the consolidated accounts of the company.'></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Contingent Liabilities <input type="checkbox" class="checkbox" id="inlineCheckbox2" name="checkbox[]" value="Contingent Liabilities"></h4>
                                    <div id='contingent' class='form-group hidden'>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr class="">
                                                        <th>
                                                            (All figures in<i class="fa fa-rupee"></i>Crore)
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="contingent_current_year" id="contingent_current_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="contingent_previous_year" id="contingent_previous_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="contingent_liabilities">
                                                        <th>
                                                            <label class=''>Total contingent liabilities</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='total15' name="cl_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='total14' name="cl_previous_year[]"/>
                                                        </th>
                                                    </tr>
                                                    <tr class="contingent_liabilities">
                                                        <th>
                                                            <label class=''>Net worth of the Company</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='networth15' name="cl_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='networth14' name="cl_previous_year[]"/>
                                                        </th>
                                                    </tr>
                                                    <tr class="contingent_liabilities">
                                                        <th>
                                                            <label class=''>Contingent liabilities as a percentage of net worth</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='contingent15' name="cl_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' id='contingent14' name="cl_previous_year[]"/>
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class='col-md-12'>
                                            <input type="hidden" name="used_in[]" value="Contingent Liabilities">
                                            <input type="hidden" name="resolution_section[]" value="Adoption Of Accounts">
                                            <textarea rows="4" name="used_in_text[]" class='form-control other-text'></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Related Party Transactions</h4>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the company have Related Party Transaction ?</label>
                                        <div class="col-md-2">
                                            <select class="form-control triggers" name="triggers[]" id="related_party">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="related" class='hidden form-group'>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr class="tr-td-center">
                                                        <th>
                                                            Outstanding (<i class="fa fa-rupee"></i>Crore)
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="rpt_year1" id="outstanding_current_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="rpt_year2" id="outstanding_previous_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            Shift
                                                        </th>
                                                        <th>
                                                            Comments
                                                        </th>
                                                        <th>

                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr id='related1' class="rpt tr-td-center">
                                                        <th>
                                                            <input type="hidden" name="label_related[]" value="Loans and Advances">
                                                            <label class='add_label_related'>Loans and Advances </label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-current-year' name="rpt_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-previous-year' name="rpt_previous_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-shift' name="shift_rpt[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control rpt-comments' name="rpt_comments[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger related_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='related2' class="rpt tr-td-center">
                                                        <th>
                                                            <input type="hidden" name="label_related[]" value="Bad & Doubtful Advances">
                                                            <label class='add_label_related'>Bad & Doubtful Advances</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-current-year' name="rpt_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-previous-year' name="rpt_previous_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-shift' name="shift_rpt[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control rpt-comments' name="rpt_comments[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger related_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='related3' class="rpt tr-td-center">
                                                        <th>
                                                            <input type="hidden" name="label_related[]" value="Receivables">
                                                            <label class='add_label_related'>Receivables</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-current-year' name="rpt_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-previous-year' name="rpt_previous_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-shift' name="shift_rpt[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control rpt-comments' name="rpt_comments[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger related_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='related4' class="rpt tr-td-center">
                                                        <th>
                                                            <input type="hidden" name="label_related[]" value="Payables">
                                                            <label class='add_label_related'>Payables</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-current-year' name="rpt_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-previous-year' name="rpt_previous_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-shift' name="shift_rpt[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control rpt-comments' name="rpt_comments[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger related_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    <tr id='related5' class="rpt tr-td-center">
                                                        <th>
                                                            <input type="hidden" name="label_related[]" value="Royalty payments">
                                                            <label class='add_label_related'>Royalty payments</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-current-year' name="rpt_current_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-previous-year' name="rpt_previous_year[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control rpt-shift' name="shift_rpt[]"/>
                                                        </th>
                                                        <th>
                                                            <textarea class='form-control rpt-comments' name="rpt_comments[]"></textarea>
                                                        </th>
                                                        <th>
                                                            <button type='button' class='btn btn-danger related_button'><i class='fa fa-times'></i></button>
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='hidden' id='show_related'>
                                            <div class='col-md-3'>
                                                <select class='form-control' id='label_select_related'>
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                            <div class='col-md-2'>
                                                <button type='button' class='btn' id='recover_row_related'> Recover </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='col-md-12'>
                                            <input type="hidden" name="used_in[]" value="Does the company have Related Party Transaction ">
                                            <input type="hidden" name="resolution_section[]" value="Adoption Of Accounts">
                                            <textarea rows="4" name="used_in_text[]" class='form-control other-text'></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section">Standalone vs Consolidated Accounts <input type="checkbox" class="checkbox" id="inlineCheckbox1" name="checkbox[]" value="Standalone vs Consolidated Accounts "></h4>
                                    <div id="comparsion" class='form-group hidden'>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan='2'>
                                                            (In <i class="fa fa-rupee"></i>Crore)
                                                        </th>
                                                        <th colspan='3'>
                                                            Standalone Accounts
                                                        </th>
                                                        <th colspan='3'>
                                                            Consolidated Accounts
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <select class="form-control" name="standalone_current_year" id="standalone_current_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="standalone_previous_year1" id="standalone_previous_year1">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="standalone_previous_year2" id="standalone_previous_year2">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="consolidated_current_year" id="consolidated_current_year">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="consolidated_previous_year1" id="consolidated_previous_year1">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" name="consolidated_previous_year2" id="consolidated_previous_year2">
                                                                <option value="">Select Year</option>
                                                                <?php
                                                                for($i=2010;$i<=2020;$i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="standalone_consolidated">
                                                        <th>
                                                            <input type="hidden" name="label_name[]" value="Revenue">
                                                            <label class=''>Revenue</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value3[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value3[]"/>
                                                        </th>
                                                    </tr>
                                                    <tr class="standalone_consolidated" >
                                                        <th>
                                                            <input type="hidden" name="label_name[]" value="Net Income">
                                                            <label class=''>Net Income</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value3[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value3[]"/>
                                                        </th>
                                                    </tr>
                                                    <tr class="standalone_consolidated">
                                                        <th>
                                                            <input type="hidden" name="label_name[]" value="Total Assets">
                                                            <label class=''>Total Assets</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value3[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value3[]"/>
                                                        </th>
                                                    </tr>
                                                    <tr class="standalone_consolidated">
                                                        <th>
                                                            <input type="hidden" name="label_name[]" value="Net Worth">
                                                            <label class=''>Net Worth</label>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="standalone_value3[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value1[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value2[]"/>
                                                        </th>
                                                        <th>
                                                            <input class='form-control' name="consolidated_value3[]"/>
                                                        </th>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class='col-md-12'>
                                                <input type="hidden" name="used_in[]" value="Standalone vs Consolidated Accounts ">
                                                <input type="hidden" name="resolution_section[]" value="Adoption Of Accounts">
                                                <textarea rows="4" name="used_in_text[]" class='form-control other-text'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section">General Recommendation Guidelines</h4>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company failed to disclose any of the following: Balance Sheet, Income Statement, Cash Flow Statement, and notes to accounts? (standalone and consolidated)</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_failed_to_disclose_any_of_the_following">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="83">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_failed_to_disclose_any_of_the_following_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company defaulted in payment of undisputed statutory dues? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_defaulted_in_payment">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_defaulted_in_payment_sub_part">
                                    <label class="col-md-9 col-md-offset-1">Are the dues greater than 20% of net worth? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_the_dues_greater_than_20_of_net_worth">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="84">Yes</option>
                                            <option value="no" data-recommendation-table-id="85">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_the_dues_greater_than_20_of_net_worth_analysis_text">
                                    <div class="col-md-11 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Does the Company has an audit committee?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="does_the_company_has_an_audit_committee">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="86">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="does_the_company_has_an_audit_committee_sub_part">
                                    <label class="col-md-9 col-md-offset-1">Are the accounts duly approved by the compliant Audit Committee? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_the_accounts_duly_approved_by_the_compliant">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="87">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_the_accounts_duly_approved_by_the_compliant_analysis_text">
                                    <div class="col-md-11 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have the Auditors continuously raised concerns over the inadequacy of internal controls and internal audit functions for the last two years or more?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_the_auditors_continuously_raised_concerns">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="88">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_the_auditors_continuously_raised_concerns_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have the Auditors made adverse comments in the audit report and questioned the going concern assumption of the Company? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_the_auditors_made_adverse_comments_in_the_audit_report">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="89">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_the_auditors_made_adverse_comments_in_the_audit_report_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have the Auditors raised qualifications over the Company’s accounts?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_the_auditors_raised_qualifications_over_the_company_accounts">
                                            <option value="">Select</option>
                                            <option value="yes" >Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_the_auditors_raised_qualifications_over_the_company_accounts_sub_part">
                                    <label class="col-md-9 col-md-offset-1">Are the qualifications raised by the Auditors have a material impact on the financial statements?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_the_qualifications_raised_by_the_auditors_have_a_material">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="90">Yes</option>
                                            <option value="no" data-recommendation-table-id="91">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_the_qualifications_raised_by_the_auditors_have_a_material_analysis_text">
                                    <div class="col-md-11 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company defaulted on the payment of approved dividend?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_defaulted_on_the_payment_of_approved_dividend">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="92">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_defaulted_on_the_payment_of_approved_dividend_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Are Material unaudited statements (greater than 20% of any of the financial parameters) included in the consolidated accounts?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_material_unaudited_statements">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="93">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_material_unaudited_statements_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have the Auditors raised qualification/concern on the going concern assumption of any of the material subsidiaries?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_the_auditors_raised_qualification">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="94">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_the_auditors_raised_qualification_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have Principal Auditors audited less than 50% of any the financial parameters of the consolidated accounts?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_principal_auditors_audited_less_than_50">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="95">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_principal_auditors_audited_less_than_50_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Have short term funds used for long term investments or the current ratio is less than 1?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="have_short_term_funds_used_for_long_term_investment">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="96">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="have_short_term_funds_used_for_long_term_investment_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Are contingent liabilities of the Company more than twice the net-worth of the Company? (Drop-down with Yes, No and Yes for Banks/NBFCs)</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_contingent_liabilities_of_the_company_more_than_twice">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="97">Yes</option>
                                            <option value="no" data-recommendation-table-id="98">No</option>
                                            <option value="no" >Yes For Banks/NBFCs</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_contingent_liabilities_of_the_company_more_than_twice_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company disclosed the Related Party Transactions? (not applicable in case of PSUs and PSBs)</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_disclosed_the_related_party_transactions">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="99" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_disclosed_the_related_party_transactions_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company defaulted in its interest/loan obligations in the last year? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_defaulted_in_its_interest_loan">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="100">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_defaulted_in_its_interest_loan_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Does the Company has negative net worth? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="does_the_company_has_negative_net_worth">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="101">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="does_the_company_has_negative_net_worth_analysis-text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Are Auditors’ qualifications discussed in the Directors’ Report? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_auditors_qualifications_discussed_in_the_director_report">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="102">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_auditors_qualifications_discussed_in_the_director_report_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Are material unaudited financial statements for branches used in the financial statements? (Banks only)</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_material_unaudited_financial_statements_for_branches">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="103">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_material_unaudited_financial_statements_for_branches_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Was Chairman of the Audit Committee present at the last AGM?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="was_chairman_of_the_audit_committee_present_at_the_last_agm">
                                            <option value="">Select</option>
                                            <option value="yes" >Yes</option>
                                            <option value="no" data-recommendation-table-id="104">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="was_chairman_of_the_audit_committee_present_at_the_last_agm_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Were the Auditors present at the last AGM?</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="were_the_auditors_present_at_the_last_agm">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="105">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="were_the_auditors_present_at_the_last_agm_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company granted material unsecured loans/ advances to entity covered under Section 189 of the Companies Act, 2013? Up to `5 lakhs in a year are not required to be entered into the Register (Earlier limit was `1,000)</label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="has_the_company_granted_material_unsecured_loans_advances_to_entity">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="106">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_granted_material_unsecured_loans_advances_to_entity_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Are Statutory Auditors and Internal Auditors same/ belong to same group? </label>
                                    <div class="col-md-2">
                                        <select name="triggers[]" class='form-control triggers recommendations-fire-adoption-of-accounts' id="are_statutory_auditors_and_internal_auditors">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="107">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_statutory_auditors_and_internal_auditors_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                    </div>
                                </div>
                                <h4 class="form-section">General Analysis</h4>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Adoption of Accounts" />
                                        <textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn" id="btn_recommendation_text_adoption_of_accounts">Get Recommendation Text</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="recommendation_section[]" value="Adoption of Accounts" />
                                        <textarea rows="6" class="form-control recommendation-text" name="recommendation_text[]" id="recommendation_text_adoption_of_accounts"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn green" name="adoption_of_accounts">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET
                </div>
            </div>
            <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
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
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script src="assets/scripts/core/app.js"></script>
        <script src="Scripts/adoption-of-accounts.js"></script>
        <script>
            jQuery(document).ready(function() {
                App.init();
                object.initialization();
                object.pageload();
            });
        </script>
</body>
</html>