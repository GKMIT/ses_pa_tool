<?php
session_start();
include_once("../../Classes/database.php");
include_once("../../config.php");
if(!isset($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag= false;
$msg ="";
if(isset($_POST['btn_auditor_info'])) {
    $db = new Database();
    $info['company_id']=$_POST['company_id'];
    $info['no_of_auditors']=trim($_POST['no_of_auditors']);
    $info['financial_year']=trim($_POST['financial_year']);
    $info['net_profit']=trim($_POST['net_profit']);
    $info['audit_fee']=trim($_POST['audit_fee']);
    $info['audit_related_fee']=trim($_POST['audit_related_fee']);
    $info['non_audit_fee']=trim($_POST['non_audit_fee']);
    $info['total_auditors_fee']=trim($_POST['total_auditors_fee']);
    $info['auditor_name'] = $_POST['auditor_name'];
    $info['auditor_reg_no'] = $_POST['auditor_reg_no'];
    $info['auditor_parent_company'] = $_POST['auditor_parent_company'];
    $info['auditor_tenure'] = $_POST['auditor_tenure'];
    $info['auditor_partner_name'] = $_POST['auditor_partner_name'];
    $info['partner_membership_no'] = $_POST['auditor_partner_membership_no'];
    $info['auditor_partner_tenure'] = $_POST['auditor_partner_tenure'];
    $info['comments'] = $_POST['comments'];
    $response = $db->registerAuditorInfo($info);
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
    <link href="../../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2-metronic.css"/>
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
                                <li class="active">
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
                        Add Auditor Info
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
                                Add Auditors Info
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" method="post" action="add-auditor-info.php">
                                <div class="form-body">
                                    <h4 class="form-section">Auditor's Details</h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Company Name</label>
                                        <input value="<?php echo $_SESSION['input_sheet_company_id']; ?>" type="hidden" name="company_id" id="companies_id"/>
                                        <div class="col-md-3">
                                            <div style="position: relative;">
                                                <input value="<?php echo $_SESSION['input_sheet_company_name']; ?>" type="text" placeholder="Enter company name" autocomplete="off" id="com_bse_code" class="form-control"/>
                                                <div class="auto-fill hidden">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Year</label>
                                        <div class="col-md-3">
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
                                        <label class="col-md-3 control-label">The Company has</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="no_of_auditors" id="no_of_auditors">
                                                <option value="1">1 Auditor</option>
                                                <option value="2">2 Auditors</option>
                                                <option value="3">3 Auditors</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="auditors-info-container">
                                        <div class="auditor-info-template">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Auditor's Name</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_name_1" name="auditor_name[]" placeholder="First auditor's name"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_name_2 hidden" name="auditor_name[]" placeholder="Second auditor's name"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_name_3 hidden" name="auditor_name[]" placeholder="Third auditor's name"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Auditor's Reg. No</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_reg_no_1" name="auditor_reg_no[]" placeholder="First auditor's Reg. No."/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_reg_no_2 hidden" name="auditor_reg_no[]" placeholder="Second auditor's Reg. No."/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_reg_no_3 hidden" name="auditor_reg_no[]" placeholder="Third auditor's Reg. No."/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Auditor's Parent Company</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_parent_company_1" name="auditor_parent_company[]" placeholder="First auditor's parent company"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_parent_company_2 hidden" name="auditor_parent_company[]" placeholder="Second auditor's parent company"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_parent_company_3 hidden" name="auditor_parent_company[]" placeholder="Third auditor's parent company"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Auditor's Tenure</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_tenure_1" name="auditor_tenure[]" placeholder="First auditor's tenure in years"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_tenure_2 hidden" name="auditor_tenure[]" placeholder="Second auditor's tenure in years"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_tenure_3 hidden" name="auditor_tenure[]" placeholder="Third auditor's tenure in years"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Audit Partner Name</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_name_1" name="auditor_partner_name[]" placeholder="First audit partner name"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_name_2 hidden" name="auditor_partner_name[]" placeholder="Second audit partner name"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_name_3 hidden" name="auditor_partner_name[]" placeholder="Third audit partner name"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Audit Partner Membership No.</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_membership_no_1" name="auditor_partner_membership_no[]" placeholder="First audit partner membership no."/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_membership_no_2 hidden" name="auditor_partner_membership_no[]" placeholder="Second audit partner membership no."/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_membership_no_3 hidden" name="auditor_partner_membership_no[]" placeholder="Third audit partner membership no."/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Audit Partner Tenure</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_tenure_1" name="auditor_partner_tenure[]" placeholder="First audit partner tenure in years"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_tenure_2 hidden" name="auditor_partner_tenure[]" placeholder="Second audit partner tenure in years"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control auditor_partner_tenure_3 hidden" name="auditor_partner_tenure[]" placeholder="Third audit partner name in years"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Audit Fee Details</h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Net Profit (In <i class="fa fa-rupee"></i> Crore)</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="net_profit"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Audit Fee (In <i class="fa fa-rupee"></i> Crore)</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="audit_fee" id="audit_fee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Audit Related Fee (In <i class="fa fa-rupee"></i> Crore)</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="audit_related_fee" id="audit_related_fee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Non-Audit Fee (In <i class="fa fa-rupee"></i> Crore)</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="non_audit_fee" id="non_audit_fee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Total Auditors Fee (In <i class="fa fa-rupee"></i> Crore)</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" readonly name="total_auditors_fee" id="total_auditors_fee"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Comments</label>
                                        <div class="col-md-3">
                                            <textarea rows="4" class="form-control" name="comments"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button name="btn_auditor_info" type="submit" class="btn green"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Details</button>
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
            object.initializeAuditorsInfoJs(messages,true);
        <?php
         }
         else {
         ?>
            object.initializeAuditorsInfoJs(messages,false);
        <?php
         }
        ?>
    });
</script>
</body>
</html>