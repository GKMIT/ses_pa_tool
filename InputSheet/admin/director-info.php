<?php
session_start();
include_once("../../Classes/database.php");
include_once("../../config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag= false;
$msg ="";
if(isset($_POST['btn_director_info'])) {
    $db = new Database();
    $info['company_id']=trim($_POST['company_id']);
    $info['dir_din_no']=trim($_POST['dir_din_no']);
    if($_POST['appointment_date']!="") {
        $info['appointment_date']=date_format(date_create_from_format('d-m-Y', $_POST['appointment_date']), 'Y-m-d');
    }
    else {
        $info['appointment_date']="0000-00-00";
    }
    if($_POST['resignation_date']!="") {
        $info['resignation_date']=date_format(date_create_from_format('d-m-Y', $_POST['resignation_date']), 'Y-m-d');
    }
    else {
        $info['resignation_date']="0000-00-00";
    }
    $info['current_tenure']=trim($_POST['current_tenure']);
    $info['total_association']=trim($_POST['total_association']);
    $info['company_classification']=trim($_POST['company_classification']);
    $info['ses_classification']=trim($_POST['ses_classification']);
    $info['additional_classification']=trim($_POST['additional_classification']);
    $info['audit_committee']=trim($_POST['audit_committee']);
    $info['investor_grievance']=trim($_POST['investor_grievance']);
    if(isset($_POST['is_nom_rem_separate'])) {
        if($_POST['is_nom_rem_separate']=='yes') {
            $info['remuneration']=trim($_POST['remuneration']);
            $info['nomination']=trim($_POST['nomination']);
            $info['is_nom_rem_separate']='yes';
        }
        else {
            $info['nomination_remuneration']=trim($_POST['nom_rem_committee']);
            $info['is_nom_rem_separate']='no';
        }
    }
    else {
        $info['hidden_nom_rem']=true;
        if($_POST['is_nom_rem_separate_hidden']=='yes') {
            $info['is_nom_rem_separate']='yes';
            $info['remuneration']=trim($_POST['remuneration']);
            $info['nomination']=trim($_POST['nomination']);
        }
        else {
            $info['nomination_remuneration']=trim($_POST['nom_rem_committee']);
            $info['is_nom_rem_separate']='no';
        }
    }
    $info['csr']=trim($_POST['csr']);
    $info['risk_management_committee']=trim($_POST['risk_management_committee']);
    $info['shares_held']=trim($_POST['shares_held']);
    $info['esops']=trim($_POST['esops']);
    $info['other_pecuniary_relationship']=trim($_POST['other_pecuniary_relationship']);
    $info['retiring_non_retiring']=trim($_POST['retiring_non_retiring']);
    $info['ratio_to_mre']=trim($_POST['ratio_to_mre']);
    $info['financial_year']=$_POST['financial_year'];
    $info['comments']=trim($_POST['comments']);
    $response = $db->registerDirectorInfo($info);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <link href="../../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/css/sweet-alert.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2-metronic.css"/>
    <link href="../../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed">
<?php include_once("../../navbar.php"); ?>
<div class="clearfix"></div>
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
                    <a href="<?php echo $_config['base_url']."dashboard.php"; ?>">
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
                            <a href="<?php echo $_config['base_url']."InputSheet/admin/initialize.php"; ?>">
                                <span class="title">Initialize</span>
                            </a>
                        </li>
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
                                <li class="active">
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
                        Add Director Info
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
                                Add Director Info
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-horizontal" method="post" action="director-info.php">
                                        <div class="form-body">
                                            <h4 class="form-section">Director Details</h4>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Year</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="financial_year" id="financial_year">
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
                                                            for ($i = 2011; $i <= 2020; $i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Company Name</label>
                                                <input type="hidden" name="company_id" id="companies_id" value="<?php echo $_SESSION['input_sheet_company_id']; ?>"/>
                                                <div class="col-md-6">
                                                    <div style="position: relative;">
                                                        <input value="<?php echo $_SESSION['input_sheet_company_name']; ?>" type="text" autocomplete="off" placeholder="Enter company name" id="com_bse_code" class="form-control"/>
                                                        <div class="auto-fill hidden"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Director Name</label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" name="dir_din_no" id="dir_din_no">
                                                        <option value="">Search by Name or DIN</option>
                                                        <?php
                                                        $db = new Database();
                                                        $directors = $db->getAllDirectors();
                                                        foreach($directors as $director) {
                                                            echo "<option value='$director[din_no]'>$director[dir_name] - $director[din_no]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Appointment Date</label>
                                                <div class="col-md-6">
                                                    <input class="form-control date-picker flushable" name="appointment_date" id="appointment_date" placeholder="Choose date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Resignation Date</label>
                                                <div class="col-md-6">
                                                    <input class="form-control date-picker flushable" name="resignation_date" id="resignation_date" placeholder="Choose date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Current Tenure</label>
                                                <div class="col-md-6">
                                                    <input class="form-control flushable" name="current_tenure" id="current_tenure" placeholder="In years"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Total Association</label>
                                                <div class="col-md-6">
                                                    <input class="form-control flushable" name="total_association" id="total_association" placeholder="In years"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Company Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="company_classification" id="company_classification">
                                                        <option value="">Select Option</option>
                                                        <option value="ID">ID</option>
                                                        <option value="NED">NED</option>
                                                        <option value="NEDP">NEDP</option>
                                                        <option value="ED">ED</option>
                                                        <option value="EDP">EDP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">SES Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="ses_classification" id="ses_classification">
                                                        <option value="">Select Option</option>
                                                        <option value="ID">ID</option>
                                                        <option value="NID">NID</option>
                                                        <option value="NED">NED</option>
                                                        <option value="NEDP">NEDP</option>
                                                        <option value="ED">ED</option>
                                                        <option value="EDP">EDP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Additional Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="additional_classification" id="additional_classification">
                                                        <option value="">Select Option</option>
                                                        <option value="M">Member</option>
                                                        <option value="CMD">Chairman &amp; Managing Director</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="MD">Managing Director</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Audit Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="audit_committee" id="audit_committee">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Investors' Grievance/Stakeholders Relationship Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="investor_grievance" id="investor_grievance">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Is the Nomination and Remuneration Committee separate Committees?</label>
                                                <div class="col-md-6">
                                                    <input type="hidden" name="is_nom_rem_separate_hidden" id="is_nom_rem_separate_hidden" />
                                                    <select class="form-control" name="is_nom_rem_separate" id="is_nom_rem_separate">
                                                        <option value="">Select Option</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden nom_rem_same">
                                                <label class="col-md-6 control-label">Nomination and Remuneration Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="nom_rem_committee" id="nom_rem_committee">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden nom_rem_not_same">
                                                <label class="col-md-6 control-label">Remuneration Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="remuneration" id="remuneration">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group hidden nom_rem_not_same">
                                                <label class="col-md-6 control-label">Nomination Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="nomination" id="nomination">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">CSR Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="csr" id="csr">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Risk Management Committee Classification</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="risk_management_committee" id="risk_management_committee">
                                                        <option value="">Select Option</option>
                                                        <option value="C">Chairman</option>
                                                        <option value="M">Member</option>
                                                        <option value="C(Resign)">Chairman (Resigned)</option>
                                                        <option value="M(Resign)">Member (Resigned)</option>
                                                        <option value="none">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Shares Held</label>
                                                <div class="col-md-6">
                                                    <input class="form-control flushable" name="shares_held" id="shares_held" placeholder="Enter number or ND if not disclosed"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">ESOPs Held</label>
                                                <div class="col-md-6">
                                                    <input class="form-control flushable" name="esops" id="esops" placeholder="Enter number or ND if not disclosed"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Other Pecuniary Relationship</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="other_pecuniary_relationship" id="other_pecuniary_relationship">
                                                        <option value="">Select</option>
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Retiring/Non Retiring</label>
                                                <div class="col-md-6">
                                                    <select class="form-control flushable" name="retiring_non_retiring" id="retiring_non_retiring">
                                                        <option value="">Select</option>
                                                        <option value="Retiring">Retiring</option>
                                                        <option value="Non Retiring">Non Retiring</option>
                                                        <option value="NA">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Ratio to MRE</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="ratio_to_mre" id="ratio_to_mre" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Comments</label>
                                                <div class="col-md-6">
                                                    <textarea rows="4" class="form-control" name="comments"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fluid">
                                            <div class="col-md-6 col-md-offset-6">
                                                <button id="btn_director_info" name="btn_director_info" type="submit" class="btn blue directors"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Director Details</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-body">
                                        <h4 class="form-section">Assigned Directors</h4>
                                        <div id="director_list">
                                            <ul id="allocated_director_list">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="../../assets/scripts/custom/sweet-alert.min.js"></script>
<script type="text/javascript" src="../../assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
        object.initializeDirectorInfoJs(messages,true);
        <?php
         }
         else {
         ?>
        object.initializeDirectorInfoJs(messages,false);
        <?php
         }
        ?>
    });
</script>
</body>
</html>