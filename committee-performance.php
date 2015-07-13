<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
    header("location:$_config[base_url]");
}
$response = array();
if(isset($_POST['committee_performance'])) {
    $db = new DatabaseReports();
    $info = $_POST;
    $response = $db->saveCommitteePerformanceDetails($info);
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
                <li class="active">
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
                        Committee Performance
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
                                Committee Performance
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
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Committee Performance">
                                <div class="form-body table-responsive">
                                    <p><strong>Board Committee Performance</strong></p>
                                    <?php
                                    $db = new DatabaseReports();
                                    $company_id = $_SESSION['company_id'];
                                    $financial_year = $_SESSION['report_year'];
                                    $generic_array = $db->companyBoardOfDirectors($company_id,$financial_year);
                                    $audit_committee_info = $generic_array['audit_committee_info'];
                                    $investor_committee_info = $generic_array['investor_committee_info'];
                                    ?>
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle;" rowspan="2">Committees</th>
                                            <th class="text-center" style="vertical-align: middle;" rowspan="2">#</th>
                                            <th class="text-center" colspan="2">Chairman’s classification</th>
                                            <th class="text-center" colspan="2">Overall Independence</th>
                                            <th class="text-center" style="vertical-align: middle;" rowspan="2">Number of Meetings</th>
                                            <th class="text-center" style="vertical-align: middle;" rowspan="2">Attendance < 75%</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Company </th>
                                            <th class="text-center">SES </th>
                                            <th class="text-center">Company</th>
                                            <th class="text-center">SES </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="commitee-performance">
                                            <td class="text-center">Audit </td>
                                            <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $audit_committee_info['total_members']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $audit_committee_info['audit_committee_chairman_company_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $audit_committee_info['audit_committee_chairman_ses_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $audit_committee_info['audit_company_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $audit_committee_info['audit_ses_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $audit_committee_info['audit_committee_meetings_held']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $audit_committee_info['total_directors']; ?>"/></td>
                                        </tr>
                                        <tr class="commitee-performance">
                                            <td class="text-center">Investor's Grievance  </td>
                                            <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $investor_committee_info['total_members']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $investor_committee_info['committee_chairman_company_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $investor_committee_info['committee_chairman_ses_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $investor_committee_info['company_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $investor_committee_info['ses_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $investor_committee_info['committee_meetings_held']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $investor_committee_info['total_directors']; ?>"/></td>
                                        </tr>
                                        <?php
                                        if($generic_array['rem_nom_same']=='yes') {
                                            $nomination_remuneration_committee = $generic_array['nomination_remuneration_committee'];
                                        ?>
                                            <tr class="commitee-performance">
                                                <td class="text-center">Nomination &amp; Remuneration</td>
                                                <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $nomination_remuneration_committee['total_members']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $nomination_remuneration_committee['committee_chairman_company_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $nomination_remuneration_committee['committee_chairman_ses_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $nomination_remuneration_committee['company_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $nomination_remuneration_committee['ses_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $nomination_remuneration_committee['committee_meetings_held']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $nomination_remuneration_committee['total_directors']; ?>"/></td>
                                            </tr>
                                        <?php
                                        }
                                        else {
                                            $nomination_committee_info = $generic_array['nomination_committee_info'];
                                            $remuneration_committee_info = $generic_array['remuneration_committee_info'];
                                        ?>
                                            <tr class="commitee-performance">
                                                <td class="text-center">Remuneration</td>
                                                <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $remuneration_committee_info['total_members']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $remuneration_committee_info['committee_chairman_company_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $remuneration_committee_info['committee_chairman_ses_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $remuneration_committee_info['company_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $remuneration_committee_info['ses_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $remuneration_committee_info['committee_meetings_held']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $remuneration_committee_info['total_directors']; ?>"/></td>
                                            </tr>
                                            <tr class="commitee-performance">
                                                <td class="text-center">Nomination</td>
                                                <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $nomination_committee_info['total_members']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $nomination_committee_info['committee_chairman_company_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $nomination_committee_info['committee_chairman_ses_class']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $nomination_committee_info['company_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $nomination_committee_info['ses_independence']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $nomination_committee_info['committee_meetings_held']; ?>"/></td>
                                                <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $nomination_committee_info['total_directors']; ?>"/></td>
                                            </tr>
                                        <?php
                                        }
                                        $csr_committee_info = $generic_array['csr_committee_info'];
                                        $risk_committee_info = $generic_array['risk_committee_info'];
                                        ?>
                                        <tr class="commitee-performance">
                                            <td class="text-center">CSR  </td>
                                            <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $csr_committee_info['total_members']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $csr_committee_info['committee_chairman_company_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $csr_committee_info['committee_chairman_ses_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $csr_committee_info['company_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $csr_committee_info['ses_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $csr_committee_info['committee_meetings_held']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $csr_committee_info['total_directors']; ?>"/></td>
                                        </tr>
                                        <tr class="commitee-performance">
                                            <td class="text-center">Risk Committee </td>
                                            <td class="text-center"><input class="form-control" name="total[]"  value="<?php echo $risk_committee_info['total_members']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_com_classification[]"  value="<?php echo $risk_committee_info['committee_chairman_company_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="chairman_ses_classification[]"  value="<?php echo $risk_committee_info['committee_chairman_ses_class']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_com_independence[]"  value="<?php echo $risk_committee_info['company_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="overall_ses_independence[]"  value="<?php echo $risk_committee_info['ses_independence']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="no_meetings[]"  value="<?php echo $risk_committee_info['committee_meetings_held']; ?>"/></td>
                                            <td class="text-center"><input class="form-control" name="attendance_less_75[]"  value="<?php echo $risk_committee_info['total_directors']; ?>"/></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Committee Performance"/>
                                            <textarea class="form-control analysis-text" name="analysis_text[]" rows="4" placeholder="Enter Analysis Text"></textarea>
                                        </div>
                                    </div>
                                    <p>Reference: ID – Independent director, NID – Non-Independent director, ED – Executive director, C – Chairman, P – Promoter</p>
                                    <p><strong>Board Governance Score</strong></p>
                                    <?php
                                    $first_row_gov_score = $generic_array['first_row_gov_score'];
                                    ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Criteria</th>
                                            <th class="text-center">Response</th>
                                            <th class="text-center">Score</th>
                                            <th class="text-center">Maximum</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="board-governance-score">
                                            <td class="text-center">What is the percentage of Independent Directors on the Board?</td>
                                            <td class="text-center"><input name="response[]" class="form-control" value="<?php echo $first_row_gov_score['response']; ?>"/></td>
                                            <td class="text-center"><input name="score[]" class="form-control" value="<?php echo $first_row_gov_score['score']; ?>"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <?php
                                        $second_row_gov_score = $generic_array['second_row_gov_score'];
                                        ?>
                                        <tr class="board-governance-score">
                                            <td class="text-center">How many Independent Directors have tenure greater than 10 years?</td>
                                            <td class="text-center"><input name="response[]" class="form-control" value="<?php echo $second_row_gov_score['response']; ?>"/></td>
                                            <td class="text-center"><input name="score[]" class="form-control" value="<?php echo $second_row_gov_score['score']; ?>"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">How many Independent Directors have Shareholdings > <i class="fa fa-rupee"></i> 1 Cr?</td>
                                            <input type="hidden" id="company_id_classification" value="<?php echo $generic_array['company_id_classification']; ?>" />
                                            <td class="text-center"><input name="response[]" class="form-control" id="independent_directors_have_shareholdings_response"/></td>
                                            <td class="text-center"><input name="score[]" class="form-control" id="independent_directors_have_shareholdings_score"/></td>
                                            <td class="text-center">5</td>
                                        </tr>
                                        <?php
                                        $fourth_row_gov_score = $generic_array['fourth_row_gov_score'];
                                        ?>
                                        <tr class="board-governance-score">
                                            <td class="text-center">Is the Chairman Independent?</td>
                                            <td class="text-center"><input name="response[]" class="form-control" value="<?php echo $fourth_row_gov_score['response']; ?>"/></td>
                                            <td class="text-center"><input name="score[]" class="form-control" value="<?php echo $fourth_row_gov_score['score']; ?>"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">Is there a Lead Independent Director?</td>
                                            <td class="text-center">
                                                <select class="form-control" name="response[]" id="leader_independent_director">
                                                    <option value="" data-score="">select</option>
                                                    <option value="yes" data-score="10">Yes</option>
                                                    <option value="no" data-score="0">No</option>
                                                </select>
                                            </td>
                                            <td class="text-center"><input name="score[]" class="form-control" id="leader_independent_director_score"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">How many Independent Directors are ex-executive of the Company?</td>
                                            <td class="text-center">
                                                <input class="form-control" name="response[]" id="independent_directors_ex"/>
                                                <input type="hidden" id="ses_id_classification" value="<?php echo $generic_array['ses_id_classification']; ?>">
                                            </td>
                                            <td class="text-center"><input name="score[]" class="form-control" id="independent_directors_ex_score"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">Have all directors been elected by the Company's shareholders?</td>
                                            <td class="text-center">
                                                <select class="form-control" name="response[]" id="directors_been_elected_by_the_company">
                                                    <option value="" data-score="">select</option>
                                                    <option value="yes" data-score="10">Yes</option>
                                                    <option value="no" data-score="0">No</option>
                                                </select>
                                            </td>
                                            <td class="text-center"><input class="form-control" name="score[]" id="directors_been_elected_by_the_company_score"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">Are any directors on the Board related to each other?</td>
                                            <td class="text-center">
                                                <select class="form-control" name="response[]" id="any_directors_on_the_board_related">
                                                    <option value="" data-score="">select</option>
                                                    <option value="yes" data-score="0">Yes</option>
                                                    <option value="no" data-score="10">No</option>
                                                </select>
                                            </td>
                                            <td class="text-center"><input name="score[]" class="form-control" id="any_directors_on_the_board_related_score"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <?php
                                        $ninth_row_score = $generic_array['ninth_row_gov_score'];
                                        ?>
                                        <tr class="board-governance-score">
                                            <td class="text-center">How many promoter directors are on the Board?</td>
                                            <td class="text-center"><input name="response[]" class="form-control" value="<?php echo $ninth_row_score['response']; ?>"/></td>
                                            <td class="text-center"><input name="score[]" class="form-control" value="<?php echo $ninth_row_score['score']; ?>"/></td>
                                            <td class="text-center">15</td>
                                        </tr>
                                        <tr class="board-governance-score">
                                            <td class="text-center">Did Independent Directors meet atleast once without management?</td>
                                            <td class="text-center">
                                                <select class="form-control" name="response[]" id="did_independent_directors_meet">
                                                    <option value="" data-score="">select</option>
                                                    <option value="yes" data-score="10">Yes</option>
                                                    <option value="no" data-score="0">No</option>
                                                </select>
                                            </td>
                                            <td class="text-center"><input name="score[]" class="form-control" id="did_independent_directors_meet_score"/></td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button name="committee_performance" type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script src="Scripts/committee-performance.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
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