<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
$response = array();
if(isset($_POST['remuneration_analysis'])) {
    $db = new DatabaseReports();
    $info = $_POST;
    $response = $db->saveRemunerationAnalysisDetails($info);
    if($response['status']==200) {
        $flag = true;
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
    <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link rel="stylesheet" type="text/css" href="assets/css/sweet-alert.css" />
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
                <li class="active">
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
                        Remuneration Analysis
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
                                Remuneration Analysis
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" action="remuneration-analysis.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Remuneration Analysis">
                                <div class="form-body table-responsive">
                                    <p><strong>Executive Director's Remuneration Analysis</strong></p>
                                    <table class="table table-bordered table-hover table-stripped">
                                        <thead>
                                        <tr>
                                            <th class="text-center" colspan="2" rowspan="2" style="width: 30%; vertical-align: middle;">In&nbsp;<i class="fa fa-rupee"></i>&nbsp;Crores</th>
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
                                            <th class="text-center" colspan="2"><input id="rem_second_year" name="remuneration_year_2" readonly class="form-control"></th>
                                            <th class="text-center" colspan="2"><input id="rem_third_year" name="remuneration_year_3" readonly class="form-control"></th>
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
                                            <?php
                                            $company_id = $_SESSION['company_id'];
                                            $financial_year = $_SESSION['report_year'];
                                            $db = new DatabaseReports();
                                            $directors = $db->getRemunerationAnalysisDetails($company_id,$financial_year);
                                            foreach($directors as $director) {
                                            ?>
                                            <tr class="tr-td-center remuneration-analysis">
                                                <td>
                                                    <input name="director_name[]" class="form-control" value="<?php echo $director['dir_name']; ?>" />
                                                    <input class="din_numbers" type="hidden" name="dir_din_no[]" value="<?php echo $director['dir_din_no']; ?>" />
                                                </td>
                                                <td>
                                                    <select class="form-control" name="promoter_non_promoter[]">
                                                        <option value="">Select option</option>
                                                        <option value="P">Promoter</option>
                                                        <option value="NP">Non-Promoter</option>
                                                    </select>
                                                </td>
                                                <td><input class="form-control" name="fixed_pay_first_year[]"/></td>
                                                <td><input class="form-control" name="total_pay_first_year[]"/></td>
                                                <td><input class="form-control" name="fixed_pay_second_year[]"/></td>
                                                <td><input class="form-control" name="total_pay_second_year[]"/></td>
                                                <td><input class="form-control" name="fixed_pay_third_year[]"/></td>
                                                <td><input class="form-control" name="total_pay_third_year[]"/></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Remuneration Analysis"/>
                                            <textarea class="form-control analysis-text" name="analysis_text[]" rows="4" placeholder="Enter Analysis Text"></textarea>
                                        </div>
                                    </div>
                                    <p>Note: Fixed pay includes basic pay, perquisites & allowances. P – Promoter; NP – Non-Promoter</p>
                                    <p><strong>Discussion - Indexed TSR vs. Executive Remuneration Growth</strong></p>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Year on Year Growth</th>
                                            <th class="text-center">MD (RHS)</th>
                                            <th class="text-center">Indexed TSR (LHS)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="remuneration_growth">
                                            <tr class="remuneration_growth">
                                                <td><input class="form-control" name="executive_growth_year[]"></td>
                                                <td><input class="form-control" name="md[]"></td>
                                                <td><input class="form-control" name="indexed_tsr[]"></td>
                                            </tr>
                                            <tr class="remuneration_growth">
                                                <td><input class="form-control" name="executive_growth_year[]"></td>
                                                <td><input class="form-control" name="md[]"></td>
                                                <td><input class="form-control" name="indexed_tsr[]"></td>
                                            </tr>
                                            <tr class="remuneration_growth">
                                                <td><input class="form-control" name="executive_growth_year[]"></td>
                                                <td><input class="form-control" name="md[]"></td>
                                                <td><input class="form-control" name="indexed_tsr[]"></td>
                                            </tr>
                                            <tr class="remuneration_growth">
                                                <td><input class="form-control" name="executive_growth_year[]"></td>
                                                <td><input class="form-control" name="md[]"></td>
                                                <td><input class="form-control" name="indexed_tsr[]"></td>
                                            </tr>
                                            <tr class="remuneration_growth">
                                                <td><input class="form-control" name="executive_growth_year[]"></td>
                                                <td><input class="form-control" name="md[]"></td>
                                                <td><input class="form-control" name="indexed_tsr[]"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-hover dividend-in-the-year">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Year</th>
                                            <th class="text-center">Market price at year start</th>
                                            <th class="text-center">Market price at year end</th>
                                            <th class="text-center">Dividend in the year</th>
                                            <th class="text-center">Total Dividend</th>
                                        </tr>
                                        </thead>
                                        <tbody id="indexed_tsr_tbody">
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="indexed_tsr_year_start_year">
                                                        <option>Select Year</option>
                                                        <?php
                                                        for($i=2010;$i<=2020;$i++) {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                                <td><input class="form-control" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Note: Indexed TSR (Total Shareholders Return) represents the value of ` 100 invested in the Company at beginning of a 5-year period starting 1 April 2009. One period return is calculated as (Final Price – Initial Price + Dividend) / Initial Price.</p>
                                    <?php
                                    $directors = $db->getCompanyDirectorsWithPay($company_id,$financial_year);
                                    $edp_sum = 0;
                                    $ed_sum = 0;
                                    $nedp_sum = 0;
                                    $ned_id_sum = 0;
                                    foreach($directors as $director) {
                                        if($director['company_classification']=="EDP") {
                                            $edp_sum += $director['fixed_pay']+$director['variable_pay'];
                                        }
                                        else if($director['company_classification']=="ED") {
                                            $ed_sum += $director['fixed_pay']+$director['variable_pay'];
                                        }
                                        else if($director['company_classification']=="NEDP") {
                                            $nedp_sum += $director['fixed_pay']+$director['variable_pay'];
                                        }
                                        elseif($director['company_classification']=="NED" || $director['company_classification']=="ID") {
                                            $ned_id_sum += $director['fixed_pay']+$director['variable_pay'];
                                        }
                                    }
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">In&nbsp;<i class="fa fa-rupee"></i>&nbsp; Crores</th>
                                            <th class="text-center">Promoter</th>
                                            <th class="text-center">Non-Promoter</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">Executive</td>
                                            <td class="text-center"><input value="<?php echo number_format($edp_sum/100,2); ?>" class="form-control ex_promoter" name="ex_promoter"/></td>
                                            <td class="text-center"><input value="<?php echo number_format($ed_sum/100,2); ?>" class="form-control ex_non_promoter" name="ex_non_promoter"/></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Non-Executive</td>
                                            <td class="text-center"><input value="<?php echo number_format($nedp_sum/100,2); ?>" class="form-control non_ex_promoter" name="non_ex_promoter"/></td>
                                            <td class="text-center"><input value="<?php echo number_format($ned_id_sum/100,2); ?>" class="form-control non_ex_non_promoter" name="non_ex_non_promoter"/></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p><strong>EXECUTIVE REMUNERATION - PEER COMPARISON</strong></p>
                                    <?php
                                    $executive_remuneration_peer_comparision = $db->executiveRemnunerationPeerComparisionData($company_id,$financial_year);
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <td class="text-center company1"><input name="company_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['company_name']; ?>" /></td>
                                            <td class="text-center company2"><input name="company_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_1_company_name']; ?>" /></td>
                                            <td class="text-center company3"><input name="company_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_2_company_name']; ?>" /></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">Director Name</td>
                                            <td class="text-center director1"><input name="director_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['company_director']; ?>" /></td>
                                            <td class="text-center director2"><input name="director_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_1_director']; ?>" /></td>
                                            <td class="text-center director3"><input name="director_name_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_2_director']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Promoter Group</td>
                                            <td class="text-center promoter1"><input name="promoter_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['company_promoter']; ?>" /></td>
                                            <td class="text-center promoter2"><input name="promoter_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_1_promoter']; ?>" /></td>
                                            <td class="text-center promoter3"><input name="promoter_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_2_promoter']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Remuneration (<i class="fa fa-rupee"></i>&nbsp; Crore) (A)</td>
                                            <td class="text-center remuneration1"><input name="remuneration_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['company_director_rem']; ?>" /></td>
                                            <td class="text-center remuneration2"><input name="remuneration_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_1_director_rem']; ?>" /></td>
                                            <td class="text-center remuneration3"><input name="remuneration_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_2_director_rem']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Net Profits (<i class="fa fa-rupee"></i>&nbsp; Crore) (B)</td>
                                            <td class="text-center net-profit1"><input name="net_profit_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['company_net_profit']; ?>" /></td>
                                            <td class="text-center net-profit2"><input name="net_profit_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_1_net_profit']; ?>" /></td>
                                            <td class="text-center net-profit3"><input name="net_profit_peer_comparison[]" class="form-control" value="<?php echo $executive_remuneration_peer_comparision['peer_2_net_profit']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Rem. Percentage (A/B * 100)</td>
                                            <td class="text-center percentage1"><input name="rem_per_peer_comparison[]" class="form-control" value="<?php echo number_format ($executive_remuneration_peer_comparision['company_rem_per'],2); ?>" /></td>
                                            <td class="text-center percentage2"><input name="rem_per_peer_comparison[]" class="form-control" value="<?php echo number_format($executive_remuneration_peer_comparision['peer_1_rem_per'],2); ?>" /></td>
                                            <td class="text-center percentage3"><input name="rem_per_peer_comparison[]" class="form-control" value="<?php echo number_format($executive_remuneration_peer_comparision['peer_2_rem_per'],2); ?>" /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <p><strong>General Analysis</strong></p>
                                            <input type="hidden" name="analysis_section[]" value="Remuneration Analysis"/>
                                            <textarea class="form-control analysis-text" name="analysis_text[]" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button name="remuneration_analysis" type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script type="text/javascript" src="Scripts/remuneration-analysis.js"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        <?php if($flag) {
        ?>
            object.initialization(true);
        <?php
        }
        else {
        ?>
            object.initialization(false);
        <?php
        }
        ?>
        object.pageload();
    });
</script>
</body>
</html>

















