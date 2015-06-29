<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
if(isset($_POST['alteration_moa_aoa'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addAlterationMoaAoa($info);
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
                        <li>
                            <a href="<?php echo $_config['base_url']."issues-of-shares.php"; ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Issue of Shares</span>
                            </a>
                        </li>
                        <li class="active">
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
                        Alteration in MOA / AOA
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
                                Alteration in MOA / AOA
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
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
                                                SES will evaluate proposed amendments to a company’s articles of association or memorandum of associations on a case-by-case basis. SES does not support bundling of several amendments into a single proposal, unless all such modifications are being made due to a single event/change. In case several amendments are bundled into a single resolution, we will analyze each amendment individually. We will recommend voting for the proposal only if no issue is identified in any of the proposed amendment. Additionally, we will provide voting advice on each individual amendment in case the Company decides to hold individual voting for each proposed amendment.
                                            </p>
                                            <p>
                                                In case the changes in AoA/ MoA have been necessitated due to a transaction/ proposal on which SES has provided a FOR recommendation, SES may recommend a FOR vote for all the proposed changes, even if the said changes have been bundled into a single resolution.
                                            </p>
                                            <p>
                                                In case the amendments have been necessitated by a regulatory change, we may recommend voting FOR the proposed changes even if the said amendments have been bundled into a single resolution.
                                            </p>
                                            <p>
                                                In case the Company does not disclose the changes it is making in the AoA/MoA, SES will recommend the shareholders to vote AGAINST the resolution.
                                            </p>
                                            <p>
                                                As a good governance practice, SES will recommend the Company to present a comparative analysis between the existing AoA/MoA and the proposed one. If the Company does not present the comparative table, although it has presented the entire draft of the new AoA/ MoA, SES will recommend the shareholders to vote AGAINST the resolution.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="alteration-in-moa-aoa.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Alteration in MOA / AOA">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Change in Objects Clause" class="check-trigger checkbox" hidden-id="check_1"/> Change in "Objects Clause"
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Change in Quorum Requirements" class="check-trigger checkbox" hidden-id="check_2"/> Change in Quorum Requirements
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Change in name of the Company" class="check-trigger checkbox" hidden-id="check_3"/> Change in name of the Company
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Change in Registered office of the Company" class="check-trigger checkbox" hidden-id="check_4"/> Change in Registered office of the Company
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Change in Authorized Capital" class="check-trigger checkbox" hidden-id="check_5"/> Change in Authorized Capital
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Increase in Board Strength" class="check-trigger checkbox" hidden-id="check_6"/> Increase in Board Strength
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="checkbox[]" value="Changes due to shareholders' Agreements" class="check-trigger checkbox" hidden-id="check_7"/> Changes due to shareholders' Agreements
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="checkbox[]" value="Removal of clauses due to termination of shareholders' Agreement" class="check-trigger checkbox" hidden-id="check_8"/> Removal of clauses due to termination of shareholders' Agreement
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Change in "Objects Clause"</h4>
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
                                                        If the proposed new business is in line with the existing businesses of the Company, SES will recommend voting FOR the resolution
                                                    </p>
                                                    <p>
                                                        If the proposed new business is not aligned with the existing businesses of the Company, SES expects the Company to provide adequate rationale for entering the business. In such cases, SES will make recommendations based on the analysis of the Company's rationale.
                                                    </p>
                                                    <p>
                                                        SES will not make any comment on the feasibility/potential profitability of the proposed business, nor will it endorse the business decision taken by the Company.
                                                    </p>
                                                    <p>
                                                        SES will analyze proposals to modify the objects clause of the Company on a case-by-case basis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Change in Objects Clause" />
                                            <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Justification" />
                                            <input type="hidden" name="resolution_section[]" value="Change in Objects Clause" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Objects Clause" />
                                            <textarea rows="4" class="form-control analysis-text" name="analysis_text[]" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Change in Objects Clause" />
                                            <textarea rows="4" class="form-control recommendation-text" name="recommendation_text[]" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Change in Quorum Requirements</h4>
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
                                                        SES will recommend voting AGAINST proposals to reduce quorum requirements for shareholder meetings, unless compelling reasons to do the same are disclosed by the Company.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution"/>
                                            <input type="hidden" name="resolution_section[]" value="Change in Quorum Requirements" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Justification">
                                            <input type="hidden" name="resolution_section[]" value="Change in Quorum Requirements" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Quorum Requirements" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Change in Quorum Requirements" />
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Change in name of the Company</h4>
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
                                                        SES will recommend voting FOR proposals to change company names unless there is compelling evidence that the change in company name would adversely impact shareholders' value or is misleading.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Current Name</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Current Name" />
                                            <input type="hidden" name="resolution_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Current name"><b>Current Name:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Proposed Name</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Proposed Name" />
                                            <input type="hidden" name="resolution_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Proposed Name"><b>Proposed Name:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Availability of the proposed name</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Availability of the proposed name" />
                                            <input type="hidden" name="resolution_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Availability of the proposed name"><b>Availability of the proposed name:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Key Consideration</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the proposed name consistent with the Company’s brand?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_proposed_name_consistent_with_the_company">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_proposed_name_consistent_with_the_company_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Would the change in name result in loss in brand value?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="would_the_change_in_name_result_in_loss">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="would_the_change_in_name_result_in_loss_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the names sounding similar to other successful companies?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="does_the_names_sounding_similar_to_other_successful_companie">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_names_sounding_similar_to_other_successful_companie_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-10">Is the name aligned with the objects of the company?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_name_aligned_with_the_objects_of_the_company">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_name_aligned_with_the_objects_of_the_company_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company taken a certification from the registrar of companies that the proposed name is available?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_taken_a_certification_from_the_registrar_of_companie">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_taken_a_certification_from_the_registrar_of_companie_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company changed its name in last one year?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_changed_its_name_in_last_one_year">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_changed_its_name_in_last_one_year_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the suggested name in compliance with SEBI guidelines on the same?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Analysis text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Change in name of the Company" />
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Recommendation text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
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
                                                        SES will recommend that shareholders vote FOR resolutions proposing change in the registered office of the Company unless there are compelling reasons to believe that the said change will cause inconvenience to the shareholders of the Company. SES will look into such proposals very carefully if the registered office of the Company is being shifted to a remote location or a location which is not easily reachable.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Change in Registered office of the Company</h4>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Change in Registered office of the Company">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Change in Registered office of the Company">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Registered office of the Company">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Change in Registered office of the Company">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Change in Authorized Capital</h4>
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
                                                        Having adequate capital is important to a Company’s operations. Resolutions to increase authorized capital are normally enabling resolutions.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Key Consideration</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company utilized the existing authorized capital during the last two years?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_utilized_the_existing_authorized_capital">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_utilized_the_existing_authorized_capital_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the company disclosed the specific objectives for the proposed increase in authorized capital?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="has_the_company_disclosed_the_specific_objective">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_specific_objective_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>

                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Analysis text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Change in Authorized Capital">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Recommendation text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_6">
                                    <h4 class="form-section">Increase in Board Strength</h4>
                                    <div class="panel-group accordion general-view" id="accordion11">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion11" href="#collapse_11">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_11" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        Generally, SES will recommend voting FOR proposals seeking to fix the board size or designate a range for the board size provided that the board size ranges from a minimum of 6 members to a maximum of 15 members.
                                                    </p>
                                                    <p>
                                                        If the proposed board size is outside this range, SES expects that the Company would provide a rationale for the same. In such cases, SES would analyze the Company’s justifications and make recommendation on a case-by-case basis.
                                                    </p>
                                                    <p>
                                                        SES will recommend voting AGAINST proposals that give the board discretion to alter the size of the board without taking further shareholder approval.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Increase in Board Strength">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Justification">
                                            <input type="hidden" name="resolution_section[]" value="Increase in Board Strength">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Increase in Board Strength">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Increase in Board Strength">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_7">
                                    <h4 class="form-section">Changes due to shareholders' Agreements</h4>
                                    <div class="panel-group accordion general-view" id="accordion12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion12" href="#collapse_12">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_12" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES will analyze such proposals on a case-by-case basis to determine if special privileges are being provided to a particular investor. SES will assess the impact of such rights on other shareholders of the Company and make its recommendations accordingly.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Changes due to shareholders' Agreements">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Justification">
                                            <input type="hidden" name="resolution_section[]" value="Changes due to shareholders' Agreements">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Changes due to shareholders' Agreements">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Changes due to shareholders' Agreements">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_8">
                                    <h4 class="form-section">Removal of clauses due to termination of shareholders' Agreement</h4>
                                    <div class="panel-group accordion general-view" id="accordion13">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion13" href="#collapse_13">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_13" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES would generally vote FOR the resolutions to remove articles that grant special rights/privileges to a strategic/institutional investor of the Company.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Removal of clauses due to termination of shareholders' Agreement">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Removal of clauses due to termination of shareholders' Agreement">
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Removal of clauses due to termination of shareholders' Agreement">
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Removal of clauses due to termination of shareholders' Agreement">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="alteration_moa_aoa" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script src="Scripts/loader-plugin.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/alteration-in-moa-aoa.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initialization();
                object.pageload();
            });
        </script>
</body>
</html>