<?php
session_start();
// app
include_once("assets/config/config.php");
include_once("Classes/databasereport.php");
if(isset($_POST['directors_remuneration'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addDirectorsRemuneration($info);
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
                        <li class="active">
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
                        Directors' Remuneration
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
                                Directors' Remuneration
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" action="directors-remuneration.php">
                                <input type="hidden" id="company_id" value="<?php echo $_SESSION['company_id']; ?>" />
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Directors' Remuneration">
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
                                                    SES is of the opinion that remuneration is an important tool to motivate and engage the management and the Board of the Company. Remuneration should not only be commensurate with the efforts of the management and the Board but also be aligned with the performance of the Company. Further, remuneration should be such that it channels the energy of employees/directors on long term value creation for all stakeholders of the Company and discourages excessive/unnecessary risk taking behavior.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="checkbox[]" value="Revision in Executive Directors' Remuneration" class="check-trigger checkbox" hidden-id="check_1"/> Revision in Executive Directors' Remuneration
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="checkbox[]" value="Non-Executive Directors' Commission" class="check-trigger checkbox" hidden-id="check_2"/> Non-Executive Directors' Commission
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="checkbox[]" value="Remuneration to Non-Independent Non-Executive Directors" class="check-trigger checkbox" hidden-id="check_3"/> Remuneration to Non-Independent Non-Executive Directors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="checkbox[]" value="Remuneration to Independent Directors" class="check-trigger checkbox" hidden-id="check_4"/> Remuneration to Independent Directors
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="checkbox[]" value="Waiver of Excess Remuneration" class="check-trigger checkbox" hidden-id="check_5"/> Waiver of Excess Remuneration
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_1">
                                    <h4 class="form-section">Revision in Executive Directors' Remuneration</h4>
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
                                                        The Remuneration for executive directors of the Company should comprise of fixed and variable performance based pay, with greater percentage allocated to performance based pay. Accordingly, the Company should also enlist the performance criteria for the employees for the payment of such pay and incentivize the employees to continue with the company. To align remuneration with long term performance of the Company, such performance criteria should be on a multi-year basis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Reason for Revision</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Reason for Revision" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group table-responsive">
                                        <div class="col-md-12">
                                            <p><strong>Past Remuneration of the Director</strong></p>
                                            <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                            <tr>
                                                <th class="text-center" colspan="2" style="width: 30%; vertical-align: middle;">In&nbsp;<i class="fa fa-rupee"></i>&nbsp;Crores</th>
                                                <th class="text-center" colspan="2">
                                                    <select class="form-control" id="remuneration_years" name="remuneration_year_1">
                                                        <option>Select Year</option>
                                                        <?php
                                                        for($i=2010;$i<=2020;$i++) {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </th>
                                                <th class="text-center" colspan="2">
                                                    <input id="rem_second_year" name="remuneration_year_2" readonly class="form-control">
                                                </th>
                                                <th class="text-center" colspan="2">
                                                    <input id="rem_third_year" name="remuneration_year_3" readonly class="form-control">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" colspan="2">Executive Director</th>
                                                <th class="text-center">Fixed Pay</th>
                                                <th class="text-center">Total Pay</th>
                                                <th class="text-center">Fixed Pay</th>
                                                <th class="text-center">Total Pay</th>
                                                <th class="text-center">Fixed Pay</th>
                                                <th class="text-center">Total Pay</th>
                                            </tr>
                                            </thead>
                                            <tbody id="remuneration_table_body" class="dilution-row-desciption_past">
                                                <tr class="tr-td-center dilution-description-row diluton-row">
                                                    <td colspan="2">
                                                    <select name="executive[]" class="form-control din_numbers">
                                                        <option class="" value="">Select Director</option>
                                                    </select>
                                                    </td>
                                                    <td><input class="form-control" name="fixed_pay_first_year[]"/></td>
                                                    <td><input class="form-control" name="total_pay_first_year[]"/></td>
                                                    <td><input class="form-control" name="fixed_pay_second_year[]"/></td>
                                                    <td><input class="form-control" name="total_pay_second_year[]"/></td>
                                                    <td><input class="form-control" name="fixed_pay_third_year[]"/></td>
                                                    <td><input class="form-control" name="total_pay_third_year[]"/></td>
                                                    <td class="text-center"><button class="btn btn-danger disabled btn-delete-dilution-row" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" id="btn_add_dilution_row_past" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                        </div>
                                    </div>
                                    <p><strong>Executive Remuneration - Peer Comparsion</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-bordered table-hover table-stripped">
                                            <tbody id="remuneration_table_body1">
                                            <tr class="tr-td-center">
                                                <td class="text-center">Director</td>
                                                <td>
                                                    <select name="peer1[]" class="form-control director1"></select>
                                                </td>
                                                <td><input name="peer2[]" class="form-control director2"></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center">Company</td>
                                                <td><input name="peer1[]" class="form-control company1"></td>
                                                <td>
                                                    <select name="peer2[]" class="form-control company2"></select>
                                                </td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center">Promotor</td>
                                                <td><input name="peer1[]" class="form-control promotor1"></td>
                                                <td><input name="peer2[]" class="form-control promotor2"></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center">Remuneration (Rs Cr) (A)</td>
                                                <td><input name="peer1[]" class="form-control remuneration1"></td>
                                                <td><input name="peer2[]" class="form-control remuneration2"></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center">Net Profit (Rs Cr) (B)</td>
                                                <td><input name="peer1[]" class="form-control netprofit1"></td>
                                                <td><input name="peer2[]" class="form-control netprofit2"></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center">Ratio (A/B)</td>
                                                <td><input name="peer1[]" class="form-control ratio1"></td>
                                                <td><input name="peer2[]" class="form-control ratio2"></td>
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
                                                <tr class="ed_remuneration">
                                                    <td>
                                                        <select class="form-control ex_rem_years" name="ex_rem_years[]" id="indexed_tsr_year_start_year">
                                                            <option>Select Year</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="ed_remuneration">
                                                    <td><input class="form-control ex_rem_years" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="ed_remuneration">
                                                    <td><input class="form-control ex_rem_years" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="ed_remuneration">
                                                    <td><input class="form-control ex_rem_years" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="ed_remuneration">
                                                    <td><input class="form-control ex_rem_years" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                <tr class="ed_remuneration">
                                                    <td><input class="form-control ex_rem_years" name="ex_rem_years[]"></td>
                                                    <td><input class="form-control" name="ed_remuneration[]"></td>
                                                    <td><input class="form-control" name="indexed_tsr[]"></td>
                                                    <td><input class="form-control" name="net_profit[]"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Remuneration Policy</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Remuneration Policy" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <p><strong> Remuneration Package</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                            <tr>
                                                <td> Component </td>
                                                <td> Proposed Remuneration </td>
                                                <td> Comments </td>
                                            </tr>
                                            </thead>
                                            <tbody id="remuneration_table_body2">
                                            <tr class="tr-td-center">
                                                <td class="text-center" rowspan="2">Basic Pay</td>
                                                <td class="text-center">Proposed Salary:  <input name="proposed_salary" class="form-control proposed_salary"></td>
                                                <td rowspan="2">Increase in Remuneration : <textarea name="increase_in_remuneration" class="form-control increase_in_remuneration" rows="2"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Annual Increment:<input name="annual_increment" class="form-control annual_increment"> </td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center" rowspan="2">Perquisites/ Allowances</td>
                                                <td class="text-center">All perquisites clearly defined :
                                                    <select name="all_perquisites" class="form-control all_perquisites">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td rowspan="2">Can placed on perquisites:
                                                    <select name="can_placed_perquisites" class="form-control can_placed_perquisites">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select> </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Total Allowances :<input name="total_allowance" class="form-control total_allowance"></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center" rowspan="2">Variable Pay</td>
                                                <td class="text-center" rowspan="2">
                                                    <select name="variable_pay" class="form-control variable_pay">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td>Performance criteria disclosed :
                                                    <select name="performance_criteria" class="form-control performance_criteria">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select> </td>
                                            </tr>
                                            <tr>
                                                <td>Can placed on variable pay :
                                                    <select name="can_placed_on_variable" class="form-control can_placed_on_variable">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select> </td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td>Notice Period</td>
                                                <td><input name="notice_period_month" class="form-control notice_period_month">months</td>
                                                <td><textarea rows="2" name="notice_period_comments" class="form-control notice_period_comments" placeholder="Comments"></textarea></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td>Severance Pay</td>
                                                <td><input name="severance_pay_months" class="form-control severance_pay_months">months</td>
                                                <td><textarea rows="2" name="severance_pay_comments" class="form-control severance_pay_comments" placeholder="Comments"></textarea></td>
                                            </tr>
                                            <tr class="tr-td-center">
                                                <td class="text-center" rowspan="2">Minimum Remuneration</td>
                                                <td class="text-center" rowspan="2">
                                                    <textarea rows="2" name="minimum_remuneration" class="form-control minimum_remuneration"></textarea>
                                                </td>
                                                <td>Within limits prescribed :
                                                    <select name="within_limits" class="form-control within_limits">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select> </td>
                                            </tr>
                                            <tr>
                                                <td>Includes variable pay :
                                                    <select name="includes_variable" class="form-control includes_variable">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select> </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Comments on Variable Pay" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Comments on Variable Pay"><b>Comments on Variable Pay: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Comments on Minimum Remuneration" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Comments on Minimum Remuneration"><b>Comments on Minimum Remuneration: </b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Comments on Skewness of Remuneration" />
                                            <input type="hidden" name="resolution_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Comments on Skewness of Remuneration"><b>Comments on skewness of remuneration: </b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>GENERAL </strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">1. Is the increase in remuneration between 25% - 50% of the existing salary?</label>
                                        <div class="col-md-2">
                                            <select class='form-control triggers' name="triggers[]" id="is_the_increase_in_renumeration">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="question1_part_a">
                                        <label class="col-md-9 col-md-offset-1">A) Has the Company provided adequate justification for the same? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="has_the_company_provided_adequate_justification">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="123">Yes</option>
                                                <option value="no" >No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_provided_adequate_justification_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="question1_part_b">
                                        <label class="col-md-9 col-md-offset-1">B) Is the Directors' excessive compared to its peers? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_directors_excessive_compared">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="125">Yes</option>
                                                <option value="no" data-recommendation-table-id="124">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_directors_excessive_compared_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">2. Is the increase in remuneration more than 50% of the existing salary?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_increase_in_renumeration_more_than_50">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="126">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_increase_in_renumeration_more_than_50_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">3. Is the remuneration paid to the executive director excessive (as per analysis) and the Company proposes to further increase the remuneration?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_renumeration_paid_to_the_executive">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="127">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_renumeration_paid_to_the_executive_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">4. Does the Company have a Nomination and Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="does_the_company_have_a_nomination">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="128">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_have_a_nomination_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="question4_part_a">
                                        <label class="col-md-9 col-md-offset-1">A) Is the Nomination and Remuneration Committee compliant with the Companies Act, 2013 and Clause 49 of the listing agreement? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_nomination_and_remuneration_committee">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="129">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_nomination_and_remuneration_committee_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">5. Is the concerned Executive Director a member or the Chairman of Nomination & Remuneration Committee?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_concerned_executive_director_a_member">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="130">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_concerned_executive_director_a_member_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">6. Is the resolution grants the Board discretion to change remuneration without taking further shareholder approval?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_resolution_grants_the_board_discretion">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="131">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_resolution_grants_the_board_discretion_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">7. Does the remuneration package have any performance based pay?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="does_the_remuneration_package_have_any_performance">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="132">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_remuneration_package_have_any_performance_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">8. Is the average attendance of director at board meetings held in last 3 years was less than 75%?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_the_average_attendance_of_director_at_board">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="133">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_average_attendance_of_director_at_board_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">9. Are the remuneration components payable to the director capped?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="are_the_remuneration_components_payable">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="question9_part_a">
                                        <label class="col-md-9 col-md-offset-1">A) Is there an overall cap on the remuneration package either in absolute terms or in terms of percentage and is subject to Schedule V? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="is_there_an_overall_cap_on_the_remuneration_package">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="134" >Yes</option>
                                                <option value="no" data-recommendation-table-id="135">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_there_an_overall_cap_on_the_remuneration_package_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">10. Are the remuneration components payable to the director disclosed?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="are_the_remuneration_components_payable_to_the_director_disclosed">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="136">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="are_the_remuneration_components_payable_to_the_director_disclosed_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">11. Does the Company made incremental losses in the last financial yearand remuneration is being increased without justification?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="does_the_company_made_incremental_losses">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="137">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_company_made_incremental_losses_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">12. Has the Company defaulted on any of its debt obligations or has undergone a Corporate Debt Restructuring and remuneration is being increased without justification?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="has_the_company_defaulted_on_any_of_its_debt">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="138">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_defaulted_on_any_of_its_debt_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">13. Is the minimum remuneration payable includes variable pay?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive' id="is_the_minimum_remuneration_payable_includes_variable_pay">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="question13_part_a">
                                        <label class="col-md-9 col-md-offset-1">A) Has the Company disclosed whether the minimum remuneration is within Schedule V of the Companies Act, 2013? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="has_the_company_disclosed_whether_the_minimum_remuneration">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="139" >Yes</option>
                                                <option value="no" data-recommendation-table-id="140">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text">
                                        <div class="col-md-11 col-md-offset-1">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">14. Will the Director receive guaranteed bonus/commission?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire-revision-in-executive triggers' name="triggers[]" id="will_the_director_receive_guaranteed_bonus">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="141">Yes</option>
                                                <option value="no">No</option>
                                                <option value=na>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="will_the_director_receive_guaranteed_bonus_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text_revision_in_executive">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Revision in Executive Directors' Remuneration" />
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text_revision_in_executive"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_2">
                                    <h4 class="form-section">Non-Excecutive Directors' Commission</h4>
                                    <div class="panel-group accordion general-view" id="accordion2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_check_2">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES is of the opinion that commission payable to non-executive directors should have an absolute cap (overall or otherwise) and the Company should clearly disclose objective criteria which will be used to determine the actual commission to be paid to the non-executive directors within the cap. The Company should not pay performance linked commission, ESOPs or other equity based remuneration to independent directors not only because it is prohibited by law, but also to maintain their independence/objectivity, and to promote long term value creation for shareholders.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">SES ANALYSIS</h4>
                                    <h5 class="form-section">Commission Payable</h5>
                                    <p><strong>Remuneration Limits</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Remuneration Limits" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Remuneration Limits:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Commission distribution criteria</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Commission distribution criteria" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Commission distribution criteria:</b></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Directors’ covered under the resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Directors' covered under the resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text"><b>Directors' covered under the resolution:</b></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Block" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="6" name="used_in_text[]" class="form-control other-text">As per the resolution, the Board (including the NEDs) will have the discretion to determine the amount of commission to be paid for each financial year to each NED within the limit of [1%/3%] of the net profits. Objective criteria for determining the quantum of commission payable to individual NEDs has not been disclosed by the Company. SES is of the opinion that in absence of disclosure on commission distribution criteria, conflict of interest situations may arise.
                                                    SES is of the opinion that to remove conflict of interest situations and to maintain the independence and objectivity of the independent NEDs, the Company should disclose the objective criteria to be used to distribute commission amongst IDs and place an absolute cap on commission payable to each NED. As a best practice, the Company should not pay any fee other than sitting fee, and profit based commission calculated on pre disclosed performance criteria. Further, SES recommends that the company should take shareholders’ approval of exact commission payable to NEDs.
                                            </textarea>
                                        </div>
                                    </div>
                                    <h4 class="form-section">DISTRIBUTION OF COMMISSION</h4>
                                    <p><strong>Average Commission (<i class="fa fa-rupee"></i> Lakhs)</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-3">Promoter NED</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="used_in[]" value="Promoter NED" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <input name="used_in_text[]" class="form-control other-text nedp-avg" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">Independent Directors</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="used_in[]" value="Independent Directors" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <input name="used_in_text[]" class="form-control other-text ID-avg" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">Other NEDs</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="used_in[]" value="Other NEDs" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <input name="used_in_text[]" class="form-control other-text NED-avg" />
                                        </div>
                                    </div>
                                    <p><strong>Total Commission (<i class="fa fa-rupee"></i> Lakhs)</strong></p>
                                    <?php
                                    for($j=0;$j<5;$j++) {
                                        if($j==0) {
                                        ?>
                                        <div class="form-group description-row template">
                                        <?php
                                        }
                                        else {
                                        ?>
                                            <div class="form-group description-row">
                                        <?php
                                        }
                                        ?>
                                            <div class="col-md-3">
                                                <select name="year[]" class="form-control total_commission" id="total_commission_<?php echo $j; ?>">
                                                    <option value="">Select Year</option>
                                                    <?php
                                                    for($i=2010;$i<=2020;$i++) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <?php if($j == 0)
                                            {?>
                                                <div class="col-md-6"><input type="text" class="form-control total_commission_value" name="total_comm[]" /></div>
                                                <div class="col-md-1"><button type="button" class="btn btn-danger disabled btn-delete-row"><i class="fa fa-times"></i></button></div>
                                            <?php }
                                            else { ?>
                                                <div class="col-md-6"><input type="text" class="form-control total_commission_value" name="total_comm[]" /></div>
                                                <div class="col-md-1"><button type="button" class="btn btn-danger btn-delete-row"><i class="fa fa-times"></i></button></div>
                                            <?php } ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="add_row_template"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label></label>
                                            <button class="btn btn-primary" id="btn_add_row" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Comment" />
                                            <input type="hidden" name="resolution_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea name="used_in_text[]" rows="4" class="form-control other-text" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Recommendation Guidelines</strong></p>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company placed an absolute cap on commission?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_placed_an_absolute_cap_on_commission">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="109">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_placed_an_absolute_cap_on_commission_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company disclosed the objective remuneration distribution criteria?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_disclosed_the_objective_remuneration">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" data-recommendation-table-id="110">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_disclosed_the_objective_remuneration_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Has the Company paid disproportionate commission to non-executive directors?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="has_the_company_paid_disproportionate_commission">
                                                <option value="">Select</option>
                                                <option value="yes" id="table_id_yes" data-recommendation-table-id="">Yes</option>
                                                <option value="no" id="table_id" data-recommendation-table-id="">No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="has_the_company_paid_disproportionate_commission_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Does the commission plus sitting fee to any one NED exceeds 25% of the average remuneration of any ED, without adequate justification? (Not applicable if non-independent NED is employed ED somewhere else)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="does_the_commission_plus_sitting_fee">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="111">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="does_the_commission_plus_sitting_fee_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Commission paid in excess of 1% or 3% (If no Managing Director or Executive Director is employed) of net profits of the Company?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_commission_paid_in_excess">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="112">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_commission_paid_in_excess_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Commission paid to Individual Directors disclosed in the Annual Report?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_commission_paid_to_individual_directors">
                                                <option value="">Select</option>
                                                <option value="yes" >Yes</option>
                                                <option value="no" data-recommendation-table-id="113" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_commission_paid_to_individual_directors_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Commission paid to select Directors only, without proper justification? (unless the director voluntarily forgoes his commission)</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_commission_paid_to_select_directors">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="114">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_commission_paid_to_select_directors_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Nomination and Remuneration Committee non- compliant?</label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_nomination_and_remuneration">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="115">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_nomination_and_remuneration_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the distribution of commission disproportionate between IDs and NEDs without proper justification? </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_distribution_of_commission">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="116">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_distribution_of_commission_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10">Is the Company seeking shareholders' approval for perpetuity?  </label>
                                        <div class="col-md-2">
                                            <select class='form-control recommendations-fire triggers' name="triggers[]" id="is_the_company_seeking_shareholders">
                                                <option value="">Select</option>
                                                <option value="yes" data-recommendation-table-id="117">Yes</option>
                                                <option value="no" >No</option>
                                                <option value="na">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="is_the_company_seeking_shareholders_analysis_text">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>General Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Non-Excecutive Directors' Commission" />
                                            <textarea rows="6" name="recommendation_text[]" class="form-control recommendation-text" id="recommendation_text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_3">
                                    <h4 class="form-section">Remuneration to Non-Independent Non-Executive Directors</h4>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_check_3">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        If the Company proposes to pay remuneration to any non-executive director for any additional service provided by the director to the Company, SES will make recommendations on a case-by-case basis after analyzing the provisions of the Companies Act as well as the terms of payment of such remuneration (whether the remuneration being paid is one-time event or it is recurring) and the following:<br>
                                                        1.  Qualification/expertise of the Director vis-à-vis service provided by the director to the Company and the time committed by the director for the said service<br>
                                                        2.  Remuneration paid to the director for the service and the fairness of the remuneration, including its comparison with remuneration paid to other directors of the Company

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Remuneration to Non-Independent Non-Executive Directors" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Remuneration to Non-Independent Non-Executive Directors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Remuneration to Non-Independent Non-Executive Directors" />
                                            <textarea rows="4" class="form-control recommendation-text" name="recommendation_text[]" placeholder="Enter text of the Recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_4">
                                    <h4 class="form-section">Remuneration Independent Directors</h4>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_check_4">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        If the Company proposes to remunerate an independent director for any professional services (apart from board service) provided by the director to the Company, SES will recommend voting AGAINST the resolution.

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Remuneration Independent Directors" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Remuneration Independent Directors" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Remuneration Independent Directors" />
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter text of the Recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body hidden" id="check_5">
                                    <h4 class="form-section">Waiver of Excess Remuneration</h4>
                                    <div class="panel-group accordion general-view" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_check_5">
                                                        General View
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_check_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        SES would analyze such proposal(s) and the justification(s) provided by the Company, and make its recommendations on a case to case basis. If the excess remuneration includes any variable pay and total remuneration not within Schedule V of the Companies Act, 2013 or proper disclosure is not made, SES will recommend voting AGAINST the resolution. As per the provisions of Schedule V of the Companies Act, 2013, the notice for approval of waiver of excess remuneration should contain the following information:<br/><br/>
                                                        I. General Information: Nature of industry, Date or expected date of commencement of commercial production, In case of new companies, expected date of commencement of activities as per project approved by financial institutions appearing in the prospectus, financial performance based on given indicators, foreign investments or collaborations, if any.<br/><br/>
                                                        II. Information about the appointee: Background details, Past remuneration, Recognition or awards, Job profile and his suitability, Remuneration proposed, Comparative remuneration profile with respect to industry, size of the company, profile of the position and person (in case of expatriates the relevant details would be with respect to the country of his origin), Pecuniary relationship directly or indirectly with the company, or relationship with the managerial personnel, if any.<br/><br/>
                                                        III. Other information: Reasons of loss or inadequate profits, Steps taken or proposed to be taken for improvement, Expected increase in productivity and profits in measurable terms.<br/><br/>
                                                        IV. Disclosures: The following disclosures shall be mentioned in the Board of Director’s report under the heading “Corporate Governance”, if any, attached to the financial statement:—<br/><br/>
                                                        (i) All elements of remuneration package such as salary, benefits, bonuses, stock options, pension, etc., of all the directors;<br/>
                                                        (ii) Details of fixed component and performance linked incentives along with the performance criteria;<br/>
                                                        (iii) Service contracts, notice period, severance fees;<br/>
                                                        (iv) Stock option details, if any, and whether the same has been issued at a discount as well as the period over which accrued and over which exercisable.


                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><strong>Resolution</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Waiver of Excess Remuneration" />
                                            <textarea rows="4" name="used_in_text[]" class="form-control other-text" placeholder="Enter text of the Resolution"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Analysis</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Waiver of Excess Remuneration" />
                                            <textarea rows="4" name="analysis_text[]" class="form-control analysis-text" placeholder="Enter text of the Analysis"></textarea>
                                        </div>
                                    </div>
                                    <p><strong>Recommendation</strong></p>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Waiver of Excess Remuneration" />
                                            <textarea rows="4" name="recommendation_text[]" class="form-control recommendation-text" placeholder="Enter text of the Recommendation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" name="directors_remuneration" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/scripts/core/app.js"></script>
        <script type="text/javascript" src="Scripts/loader-plugin.js"></script>
        <script type="text/javascript" src="Scripts/directors-remuneration.js"></script>
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





















