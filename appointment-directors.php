<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
if(isset($_POST['aoopintment_directors'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->saveAppointmentOfDirectors($info);
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
                        <li class="active">
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
                        Appointment of Directors
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
                            <form class="form-horizontal" role="form" method="post" action="appointment-directors.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Appointment of Directors">
                                <div class="form-body">
                                    <div class='form-group'>
                                        <label class="col-md-2">Slot Number:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="slot_no" id="slot_no">
                                                <option value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment/Reappointment of Non-Executive Directors" hidden-id="check_1"/> Appointment/Reappointment of Non-Executive Directors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment/Reappointment of Independent Directors" hidden-id="check_2"/> Appointment/Reappointment of Independent Directors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Appointment/Reappointment of Executive Directors" hidden-id="check_3"/> Appointment/Reappointment of Executive Directors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Cessation of Directorship" hidden-id="check_4"/> Cessation of Directorship
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="check-trigger checkbox" name="checkbox[]" value="Alternate Directors" hidden-id="check_5"/> Alternate Directors
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Appointment/Reappointment of Non-Executive Directors</h4>
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
                                                        Non-Executive Non-Independent Directors of a company do not participate in the day-to-day management of the Company apart from participating in board meetings. They are classified in this manner either due to their association with the promoter group or because they have been associated with the Company either in executive role or as former promoter or are related party.
                                                    </p>
                                                    <p>
                                                        Independent Non-Executive directors are those directors, who apart from receiving directors remuneration, do not have any material or pecuniary relationship with the company, its promoters, its directors, its senior management or its holding company, its subsidiaries and associates, which may affect independence of such directors. SES is of opinion that such relationships, if any, may make it difficult for a director to put shareholders' interests above personal or related party interests.
                                                    </p>
                                                    <p>
                                                        SES is of opinion that the Board of companies should have a majority of independent directors. Therefore, SES will analyze the impact of appointment/reappointment of non-independent directors on the basis of the impact of the appointment on the Board Composition.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Directors</label>
                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                        <input type="hidden" name="used_in[]" value="Directors">
                                        <?php
                                        $db = new DatabaseReports();
                                        $company_id = $_SESSION['company_id'];
                                        $financial_year = $_SESSION['report_year'];
                                        $directors = $db->getCompanyDirectors($company_id,$financial_year);
                                        ?>
                                        <div class="col-md-3">
                                            <select class="form-control ned-ids" name="used_in_text[]">
                                                <option value="" selected>Select Director</option>
                                                <?php
                                                foreach($directors as $director) {
                                                    if(($director['company_classification']=='NED' || $director['company_classification']=='NEDP') && $director['additional_classification']!='M(Resign)' && $director['additional_classification']!='C(Resign)') {
                                                        echo "<option value='$director[dir_din_no]'>$director[dir_name]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <p><strong>Director's Profile</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Current full-time position">
                                                    <td style="width: 30%;">Current full-time position</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Functional Area">
                                                    <td>Functional Area</td>
                                                    <td><textarea class="form-control ned-functional-area" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Education">
                                                    <td>Education</td>
                                                    <td><textarea class="form-control ned-education" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Impact on diversity">
                                                    <td>Impact on diversity</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Past Experience">
                                                    <td>Past Experience</td>
                                                    <td><textarea class="form-control ned-past-ex" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Committee positions in the Company">
                                                    <td>Committee positions in the Company</td>
                                                    <td><textarea class="form-control ned-committee-positions" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Retirement by rotation?">
                                                    <td>Retirement by rotation?</td>
                                                    <td><textarea class="form-control ned-retiring-non-retiring" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Part of promoter group?">
                                                    <td>Part of promoter group?</td>
                                                    <td><textarea class="form-control ned-part-promoter-group" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="SES' Recommendation">
                                                    <td>SES' Recommendation</td>
                                                    <td>
                                                        <select class="form-control" name="used_in_text[]">
                                                            <option value="">Select</option>
                                                            <option value="For">For</option>
                                                            <option value="Against">Against</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Director's Profile Discussion">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Director's Profile Discussion"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Time Commitment</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Directorships">
                                                    <td style="width: 30%;">Total Directorships</td>
                                                    <td><textarea class="form-control ned-total-directorship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee memberships">
                                                    <td>Total Committee memberships</td>
                                                    <td><textarea class="form-control ned-committee-memberships" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Chairmanship">
                                                    <td>Total Committee Chairmanship</td>
                                                    <td><textarea class="form-control ned-committee-chairmanship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Full time role/ executive position">
                                                    <td>Full time role/ executive position</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Discussion about Director's Time">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discussion about Director's Time"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Last 3 AGMs">
                                                    <td style="width: 30%;">Last 3 AGMs</td>
                                                    <td><textarea class="form-control ned-last-3-agms" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings held last year">
                                                    <td>Board meetings held last year</td>
                                                    <td><textarea class="form-control ned-board-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings in last 3 years (avg.)">
                                                    <td>Board meetings in last 3 years (avg.)</td>
                                                    <td><textarea class="form-control ned-board-meeting-last-years-avg" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Audit Committee meetings">
                                                    <td>Audit Committee meetings</td>
                                                    <td><textarea class="form-control ned-audit-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center ned-nomination-remuneration-row">
                                                    <td>Nomination & Remuneration Committee meetings</td>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination & Remuneration Committee meetings">
                                                    <td><textarea class="form-control ned-nomination-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden ned-nomination-row">
                                                    <td>Nomination Committee meetings</td>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination Committee meetings">
                                                    <td><textarea class="form-control ned-nomination-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden ned-remuneration-row">
                                                    <td>Remuneration Committee meetings</td>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration Committee meetings">
                                                    <td><textarea class="form-control ned-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="CSR Committee meetings">
                                                    <td>CSR Committee meetings</td>
                                                    <td><textarea class="form-control ned-csr-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Stakeholders' Relationship Committee meetings">
                                                    <td>Stakeholders' Relationship Committee meetings</td>
                                                    <td><textarea class="form-control ned-stack-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Discuss about Director's Performance">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discuss about Director's Performance"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Discussion on Director's Remuneration</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <input type="hidden" name="used_in[]" value="DIRECTOR'S REMUNERATION">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="[]'s remuneration is aligned with the remuneration paid to the other non-executive directors."><b>Discussion on Director's Remuneration: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Recommendation Guidelines</strong></p>
                                    <!--1-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Company have a Nomination and Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-arned' id="does_the_company_have_a_nomination_and_remuneration_committee">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="181">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_have_a_nomination_and_remuneration_committee_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--2-->
                                    <div class="form-group hidden" id="does_the_company_have_a_nomination_and_remuneration_committee_block_1">
                                        <label class="col-md-10">Is the Nomination and Remuneration Committee Compliant?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="236" id="arned_2">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="182">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_2_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--3-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed remuneration paid to the director?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="237" id="arned_3">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="183">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_3_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--4-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company paying remuneration more than 25% of MD remuneration without any adequate Justification? (Not Applicable if director is getting remuneration due to other commitments)</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="238" id="arned_4">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="184">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_4_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--5-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the remuneration paid to director more than 3 times the average NED remuneration (excluding the director being analysed) without adequate justification? (Not Applicable if director is getting remuneration due to other commitments) <b class="ned-analysis-values">[value]</b></label>
                                        <div class="col-md-2">
                                            <!--total NED ki total pay ka avg. except rajnish * 3 > rajnish ki pay to (no) else yes -->
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="239" id="arned_5">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="185">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_5_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--6-->
                                    <div class="form-group">
                                        <label class="col-md-10">Are there any Material failures of governance, stewardship, risk oversight and fiduciary responsibilities observed?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="240" id="arned_6">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="186">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_6_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--7-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the director liable to retire by rotation? <b class="ned-analysis-values">[value]</b></label>
                                        <!--retiring/non retiring-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="241" id="arned_7">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="187">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_7_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--8-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director, also a Director/Employee at a competitor company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="242" id="arned_8">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="188">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_8_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--9-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company formed the board committees required under Companies Act, 2013?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="243" id="arned_9">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="189">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_9_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--10-->
                                    <div class="form-group">
                                        <label class="col-md-10">Did the Director attend all the Board Meetings held last year? <b class="ned-analysis-values">[value]</b></label>
                                        <!--if 100% then yes-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="244" id="arned_10">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="190">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_10_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--11-->
                                    <div class="form-group">
                                        <label class="col-md-10">Will the Board Composition fall below the applicable regulatory norms upon appointment of the director? <b class="ned-analysis-values">[value]</b></label>
                                        <!--
                                        board ka chairman (additional classification) independent hai according to company --- company mai kitne id hai
                                        -->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="245" id="arned_11">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="191">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_11_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--12-->
                                    <div class="form-group">
                                        <label class="col-md-10">Was the Company non-Compliant with Board Composition norms for more than 90 days?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="246" id="arned_12">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="192">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_12_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Time Commitments:</strong></p>
                                    <!--13-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director holds more than 10 public directorships or more than 20 total directorships? <b class="ned-analysis-values">[value]</b></label>
                                        <!--if public directorship more than 10 or total directorship more than 20 hai to yes else no-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="247" id="arned_13">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="193">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_13_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--14-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director holds more than 10 committee memberships? <b class="ned-analysis-values">[value]</b></label>
                                        <!--committee membership 10 se jyada hai to yes-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="248" id="arned_14">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="194">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_14_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--15-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director hold more than 5 committee chairmanships? <b class="ned-analysis-values">[value]</b></label>
                                        <!--committee chairmenships 5 se jyada hai to yes else no-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="249" id="arned_15">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="195">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_15_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--16-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director hold more than 1 full time position in material entity?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="250" id="arned_16">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="196">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_16_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--17-->
                                    <div class="form-group">
                                        <label class="col-md-10">Are the committee positions/ directorships held by the director being appointed/ re-appointed disclosed in notice/ annual report?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="251" id="arned_17">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="197">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_17_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--18-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Director missed all the Board meetings in the financial year? <b class="ned-analysis-values">[value]</b></label>
                                        <!--agar ek bhi meeting attend nahi ki hai in 2015 to yes else no-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="252" id="arned_18">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="198">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_18_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Board Chairman</strong></p>
                                    <!--19-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment Chairman of the Company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arned_19">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--20-->
                                    <div class="board-chairman-questions hidden">
                                        <div class="form-group">
                                            <label class="col-md-10">Has the director missed more than 1 AGM held in the last three years and the Company has not disclosed compelling reason(s) for the same? <b class="ned-analysis-values">[value]</b></label>
                                            <!--pichle 3 saal mai ek bhi miss ki hai to yes else no-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="253" id="arned_20">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="199">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_20_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--21-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance of the Director at board meetings held in the last three years less than 75%? <b class="ned-analysis-values">[value]</b></label>
                                            <!--read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control' id="arned_21">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--22-->
                                        <div class="form-group hidden" id="arned_21_block_1">
                                            <label class="col-md-10">Is the attendance of the director at board meetings held in the last year more than 75%? <b class="ned-analysis-values">[value]</b></label>
                                            <!--read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="254" id="arned_22">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="200">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_22_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--23-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company have a non-compliant Audit Committee? <b>Value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="255" id="arned_23">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="201">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_23_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--24-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Board composition non-compliant with the listing agreement for more than 90 days?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="256" id="arned_24">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="202">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_24_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--25-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are there any material non-compliances with any regulation?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="257" id="arned_25">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="203">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_25_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--26-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company have mandatory committee(s) or composition of such Committee(s) as per Companies Act, 2013?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="258" id="arned_26">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="204">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_26_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--27-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are all the disclosures required under Companies Act, 2013 disclosed in the Director's Report?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="259" id="arned_27">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="205">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_27_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Audit Committee Chairman</strong></p>
                                    <!--28-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment, chairman of the Audit Committee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arned_28">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--29-->
                                    <div class="audit-committee-questions-arned hidden">
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Director missed more than 1 AGM held in the last three years and the Company has not disclosed compelling reason(s) for the same?</label>
                                            <!-- 2/3 yoy yoyoyoy o-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="260" id="arned_29">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="206">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_29_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--30-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance of the Director at board meetings held in the last three years less than75%?</label>
                                            <!-- read question-->
                                            <div class="col-md-2" >
                                                <select name="triggers[]" class='form-control' id="arned_30">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--31-->
                                        <div class="form-group hidden" id="arned_30_block_1">
                                            <label class="col-md-10">Is the attendance of the director at board meetings held in the last year more than 75%?  <b>Value</b></label>
                                            <!-- read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="261" id="arned_31">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="207">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_31_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--32-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance at Audit Committee meetings held in last three years less than 75%? <b>Value</b></label>
                                            <!-- read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="262" id="arned_32">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="208">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_32_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--33-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are the qualifications made by the Auditors discussed adequately in the directors' report?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="263" id="arned_33">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="209">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_33_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--34-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Non-audit fee for the Auditors consistently more than 50% for the last 3 years?</label>
                                            <!-- if 3 years ki  >  -->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="264" id="arned_34">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="210">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_34_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--35-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are there material weaknesses in internal controls of the Company observed continuously for 2 years?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="265" id="arned_35">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="211">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_35_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--36-->
                                        <div class="form-group">
                                            <label class="col-md-10">Were the financial statements restated due to material irregularities?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="266" id="arned_36">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="212">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_36_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--37-->
                                        <div class="form-group">
                                            <label class="col-md-10">Were the financial statements filed late due to non-technical reasons and the pattern is persisting or repetitive?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="267" id="arned_37">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="213">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_37_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--38-->
                                        <div class="form-group">
                                            <label class="col-md-10">Was there a material accounting fraud?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="268" id="arned_38">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="214">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_38_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--39-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the tenure of Auditors of the Company exceed by 10 years even after the transition period?</label>
                                            <!--if 2 auditors jiska jyada tenure hai > 10 to yes else no-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="269" id="arned_39">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="215">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_39_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--40-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the composition of the Audit committee compliant with the Companies Act, 2013/ Listing Agreement?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="270" id="arned_40">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="216">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_40_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--41-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are the Auditors being appointed for requisite years?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="271" id="arned_41">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="217">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_41_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--42-->
                                        <div class="form-group">
                                            <label class="col-md-10">Was the Audit Committee Chairman present at the last AGM?</label>
                                            <!--audit committee 2015 ka chairman 2014 ki agm mai tha ya nahi yes/no-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="272" id="arned_42">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="218">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_42_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Nomination and Remuneration Committee Chairman</strong></p>
                                    <!--43-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment, chairman of Nomination and Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arned_43">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--44-->
                                    <div class="nom_rem_committee_questions_arned hidden">
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance at board meetings held last year less than 50%?</label>
                                            <!--read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="273" id="arned_44">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="219">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_44_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--45-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Attendance at board meetings held in the last three years less than 75%? <b>Value</b></label>
                                            <!--read question-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="274" id="arned_45">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="220">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_45_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--46-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance at Nomination & Remuneration Committee meetings held last year less than 50%? <b>Value</b></label>
                                            <!--agar dono seperate hoti hai nomination consider karna hai -->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="275" id="arned_46">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="221">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_46_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--47-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the attendance at Nomination &amp; Remuneration Committee meetings held in last 3 years less than 75%?</label>
                                            <!--agar dono seperate hoti hai nomination consider karna hai -->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="276" id="arned_47">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="222">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_47_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--48-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Board composition non-compliant with the listing agreement for more than 90 days?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="277" id="arned_48">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="223">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_48_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--49-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Director with poor attendance record been proposed for reappointment?</label>
                                            <!--board attendance ka percentage 2015 ka-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="278" id="arned_49">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="224">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_49_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--50-->
                                        <div class="form-group">
                                            <label class="col-md-10">Did Nomination and Remuneration Committee meet last year?</label>
                                            <!--nomination ki attendance if > 0 hai to yes else no-->
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="279" id="arned_50">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="225">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_50_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--51-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the composition of the Nomination & Remuneration committee compliant with the Companies Act, 2013/ Listing Agreement?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="no" data-trigger-no="280" id="arned_51">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="226">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_51_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--52-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Director paid excessive remuneration when compared to peers?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="281" id="arned_52">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="227">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_52_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--53-->
                                        <div class="form-group">
                                            <label class="col-md-10">Did the Company re-priced options in the last three years? (if the re-pricing was not justified (see Option re-pricing policy for details</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="282" id="arned_53">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="228">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arned_53_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance</strong></p>
                                    <!--54-->
                                    <div class="form-group">
                                        <label class="col-md-10">Was the Attendance at board meetings held in the last three years  less than 50%?</label>
                                        <!--read question-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="298" id="arned_54">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="229">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_54_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Was the Attendance at Audit Committee meetings held in last three years less than 50%?</label>
                                        <!--read question-->
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arned' data-trigger-value="yes" data-trigger-no="299" id="arned_55">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="230">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arned_55_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control " placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_arned">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment/Reappointment of Non-Executive Directors">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control" id="recommendation_text_arned" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Appointment/Reappointment of Independent Directors</h4>
                                    <div class="panel-group accordion general-view" id="accordion_arid">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_arid" href="#collapse_arid">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_arid" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        Non-Executive Non-Independent Directors of a company do not participate in the day-to-day management of the Company apart from participating in board meetings. They are classified in this manner either due to their association with the promoter group or because they have been associated with the Company either in executive role or as former promoter or are related party.
                                                    </p>
                                                    <p>
                                                        Independent Non-Executive directors are those directors, who apart from receiving directors remuneration, do not have any material or pecuniary relationship with the company, its promoters, its directors, its senior management or its holding company, its subsidiaries and associates, which may affect independence of such directors. SES is of opinion that such relationships, if any, may make it difficult for a director to put shareholders’ interests above personal or related party interests.Independent Non-Executive directors are those directors, who apart from receiving directors remuneration, do not have any material or pecuniary relationship with the company, its promoters, its directors, its senior management or its holding company, its subsidiaries and associates, which may affect independence of such directors. SES is of opinion that such relationships, if any, may make it difficult for a director to put shareholders’ interests above personal or related party interests.
                                                    </p>
                                                    <p>
                                                        SES is of opinion that the Board of companies should have a majority of independent directors. Therefore, SES will analyze the impact of appointment/reappointment of non-independent directors on the basis of the impact of the appointment on the Board Composition.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Directors</label>
                                        <div class="col-md-3">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Directors">
                                            <select class="form-control id-ids" name="used_in_text[]">
                                                <option value="" selected>Select Director</option>
                                                <?php
                                                foreach($directors as $director) {
                                                    if($director['company_classification']=='ID' && $director['additional_classification']!='M(Resign)' && $director['additional_classification']!='C(Resign)') {
                                                        echo "<option value='$director[dir_din_no]'>$director[dir_name]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <p><strong>Compliance</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Is Company complying with the retirement policy?">
                                                    <td width="40%">Is Company complying with the retirement policy?</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Is Company complying with the retirement policy?">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Has the Company disclosed the Independence Certificate...">
                                                    <td>Has the Company disclosed the Independence Certificate provided by the Independent Directors</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Has the Company disclosed the Independence Certificate...">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Has the Company disclosed the terms of appointment...">
                                                    <td>Has the Company disclosed the terms of appointment of Independent Directors</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Has the Company disclosed the terms of appointment...">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Has the Company disclosed Board evaluation...">
                                                    <td>Has the Company disclosed Board evaluation and Directors' Evaluation Policy</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Has the Company disclosed Board evaluation...">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Did Independent Directors meet at least once...">
                                                    <td>Did Independent Directors meet at least once without the Management</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Did Independent Directors meet at least once...">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Does the Company has a Lead independent Director?">
                                                    <td>Does the Company has a Lead independent Director?</td>
                                                    <td>
                                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                        <input type="hidden" name="used_in[]" value="Does the Company has a Lead independent Director?">
                                                        <select name="used_in_text[]" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Director's Profile</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Current full-time position">
                                                    <td style="width: 30%;">Current full-time position</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Functional Area">
                                                    <td>Functional Area</td>
                                                    <td><textarea class="form-control id-functional-area" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Education">
                                                    <td>Education</td>
                                                    <td><textarea class="form-control id-education" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Impact on diversity">
                                                    <td>Impact on diversity</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Past Experience">
                                                    <td>Past Experience</td>
                                                    <td><textarea class="form-control id-past-ex" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Committee positions in the Company">
                                                    <td>Committee positions in the Company</td>
                                                    <td><textarea class="form-control id-committee-positions" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="SES' Recommendation">
                                                    <td>SES' Recommendation</td>
                                                    <td>
                                                        <select class="form-control" name="used_in_text[]">
                                                            <option value="">Select</option>
                                                            <option value="FOR">FOR</option>
                                                            <option value="AGAINST">AGAINST</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Director's Profile Discussion">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Director's Profile Discussion"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Independence</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Current tenure/association">
                                                    <td style="width: 30%;">Current tenure/association</td>
                                                    <td><textarea class="form-control id-total-association" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Directorships at group companies">
                                                    <td>Directorships at group companies</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Relationships with the Company">
                                                    <td>Relationships with the Company</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nominee director">
                                                    <td>Nominee director</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Shareholding / ESOPs">
                                                    <td>Shareholding / ESOPs</td>
                                                    <td><textarea class="form-control id-shareholding" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration">
                                                    <td>Remuneration (<i class="fa fa-rupee"></i> Lakhs)</td>
                                                    <td><textarea class="form-control id-remuneration" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="SES Classification">
                                                    <td>SES Classification</td>
                                                    <td>
                                                        <select class="form-control" name="used_in_text[]">
                                                            <option value="">Select</option>
                                                            <option value="INEPENDENT">INEPENDENT</option>
                                                            <option value="NON INEPENDENT">NON INEPENDENT</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Director's Independence Discussion">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Director's Independence Discussion"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Time Commitment</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Directorships">
                                                    <th style="width: 30%;">Total Directorships </th>
                                                    <td><textarea class="form-control id-total-directorship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee memberships">
                                                    <th>Total Committee memberships</th>
                                                    <td><textarea class="form-control id-committee-memberships" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Chairmanship">
                                                    <th>Total Committee Chairmanship</th>
                                                    <td><textarea class="form-control id-committee-chairmanship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Full time role/ executive position">
                                                    <th>Full time role/ executive position</th>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Discussion about Director's Time">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discussion about Director's Time"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Last 3 AGMs">
                                                    <th style="width: 30%;">Last 3 AGMs</th>
                                                    <td><textarea class="form-control id-last-3-agms" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings held last year">
                                                    <th>Board meetings held last year</th>
                                                    <td><textarea class="form-control id-board-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings in last 3 years (avg.)">
                                                    <th>Board meetings in last 3 years (avg.)</th>
                                                    <td><textarea class="form-control id-board-meeting-last-years-avg" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Audit Committee meetings">
                                                    <th>Audit Committee meetings</th>
                                                    <td><textarea class="form-control id-audit-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center id-nomination-remuneration-row">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination & Remuneration Committee meetings">
                                                    <th>Nomination & Remuneration Committee meetings</th>
                                                    <td><textarea class="form-control id-nomination-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden id-nomination-row">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination Committee meetings">
                                                    <th>Nomination Committee meetings</th>
                                                    <td><textarea class="form-control id-nomination-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden id-remuneration-row">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration Committee meetings">
                                                    <th>Remuneration Committee meetings</th>
                                                    <td><textarea class="form-control id-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="CSR Committee meetings">
                                                    <th>CSR Committee meetings</th>
                                                    <td><textarea class="form-control id-csr-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Stakeholders' Relationship Committee meetings">
                                                    <th>Stakeholders' Relationship Committee meetings</th>
                                                    <td><textarea class="form-control id-stack-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <input type="hidden" name="used_in[]" value="Discuss about Director's Performance">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discuss about Director’s Performance"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance Index</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Criteria
                                                    </th>
                                                    <th>
                                                        Response
                                                    </th>
                                                    <th>
                                                        Score
                                                    </th>
                                                    <th>
                                                        Maximum
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board Meetings Attendance held in the last year response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board Meetings Attendance held in the last year score">
                                                    <td style="width: 30%;">Board Meetings Attendance held in the last year</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>5</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board Meetings Attendance held in the last 3 years response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Board Meetings Attendance held in the last 3 years score">
                                                    <td>Board Meetings Attendance held in the last 3 years</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>15</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Audit Committee Meetings Attendance response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Audit Committee Meetings Attendance score">
                                                    <td>Audit Committee Meetings Attendance </td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>10</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination & Remuneration Committee Meetings Attendance response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination & Remuneration Committee Meetings Attendance score">
                                                    <td>Nomination &amp; Remuneration Committee Meetings Attendance </td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>10</td>
                                                </tr>
                                                <tr class="tr-td-center hidden">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination Committee Meetings Attendance response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination Committee Meetings Attendance score">
                                                    <td>Nomination Committee Meetings Attendance </td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>10</td>
                                                </tr>
                                                <tr class="tr-td-center hidden">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration Committee Meetings Attendance response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration Committee Meetings Attendance score">
                                                    <td>Remuneration Committee Meetings Attendance</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>10</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Directorships response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Directorships score">
                                                    <td>Total Directorships</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>15</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Memberships response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Memberships score">
                                                    <td>Total Committee Memberships</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>15</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Chairmanships response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Chairmanships score">
                                                    <td>Total Committee Chairmanships</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>15</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Full Time Role/Executive Position response">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Independent Directors">
                                                    <input type="hidden" name="used_in[]" value="Full Time Role/Executive Position score">
                                                    <td>Full Time Role/Executive Position</td>
                                                    <td><input class="form-control" name="used_in_text[]"/></td>
                                                    <td><input class="form-control score" name="used_in_text[]"/></td>
                                                    <td>15</td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Total</th>
                                                    <td></td>
                                                    <th class="total_score">0</th>
                                                    <th>50</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>General Recommendation Guidelines</strong></p>
                                    <!--1-->
                                    <div class="form-group">
                                        <!--seperate hai to nomination-->
                                        <label class="col-md-10">Does the Company have a Nomination and Remuneration Committee? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="235" id="arid_1">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="181">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_1_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_1_block_1">
                                        <label class="col-md-10">Is the Nomination and Remuneration Committee Compliant?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-arid' id="is_the_nomination_and_remuneration_committee_compliant">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="182">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_nomination_and_remuneration_committee_compliant_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Has the Company disclosed remuneration paid to the director? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="237" id="has_the_company_disclosed_remuneration_paid_to_the_director">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="183">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_remuneration_paid_to_the_director_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--3-->
                                    <div class="form-group">
                                        <!--((director ka remuneration / additional classification mai cmd ya md) * 100) > 25-->
                                        <label class="col-md-10">Is the Company paying remuneration more than 25% of MD remuneration without any adequate Justification? (Not Applicable if director is getting remuneration due to other commitments)  <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="238" id="arid_3">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="184">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_3_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--4-->
                                    <div class="form-group">
                                        <!--((director ka remuneration / avg of ned ,nedp, id excluding the director) > 3 to yes) -->
                                        <label class="col-md-10">Is the remuneration paid to director more than 3 times the average NED remuneration (excluding the director being analysed) without adequate justification? (Not Applicable if director is getting remuneration due to other commitments) <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="239" id="arid_4">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="185">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_4_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--5-->
                                    <div class="form-group">
                                        <label class="col-md-10">Are there any Material failures of governance, stewardship, risk oversight and fiduciary responsibilities observed?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="240" id="arid_5">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="186">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_5_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--6-->
                                    <div class="form-group">
                                        <!--read question -->
                                        <label class="col-md-10">Is the director liable to retire by rotation? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="241" id="arid_6">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="187">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_6_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--7-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director, also a Director/Employee at a competitor company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="242" id="arid_7">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="188">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_7_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--8-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company formed the board committees required under Companies Act, 2013? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="243" id="arid_8">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="189">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_8_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--9-->
                                    <div class="form-group">
                                        <!--read question-->
                                        <label class="col-md-10">Did the Director attend all the Board Meetings held last year? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="244" id="arid_9">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="190">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_9_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--10-->
                                    <div class="form-group">
                                        <label class="col-md-10">Will the Board Composition fall below the applicable regulatory norms upon appointment of the director? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="245" id="arid_10">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="191">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_10_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--11-->
                                    <div class="form-group">
                                        <label class="col-md-10">Was the Company non-Compliant with Board Composition norms for more than 90 days?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="246" id="arid_11">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="192">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_11_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>

                                    <p><strong>Independence of Independent Director</strong></p>
                                    <!--12-->
                                    <div class="form-group">
                                        <!--association > 10 to yes-->
                                        <label class="col-md-10">Is the tenure of director more than 10 years (in Company or group company)? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="283" id="arid_12">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="231">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_12_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--13-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director employed in the Company or a group company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="284" id="arid_13">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="232">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_13_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--14-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director a promoter or an ex-promoter / related to promoter or an ex-promoter?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="285" id="arid_14">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="233">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_14_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--15-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director and relatives have shareholding over 2% in the company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="286" id="arid_15">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="234">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_15_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--16-->
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Does the Director have a pecuniary relationship with the Company? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="287" id="arid_16">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="235">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_16_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--17-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director an ex-executive with no cooling off period/ was the Director associated with the Company during the cooling off period of 3 years?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="288" id="arid_17">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="236">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_17_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--18-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company not disclosed whether in the opinion of the Board, the Independent Director fulfils the condition specified in the Act / Independence certificate not disclosed/ mention in the Notice/ AR?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="289" id="arid_18">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="237">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_18_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>

                                    <p><strong>Time Commitments:</strong></p>
                                    <!--19-->
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Does the Director holds more than 10 public directorships or more than 20 total directorships? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="247" id="arid_19">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="193">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_19_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--20-->
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Does the Director holds more than 10 committee memberships? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="248" id="arid_20">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="194">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_20_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--21-->
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Does the Director hold more than 5 committee chairmanships? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="249" id="arid_21">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="195">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_21_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--22-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the Director hold more than 1 full time position in material entity?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="250" id="arid_22">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="196">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_22_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--23-->
                                    <div class="form-group">
                                        <label class="col-md-10">Are the committee positions/ directorships held by the director being appointed/ re-appointed disclosed in notice/ annual report?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="251" id="arid_23">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="197">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_23_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--24-->
                                    <div class="form-group">
                                        <!--read the question-->
                                        <label class="col-md-10">Has the Director missed all the Board meetings in the financial year? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="252" id="arid_24">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="198">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_24_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--25-->
                                    <div class="form-group">
                                        <!--director listed company mai 7 se jyada to yes else no-->
                                        <label class="col-md-10">Does the Director serve on boards of more than 7 listed companies (3 in case the person is serving as a whole time director in a listed company) and total directorships in public companies is more than 10? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="290" id="arid_25">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="238">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_25_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>

                                    <p><strong>Board Chairman</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment Chairman of the Company?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arid_26_a">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--26-->
                                    <div class="board-chairman-arid-questions hidden">
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Has the director missed more than 1 AGM held in the last three years and the Company has not disclosed compelling reason(s) for the same? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="253" id="arid_26">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="199">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_26_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--27-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Is the attendance of the Director at board meetings held in the last three years less than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control' id="arid_27">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_27_block_1">
                                            <!--read the question-->
                                            <label class="col-md-10">Is the attendance of the director at board meetings held in the last year more than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="254" id="arid_27">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="200">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_27_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--28-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company have a non-compliant Audit Committee? </label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="255" id="arid_28">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="201">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_28_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--29-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Board composition non-compliant with the listing agreement for more than 90 days?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="256" id="arid_29">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="202">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_29_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--30-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are there any material non-compliances with any regulation?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="257" id="arid_30">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="203">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_30_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--31-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company have mandatory committee(s) or composition of such Committee(s) as per Companies Act, 2013?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="258" id="arid_31">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="204">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_31_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--32-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are all the disclosures required under Companies Act, 2013 disclosed in the Director's Report?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="259" id="arid_32">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="205">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_32_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Audit Committee Chairman</strong></p>
                                    <!--33-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment, chairman of the Audit Committee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arid_33">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="audit-committee-questions-arid hidden">
                                        <!--34-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Has the Director missed more than 1 AGM held in the last three years and the Company has not disclosed compelling reason(s) for the same? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="260" id="arid_34">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="206">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_34_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--35-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Is the attendance of the Director at board meetings held in the last three years less than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control' id="arid_35">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--36-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Is the attendance of the director at board meetings held in the last year more than 75%?  <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="261" id="arid_36">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="207">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_36_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--37-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Is the attendance at Audit Committee meetings held in last three years less than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="262" id="arid_37">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="208">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_37_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--38-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are the qualifications made by the Auditors discussed adequately in the directors' report?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="263" id="arid_38">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="209">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_38_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--39-->
                                        <div class="form-group">
                                            <!--non audit fee / total auditors fee > 50 in any of the last three years then yes-->
                                            <label class="col-md-10">Is the Non-audit fee for the Auditors consistently more than 50% for the last 3 years? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="264" id="arid_39">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="210">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_39_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--40-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are there material weaknesses in internal controls of the Company observed continuously for 2 years?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="265" id="arid_40">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="211">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_40_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--41-->
                                        <div class="form-group">
                                            <label class="col-md-10">Were the financial statements restated due to material irregularities?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="266" id="arid_41">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="212">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_41_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--42-->
                                        <div class="form-group">
                                            <label class="col-md-10">Were the financial statements filed late due to non-technical reasons and the pattern is persisting or repetitive?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="267" id="arid_42">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="213">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_42_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--43-->
                                        <div class="form-group">
                                            <label class="col-md-10">Was there a material accounting fraud?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="268" id="arid_43">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="214">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_43_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--44-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the tenure of Auditors of the Company exceed by 10 years even after the transition period?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="269" id="arid_44">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="215">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_44_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--45-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the composition of the Audit committee compliant with the Companies Act, 2013/ Listing Agreement?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="270" id="arid_45">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="216">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_45_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--46-->
                                        <div class="form-group">
                                            <label class="col-md-10">Are the Auditors being appointed for requisite years?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="271" id="arid_46">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="217">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_46_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--47-->
                                        <div class="form-group">
                                            <!--read the question-->
                                            <label class="col-md-10">Was the Audit Committee Chairman present at the last AGM? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="272" id="arid_47">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="218">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_47_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Nomination and Remuneration Committee Chairman</strong></p>
                                    <!--48-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Director up for appointment, chairman of Nomination and Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="arid_48">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="nom-rem-questions-arid hidden">
                                        <!--49-->
                                        <div class="form-group">
                                            <!--read the question / percentage-->
                                            <label class="col-md-10">Is the attendance at board meetings held last year less than 50%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="273" id="arid_49">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="219">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_49_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--50-->
                                        <div class="form-group">
                                            <!--read the question / per-->
                                            <label class="col-md-10">Is the Attendance at board meetings held in the last three years less than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="274" id="arid_50">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="220">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_50_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--51-->
                                        <div class="form-group">
                                            <!--read the question / per-->
                                            <label class="col-md-10">Is the attendance at Nomination & Remuneration Committee meetings held last year less than 50%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="275" id="arid_51">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="221">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_51_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--52-->
                                        <div class="form-group">
                                            <!--read the question / per and peperate hui to nomination-->
                                            <label class="col-md-10">Is the attendance at Nomination &amp; Remuneration Committee meetings held in last 3 years less than 75%? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="276" id="arid_52">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="222">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_52_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--53-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Board composition non-compliant with the listing agreement for more than 90 days?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="277" id="arid_53">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="223">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_53_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--54-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Director with poor attendance record been proposed for reappointment?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="278" id="arid_54">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="224">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_54_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--55-->
                                        <div class="form-group">
                                            <!-- no of meetings held in current year is > 0 then yes -->
                                            <label class="col-md-10">Did Nomination and Remuneration Committee meet last year? <b class="id-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="279" id="arid_55">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="225">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_55_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--56-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the composition of the Nomination & Remuneration committee compliant with the Companies Act, 2013/ Listing Agreement?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="no" data-trigger-no="280" id="arid_56">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="226">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_56_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--57-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Director paid excessive remuneration when compared to peers?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="281" id="arid_57">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="227">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_57_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--58-->
                                        <div class="form-group">
                                            <label class="col-md-10">Did the Company re-priced options in the last three years? (if the re-pricing was not justified (see Option re-pricing policy for details</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="282" id="arid_58">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="228">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_58_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--59-->
                                        <div class="form-group">
                                            <label class="col-md-10">Is the Independent director with tenure over 10 years being reappointed without adequate reason/ justification?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="291" id="arid_59">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="239">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="arid_59_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance:</strong></p>
                                    <!--60-->
                                    <div class="form-group">
                                        <!--read the question / per-->
                                        <label class="col-md-10">Is the attendance at board meetings held last year was less than 50%? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="292" id="arid_60">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="240">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_60_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--61-->
                                    <div class="form-group">
                                        <!--read the question / per-->
                                        <label class="col-md-10">Was the Attendance at Audit Committee meetings held last year was less than 50%? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="293" id="arid_61">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="241">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_61_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--62-->
                                    <div class="form-group">
                                        <!--read the question / per-->
                                        <label class="col-md-10">Was the attendance at board meetings held in the last three years was less than 75%? (NA if attendance increased in recent years) <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="294" id="arid_62">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="242">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_62_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--63-->
                                    <div class="form-group">
                                        <!--read the question / per-->
                                        <label class="col-md-10">Was the attendance at Audit Committee meetings held in last three years was less than 75%? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="295" id="arid_63">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="243">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_63_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--64-->
                                    <div class="form-group">
                                        <!--read the question / per-->
                                        <label class="col-md-10">Was the attendance at Nomination & Remuneration Committee meetings held in last 3 years less than 75%? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="296" id="arid_64">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="244">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_64_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--65-->
                                    <div class="form-group">
                                        <!--read the question / per being analysed-->
                                        <label class="col-md-10">Is the Independent Director(s) liable to retire by rotation? <b class="id-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-arid' data-trigger-value="yes" data-trigger-no="297" id="arid_65">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="245">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="arid_65_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control " placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_arid">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment/Reappointment of Independent Directors">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control" id="recommendation_text_arid" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Appointment/Reappointment of Executive Directors</h4>
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
                                                        SES will broadly consider five criteria i.e. time commitments, remuneration, board composition, attendance, and directors' evaluation as appended in the Report, for analyzing resolutions related to appointment of an Executive Director.
                                                    </p>
                                                    <p>
                                                        If the post of CEO and Chairman are held by the same person, SES would strongly recommend that the post be separated and an independent director be appointed as the Chairman of the Board.
                                                    </p>
                                                    <p>
                                                        In case SES is making any recommendation other than a FOR recommendation on resolution appointing ED/ MD along with approval of remuneration, due to remuneration of the executive director, SES would recommend that in the future, such resolutions be split into two parts – one for appointment of director and the other one for remuneration of director. Then SES would recommend voting for the appointment of director (if no other concern has been identified) but vote separately on the remuneration package.
                                                    </p>
                                                    <p>
                                                        If the Chairman of the Board, Nomination &amp; Remuneration Committee is a non-independent director, SES will recommend that the Company should appoint an independent director as the Chairman of the Board/ Committee, as the case may be.
                                                    </p>
                                                    <p>
                                                        If an executive director is a member of the Audit Committee, SES would recommend that the director should give up his membership of the Committee to avoid conflict of interest issues.
                                                    </p>
                                                    <p>
                                                        At least one members of the Board should be resident of India for more than 182 days.
                                                    </p>
                                                    <p>
                                                        Additionally, SES would recommend the following:
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            A director should not be a member of more than 3 Audit Committees, especially if the director is the Chairman of one or more of the Committees
                                                        </li>
                                                        <li>
                                                            A director should limit his committee memberships to 6, including a maximum of 3 committee chairmanships
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                        <input type="hidden" name="used_in[]" value="Directors">
                                        <label class="col-md-2">Directors</label>
                                        <div class="col-md-3">
                                            <select class="form-control ed-ids" name="used_in_text[]">
                                                <option value="">Select Director</option>
                                                <?php
                                                foreach($directors as $director) {
                                                    if(($director['company_classification']=='ED' || $director['company_classification']=='EDP') && $director['additional_classification']!='M(Resign)' && $director['additional_classification']!='C(Resign)') {
                                                        echo "<option value='$director[dir_din_no]'>$director[dir_name]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <p><strong>Director's Profile</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Current full-time position">
                                                    <td style="width: 30%;">Current full-time position</td>
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Functional Area">
                                                    <td>Functional Area</td>
                                                    <td><textarea class="form-control ed-functional-area" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Education">
                                                    <td>Education</td>
                                                    <td><textarea class="form-control ed-education" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Part of Promoter Group?">
                                                    <td>Part of Promoter Group?</td>
                                                    <td><textarea class="form-control ed-part-promoter-group" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Past Experience">
                                                    <td>Past Experience</td>
                                                    <td><textarea class="form-control ed-past-ex" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Committee positions in the Company">
                                                    <td>Committee positions in the Company</td>
                                                    <td><textarea class="form-control ed-committee-positions" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Retirement by rotation?">
                                                    <td>Retirement by rotation?</td>
                                                    <td><textarea class="form-control ed-retiring-non-retiring" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="SES' Recommendation">
                                                    <td>SES' Recommendation</td>
                                                    <td>
                                                        <select class="form-control" name="used_in_text[]">
                                                            <option value="">Select</option>
                                                            <option value="For">For</option>
                                                            <option value="Against">Against</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Director's Profile Discussion">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Director's Profile Discussion"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Past Remuneration of the Director</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover table-stripped">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" colspan="2" rowspan="2" style="width: 30%; vertical-align: middle;">In&nbsp;<i class="fa fa-rupee"></i>&nbsp;Crores</th>
                                                    <th class="text-center" colspan="2">
                                                        <select class="form-control" id="remuneration_years" name="past_rem_year1">
                                                            <option value="">Select Year</option>
                                                            <?php
                                                            for($year=2010;$year<=2020;$year++) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th class="text-center" colspan="2"><input id="rem_second_year" name="past_rem_year2" readonly="" class="form-control"></th>
                                                    <th class="text-center" colspan="2"><input id="rem_third_year" name="past_rem_year3" readonly="" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Fixed Pay</th>
                                                    <th class="text-center">Total Pay</th>
                                                    <th class="text-center">Fixed Pay</th>
                                                    <th class="text-center">Total Pay</th>
                                                    <th class="text-center">Fixed Pay</th>
                                                    <th class="text-center">Total Pay</th>
                                                </tr>
                                                </thead>
                                                <tbody id="remuneration_table_body">
                                                <tr>
                                                    <td colspan="2"><input class="form-control" name="past_rem_dir_name" id="past_rem_dir_name"/></td>
                                                    <td><input class="form-control" name="fixed_pay_year1" id="fixed_pay_year1"/></td>
                                                    <td><input class="form-control" name="total_pay_year1" id="total_pay_year1" /></td>
                                                    <td><input class="form-control" name="fixed_pay_year2"  id="fixed_pay_year2" /></td>
                                                    <td><input class="form-control" name="total_pay_year2" id="total_pay_year2" /></td>
                                                    <td><input class="form-control" name="fixed_pay_year3" id="fixed_pay_year3" /></td>
                                                    <td><input class="form-control" name="total_pay_year3" id="total_pay_year3" /></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Executive Remuneration - peer comparision</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover table-stripped">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Director</td>
                                                    <td><input class="form-control director1" name="ex_rem_col_1[]"/> </td>
                                                    <td><input class="form-control director2" name="ex_rem_col_2[]"/> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Company</td>
                                                    <td><input class="form-control company1" name="ex_rem_col_1[]"/> </td>
                                                    <td>
                                                        <select name="ex_rem_col_2[]" class="form-control company2"></select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Promoter</td>
                                                    <td><input class="form-control promotor1" name="ex_rem_col_1[]"/> </td>
                                                    <td><input class="form-control promotor2" name="ex_rem_col_2[]"/> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Remuneration (Rs Cr) (A)</td>
                                                    <td><input class="form-control remuneration1" name="ex_rem_col_1[]"/> </td>
                                                    <td><input class="form-control remuneration2" name="ex_rem_col_2[]"/> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Net Profits(Rs Cr) (B)</td>
                                                    <td><input class="form-control netprofit1" name="ex_rem_col_1[]"/> </td>
                                                    <td><input class="form-control netprofit2" name="ex_rem_col_2[]"/> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Ratio (A/B)</td>
                                                    <td><input class="form-control ratio1" name="ex_rem_col_1[]"/> </td>
                                                    <td><input class="form-control ratio2" name="ex_rem_col_2[]"/> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Year</th>
                                                    <th class="text-center">ED Remuneration</th>
                                                    <th class="text-center">Indexed TSR (LHS)</th>
                                                    <th class="text-center">Net Profit</th>
                                                </tr>
                                                </thead>
                                                <tbody id="remuneration_growth">
                                                <tr class="find_tr">
                                                    <td>
                                                        <select class="form-control year_table2" id="indexed_tsr_year_start_year" name="ex_rem_years[]">
                                                            <option value="">Select Year</option>
                                                            <?php
                                                            for($year=2010;$year<=2020;$year++) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="find_tr">
                                                    <td><input class="form-control year_table2" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="find_tr">
                                                    <td><input class="form-control year_table2" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="find_tr">
                                                    <td><input class="form-control year_table2" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="find_tr">
                                                    <td><input class="form-control year_table2" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="find_tr">
                                                    <td><input class="form-control year_table2" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control edr" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control index" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control np" name="net_profit[]"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Director's Time Commitment</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <th style="width: 30%;">Total Directorships</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Directorships">
                                                    <td><textarea class="form-control ed-total-directorship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Total Committee memberships</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee memberships">
                                                    <td><textarea class="form-control ed-committee-memberships" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Total Committee Chairmanship</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Total Committee Chairmanship">
                                                    <td><textarea class="form-control ed-committee-chairmanship" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Full time role/ executive position</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Full time role/ executive position">
                                                    <td><textarea class="form-control" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <input type="hidden" name="used_in[]" value="Discussion about Director's Time">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discussion about Director's Time"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Director's Performance</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover ">
                                                <tbody>
                                                <tr class="tr-td-center">
                                                    <th style="width: 30%;">Last 3 AGMs</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Last 3 AGMs">
                                                    <td><textarea class="form-control ed-last-3-agms" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Board meetings held last year</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings held last year">
                                                    <td><textarea class="form-control ed-board-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Board meetings in last 3 years (avg.)</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Board meetings in last 3 years (avg.)">
                                                    <td><textarea class="form-control ed-board-meeting-last-years-avg" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Audit Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Audit Committee meetings">
                                                    <td><textarea class="form-control ed-audit-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center ed-nomination-remuneration-row">
                                                    <th>Nomination & Remuneration Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination & Remuneration Committee meetings">
                                                    <td><textarea class="form-control ed-nomination-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden ed-nomination-row">
                                                    <th>Nomination Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Nomination Committee meetings">
                                                    <td><textarea class="form-control ed-nomination-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center hidden ed-remuneration-row">
                                                    <th>Remuneration Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="Remuneration Committee meetings">
                                                    <td><textarea class="form-control ed-remuneration-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>CSR Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors">
                                                    <input type="hidden" name="used_in[]" value="CSR Committee meetings">
                                                    <td><textarea class="form-control ed-csr-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <th>Stakeholders' Relationship Committee meetings</th>
                                                    <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors" />
                                                    <input type="hidden" name="used_in[]" value="Stakeholders' Relationship Committee meetings" />
                                                    <td><textarea class="form-control ed-stack-meeting-last-year" name="used_in_text[]"></textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors" />
                                            <input type="hidden" name="used_in[]" value="Discuss about Director's Performance" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Discuss about Director's Performance"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Remuneration Package</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Component</th>
                                                    <th class="text-center">Proposed Remuneration</th>
                                                    <th class="text-center">Comments</th>
                                                </tr>
                                                </thead>
                                                <tbody id="remuneration_growth">
                                                <tr class="tr-td-center">
                                                    <td rowspan="2">
                                                        Basic Pay
                                                    </td>
                                                    <td>
                                                        Proposed Salary :
                                                        <input class="form-control proposed_salary" name="rem_package[]"/>
                                                    </td>
                                                    <td rowspan="2"><input class="form-control basic_pay_comment" name="rem_package[]"></td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Annual increment:
                                                        <input class="form-control annual_increment" name="rem_package[]"/>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td rowspan="2">
                                                        Perquisites/ Allowances
                                                    </td>
                                                    <td>
                                                        All perquisites clearly defined
                                                        <select class="form-control all_perquisites" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td rowspan="2">
                                                        Cap placed on perquisites:
                                                        <select class="form-control can_placed_perquisites" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Total allowances:
                                                        <input class="form-control total_allowance" name="rem_package[]"/>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td rowspan="2">
                                                        Variable Pay
                                                    </td>
                                                    <td rowspan="2">
                                                        <select class="form-control variable_pay" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        Performance criteria disclosed:
                                                        <select class="form-control performance_criteria" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Cap placed on variable pay:
                                                        <select class="form-control can_placed_on_variable" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Notice Period
                                                    </td>
                                                    <td>
                                                        <input class="form-control notice_period" name="rem_package[]"/>
                                                    </td>
                                                    <td rowspan="2">
                                                        <input class="form-control notice_severance_pay_comments" name="rem_package[]"/>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Severance Pay
                                                    </td>
                                                    <td>
                                                        <input class="form-control severance_pay" name="rem_package[]"/>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td rowspan="2">
                                                        Minimum Remuneration
                                                    </td>
                                                    <td rowspan="2">
                                                        <input class="form-control minimum_remuneration" name="rem_package[]"/>
                                                    </td>
                                                    <td>
                                                        Within limits prescribed:
                                                        <select class="form-control within_limits" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="tr-td-center">
                                                    <td>
                                                        Includes variable pay:
                                                        <select class="form-control includes_variable" name="rem_package[]">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors" />
                                            <input type="hidden" name="used_in[]" value="Comments on Variable Pay" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Comments on Variable Pay"><b>Comments on Variable Pay: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors" />
                                            <input type="hidden" name="used_in[]" value="Comments on Minimum Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Comments on Minimum Remuneration"><b>Comments on Minimum Remuneration: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Appointment/Reappointment of Executive Directors" />
                                            <input type="hidden" name="used_in[]" value="Comments on skewness of remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Comments on skewness of remuneration"><b>Comments on skewness of remuneration: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Recommendation Guidelines</strong></p>
                                    <!--1-->
                                    <div class="form-group">
                                        <!-- agar commitee same hai and present hai to yes
                                         agal hai or nomination hai to yes
                                         -->
                                        <label class="col-md-10">Does the Company have a Nomination &amp; Remuneration Committee? (Related to Appointment) <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="300" id="ared_1">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="246">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_1_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--2-->
                                    <div class="form-group">
                                        <!-- agar commitee same hai and present hai to yes
                                         agal hai or remuneration hai to yes
                                         -->
                                        <label class="col-md-10">Does the Company have a Nomination & Remuneration Committee? (Related to Remuneration) <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="301" id="ared_2">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="247">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_2_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--3-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is there material failures of governance, stewardship, risk oversight and fiduciary responsibilities?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="302" id="ared_3">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="248">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_3_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--4-->
                                    <div class="form-group">
                                        <!-- if remuneration is present then yes else no -->
                                        <label class="col-md-10">Has the remuneration paid to the director disclosed? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="303" id="ared_4">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="249">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_4_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--5-->
                                    <div class="form-group">
                                        <!-- if member hai to yes / agal hai to nomination ka member hai to yes -->
                                        <label class="col-md-10">Is the director a member of the Nomination & Remuneration Committee? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="304" id="ared_5">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="250">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_5_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--6-->
                                    <div class="form-group">
                                        <!-- read the question -->
                                        <label class="col-md-10">Was the Director’s attendance at board meetings held in the last three years less than 75% (NA if increased in recent years) <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="305" id="ared_6">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="251">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_6_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--7-->
                                    <div class="form-group">
                                        <!-- read the question -->
                                        <label class="col-md-10">Did the director not attend any of the Board meetings held in last financial year? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="306" id="ared_7">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="252">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_7_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--8-->
                                    <div class="form-group">
                                        <label class="col-md-10">Would the board composition fall below the applicable regulatory norm upon appointment of the director?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="307" id="ared_8">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="253">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_8_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--9-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company been non-compliant with the board composition norm for over 90 days?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="308" id="ared_9">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="254">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_9_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Time Commitments</strong></p>
                                    <!--10-->
                                    <div class="form-group">
                                        <!-- public directorship > 10 then yes else no -->
                                        <label class="col-md-10">Does the director hold directorship in more than 10 public companies? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="309" id="ared_10">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="255">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_10_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--11-->
                                    <div class="form-group">
                                        <!-- total directorship > 20 then yes else no -->
                                        <label class="col-md-10">Does the director hold directorship in more than 20 companies? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="310" id="ared_11">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="256">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_11_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--12-->
                                    <div class="form-group">
                                        <!-- listed company directorship > 3 then yes else no -->
                                        <label class="col-md-10">Does the director hold directorship in more than 3 listed companies? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="311" id="ared_12">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="257">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_12_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--13-->
                                    <div class="form-group">
                                        <!-- committee membership > 10 then yes else no -->
                                        <label class="col-md-10">Does the director holds more than 10 committee memberships? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="312" id="ared_13">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="258">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_13_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--14-->
                                    <div class="form-group">
                                        <!-- committee chairmanship > 10 then yes else no -->
                                        <label class="col-md-10">Does the director holds more than 5 committee chairmanships? <b class="ed-analysis-values">value</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="313" id="ared_14">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="259">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_14_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--15-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the director holds more than 1 full time position in material entity?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="314" id="ared_15">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="260">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_15_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--16-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed Committee positions/ Directorships held by the director?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger' data-trigger-value="no" data-trigger-no="315" id="ared_16">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_16_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--17-->
                                    <div class="form-group">
                                        <label class="col-md-10"><b>Is the Director Chairman of the Board?</b></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="ared_17">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="is-director-chairman-questions hidden">
                                        <!--18-->
                                        <div class="form-group">
                                            <!-- pichle 3 saal mai ek bhi agm miss kiya hai then yes else no -->
                                            <label class="col-md-10">Has the director missed more than 1 AGM held in the last three years and the Company has not disclosed a compelling reason for the same? <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="316" id="ared_18">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="261">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_18_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--19-->
                                        <div class="form-group">
                                            <!-- read question and give percentage-->
                                            <label class="col-md-10">Was the attendance at board meetings held last year less than 67% ?(NA if increased in recent years) <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="317" id="ared_19">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="262">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_19_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--20-->
                                        <div class="form-group">
                                            <!-- read question and give percentage-->
                                            <label class="col-md-10">Was the attendance at board meetings held in the last three years less than 75% (NA if increased recent years) <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="318" id="ared_20">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="263">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_20_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--21-->
                                        <div class="form-group">
                                            <label class="col-md-10">Does the Company has a compliant Audit Committee?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="319" id="ared_21">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="264">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_21_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--22-->
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Board composition been non-compliant with the listing agreement for more than 90 days?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="320" id="ared_22">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="265">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_22_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--23-->
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company been non-compliant with any material regulation?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="321" id="ared_23">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="266">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_23_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--24-->
                                        <div class="form-group">
                                            <!-- read question agar alag hai to nomination check karni hai -->
                                            <label class="col-md-10">Does the Company have a Nomination & Remuneration Committee? <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="322" id="ared_24">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" data-recommendation-table-id="267">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_24_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--25-->
                                    <div class="form-group">
                                        <label class="col-md-10"><strong>Is the Director CEO/CFO of the Company?</strong></label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="ared_25">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--26-->
                                    <div class="is-director-ceo-cfo-questions-ared hidden">
                                        <div class="form-group">
                                            <!-- read question yes/no-->
                                            <label class="col-md-10">Has the director missed more than 1 AGM held in the last three years and the Company has not disclosed a compelling reason for the same? <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="323" id="ared_26">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="268">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_26_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--27-->
                                        <div class="form-group">
                                            <!-- read question and percentage-->
                                            <label class="col-md-10">Was the attendance at board meetings held last year less than 67% ?(NA if increased in recent years) <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="324" id="ared_27">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="269">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_27_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--28-->
                                        <div class="form-group">
                                            <!-- read question and percentage-->
                                            <label class="col-md-10">Was the attendance at board meetings held in the last three years less than 75% (NA if increased recent years) <b class="ed-analysis-values">value</b></label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="325" id="ared_28">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="270">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_28_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--29-->
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company been non-compliant with any material regulation? (In case of CEO only)</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="326" id="ared_29">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="271">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_29_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--30-->
                                        <div class="form-group">
                                            <label class="col-md-10">Were Financial statements restated due to material irregularities?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="327" id="ared_30">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="272">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_30_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--31-->
                                        <div class="form-group">
                                            <label class="col-md-10">Has the Company made late filing of financial statements?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="328" id="ared_31">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="273">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_31_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                        <!--32-->
                                        <div class="form-group">
                                            <label class="col-md-10">Has material accounting fraud occurred at the company?</label>
                                            <div class="col-md-2">
                                                <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="329" id="ared_32">
                                                    <option value="">Select</option>
                                                    <option value="yes" data-recommendation-table-id="274">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value=na>Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="ared_32_analysis_text">
                                            <div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                                <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Remuneration of Executive Director</strong></p>
                                    <!--33-->
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company Increased the remuneration between 25% - 50% of the existing salary?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control' id="ared_33">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--34-->
                                    <div class="form-group hidden" id="ared_33_block_1">
                                        <label class="col-md-10">Has the Company given justification for the increase in remuneration?</label>
                                        <div class="col-md-2">
                                            <!-- special case for yes and no-->
                                            <select name="triggers[]" class='form-control recommendations-fire-ared' id="ared_34" data-trigger-no-yes="330" data-trigger-no-no="331">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="275">Yes</option>
                                                <option value="no" data-recommendation-table-id="276">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_34_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--35-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the increase in remuneration more than 50% of the existing salary? ( NA if base salary was low)</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="332" id="ared_35">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="277">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_35_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--36-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the remuneration paid to the executive director excessive? (Not applicable if the Director is appointed elsewhere also)</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="333" id="ared_36">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="278">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_36_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--37-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the resolution provide the Board discretion to change remuneration without taking further shareholder approval and the total remuneration is without any limit?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="334" id="ared_37">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="279">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_37_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--38-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does the remuneration package has performance based pay/ Variable pay?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="335" id="ared_38">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="280">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_38_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--39-->
                                    <div class="form-group">
                                        <label class="col-md-10">Have remuneration components payable to the director capped?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="336" id="ared_39">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="281">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_39_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--40-->
                                    <div class="form-group">
                                        <label class="col-md-10">Have remuneration components payable to the director disclosed?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="337" id="ared_40">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="282">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_40_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--41-->
                                    <div class="form-group">
                                        <label class="col-md-10">Does minimum remuneration payable include variable pay, however, within Schedule V of the Companies Act, 2013?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="338" id="ared_41">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="283">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_41_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--42-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is the minimum remuneration payable includes variable pay and more than Schedule V of the Companies Act, 2013?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="no" data-trigger-no="339" id="ared_42">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="284">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_42_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <!--43-->
                                    <div class="form-group">
                                        <label class="col-md-10">Would the Director receive guaranteed bonus/commission?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control analysis_trigger recommendations-fire-ared' data-trigger-value="yes" data-trigger-no="340" id="ared_43">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="285">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="ared_43_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="analysis_text[]" class="form-control " placeholder="Enter analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_ared">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Appointment/Reappointment of Executive Directors">
                                            <textarea rows="4" name="recommendation_text[]" id="recommendation_text_ared" class="form-control" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
                                    <h4 class="form-section">Cessation of Directorship</h4>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_check_1">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        If a director is retiring by rotation in the AGM and is not seeking reappointment and the Company is not appointing any other director in his place, SES will analyze the impact of the retirement on the Board composition while making its recommendation. SES would recommend that in future, the resolution split into two separate resolutions-retirement and not filling vacancy.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Cessation of Directorship">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <textarea rows="4" class="form-control inline-editor" name="used_in_text[]" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company's Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="resolution_section[]" value="Cessation of Directorship">
                                            <input type="hidden" name="used_in[]" value="Company's Justification">
                                            <textarea rows="4" class="form-control inline-editor" name="used_in_text[]" placeholder="Enter text of the company's justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>GENERAL </strong></p>
                                    <!--1-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is an executive director retiring?</label>
                                        <div class="col-md-2">
                                            <select class='form-control' name="triggers[]" id="cod_1" >
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--2-->
                                    <div class="form-group hidden" id="cod_1_block_1">
                                        <label class="col-md-10">Does the retirement of the executive director leads to violation of any regulation? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-cessation-of-directorship analysis-trigger-yes-no' data-trigger-no-yes="199" data-trigger-no-no="200" id="cod_2">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="143">Yes</option>
                                                <option value="no" data-recommendation-table-id="142">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_2_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <!--3-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is a non-independent non-executive director retiring?</label>
                                        <div class="col-md-2">
                                            <select class='form-control' name="triggers[]" id="cod_3">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--4-->
                                    <div class="form-group hidden" id="cod_3_block_1">
                                        <label class="col-md-10">Does the retirement of the non-independent non-executive director leads to violation of any regulation? </label>
                                        <div class="col-md-2">
                                            <select class='form-control' name="triggers[]" recommendations-fire-cessation-of-directorship analysis-trigger-yes-no data-trigger-no-yes="201" data-trigger-no-no="202" id="cod_4">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="145">Yes</option>
                                                <option value="no" data-recommendation-table-id="144">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_4_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <!--5-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is an independent director retiring and board independence (as per SES classification)is greater than 50% post retirement?</label>
                                        <div class="col-md-2">
                                            <select class='form-control' name="triggers[]" id="cod_5">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--6-->
                                    <div class="form-group hidden" id="cod_5_block_1">
                                        <label class="col-md-10">Does the retirement of the independent director leads to violation of any regulation? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-cessation-of-directorship analysis-trigger-yes-no' data-trigger-no-yes="203" data-trigger-no-no="204" id="cod_6">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="147">Yes</option>
                                                <option value="no" data-recommendation-table-id="146">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_6_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <!--7-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is an independent director retiring and board independence(as per SES classification)is less than 50% post retirement but still compliant with regulations?</label>
                                        <div class="col-md-2">
                                            <select class='form-control' name="triggers[]" id="cod_7">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--8-->
                                    <div class="form-group hidden" id="cod_7_block_1">
                                        <label class="col-md-10">Does the retirement of the independent director leads to violation of any regulation? </label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-cessation-of-directorship analysis-trigger-yes-no' data-trigger-no-yes="205" data-trigger-no-no="206" id="cod_8">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="149">Yes</option>
                                                <option value="no" data-recommendation-table-id="148">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_8_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <!--9-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is an independent director retiring and board independence is non-compliant as per law post retirement?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-cessation-of-directorship analysis_trigger' data-trigger-value="yes" data-trigger-no="207" id="cod_9">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="150">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_9_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <!--10-->
                                    <div class="form-group">
                                        <label class="col-md-10">Is an independent director retiring and board independence is non-compliant with regulations post retirement but compliance can be achieved by appointing an independent chairman?</label>
                                        <div class="col-md-2">
                                            <select name="triggers[]" class='form-control recommendations-fire-cessation-of-directorship analysis_trigger' data-trigger-value="yes" data-trigger-no="208" id="cod_10">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="151">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cod_10_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control" name="analysis_text[]"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" class="form-control " name="analysis_text[]" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_cessation_of_directorship">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Cessation of Directorship">
                                            <textarea rows="4" name="recommendation_text[]" id="recommendation_text_cod" class="form-control" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Alternate Directors</h4>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_check_2">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES is of the opinion that directors have a fiduciary duty to devote sufficient time for Company’s affairs. If a director is unable to do so, he/she should give up his/her directorship. Generally, companies appoint alternate directors for foreign directors because of time constraints and to travel involved in attending the meetings. However, since the regulations now allow attendance at board meetings through teleconferencing/videoconferencing, this is no longer a valid reason. Therefore, SES may generally recommend voting AGAINST the appointment of alternate directors unless the Company provides a strong justification for doing so, the alternate director has similar expertise to the original director, and also explains how the director for whom an alternate is being appointed would continue to add value to the Company.
                                                        Additionally, the law now provides for maximum number of directorship, which does not include number of additional director. The provision gets defeated as the objective was to limit the number of directorship, so that the Directors can device-widthote time.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution">
                                            <input type="hidden" name="resolution_section[]" value="Alternate Directors">
                                            <textarea rows="4" name="used_in_text[]" class="form-control inline-editor" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Company's Justification</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Conpany Justification">
                                            <input type="hidden" name="resolution_section[]" value="Alternate Directors">
                                            <textarea rows="4" class="form-control inline-editor" name="used_in_text[]" placeholder="Enter text of the company's justification"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Alternate Directors">
                                            <textarea rows="4" class="form-control " name="analysis_text[]" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Alternate Directors">
                                            <textarea rows="4" name="recommendation_text[]" class="form-control" placeholder="Enter recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="aoopintment_directors" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script type="text/javascript" src="Scripts/appointment-directors.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initialization();
                object.pageload();
            });
        </script>
</body>
</html>























