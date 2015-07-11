<?php
session_start();

include_once("../../Classes/database.php");
include_once("../../config.php");
if(!isset($_SESSION['logged_in'])) {
//    header("location:$_config[base_url]");
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
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/select2/select2-metronic.css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <style type="text/css">
        .fixedCol {
            position: absolute;
        }
        .fixedCol tr th, .fixedCol tr td {
            border-right: 1px solid #ddd !important;
        }
    </style>
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
                                <li class="active">
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
                        View Input Sheet Details
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
                                Input Sheet Details
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form animation">
                            <div class="ajax-waiting hidden">
                                <img src="../../assets/img/loading-spinner-grey.gif"> Loading...
                            </div>
                            <form class="form-horizontal" method="post" action="nomination-committee-attendance.php">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2">Company Name</label>
                                        <input type="hidden" name="company_id" id="companies_id"/>
                                        <div class="col-md-4">
                                            <div style="position: relative;">
                                                <input type="text" placeholder="Enter company name" autocomplete="off" id="com_bse_code" class="form-control"/>
                                                <div class="auto-fill hidden">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-md-offset-5">
                                            <a href="#" target="_blank" id="anchor_excel_export"><img src="../../assets/img/excel-icon.png" class="excel-export"/></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Financial Year</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="financial_year" id="financial_year">
                                                <option value="">select year</option>
                                                <?php
                                                for($i=2011;$i<=2020;$i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Fiscal Year End</label>
                                        <label class="col-md-2" id="fiscal_year"></label>
                                    </div>
                                    <h4 class="form-section">Directors' Information</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="director_info">

                                        </table>
                                    </div>
                                    <h4 class="form-section">Remuneration Details</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="director_remuneration_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">AGM Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="director_agm_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Board Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="director_board_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Audit Committee Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="audit_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Stakeholders Relationship Committee Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="stackholders_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">CSR Committee Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="csr_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Risk Management Committee Attendance</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="risk_management_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section committee_seperate">Remuneration Committee Attendance</h4>
                                    <div class="table-scrollable committee_seperate">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="remuneration_committee_attendance_info"></table>
                                    </div>
                                    <h4 class="form-section committee_seperate">Nomination Committee Attendance</h4>
                                    <div class="table-scrollable committee_seperate">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="nomination_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section committee_same">Nomination and Remuneration Committee Attendance</h4>
                                    <div class="table-scrollable committee_same">
                                        <table class="table table-striped table-bordered table-hover editable-table" id="nomination_remuneration_committee_attendance_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Audit Fee Details</h4>
                                    <div>
                                        <table class="table table-striped table-bordered table-hover editable-table" id="audit_fee_details">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Auditor's Info</h4>
                                    <div>
                                        <table class="table table-striped table-bordered table-hover editable-table" id="auditors_detail">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Dividend Info</h4>
                                    <div>
                                        <table class="table table-striped table-bordered table-hover editable-table" id="dividend_info">
                                        </table>
                                    </div>
                                    <h4 class="form-section">Comments</h4>
                                    <div class="form-group">
                                        <div class="col-md-12" id="comments">

                                        </div>
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
<script type="text/javascript" src="../../Scripts/custom.js"></script>
<script src="../../assets/scripts/core/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {


       function freez () {

           $(".table-scrollable table").each(function(i,d) {

               var table = $(this),
                   fixedCol = table.clone(true),
                   firstColWidth = table.find('th').eq(0).width(),
                   secondColWidth = table.find('th').eq(1).width(),
                   tablePos = table.position();

               // Remove all but the first column from the cloned table
               fixedCol.find('th').not(':eq(0),:eq(1)').remove();
               fixedCol.find('tbody tr').each(function(){
                   $(this).find('td').not(':eq(0),:eq(1)').remove();
               });

               // Set positioning so that cloned table overlays
               // first column of original table
               fixedCol.addClass('fixedCol');
               var total_width = firstColWidth+secondColWidth;

               fixedCol.attr('style', "width: "+total_width+"px !important");
               console.log(firstColWidth+","+secondColWidth)
               fixedCol.css({
                   left: tablePos.left,
                   top: tablePos.top
               });

               $(this).parent().append(fixedCol);


           });
       }


        function editTableInitialize() {
            $(".editable-table tr td.editable").dblclick(function() {
                var self = $(this);
                var td_value = self.html();
                if(self.find("input").length==0) {
                    self.html("<input value='"+td_value+"' />");
                    initializeInputEnter();
                    self.find("input").focus();
                }
                $('.fixedCol').remove();
                freez();
                console.log("calling Freez");
            });
        }
        function initializeInputEnter() {
            $(".editable-table tr td input").keyup(function(e) {
                var self = $(this);
                var parent_td  = self.parent();
                if(e.which==13) {
                    $('.fixedCol').remove();
                    freez();
                    var table_name = parent_td.attr('data-table-name');
                    var table_row_id = parent_td.attr('data-table-row-id');
                    var column_name = parent_td.attr('data-table-col-name');
                    var column_value = self.val();
                    console.log(table_name+","+table_row_id+","+column_name+","+column_value);
                    $.ajax({
                        url:"jq-edit-view.php",
                        type:"POST",
                        dataType: "JSON",
                        data:{
                            table_name:table_name,
                            column_name:column_name,
                            column_value: column_value,
                            table_row_id:table_row_id
                        },
                        success: function(data) {
                            if(data.status==200) {
                                parent_td.html(column_value);
                            }
                        }
                    });
                }
            });
        }
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function () {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#financial_year").change(function() {
            $('.fixedCol').remove();
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    inputSheetReading:true,
                    company_id:$("#companies_id").val(),
                    financial_year:$("#financial_year").val()
                },
                error: function(data) {
                    console.log(data);
                },
                beforeSend: function() {
                    $(".ajax-waiting").removeClass('hidden');
                },
                success: function(data) {
                    console.log(data);
                    $("#anchor_excel_export").attr("href","../sheet-writer.php?company_id="+$("#companies_id").val()+"&financial_year="+$("#financial_year").val());
                    $(".ajax-waiting").addClass('hidden');
                    $("#director_info").html(data.director_details);
                    $("#director_remuneration_info").html(data.director_remuneration_info);
                    $("#director_board_attendance_info").html(data.director_board_attendance_info);
                    $("#audit_committee_attendance_info").html(data.audit_committee_attendance_info);
                    $("#stackholders_committee_attendance_info").html(data.stackholders_committee_attendance_info);
                    $("#csr_committee_attendance_info").html(data.csr_committee_attendance_info);
                    $("#risk_management_committee_attendance_info").html(data.risk_management_committee_attendance_info);
                    $("#director_agm_info").html(data.director_agm_info);
                    $("#audit_fee_details").html(data.audit_fee_details);
                    $("#auditors_detail").html(data.auditors_detail);
                    $("#dividend_info").html(data.dividend_info);
                    $("#fiscal_year").html(data.fiscal_year);
                    $("#comments").html(data.comments);
                    if(data.is_rem_nom_same) {
                        $("#nomination_remuneration_committee_attendance_info").html(data.nomination_remuneration_committee_attendance_info);
                        $(".committee_seperate").addClass('hidden');
                        $(".committee_same").removeClass('hidden');
                    }
                    else {
                        $("#remuneration_committee_attendance_info").html(data.remuneration_committee_attendance_info);
                        $("#nomination_committee_attendance_info").html(data.nomination_committee_attendance_info);
                        $(".committee_seperate").removeClass('hidden');
                        $(".committee_same").addClass('hidden');
                    }
                    freez();
                    <?php
                    if($_SESSION['user_type']=='report_checker') {
                    ?>
                        editTableInitialize();
                    <?php
                    }
                    ?>
                }
            });
        });
    });
</script>