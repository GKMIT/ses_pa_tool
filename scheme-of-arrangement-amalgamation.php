<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
if(isset($_POST['scheme_of_arrangement'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->saveSchemeOfArrangement($info);
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
                        <li class="active">
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
                        SCHEME OF ARRANGEMENT/AMALGAMATION
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
                                SCHEME OF ARRANGEMENT/AMALGAMATION
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" method="post" action="scheme-of-arrangement-amalgamation.php" role="form">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                <div class="form-body">
                                    <h4 class="form-section">SCHEME OF ARRANGEMENT/AMALGAMATION</h4>
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
                                                        SES will review and evaluate the merits and drawbacks of the proposal on a case by case basis. Our recommendations will focus on the fairness and transparency of the proposed scheme.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Overview</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Overview">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text of the Overview"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Profiles of the Companies</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover " >
                                                <thead>
                                                <tr>
                                                    <td>Company Name</td>
                                                    <td>Background</td>
                                                    <td>Nature of Business</td>
                                                    <td>Authorized Capital</td>
                                                    <td>Issued, Subscribed and Paid-up Capital</td>
                                                </tr>
                                                </thead>
                                                <tbody class="dilution-row-desciption">
                                                <tr class="dilution-description-row diluton-row profile-of-the-company">
                                                    <td><input type="text" class="form-control" name="company_name[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control" name="background[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control" name="nature_of_bussiness[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control" name="aurthorized_capital[]" placeholder="Enter value"></td>
                                                    <td><input type="text" class="form-control" name="issued_capital[]" placeholder="Enter value"></td>
                                                    <td class="text-center"><button class="btn btn-danger disabled btn-delete-dilution-row" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-2">
                                                        <label></label>
                                                        <button class="btn btn-primary" id="btn_add_dilution_row" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Relationship between parties</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Relationship between parties">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <p><strong>RATIONALE FOR THE SCHEME</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="RATIONALE FOR THE SCHEME">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text of Company's Justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>KEY STEPS IN THE SCHEME</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="KEY STEPS IN THE SCHEME">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text of Key Steps in the scheme "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>THE SCHEME OF ARRANGEMENT</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="THE SCHEME OF ARRANGEMENT">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text of The Scheme of arrengement"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Consideration</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Consideration">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Valuation / Fairness Opinion</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Valuation / Fairness Opinion">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Payment of Consideration</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Payment of Consideration">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Transfer of Assets/ Liabilities</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Transfer of Assets/ Liabilities">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Remaining Business</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Remaining Business">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Type of Transaction</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Type of Transaction">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="RPT or not, with details of relationship between various parties"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Time Line</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Time Line">
                                            <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""><b>Time Line: </b></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p><strong>Change in Shareholding Pattern</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                            <tr>
                                                <th rowspan="2"  class="text-center" style="vertical-align: middle">Category</th>
                                                <th colspan="2" rowspan="1" class="text-center" style="vertical-align: middle">Pre Arrangement</th>
                                                <th colspan="2"  class="text-center">Post Arrangement</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1" class="text-center">Number of shares</th>
                                                <th colspan="1" class="text-center">% shareholding</th>
                                                <th colspan="1" class="text-center">Number of shares</th>
                                                <th colspan="1" class="text-center">% shareholding</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="dilution-description-row dilution-row shareholding-pattern">
                                                <td>Promoter group</td>
                                                <td><input type="text" class="form-control pre_nos" name="pre_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control pre_percent" name="pre_percent[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_nos" name="post_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_percent" name="post_percent[]"  placeholder="Enter value"></td>
                                            </tr>
                                            <tr class="dilution-description-row dilution-row shareholding-pattern">
                                                <td>Public (Institutional)</td>
                                                <td><input type="text" class="form-control pre_nos" name="pre_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control pre_percent" name="pre_percent[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_nos" name="post_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_percent" name="post_percent[]"  placeholder="Enter value"></td>
                                            </tr>
                                            <tr class="dilution-description-row dilution-row shareholding-pattern">
                                                <td>Other Public</td>
                                                <td><input type="text" class="form-control pre_nos" name="pre_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control pre_percent" name="pre_percent[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_nos" name="post_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_percent" name="post_percent[]"  placeholder="Enter value"></td>
                                            </tr>
                                            <tr class="shareholding-pattern">
                                                <td>Total</td>
                                                <td><input type="text" class="form-control total_nos" name="pre_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control total_percent" name="pre_percent[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_total_nos" name="post_nos[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_total_percent" name="post_percent[]"  placeholder="Enter value"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Discussion on change in shareholding pattern">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Discussion on change in shareholding pattern"></textarea>
                                    </div>
                                </div>
                                <p><strong>Change in Capital Structure</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover " >
                                            <thead>
                                            <tr>
                                                <th colspan="5"  class="text-center" style="vertical-align: middle">Share Capital Structure</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th colspan="2"  class="text-center">Pre-scheme of arrangement</th>
                                                <th colspan="2"  class="text-center">Post-scheme of arrangement</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="capital-structure">
                                                <td>Authorized</td>
                                                <td><input type="text" class="form-control pre_scheme1" name="pre_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control pre_scheme2" name="pre_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_scheme1" name="post_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_scheme2" name="post_scheme[]"  placeholder="Enter value"></td>
                                            </tr>
                                            <tr class="capital-structure">
                                                <td>Issued</td>
                                                <td><input type="text" class="form-control pre_scheme3" name="pre_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control pre_scheme4" name="pre_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_scheme3" name="post_scheme[]"  placeholder="Enter value"></td>
                                                <td><input type="text" class="form-control post_scheme4" name="post_scheme[]"  placeholder="Enter value"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Discussion on change in capital structure">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Discussion on change in capital structure"></textarea>
                                    </div>
                                </div>
                                <p><strong>FINANCIAL IMPACT OF THE DEAL</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="FINANCIAL IMPACT OF THE DEAL">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Impact on leverage ratios, Impact on liquidity ratios, Impact on top & bottom line, Balance Sheet (Asset & Liability), Turnover, Profit and Loss etc."></textarea>
                                    </div>
                                </div>
                                <p><strong>COMPANY’S DECLARATIONS</strong></p>
                                <div class="form-group">
                                    <label class="col-md-4">Complaints/investigations against the Company</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Complaints/investigations against the Company">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""><b>Complaints/investigations against the Company: </b></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Approval from Stock Exchange</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Approval from Stock Exchange">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""><b>Approval from Stock Exchange: </b></textarea>
                                    </div>
                                </div>
                                <p><strong>CONFLICT OF INTERESTS</strong></p>
                                <div class="form-group">
                                    <label class="col-md-4">Common Directors</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="CONFLICT OF INTERESTS">
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""><b>Common Directors: </b></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Directors' Shareholdings</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Directors Shareholdings"/>
                                        <input type="hidden" name="resolution_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="used_in_text[]" class="form-control" placeholder=""><b>Directors’ Shareholdings: </b></textarea>
                                    </div>
                                </div>
                                <p><strong>KEY CONSIDERATIONS </strong></p>
                                <div class="form-group">
                                    <label class="col-md-10">1. Disclosures</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">1.1 Has the Company disclosed a certificate from the Company’s auditor stating that the accounting treatment proposed in the scheme conforms to the prescribed accounting standards?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_a_certificate">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_disclosed_a_certificate_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">1.2 Has the Company disclosed the impact the scheme will have on the shareholding pattern of the Company?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_the_impact_the_scheme">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_disclosed_the_impact_the_scheme_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">2. Is any class of shareholders benefitted more at the cost of others, directly or indirectly? Extra scrutiny in cases where promoter entity is involved. </label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_any_class_of_shareholders_benefitted">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_any_class_of_shareholders_benefitted_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">3. Are there any potential conflicts which may lead the directors to vote for the scheme?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="are_there_any_potential_conflict">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_there_any_potential_conflict_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10 ">2. Is the Scheme fair to minority shareholders?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_scheme_fair_to_minority_shareholder">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_scheme_fair_to_minority_shareholder_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">3. Are there any governance/ fairness issues in the deal?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="are_there_any_governance_fairness">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_there_any_governance_fairness_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">4. Has the Company disclosed key financials of all the entities involved in the transaction?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_key_financial">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_disclosed_key_financial_analysis_text">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">5. In cases of demerger</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">5.1.	Is the proposed demerger a measure aimed at risk isolation and parent company shareholder protection?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_proposed_demerger_a_measure_aimed_at_risk_isolation">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_proposed_demerger_a_measure_aimed_at_risk_isolation_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">5.2.	Is the proposed demerger a measure aimed at unlocking value to benefit a group of shareholders disproportionately?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_proposed_demerger_a_measure_aimed">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_proposed_demerger_a_measure_aimed_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">5.3.	Is the demerger resulting in formation of an unlisted company?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_demerger_resulting_in_formation">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_demerger_resulting_in_formation_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-9 col-md-offset-1">5.4.	Are exit options given to shareholders of the Company fair?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire triggers' name="triggers[]" id="are_exit_options_given_to_shareholder">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="1">No</option>
                                            <option value=na>Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="are_exit_options_given_to_shareholder_analysis_text">
                                    <div class="col-md-9 col-md-offset-1">
                                        <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                        <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p><strong>General Analysis</strong></p>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="4" name="analysis_text[]" class="form-control" id="analysis_text[]" placeholder="Analysis text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p><strong>Recommendation</strong></p>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="SCHEME OF ARRANGEMENT/AMALGAMATION">
                                            <textarea rows="6" name="recommendation_text[]" class="form-control" id="recommendation_text" placeholder="Recommendation text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="scheme_of_arrangement" class="btn blue directors"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="Scripts/scheme-of-arrangement-amalgamation.js"></script>
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