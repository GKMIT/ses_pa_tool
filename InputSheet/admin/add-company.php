<?php
session_start();
include_once("../../Classes/database.php");
include_once("../../config.php");
if(!isset($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag= false;
$msg ="";
if(isset($_POST['btn_company_info'])) {
    $db = new Database();
    $info['name']=trim($_POST['name']);
    $info['cin']=trim($_POST['cin']);
    $info['bse_code']=trim($_POST['bse_code']);
    $info['nse_code']=trim($_POST['nse_code']);
    $info['isin']=trim($_POST['isin']);
    $info['face_value']=trim($_POST['face_value']);
    $info['sector']=trim($_POST['sector']);
    $info['email']=trim($_POST['email']);
    $info['website']=trim($_POST['website']);
    $info['fax']=trim($_POST['fax']);
    $info['contact']=trim($_POST['contact']);
    $info['address']=trim($_POST['address']);
    $info['fiscal_year_end']=$_POST['fiscal_year_end'];
    $info['peer1']=$_POST['peer_1_company_id'];
    $info['peer2']=$_POST['peer_2_company_id'];
    $response = $db->addNewCompany($info);
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
    <link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
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
                        <li class="active">
                            <a href="javascript:;">
                                <span class="title">Company</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active">
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
                        Add New Company
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
                                Add new Company
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form id="form_add_company" class="form-horizontal" method="post" action="add-company.php">
                                <div class="form-body">
                                    <h4 class="form-section">Company Details</h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Corporate Identity Number (CIN)</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter CIN" name="cin" id="cin">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name of the Company</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter Company name" name="name" id="company_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">BSE Code</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter BSE code" name="bse_code" id="company_bse_code" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">NSE Code</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter NSE code" name="nse_code" id="nse_code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ISIN</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter ISIN" name="isin" id="isin">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Face Value</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter Face value in rupees" name="face_value" id="face_value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Sector</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter sector" name="sector">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Website</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter website" name="website">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Fax</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter fax" name="fax">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter contact" name="contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Registered Office Address</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter address" name="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Peer 1 Company</label>
                                        <div class="col-md-5">
                                            <input type='hidden' name='peer_1_company_id' id='peer_1_company_id' />
                                            <div style='position: relative;' class='auto-fill-container'>
                                                <input type='text' autocomplete='off' placeholder='Enter peer 1 company name' id='peer_1_company_keywords' class='form-control'/>
                                                <div class='auto-fill hidden'>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Peer 2 Company</label>
                                        <div class="col-md-5">
                                            <input type='hidden' name='peer_2_company_id' id='peer_2_company_id' />
                                            <div style='position: relative;' class='auto-fill-container'>
                                                <input type='text' autocomplete='off' placeholder='Enter peer 2 company name' id='peer_2_company_keywords' class='form-control'/>
                                                <div class='auto-fill hidden'>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Fiscal Year End</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="fiscal_year_end">
                                                <option value="">Select</option>
                                                <?php
                                                $months = array('3'=>'March','6'=>'June','9'=>'September','12'=>'December');
                                                foreach($months as $key=>$month) {
                                                    echo "<option value='$key'>$month</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button name="btn_company_info" type="submit" class="btn green"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Company Details</button>
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
<script src="../../assets/scripts/core/app.js"></script>
<script src="../../Scripts/custom.js"></script>
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
            object.initializeAddCompanyJs(messages,true);
        <?php
         }
         else {
         ?>
            object.initializeAddCompanyJs(messages,false);
        <?php
         }
        ?>
    });
</script>
</body>
</html>