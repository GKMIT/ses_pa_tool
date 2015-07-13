<?php
session_start();
// App
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
if(isset($_POST['appointment_of_auditors'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->saveAppointmentOfAuditors($info);

}
$db=new DatabaseReports();
$table1=$db->getTable1Data();
?>
<!DOCTYPE html>
<html lang="en" class="ie8 no-js" xmlns="http://www.w3.org/1999/html">
<html lang="en" class="ie9 no-js">
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title>SES PA Tool</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select/bootstrap-select.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
    <link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select.css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
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
                        <li class="active">
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
                        Appointment of Auditors
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
                                Appointment of Auditors
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" action="appointment-of-auditors.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Appointment of Auditors">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment of Auditors At Banks" hidden-id="check_1"/> Appointment of Auditors At Banks
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment of Auditors at PSU" hidden-id="check_2"/> Appointment of Auditors at PSU
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment of Branch Auditors" hidden-id="check_3"/> Appointment of Branch Auditors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Payment to Cost Auditors" hidden-id="check_4"/> Payment to Cost Auditors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Removal of Auditors" hidden-id="check_5"/> Removal of Auditors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment of Auditors" hidden-id="check_6"/> Appointment of Auditors
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Appointment of Auditors at Banks</h4>
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
                                                        Since the Auditors at Banks are appointed by RBI (a regulator), SES will recommend voting for the resolutions for appointment of Auditors at banks, if approved by RBI
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors at Banks">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors at Banks">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors at Banks">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment of Auditors at Banks">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation">No concern has been identified. The Auditors of the Bank are appointed by the Reserve Bank of India (RBI), an independent regulatory body. SES recommends that shareholders vote FOR the resolution.</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Appointment of Auditors at PSU</h4>
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
                                                        Since the Auditors at PSUs are appointed by CAG (a constitutional and independent third party) SES will recommend voting for the resolutions for appointment of Auditors at PSUs, if appointed on recommendation of CAG.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors at PSU">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors at PSU">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors at PSU">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment of Auditors at PSU">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation">No concern has been identified. The Auditors of the Company are appointed by the Comptroller & Auditor General (CAG) of India, a constitutional and independent third party. SES recommends that shareholders vote FOR the resolution.</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Appointment of Branch Auditors</h4>
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
                                                        Branch Auditors are appointed by the Board in consultation with the statutory Auditors.  In case the Company is appointing the Branch Auditors in consultation with the particular audit firm and not with the Statutory Auditors and SES has recommended voting AGAINST the resolution and then SES will recommend to vote AGAINST the resolution, in all other cases SES will recommend voting for the resolution of appointment of Branch Auditors.
                                                    </p>
                                                    <p>
                                                        In case we are able to find the tenure of Branch Auditors then our recommendation will be done as we do for Statutory Auditors. If we don’t find the tenure of branch Auditors then analysis will be done as mentioned above.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Branch Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Branch Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Did SES recommend voting against the reappointment of the audit firm?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-appointment-of-branch-auditors triggers' name="triggers[]" id="did_ses_recommend_voting_against">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="161">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="did_ses_recommend_voting_against_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Branch Auditors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Branch Auditors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_appointment_of_branch_auditors">Get Recommendation</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment of Branch Auditors">
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_appointment_of_branch_auditors">No concern has been identified. SES recommends that shareholders vote FOR the resolution</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
                                    <h4 class="form-section">Payment to Cost Auditors</h4>

                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Payment to Cost Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Payment to Cost Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Payment to Cost Auditors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Payment to Cost Auditors">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation">No concern has been identified. The Auditors of the Company are appointed by the Comptroller & Auditor General (CAG) of India, a constitutional and independent third party. SES recommends that shareholders vote FOR the resolution.</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Removal of Auditors</h4>
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
                                                        Taking into account the critical role played by auditors in maintaining the integrity of the financial reporting process, SES is of the opinion that any resolution proposing to remove auditors should be backed by adequate rationale. Further, the procedure laid down in the Companies Act, 2013 in this regard should be strictly followed. SES would analyze the disclosure and recommend vote on the proposal on a case-by-case basis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Removal of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company’s Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <input type="hidden" name="resolution_section[]" value="Removal of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Removal of Auditors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Removal of Auditors">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation">No concern has been identified. The Auditors of the Company are appointed by the Comptroller & Auditor General (CAG) of India, a constitutional and independent third party. SES recommends that shareholders vote FOR the resolution.</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_6">
                                    <h4 class="form-section">Appointment of Auditors</h4>
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
                                                        Auditors play a crucial role in ensuring the integrity and transparency of the financial statements, which is necessary for protecting shareholders’ value. Auditors have a duty towards all stakeholders, to bring to their notice, instances of non-compliance, any non-standard accounting practice or any other aspect of the accounts which could adversely affect stakeholders. Stakeholders rely on the auditors to do a thorough analysis of the Company’s accounts to ensure that the information provided is complete, accurate, fair, and is true representation of the Company’s financial position.
                                                    </p>
                                                    <p>
                                                        SES is of the opinion that keeping in view the important role played by the Auditors, an independent Auditor effectively strengthens the hands of board in discharging its duty towards shareholders and reducing risks. Accordingly, we believe that the Auditors’ should be independent, well-qualified, objective, unbiased and free from conflict of interests.
                                                    </p>
                                                    <p>
                                                        SES will keep in mind provisions of the Companies Act, 2013 as regards to tenure and independence of Auditors.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class='col-md-3'>The Company has</label>
                                            <div class='col-md-2'>
                                                <select class='form-control triggers' name="triggers[]" id="no_of_auditors" value="">
                                                    <option value="1">1 Auditor</option>
                                                    <option value="2">2 Auditors</option>
                                                    <option value="3">3 Auditors</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div id='name_of_auditor'>
                                            <div class="form-group" id="name_audit_partner_1">
                                                <input type="hidden" name="used_in[]" value="Name of the Auditor up for the appointment">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <label class="col-md-3">Name of the Auditor up for the appointment</label>
                                                <div class="col-md-3">
                                                    <input type='text' name='used_in_text[]' class='form-control auditor-name other-text' id='auditor_name_1' data-no='1'>
                                                </div>
                                                <label class='col-md-3'>Disclosed in Notice and Annual Report</label>
                                                <div class='col-md-3'>
                                                    <select class='form-control recommendations-fire-appointment-of-auditors triggers' name="triggers[]" id="disclosed_in_notice_and_annual_report">
                                                        <option>Select</option>
                                                        <option value="Disclosed in Notice">Yes (in notice)</option>
                                                        <option value="Disclosed in Annual Report">Yes (in annual report)</option>
                                                        <option value="Disclosed in both Notice and Annual Report">Yes (in notice and annual report)</option>
                                                        <option value="no" data-recommendation-table-id="162">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="name_audit_partner_2">
                                                <input type="hidden" name="used_in[]" value="Name of the Auditor up for the appointment">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <label class="col-md-3">Name of the Auditor up for the appointment</label>
                                                <div class="col-md-3">
                                                    <input type='text' name='used_in_text[]' class='form-control auditor-name other-text' id='auditor_name_2' data-no='2'>
                                                </div>
                                                <label class='col-md-3'>Disclosed in Notice and Annual Report</label>
                                                <div class='col-md-3'>
                                                    <select class='form-control recommendations-fire-appointment-of-auditors triggers' name="triggers[]" id="disclosed_in_notice_and_annual_report1">
                                                        <option>Select</option>
                                                        <option value="Disclosed in Notice">Yes (in notice)</option>
                                                        <option value="Disclosed in Annual Report">Yes (in annual report)</option>
                                                        <option value="Disclosed in both Notice and Annual Report">Yes (in notice and annual report)</option>
                                                        <option value="no" data-recommendation-table-id="163">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="name_audit_partner_3">
                                                <input type="hidden" name="used_in[]" value="Name of the Auditor up for the appointment">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <label class="col-md-3">Name of the Auditor up for the appointment</label>
                                                <div class="col-md-3">
                                                    <input type='text' name='used_in_text[]' class='form-control auditor-name other-text' id='auditor_name_3' data-no='3'>
                                                </div>
                                                <label class='col-md-3'>Disclosed in Notice and Annual Report</label>
                                                <div class='col-md-3'>
                                                    <select class='form-control recommendations-fire-appointment-of-auditors triggers' name="triggers[]" id="disclosed_in_notice_and_annual_report2">
                                                        <option>Select</option>
                                                        <option value="Disclosed in Notice">Yes (in notice)</option>
                                                        <option value="Disclosed in Annual Report">Yes (in annual report)</option>
                                                        <option value="Disclosed in both Notice and Annual Report">Yes (in notice and annual report)</option>
                                                        <option value="no" data-recommendation-table-id="164">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="disclosed_in_notice_and_annual_report_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="auditors_eligibility_info1" class="">
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ eligibility for appointment</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_eligibility_for_appointment1">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_eligibility_for_appointment_analysis_text1">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ independence certificate</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_independence_certificate1">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_independence_certificate_analysis_text1">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditor’s Network</label>
                                                <input type="hidden" name="used_in[]" value="Auditor's Network">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <div class="col-md-4">
                                                    <input type="text" name="used_in_text[]" class="form-control other-text" placeholder="Enter text value" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="auditors_eligibility_info2" class="hidden">
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ eligibility for appointment</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_eligibility_for_appointment2">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_eligibility_for_appointment_analysis_text2">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ independence certificate</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_independence_certificate2">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_independence_certificate_analysis_text2">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditor’s Network</label>
                                                <input type="hidden" name="used_in[]" value="Auditor's Network">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <div class="col-md-4">
                                                    <input type="text" name="used_in_text[]" class="form-control other-text" placeholder="Enter text value" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="auditors_eligibility_info3" class="hidden">
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ eligibility for appointment</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_eligibility_for_appointment3">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_eligibility_for_appointment_analysis_text3">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditors’ independence certificate</label>
                                                <div class="col-md-2">
                                                    <select class='form-control triggers' name="triggers[]" id="auditors_independence_certificate3">
                                                        <option value="">Select</option>
                                                        <option value="disclosed">Disclosed</option>
                                                        <option value="not disclosed">Not Disclosed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="auditors_independence_certificate_analysis_text3">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Appointment of Auditors">
                                                    <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Auditor’s Network</label>
                                                <input type="hidden" name="used_in[]" value="Auditor's Network">
                                                <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                                <div class="col-md-4">
                                                    <input type="text" name="used_in_text[]" class="form-control other-text" placeholder="Enter text value" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id='add_tenure'>
                                        <div class="form-group" id="tenure_time_container_1">
                                            <input type="hidden" name="used_in[]" value="Tenure of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3" id='tenure_label_1'>Tenure of Audit firm/Auditors</label>
                                            <div class="col-md-3">
                                                <input type='text' name="used_in_text[]" class='form-control tanure_value other-text' data-textarea-id="calculate_tenure_analysis_text" id="tanure_value1" value=''>
                                            </div>
                                        </div>
                                        <div class="form-group hidden"  id="tenure_time_container_2">
                                            <input type="hidden" name="used_in[]" value="Tenure of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3" id='tenure_label_2'>Tenure of Audit firm/Auditors</label>
                                            <div class="col-md-3">
                                                <input type='text' name="used_in_text[]" class='form-control tanure_value other-text' data-textarea-id="calculate_tenure_analysis_text"  id="tanure_value2"  value=''>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="tenure_time_container_3">
                                            <input type="hidden" name="used_in[]" value="Tenure of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3" id='tenure_label_3'>Tenure of Audit firm/Auditors</label>
                                            <div class="col-md-3">
                                                <input type='text' name="used_in_text[]" class='form-control tanure_value other-text' data-textarea-id="calculate_tenure_analysis_text"  id="tanure_value3"  value=''>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group hidden calculate_tenure_analysis_text" id="calculate_tenure_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Tenure Analysis">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control calculate_tenure_textarea other-text"></textarea>
                                        </div>
                                    </div>
                                    <div id='add_term'>
                                        <div class='form-group' id="term_appointment_container_1">
                                            <input type="hidden" name="used_in[]" value="Term of appointment of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class='col-md-3' id='term_appointment_label_1'>Term of appointment of Audit firm/Auditors</label>
                                            <div class='col-md-3'>
                                                <input type='text' name="used_in_text[]" class='form-control term-value other-text' id='term_of_appoint1'>
                                            </div>
                                        </div>
                                        <div class='form-group hidden' id="term_appointment_container_2">
                                            <input type="hidden" name="used_in[]" value="Term of appointment of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class='col-md-3' id='term_appointment_label_2'>Term of appointment of Audit firm/Auditors</label>
                                            <div class='col-md-3'>
                                                <input type='text' name="used_in_text[]" class='form-control term-value other-text' id='term_of_appoint2'>
                                            </div>
                                        </div>
                                        <div class='form-group hidden' id="term_appointment_container_3">
                                            <input type="hidden" name="used_in[]" value="Term of appointment of Audit firm/Auditors">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class='col-md-3' id='term_appointment_label_3'>Term of appointment of Audit firm/Auditors</label>
                                            <div class='col-md-3'>
                                                <input type='text' name="used_in_text[]" class='form-control term-value other-text' id='term_of_appoint3'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Term Analysis">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of appointment"></textarea>
                                        </div>
                                    </div>
                                    <div id='audit_partner'>
                                        <div class="form-group"  id="name_auditor_container_1">
                                            <input type="hidden" name="used_in[]" value="Name of the audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3">Name of the audit partner</label>
                                            <div class="col-md-2">
                                                <input type="text" name="used_in_text[]" value="" class="form-control audit-partner-name other-text" placeholder="">
                                            </div>
                                            <input type="hidden" name="used_in[]" value="Tenure of audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3 control-label">Tenure of audit partner</label>
                                            <div class="col-md-2" data-textarea-id="calculate_tenure_audit_partner_value_analysis_text">
                                                <input type="text" name="used_in_text[]" class="tenure_audit_partner_value form-control other-text" id='audit_partner_value1' >
                                            </div>
                                        </div>
                                        <div class="form-group hidden" data-textarea-id="calculate_tenure_audit_partner_value_analysis_text" id="name_auditor_container_2">
                                            <input type="hidden" name="used_in[]" value="Name of the audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3">Name of the audit partner</label>
                                            <div class="col-md-2">
                                                <input type="text" value="" name="used_in_text[]" class="form-control audit-partner-name other-text" placeholder="">
                                            </div>
                                            <input type="hidden" name="used_in[]" value="Tenure of audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3 control-label">Tenure of audit partner</label>
                                            <div class="col-md-2">
                                                <input type="text" name="used_in_text[]" class="tenure_audit_partner_value form-control other-text" id='audit_partner_value2' >
                                            </div>
                                        </div>
                                        <div class="form-group hidden" data-textarea-id="calculate_tenure_audit_partner_value_analysis_text" id="name_auditor_container_3">
                                            <input type="hidden" name="used_in[]" value="Name of the audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3">Name of the audit partner</label>
                                            <div class="col-md-2">
                                                <input type="text" name="used_in_text[]" value="" class="form-control audit-partner-name other-text" placeholder="">
                                            </div>
                                            <input type="hidden" name="used_in[]" value="Tenure of audit partner">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <label class="col-md-3 control-label">Tenure of audit partner</label>
                                            <div class="col-md-2">
                                                <input type="text" name="used_in_text[]" class="tenure_audit_partner_value form-control other-text" id='audit_partner_value3' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group hidden calculate_tenure_audit_partner_value_analysis_text" id="calculate_tenure_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Tenure of audit partner analysis">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text calculate_audit_partner_textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden calculate_tenure_and_term_value_analysis_text" id="calculate_tenure_and_term_value_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Tenure and term analysis">
                                            <input type="hidden" name="resolution_section[]" value="Appointment of Auditors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control calculate_tenure_and_term_value_value other-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the proposed auditors and the previous auditors from the same group firm?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="auditors_same_firm_option_new">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="previous_auditors_details_container1" class="hidden form-body">
                                        <div class="form-group">
                                            <label class="col-md-3">Name of the previous Audit firm/Auditors</label>
                                            <div class="col-md-3">
                                                <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                                <input type="text" name="analysis_text[]" class="form-control analysis-text" />
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn yellow" href="#auditor_table_modal" data-toggle="modal">Check for the group firm <i class="fa fa-share"></i></a>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <div class="form-group hidden" id="auditors_same_firm_tenure1">
                                        <label class="col-md-10">Tenure of the previous Auditor</label>
                                        <div class="col-md-2">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <input type="text" class="form-control analysis-text" id="group_firm_audit_tenure" name="analysis_text[]" />
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="group_firm_audit_tenure_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text " ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Are the Auditors appointed for requisite number of years?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-appointment-of-auditors triggers' id="are_the_auditors_appointed_for_requisite_number_of_years">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="166">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_auditors_appointed_for_requisite_number_of_years_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text " ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Financial interests in or association with the company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-appointment-of-auditors triggers' id="financial_interests_in_or_association_with_the_company">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="167">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="financial_interests_in_or_association_with_the_company_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Business Relationship with the Company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-appointment-of-auditors triggers' id="business_relationship_with_the_company">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="168">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="business_relationship_with_the_company_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company restated material financial statements without adequate justification for the same?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-appointment-of-auditors triggers' id="has_the_company_restated_material_financial">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="169">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_restated_material_financial_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Have material unaudited financial statements been used in consolidated without adequate justification for the same?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="have_material_unaudited_financial">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="170">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="have_material_unaudited_financial_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Were the Auditors/ representative of the Auditors present in the last AGM?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="were_the_auditors">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="171">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="were_the_auditors_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Audit Committee compliant as per the Companies Act, 2013 and Listing Agreement?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="is_the_audit_committee_compliant">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="172">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_audit_committee_compliant_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">TABLE 1</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="financial_year[]" value="<?php echo $table1[0]['financial_year']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="financial_year[]" value="<?php echo $table1[1]['financial_year']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="financial_year[]" value="<?php echo $table1[2]['financial_year']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="financial_year[]" value="<?php echo $table1[3]['financial_year']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="financial_year[]" value="<?php echo $table1[4]['financial_year']; ?>">
                                                </td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="table1">
                                                <td class="col-md-3">Audit Fee (In <i class="fa fa-rupee"></i> Cr)</td>
                                                <td><input type='text' class='form-control audit_fee' name="audit_fee[]" value="<?php echo $table1[0]['audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_fee' name="audit_fee[]" value="<?php echo $table1[1]['audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_fee' name="audit_fee[]" value="<?php echo $table1[2]['audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_fee' name="audit_fee[]" value="<?php echo $table1[3]['audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_fee' name="audit_fee[]" value="<?php echo $table1[4]['audit_fee']; ?>"></td>
                                            </tr>
                                            <tr class="table1">
                                                <td>Audit Related Fee (In <i class="fa fa-rupee"></i> Cr)</td>
                                                <td><input type='text' class='form-control audit_related_fee' name="audit_related_fee[]" value="<?php echo $table1[0]['audit_related_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_related_fee' name="audit_related_fee[]" value="<?php echo $table1[1]['audit_related_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_related_fee' name="audit_related_fee[]" value="<?php echo $table1[2]['audit_related_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_related_fee' name="audit_related_fee[]" value="<?php echo $table1[3]['audit_related_fee']; ?>"></td>
                                                <td><input type='text' class='form-control audit_related_fee' name="audit_related_fee[]" value="<?php echo $table1[4]['audit_related_fee']; ?>"></td>
                                            </tr>
                                            <tr class="table1">
                                                <td>Non Audit Fee</td>
                                                <td><input type='text' class='form-control non_audit_fee' id="non_audit_fee_year_1" data-col-id="1" name="non_audit_fee[]" value="<?php echo $table1[0]['non_audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control non_audit_fee' id="non_audit_fee_year_2" data-col-id="2" name="non_audit_fee[]" value="<?php echo $table1[1]['non_audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control non_audit_fee' id="non_audit_fee_year_3" data-col-id="3" name="non_audit_fee[]" value="<?php echo $table1[2]['non_audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control non_audit_fee' id="non_audit_fee_year_4" data-col-id="4" name="non_audit_fee[]" value="<?php echo $table1[3]['non_audit_fee']; ?>"></td>
                                                <td><input type='text' class='form-control non_audit_fee' id="non_audit_fee_year_5" data-col-id="5" name="non_audit_fee[]" value="<?php echo $table1[4]['non_audit_fee']; ?>"></td>
                                            </tr>
                                            <tr class="table1">
                                                <td>Total Auditors Remuneration (In <i class="fa fa-rupee"></i> Cr)</td>
                                                <td><input type='text' class='form-control total_auditors_remuneration' id="total_auditor_rem_year_1" data-col-id="1" name="total_auditors_remuneration[]" value="<?php echo $table1[0]['total_auditors_fee']; ?>"></td>
                                                <td><input type='text' class='form-control total_auditors_remuneration' id="total_auditor_rem_year_2" data-col-id="2" name="total_auditors_remuneration[]" value="<?php echo $table1[1]['total_auditors_fee']; ?>"></td>
                                                <td><input type='text' class='form-control total_auditors_remuneration' id="total_auditor_rem_year_3" data-col-id="3" name="total_auditors_remuneration[]" value="<?php echo $table1[2]['total_auditors_fee']; ?>"></td>
                                                <td><input type='text' class='form-control total_auditors_remuneration' id="total_auditor_rem_year_4" data-col-id="4" name="total_auditors_remuneration[]" value="<?php echo $table1[3]['total_auditors_fee']; ?>"></td>
                                                <td><input type='text' class='form-control total_auditors_remuneration' id="total_auditor_rem_year_5" data-col-id="5" name="total_auditors_remuneration[]" value="<?php echo $table1[4]['total_auditors_fee']; ?>"></td>
                                            </tr>
                                            <tr class="table1">
                                                <td>Percentage of non-Audit fee</td>
                                                <td><input type='text' class='form-control percentage_non_audit_fee' id="percentage_non_audit_fee_year_1" data-col-id="1" name="percentage_non_audit_fee[]"></td>
                                                <td><input type='text' class='form-control percentage_non_audit_fee' id="percentage_non_audit_fee_year_2" data-col-id="2" name="percentage_non_audit_fee[]"></td>
                                                <td><input type='text' class='form-control percentage_non_audit_fee' id="percentage_non_audit_fee_year_3" data-col-id="3" name="percentage_non_audit_fee[]"></td>
                                                <td><input type='text' class='form-control percentage_non_audit_fee' id="percentage_non_audit_fee_year_4" data-col-id="4" name="percentage_non_audit_fee[]"></td>
                                                <td><input type='text' class='form-control percentage_non_audit_fee' id="percentage_non_audit_fee_year_5" data-col-id="5" name="percentage_non_audit_fee[]"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company made adequate disclosures about audit/ non-audit fee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="has_the_company_made_adequate">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="173">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_made_adequate_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Was Non-audit fee > 75% of the total auditor's remuneration last year? (Not applicable in case one-time fee)</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="was_non_audit_fee">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="174">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="was_non_audit_fee_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Was Non-audit fee > 50% of the total auditor's remuneration in two/three of last three years?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control triggers recommendations-fire-appointment-of-auditors' id="was_non_audit_fee_50">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="175">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="was_non_audit_fee_50_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment of Auditors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_appointment_of_auditors">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment of Auditors" />
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_appointment_of_auditors"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="appointment_of_auditors" class="btn green">Save &amp; Continue</button>
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
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
                type="text/javascript"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
        <script src="assets/scripts/core/app.js"></script>
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script type="text/javascript" src="Scripts/appointment-of-auditors.js"></script>
        <script>
            $(document).ready(function () {
                App.init();
                object.initialization();
                object.pageload();
                $("#auditors_same_firm_option").change(function() {
                    if($(this).val()=='Yes') {
                        $("#auditors_same_firm_tenure").removeClass('hidden');
                    }
                    else {
                        $("#auditors_same_firm_tenure").addClass('hidden');
                    }
                });

                $("#btn_add_previous_auditors").click(function() {
                    $("#previous_auditors_details_container").append("<div class='form-group'> <label class='col-md-3'>Name of the previous Audit firm/Auditors</label> <div class='col-md-3'> <input type='text' class='form-control' /> </div><div class='col-md-2'><button type='button' class='btn btn-danger btn-previous-auditor-group-delete'><i class='fa fa-times'></i></button></div> </div> <div class='form-group'> <label class='col-md-3'>Name of the previous Audit partner</label> <div class='col-md-3'> <input type='text' class='form-control' /> </div> <label class='col-md-3 control-label'>Partner M. No.</label> <div class='col-md-3'> <input type='text' class='form-control' /> </div> </div>");
                    previousAuditorGroupDelete();
                });

                function previousAuditorGroupDelete() {
                    $(".btn-previous-auditor-group-delete").click(function() {
                        $(this).parent().parent().next().remove();
                        $(this).parent().parent().remove();
                    });
                }

                var count = 1;
                var i = 1;
                $("#no_of_auditors").change(function () {
                    count++;
                    i++;
                    if (count == 2)
                        var tenure_value =""<?php //echo $tenureD ?>;
                    if (count == 3)
                        var tenure_value =""<?php //echo $tenureE ?>;
                    // $('#name_of_auditor').append("<div class='form-group'><label class='col-md-3'>Name of the Auditor up for the appointment</label><div class='col-md-3'> <input type='text' id='auditor_name_" + i + "' class='form-control auditor-name' data-no='" + i + "'> </div> <label class='col-md-3'>Disclosed in Notice and Annual Report</label> <div class='col-md-2'> <select class='form-control' id='disclosed_notice'> <option>Select</option> <option>Yes (in notice)</option> <option>Yes (in annual report)</option> <option>Yes (in notice and annual report)</option> <option>No</option> </select> </div> <div class='col-md-1'> <button data-no='" + i + "' type='button' class='btn btn-danger btn_auditor_list_delete'><i class='fa fa-times'></i></button></div></div>");
                    var no_of_auditors = parseInt($(this).val());
                    for(var k=1;k<=no_of_auditors;k++) {
                        $("#name_auditor_container_"+k).removeClass('hidden');
                        $("#tenure_time_container_"+k).removeClass('hidden');
                        $("#name_audit_partner_"+k).removeClass('hidden');
                        $("#term_appointment_container_"+k).removeClass('hidden');
                    }
                    for(var x=no_of_auditors+1;x<=3;x++) {
                        $("#name_auditor_container_"+x).addClass('hidden');
                        $("#tenure_time_container_"+x).addClass('hidden');
                        $("#name_audit_partner_"+x).addClass('hidden');
                        $("#term_appointment_container_"+x).addClass('hidden');
                    }
                    if(no_of_auditors==2) {
                        $("#previous_audit_partners_names_2_block").removeClass('hidden');
                    }
                    else {
                        $("#previous_audit_partners_names_2_block").addClass('hidden');
                    }
                    tenure_call2();
                    $("#t_value" + i + "").val(tenure_value);
                    //tenure_of_audit_firm();
                    //value2_keyup();
                    if (no_of_auditors==1) {
                        $("#joint_auditor_appointed_ques").addClass('hidden');
                    }
                    else {
                        $("#joint_auditor_appointed_ques").removeClass('hidden');
                    }
                });

                function auditPartnerDelete() {
                    $(".btn_auditor_partner_delete").click(function () {
                        $(this).parent().parent().remove();
                    });
                }
                tenure_call2();
                function tenure_call2() {
                    $(".auditor-name").keyup(function () {
                        var text = $(this).val();
                        var text2 = $(this).val();
                        var string1 = "Tenure of ";
                        if (text == '')
                            text = 'Audit firm/Auditors';
                        var string = string1.concat(text);
                        var string2 = "Term of appointment of ";
                        string2 = string2.concat(text);
                        $("#tenure_label_" + $(this).attr('data-no')).text(string);
                        $("#term_appointment_label_" + $(this).attr('data-no')).text(string2);
                    });
                }

                var counter_audit_partner = 2;
                $("#add_partner").click(function () {
                    $("#audit_partner").append("<div class='form-group'><label class='col-md-3'>Name of the audit partner</label><div class='col-md-3'><input type='text' class='form-control'></div><label class='col-md-3 control-label'>Tenure of audit partner</label><div class='col-md-2'><input type='text' id='audit_partner_value' class='form-control'></div><div class='col-md-1'><button data-no='" + counter_audit_partner + "' type='button' class='btn btn-danger btn_auditor_partner_delete'><i class='fa fa-times'></i></button></div></div>");
                    counter_audit_partner++;
                    auditPartnerDelete();
                });

            });
        </script>
        <div id="auditor_table_modal" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Group's Company</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Deloitte Touche Tohmatsu</th>
                                    <th>PWC</th>
                                    <th>Ernst & Young</th>
                                    <th>KPMG</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1. Deloitte Haskins & Sells<br/>
                                        2. P C Hansotia<br/>
                                        3. C C Chokshi & Co<br/>
                                        4. SB Billimoria<br/>
                                        5. M. Pal & Co.<br/>
                                        6. Fraser & Ross<br/>
                                        7. Touche Ross & Co<br/>
                                        8. A.F. Ferguson
                                    </td>
                                    <td>1. Price Waterhouse<br/>
                                        2. Price Waterhouse & Co.<br/>
                                        3. Lovelock & Lewes<br/>
                                        4. RSM & Co<br/>
                                        5. Dalal & Shah
                                    </td>
                                    <td>1. SR Batliboi & Co<br/>
                                        2. SR Batliboi & Associates<br/>
                                        3. SV Ghatalia & Associates<br/>
                                        4. P D Desai & Co<br/>
                                        5. SRBC & Co LLP
                                    </td>
                                    <td>1. BSR & Co<br/>
                                        2. Grant Thornton
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
<!-- END BODY -->
</html>