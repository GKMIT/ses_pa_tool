<?php
session_start();
include_once("../../Classes/database.php");
include_once("../../config.php");
if(!isset($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag= false;
$msg ="";
if(isset($_POST['btn_director_attendance_and_pay_details'])) {
    $db = new Database();
    $info['company_id']=$_POST['company_id'];
    $info['dir_din_no']=trim($_POST['dir_din_no']);
    $info['att_year']=trim($_POST['att_year']);
    $info['board_meetings_attended']=trim($_POST['board_meetings_attended']);
    $info['board_meetings_held']=trim($_POST['board_meetings_held']);
    $info['variable_pay']=trim($_POST['variable_pay']);
    $info['fixed_pay']=trim($_POST['fixed_pay']);
    $info['agm_attended']=$_POST['agm_attended'];

    if(isset($_POST['audit_committee_member'])) {
        $info['audit_committee_member']='yes';
        $info['audit_committee_meetings_attended'] = $_POST['audit_committee_meetings_attended'];
        $info['audit_committee_meetings_held'] = $_POST['audit_committee_meetings_held'];
    }
    else {
        $info['audit_committee_member']='no';
    }

    if(isset($_POST['rem_nom_same_committee']) && $_POST['rem_nom_same_committee']=='yes') {
        $info['rem_nom_same_committee'] = 'yes';
        $info['remeneration_nomination_committee_meetings_attended'] = $_POST['nom_and_rem_committee_meetings_attended'];
        $info['remeneration_nomination_committee_meetings_held'] = $_POST['nom_and_rem_committee_meetings_held'];
    }
    elseif(isset($_POST['rem_nom_same_committee']) && $_POST['rem_nom_same_committee']=='no') {
        $info['rem_nom_same_committee']='no';
        $info['remeneration_committee_meetings_attended'] = $_POST['remuneration_committee_meetings_attended'];
        $info['remeneration_committee_meetings_held'] = $_POST['remuneration_committee_meetings_held'];
        $info['nomination_committee_meetings_attended'] = $_POST['nomination_committee_meetings_attended'];
        $info['nomination_committee_meetings_held'] = $_POST['nomination_committee_meetings_held'];
    }
    if(isset($_POST['investors_grievance_committee_member'])) {
        $info['investors_grievance_committee_member']='yes';
        $info['investors_grievance_meetings_attended'] = $_POST['investors_grievance_meetings_attended'];
        $info['investors_grievance_meetings_held'] = $_POST['investors_grievance_meetings_held'];
    }
    else {
        $info['investors_grievance_committee_member']='no';
    }
    if(isset($_POST['csr_committee_member'])) {
        $info['csr_committee_member'] = 'yes';
        $info['csr_committee_meetings_attended'] = $_POST['csr_committee_meetings_attended'];
        $info['csr_committee_meetings_held'] = $_POST['csr_committee_meetings_held'];
    }
    else {
        $info['csr_committee_member'] = 'no';
    }
    if(isset($_POST['risk_management_committee_member'])) {
        $info['risk_management_committee_member'] = 'yes';
        $info['risk_management_committee_meetings_attended'] = $_POST['risk_management_committee_meetings_attended'];
        $info['risk_management_committee_meetings_held'] = $_POST['risk_management_committee_meetings_held'];
    }
    else {
        $info['risk_management_committee_member'] = 'no';
    }
    $info['comments'] = trim($_POST['comments']);
    $response = $db->directorBoardPayAttendance($info);
    $flag = true;
    $title = $response['title'];
    $msg = $response['msg'];
    $image = $response['image'];
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title>PA Tool</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
    <link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2-metronic.css"/>
    <link href="../../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../../assets/css/sweet-alert.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed">
<?php include_once("../../navbar.php"); ?>
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
                <li class="active">
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
                        <li class="active">
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
                                <li class="active">
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
                        Director's  Attendance and Remuneration
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
                                Input Sheet
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                Admin
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                Director's  Attendance and Remuneration
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" method="post" action="director-attendance-remuneration.php">
                                <input type="hidden" id="current_year" value="<?php echo date('Y'); ?>" />
                                <div class="form-body">
                                    <h4 class="form-section">Details</h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Company Name</label>
                                        <input value="<?php echo $_SESSION['input_sheet_company_id']; ?>" type="hidden" name="company_id" id="companies_id"/>
                                        <div class="col-md-4">
                                            <div style="position: relative;">
                                                <input value="<?php echo $_SESSION['input_sheet_company_name']; ?>" type="text" placeholder="Enter company name" autocomplete="off" id="com_bse_code" class="form-control"/>
                                                <div class="auto-fill hidden">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Year</label>
                                        <div class="col-md-4">
                                            <select name="att_year" class="form-control" id="att_year">
                                                <option value="">select year</option>
                                                <?php
                                                if(isset($_SESSION['input_sheet_financial_year'])) {
                                                    for ($i = 2011; $i <= 2020; $i++) {
                                                        if($i==$_SESSION['input_sheet_financial_year']) {
                                                            echo "<option selected value='$i'>$i</option>";
                                                        }
                                                        else {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                }
                                                else {
                                                    echo "aksj";
                                                    for ($i = 2011; $i <= 2020; $i++) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Director Name</label>
                                        <div class="col-md-4">
                                            <select class="form-control select2me" name="dir_din_no" id="dir_din_no">
                                                <option>Search By Name</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Last AGM Attended</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="agm_attended">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Board Meetings Attended</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="board_meetings_attended" placeholder="Enter no. of meetings attended or ND if not disclosed"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Board Meetings Held</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="board_meetings_held" placeholder="Enter no. of meetings held or ND if not disclosed"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Variable Pay in <i class="fa fa-rupee"></i> Crore</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="variable_pay" placeholder="Enter variable pay in Rs. Crore"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Fixed Pay in <i class="fa fa-rupee"></i> Crore</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="fixed_pay" placeholder="Enter fixed pay in Rs. Crore"/>
                                        </div>
                                    </div>
                                    <div id="director_attendance_block">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Comments</label>
                                        <div class="col-md-4">
                                            <textarea rows="4" class="form-control" name="comments"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button name="btn_director_attendance_and_pay_details" type="submit" class="btn green"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Details</button>
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
<script src="../../assets/plugins/respond.min.js"></script>
<script src="../../assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../assets/scripts/custom/sweet-alert.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../Scripts/custom.js"></script>
<script src="../../assets/scripts/core/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
        $("input").keypress(function(e) {
            if(e.which==13) {
                e.preventDefault();
                return;
            }
        });
        var messages = ['<?php echo $title; ?>','<?php echo $msg; ?>','<?php echo $image; ?>'];
        <?php
         if($flag) {
        ?>
        object.initializeDirectorBoardAttendanceJs(messages,true);
        <?php
         }
         else {
         ?>
        object.initializeDirectorBoardAttendanceJs(messages,false);
        <?php
         }
        ?>
    });
</script>
</body>
</html>