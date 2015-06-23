<?php
session_start();
include_once("../../Classes/database.php");
include_once("../../config.php");
if(!isset($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$flag= false;
$msg ="";
if(isset($_POST['btn_director_info'])) {
    $db = new Database();
    $info['din_no']=trim($_POST['din_number']);
    $info['salutation']=trim($_POST['salutation']);
    $info['dir_name']=trim($_POST['dir_name']);
    $info['gender']=trim($_POST['gender']);
    $info['dob']=trim($_POST['dob']);
    $info['expertise']=trim($_POST['expertise']);
    $info['education']=trim($_POST['education']);
    $info['past_ex']=trim($_POST['past_ex']);
    $info['committee_memberships']=trim($_POST['committee_memberships']);
    $info['committee_chairmanships']=trim($_POST['committee_chairmanships']);
    $info['no_directorship_public']=trim($_POST['no_directorship_public']);
    $info['no_directorship_private']=trim($_POST['no_directorship_private']);
    $info['no_directorship_listed_companies']=trim($_POST['no_directorship_listed_companies']);
    $info['no_total_directorship']=trim($_POST['no_total_directorship']);
    $info['no_full_time_positions']=trim($_POST['no_full_time_positions']);
    $response = $db->registerNewDirector($info);
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
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
    <link href="../../assets/css/dropzone.css" rel="stylesheet" type="text/css"/>
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
                        <li class="active">
                            <a href="javascript:;">
                                <span class="title">Director</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active">
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
                        Add New Director
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
                                Add New Director
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form id="add_new_director" class="form-horizontal" method="post" action="add-director.php">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">DIN</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="din_number" id="din_number" placeholder="Enter DIN"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-2">
                                            <select class="form-control" id="salutation" name="salutation">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" name="dir_name" placeholder="Enter name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date of birth</label>
                                        <div class="col-md-5">
                                            <input class="form-control date-picker" name="dob" placeholder="Select date"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Expertise</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="expertise" placeholder="Enter expertise"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Education</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="education" placeholder="Enter education"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Past Experience</label>
                                        <div class="col-md-5">
                                            <textarea class="form-control" name="past_ex" placeholder="Enter experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Sheet</label>
                                        <div class="col-md-5">
                                            <div id="my-dropzone" action="upload.php" class="dropzone dz-clickable"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of directorships in public companies</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="no_directorship_public" placeholder="Enter no of directorships in public companies" id="no_directorship_public"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of directorships in private companies</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="no_directorship_private" placeholder="Enter no of directorships in private companies" id="no_directorship_private"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of directorships in listed companies</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="no_directorship_listed_companies" id="no_directorship_listed_companies" placeholder="Enter no of directorships in listed companies"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of total directorships</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="no_total_directorship" id="no_total_directorship" placeholder="Enter no of total directorship"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of full time positions</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="no_full_time_positions" id="no_full_time_positions" placeholder="Enter no of full time positions"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of committee memberships</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="committee_memberships" placeholder="Enter no of committee memberships"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. of committee chairmanships</label>
                                        <div class="col-md-5">
                                            <input class="form-control" name="committee_chairmanships" placeholder="Enter no of committee memberships"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button name="btn_director_info" type="submit" class="btn green"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save Directors Details</button>
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
<script type="text/javascript" src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-validation/dist/jquery.validate.min.js"" type="text/javascript"></script>
<script src="../../Scripts/custom.js" type="text/javascript"></script>
<script src="../../assets/scripts/dropzone.js" type="text/javascript"></script>
<script src="../../assets/scripts/core/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-mm-yyyy'
        });
        <?php
         if($flag) {
        ?>
        $.gritter.add({
            title: '<?php echo $title; ?>',
            text: '<?php echo $msg; ?>',
            image: '<?php echo $image; ?>',
            sticky: false,
            time: 4000
        });
        <?php
         }
        ?>

        $("input").keypress(function(e) {
            if(e.which==13) {
                e.preventDefault();
                return;
            }
        });

        var form1 = $('#add_new_director');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                din_number: {
                    required: true,
                    number:true,
                    minlength:8,
                    maxlength:8
                },
                dir_name: {
                    required: true
                }
            },
            messages: {
                din_number: {
                    required: "Please enter DIN",
                    number:"Please enter digits",
                    minlength:"Please enter at least 8 digits",
                    maxlength:"Please enter at max 8 digits"
                },
                dir_name: {
                    required: "Please enter name"
                }
            },
            invalidHandler: function (event, validator) {
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
    });
</script>
</body>
</html>