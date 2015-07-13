<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag = false;
$response = array();
if(isset($_POST['board_of_directors'])) {
    $db = new DatabaseReports();
    $info = $_POST;
    $response = $db->saveBoardOfDirectorsDetails($info);
    if($response['status']==200) {
        $flag = true;
    }
}
if(isset($_SESSION['report_id'])) {
    $db = new DatabaseReports();
    $report_id = $_SESSION['report_id'];
    $table_name="pa_report_board_profile";
    if($db->isReportDataExists($report_id,$table_name)) {
        $report_data_exists = true;
        $board_profile = $db->getCompanyBoardOfDirectors($report_id);
        $board_independence = $board_profile['board_independence'];
    }
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
    <link rel="stylesheet" type="text/css" href="assets/css/sweet-alert.css" />
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
                <li class="active">
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
                <li>
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
                        Board Profile
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
                                Board Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
<!--                                <input type="hidden" id="edit_mode" name="edit_mode" value="">-->
                                <input type="hidden" id="main_section" name="main_section" value="Board Profile">
                                <?php
                                if($report_data_exists) {
                                    echo "<input type='hidden' name='report_data_exists' />";
                                }
                                ?>
                                <div class="form-body table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Director</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;"></th>
                                            <th class="text-center" colspan="2">Classification</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Expertise/<br/>Specialization</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Tenure (Year)</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Directorship</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Committee Membership</th>
                                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Pay(<i class=" fa fa-rupee"></i>&nbsp; Lakh)
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Co.</th>
                                            <th class="text-center">SES</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if($report_data_exists) {
                                            $directors = $board_profile['board_directors'];
                                            foreach ($directors as $director) {
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <input name="dir_name[]" class="form-control" value="<?php echo $director['dir_name']; ?>"/>
                                                    </td>
                                                    <td class="text-center">
                                                        <select class="form-control" name="appointment[]">

                                                            <?php
                                                            if($director['appointment']=="U") {
                                                            ?>
                                                                <option value="">Select Option</option>
                                                                <option value="N">New Appointment</option>
                                                                <option value="U" selected>Re - Appointment</option>
                                                            <?php
                                                            }
                                                            elseif($director['appointment']=="N") {
                                                            ?>
                                                                <option value="">Select Option</option>
                                                                <option value="N" selected>New Appointment</option>
                                                                <option value="U">Re - Appointment</option>
                                                            <?php
                                                            }
                                                            else {
                                                            ?>
                                                                <option value="" selected>Select Option</option>
                                                                <option value="N">New Appointment</option>
                                                                <option value="U">Re - Appointment</option>
                                                            <?php
                                                            }
                                                            ?>

                                                        </select>
                                                    </td>
                                                    <td class="text-center"><input name="com_classification[]" class="form-control" value="<?php echo $director['company_classfification']; ?>"/></td>
                                                    <td class="text-center"><input name="ses_classification[]" class="form-control" value="<?php echo $director['ses_classification']; ?>"/></td>
                                                    <td class="text-center"><input name="expertise[]" class="form-control" value="<?php echo $director['expertise']; ?>"/></td>
                                                    <td class="text-center"><input name="tenure[]" class="form-control" value="<?php echo $director['tenure']; ?>"/></td>
                                                    <td class="text-center"><input name="directorship[]" class="form-control" value="<?php echo $director['directorship']; ?>"/></td>
                                                    <td class="text-center"><input name="comm_membership[]" class="form-control" value="<?php echo $director['comm_membership']; ?>"/></td>
                                                    <td class="text-center"><input name="pay[]" class="form-control" value="<?php echo $director['pay']; ?>"/></td>
                                                </tr>
                                            <?php
                                            }
                                        }
                                        else {
                                            $db = new DatabaseReports();
                                            $company_id = $_SESSION['company_id'];
                                            $financial_year = $_SESSION['report_year'];
                                            $directors = $db->getCompanyDirectorsWithPay($company_id, $financial_year);
                                            $filtered_directors =$db->filteredDirectorsForSheet($directors);
                                            foreach ($filtered_directors as $director) {
                                                ?>
                                                <tr>
                                                    <td class="text-center"><input name="dir_name[]" class="form-control" value="<?php echo $director['dir_name']; ?>"/>
                                                    </td>
                                                    <td class="text-center">
                                                        <select class="form-control" name="appointment[]">
                                                            <option value="">Select Option</option>
                                                            <option value="N">New Appointment</option>
                                                            <option value="U">Re - Appointment</option>
                                                        </select>
                                                    </td>
                                                    <?php
                                                    if ($director['retiring_non_retiring'] == 'Retiring') {
                                                        $director['company_classification'] .= "(R)";
                                                        $director['ses_classification'] .= "(R)";
                                                    }
                                                    ?>
                                                    <td class="text-center"><input name="com_classification[]" class="form-control" value="<?php echo $director['company_classification']; ?>"/></td>
                                                    <td class="text-center"><input name="ses_classification[]" class="form-control" value="<?php echo $director['ses_classification']; ?>"/></td>
                                                    <td class="text-center"><input name="expertise[]" class="form-control" value="<?php echo $director['expertise']; ?>"/></td>
                                                    <td class="text-center"><input name="tenure[]" class="form-control" value="<?php echo $director['current_tenure']; ?>"/></td>
                                                    <td class="text-center"><input name="directorship[]" class="form-control" value="<?php echo $director['no_directorship_public']; ?>(<?php echo $director['no_total_directorship']; ?>)"/></td>
                                                    <td class="text-center"><input name="comm_membership[]" class="form-control" value="<?php echo $director['committee_memberships']; ?>(<?php echo $director['committee_chairmanships']; ?>)"/></td>
                                                    <td class="text-center"><input name="pay[]" class="form-control" value="<?php echo (($director['variable_pay'] + $director['fixed_pay'])*100); ?>"/></td>
                                                </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea class="form-control inline-editor" rows="4" placeholder="Enter standard text" name="standard_text"><?php echo $board_independence['standard_text']; ?></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Board Profile of the Board Members on Various Parameters is as under:</strong></p>
                                    <?php
                                    if($report_data_exists) {
                                        $generic = $board_independence;
                                        $generic['ses_id_no']=$board_independence['id_as_per_ses'];
                                        $generic['ses_non_id_no']=$board_independence['nid_as_per_ses'];
                                        $generic['company_non_id_no']=$board_independence['nid_as_per_company'];
                                        $generic['company_id_no']=$board_independence['id_as_per_company'];
                                        $generic['na']=$board_independence['not_applicable'];
                                    }
                                    else {
                                        $generic = $db->getBoardIndependence($company_id,$financial_year);
                                    }

                                    ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th class="text-center" colspan="3">Board Independence</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Independent (As per SES)</td>
                                            <td class="text-center" colspan="2"><input name="id_as_per_ses" class="form-control" value="<?php echo $generic['ses_id_no']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Non-Independent (As per SES)</td>
                                            <td class="text-center" colspan="2"><input name="nid_as_per_ses" class="form-control" value="<?php echo $generic['ses_non_id_no']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Non-Independent (As per Company)</td>
                                            <td class="text-center" colspan="2"><input name="nid_as_per_company" class="form-control" value="<?php echo $generic['company_non_id_no']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Independent (As per Company)</td>
                                            <td class="text-center" colspan="2" width="20%"><input name="id_as_per_company" class="form-control" value="<?php echo $generic['company_id_no']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <textarea class="form-control inline-editor" cols="6" name="board_analysis_text" placeholder="Enter Text"><?php echo $generic['board_analysis_text']; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-center" colspan="3">Liable to retire by rotation</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left" colspan="2">Retiring</td>
                                            <td class="text-center"><input class="form-control" name="retiring" value="<?php echo $generic['retiring']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left" colspan="2">Non-Retiring</td>
                                            <td class="text-center"><input class="form-control" name="non_retiring" value="<?php echo $generic['non_retiring']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left" colspan="2">ID</td>
                                            <td class="text-center"><input class="form-control" name="not_applicable" value="<?php echo $generic['na']; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <textarea class="form-control inline-editor" cols="6" name="liable_analysis_text" placeholder="Enter Text"><?php echo $generic['liable_analysis_text']; ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button name="board_of_directors" type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/scripts/custom/sweet-alert.min.js"></script>
<script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script>
    jQuery(document).ready(function() {

        var j=10;
        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });

        <?php if($flag) {
        ?>
            swal({
                    title: "Board Profile data saved successfully"
                },
                function() {
                    window.location = "committee-performance.php";
                }
            );
        <?php
        }
        ?>
    });
</script>
</body>
</html>