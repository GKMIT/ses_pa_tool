<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
$flag = false;
$response = array();
if(isset($_POST['page_2_details'])) {
	$db = new DatabaseReports();
	$info = $_POST;
	$response = $db->savePage2Details($info);
	if($response['status']==200) {
		$flag = true;
	}
}
if(isset($_SESSION['report_id'])) {
	$db = new DatabaseReports();
	$report_id = $_SESSION['report_id'];
	$table_name="pa_report_meeting_details";
	if($db->isReportDataExists($report_id,$table_name)) {
		$report_data_exists = true;
		$recommendations = $db->getAgendaItemsAndRecommendations($report_id);
	}
}

?>
<!DOCTYPE html>
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
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/css/sweet-alert.css" />
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed">
<?php include_once('navbar.php'); ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
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
				<li class="active">
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
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<h3 class="page-title">
						SES Recommendations
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
								SES Recommendations
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="ses-recommendations.php">
								<?php
								if($report_data_exists) {
									echo "<input type='hidden' name='report_data_exists' />";
								}
								?>
								<div class="form-body">
									<h4 class="form-section">Table 1 - AGENDA ITEMS AND RECOMMENDATIONS</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th class="col-md-1">
														Sr. No.
													</th>
													<th class="col-md-5">
														Resolution
													</th>
													<th class="col-md-1">
														Type
													</th>
													<th class="col-md-2">
														Recommendation
													</th>
													<th class="col-md-1">
														Focus
													</th>
													<th class="col-md-1">
														&nbsp;
													</th>
												</tr>
											</thead>
											<tbody id="recommendations-template-container">
												<tr class="recommendations-template hidden">
													<td class="recommendations-srno">1</td>
													<td>
														<input typr='text' class='form-control' name="resolution[]"/>
													</td>
													<td>
														<select class='form-control' name="type[]">
															<option></option>
															<option>O</option>
															<option>S</option>
														</select>
													</td>
													<td>
														<select class="form-control" name="recommendation[]">
															<option> </option>
															<option>FOR</option>
															<option>AGAINST</option>
															<option>**</option>
														</select>
													</td>
													<td>
														<select class='form-control' name="focus[]">
															<option></option>
															<option>C</option>
															<option>F</option>
															<option>G</option>
															<option>T</option>
														</select>
													</td>
													<td class="td-remove">
														<button type="button" class="btn btn-danger hidden btn-remove-recommendations"><i class="fa fa-times"></i></button>
													</td>
												</tr>
												<?php
												if(count($recommendations)>0) {
													$i=1;
													foreach($recommendations as $row) {
														?>
														<tr>
															<td class="recommendations-srno"><?php echo $i++; ?></td>
															<td>
																<input typr='text' class='form-control' name="resolution[]" value="<?php echo $row['resolution']; ?>"/>
															</td>
															<td>
																<select class='form-control' name="type[]">
																	<?php
																	$array_types = array('O','S');
																	foreach($array_types as $type) {
																		if($row['type']==$type) {
																			echo "<option selected value='$type'>$type</option>";
																		}
																		else {
																			echo "<option value='$type'>$type</option>";
																		}
																	}
																	?>
																</select>
															</td>
															<td>
																<select class="form-control" name="recommendation[]">
																	<?php
																	$array_types = array('FOR','AGAINST','**');
																	foreach($array_types as $type) {
																		if($row['recommendation']==$type) {
																			echo "<option selected value='$type'>$type</option>";
																		}
																		else {
																			echo "<option value='$type'>$type</option>";
																		}
																	}
																	?>
																</select>
															</td>
															<td>
																<select class='form-control' name="focus[]">
																	<?php
																	$array_types = array('C','F','G','T');
																	foreach($array_types as $type) {
																		if($row['focus']==$type) {
																			echo "<option selected value='$type'>$type</option>";
																		}
																		else {
																			echo "<option value='$type'>$type</option>";
																		}
																	}
																	?>
																</select>
															</td>
															<td class="td-remove">
																<button type="button" class="btn btn-danger btn-remove-recommendations"><i class="fa fa-times"></i></button>
															</td>
														</tr>
													<?php
													}
													?>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
									<div class="form-group">
										<div class="col-md-1">
											<button type="button" class="btn green" id="btn_add_recommendations">Add</button>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-12">
										<button name="page_2_details" type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
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
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/scripts/custom/sweet-alert.min.js"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/scripts/core/app.js"></script>
<script src="Scripts/custom.js"></script>
<script>
jQuery(document).ready(function() {
	App.init();
	<?php if($flag) {
	?>
		var info = ['<?php echo $response['msg']; ?>'];
		object.initializePage2(true,info);
	<?php
	}
	else {
	?>
		var info = ['<?php echo $response['msg']; ?>'];
		object.initializePage2(false,info);
	<?php
	}
	?>
});
</script>
</body>
</html>