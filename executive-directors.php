<?php
session_start();
include_once("Classes/databasereport3.php");
include_once("assets/config/config.php");
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
                <?php include_once('side-nav-bar.php'); ?>
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">
                        Executive Directors
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
                                Executive Directors
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <?php

            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h4 class="form-section">APPOINTMENT/REAPPOINTMENT OF EXECUTIVE DIRECTORS</h4>
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label class="col-md-12">Full text of the resolution</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div id="" class="">
                                        <h4 class="form-section">Directors Profile</h4>
                                        <div class="form-group">
                                            <label class="col-sm-3">Director Name </label>
                                            <div class="col-md-3">
                                                <select class="form-control quest" id="directors_name">
                                                    <option value="">Select Director</option>
                                                    <?php
                                                    $company_id= $_SESSION['company_id'];
                                                    $financial_year=date("Y");
                                                    $db = new DatabaseReports();
                                                    $directors_ed = $db->getCompanyEDDirectors($company_id,$financial_year);
                                                   foreach($directors_ed as $director) {
                                                       echo "<option value='$director[din_no]'>$director[dir_name]</option>";
                                                   }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="director_profile" class="director-profile">
                                            <div class="form-group">
                                                <label class="col-sm-3">Current full time position </label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control'  readonly id="current_full_time_position">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Functional Area</label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control'  id="functional_area">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Education</label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control'  readonly id="education">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Part of promoter group?</label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control'  id="part_of_promoter_group">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Past Experience</label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control' readonly id="past_experience">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Committee positions in the company</label>
                                                <div class="col-md-3">
                                                    <input type='text' class='form-control' id="commitee_positions_in_the">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="past_remuneration_of_the_director">
                                        <h4 class="form-section">Past Remuneration Of The Director </h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr >
                                                <th class="text-center">Year</th>
                                                <th class="text-center">Fixed Pay</th>
                                                <th class="text-center">Total Pay</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="past-remuneration-of-the-director1">
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="past-remuneration-of-the-director2">
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="past-remuneration-of-the-director3">
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="executive_remuneration_peer_comparison">
                                        <h4 class="form-section">Executive Remuneration – Peer Comparison</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <tbody>
                                                <tr class="executive-remuneration-peer-comparision-row-1">
                                                    <th class="text-center col-md-2">Director</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                                <tr class="executive-remuneration-peer-comparision-row-2">
                                                    <th class="text-center">Company</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                                <tr class="executive-remuneration-peer-comparision-row-3">
                                                    <th class="text-center">Promoter</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                                <tr class="executive-remuneration-peer-comparision-row-4">
                                                    <th class="text-center">Remuneration( <i class="fa fa-rupee"></i> Cr.)</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                                <tr class="executive-remuneration-peer-comparision-row-5">
                                                    <th class="text-center">Net Profits ( <i class="fa fa-rupee"></i> Cr.)</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                                <tr class="executive-remuneration-peer-comparision-row-6">
                                                    <th class="text-center">( <i class="fa fa-rupee"></i> Cr.)</th>
                                                    <td class="text-center">1212</td>
                                                    <td class="text-center">1212</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="directors_time_commitments">
                                        <h4 class="form-section">DIRECTORS' TIME COMMITMENTS</h4>
                                        <div class="form-group">
                                            <label class="col-sm-3">Total Directorships </label>
                                            <div class="col-md-3">
                                                <input type='text' class='form-control'  id="total_directorships">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Total Committee memberships</label>
                                            <div class="col-md-3">
                                                <input type='text' class='form-control'  id="total_committee_membership">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Total Committee Chairmanship</label>
                                            <div class="col-md-3">
                                                <input type='text' class='form-control'  id="total_committee_chairmanship">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Full time role/ executive position</label>
                                            <div class="col-md-3">
                                                <input type='text' class='form-control'  id="full_time_role">
                                            </div>
                                        </div>

                                    </div>
                                    <div id="directors_time_commitments" class="">
                                        <h4 class="form-section">DIRECTORS’ PERFORMANCE</h4>
                                        <div class="form-group">
                                            <label class="col-sm-6">Last 3 AGMs</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="last_3_agms">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Board meetings held last year</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="board_meetings_held_last_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Board meetings in last 3 years (avg.)</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="board_meetings_in_last_3_years">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Audit Committee meetings held last year</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="audit_commitee_meetings_held_last_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Audit Committee meetings in last 3 years (avg.)</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="audit_commitee_meetings_in_last_3_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Nomination & Remuneration Committee meetings held last year</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="nm_committee_meetings_held_last_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Nomination & Remuneration Committee meetings in last 3 years (avg.)</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="nm_committee_meetings_in_last_3_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Investors’ Grievances Committee meetings held last year</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="ig_committee_meetings_held_last_year">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6">Investors’ Grievances Committee meetings in last 3 years (avg.)</label>
                                            <div class="col-md-4">
                                                <input type='text' class='form-control'  id="ig_committee_meetings_in_last_3_year">
                                            </div>
                                        </div>

                                    </div>
                                    <div id="remuneration_of_the_director" class="">
                                        <h4 class="form-section">Table for the graph </h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr >
                                                <th class="text-center">Year</th>
                                                <th class="text-center">Directore Name</th>
                                                <th class="text-center">Indexed TSR</th>
                                                <th class="text-center">Net Profit (CAGR)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $year = date("Y"); ?>
                                            <tr class="remuneration-of-the-director1">
                                                <td class="text-center"><?php echo $year; ?></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="remuneration-of-the-director2">
                                                <td class="text-center"><?php echo $year-1; ?></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="remuneration-of-the-director3">
                                                <td class="text-center"><?php echo $year-2; ?></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="remuneration-of-the-director4">
                                                <td class="text-center"><?php echo $year-3; ?></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr class="remuneration-of-the-director5">
                                                <td class="text-center"><?php echo $year-4; ?></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script type="text/javascript" src="Scripts/executive-directors.js"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        object.page15Actions();
    });
</script>
</body>
</html>