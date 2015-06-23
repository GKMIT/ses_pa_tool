<?php
	session_start();
	include_once("assets/database/Connect.php");
	include_once("Classes/databasereport.php");
	include_once("assets/config/config.php");
	$flag = false;
	$response = array();
	$report_data_exists=false;
	if(isset($_POST['page_1_details'])) {
		$db = new DatabaseReports();
		$info = $_POST;
		$info['meeting_date'] = $_POST['meeting_date']=="" ? '0000-00-00' : date_format(date_create_from_format('d-M-Y', $_POST['meeting_date']), 'Y-m-d');
		$info['e_voting_start_date'] = $_POST['e_voting_start_date']=="" ? '0000-00-00' : date_format(date_create_from_format('d-M-Y', $_POST['e_voting_start_date']), 'Y-m-d');
		$info['e_voting_end_date'] = $_POST['e_voting_end_date']=="" ? '0000-00-00' : date_format(date_create_from_format('d-M-Y', $_POST['e_voting_end_date']), 'Y-m-d');
		$info['voting_deadline'] = $_POST['voting_deadline']=="" ? '0000-00-00' : date_format(date_create_from_format('d-M-Y', $_POST['voting_deadline']), 'Y-m-d');
		$response = $db->savePage1Details($info);
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
			$meeting_details = $db->getCompanyAndMeetingDetails($report_id);

		}
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
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/sweet-alert.css" />
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
				<li class="active">
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
					Company and Meeting Details
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
								Company and meeting details
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="company-and-meeting-details.php">
								<?php
								if($report_data_exists) {
									echo "<input type='hidden' name='report_data_exists' value='$_SESSION[company_id]' id='report_data_exists' />";
								}
								?>
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Name of the Company</label>
										<input type="hidden" name="company_id" id="companies_id"/>
										<div class="col-md-4">
											<div style="position: relative;">
												<input type="text" autocomplete="off" placeholder="Enter company name" id="company_name_keywords" class="form-control"/>
												<div class="auto-fill hidden">

												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">BSE Code</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="company_bse_code" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">NSE Code</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="nse_code" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ISIN</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="isin" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sector</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="sector" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="email" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Website</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="website" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Fax</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="fax" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Contact</label>
										<div class="col-md-4">
											<input type="text" class="form-control" id="contact" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Registered Address</label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="address" readonly />
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Meeting Details</h4>
									<div class="form-group">
										<label class="col-md-3 control-label">Report year</label>
										<div class="col-md-4">
											<select class="form-control" name="report_year" id="report_year">
												<?php
												for($i=2013;$i<=2020;$i++) {
													if($_SESSION['report_year']==$i)
														echo "<option selected value='$i'>$i</option>";
													else
														echo "<option value='$i'>$i</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Type</label>
										<div class="col-md-4">
											<select class="form-control" name="meeting_type" id="page_1_meeting_type">
												<?php
												$array_meeting_type = array('AGM'=>'AGM','EGM'=>'EGM','PB'=>'Postal Ballot','CCM'=>"CCM");
												foreach($array_meeting_type as $key=>$value) {
													if($meeting_details['meeting_type']==$key) {
														echo "<option selected value='$key'>$value</option>";
													}
													else {
														echo "<option value='$key'>$value</option>";
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group" id="meeting_date">
										<label class="col-md-3 control-label">Meeting Date</label>
										<div class="col-md-4">
											<?php
											if(isset($meeting_details['meeting_date'])) {
												$meeting_date = $meeting_details['meeting_date'] == "0000-00-00" ? "" : date_format(date_create_from_format('Y-m-d', $meeting_details['meeting_date']), 'd-M-Y');
											}
											else {
												$meeting_date="";
											}
											?>
											<input type="text" value="<?php echo $meeting_date; ?>" name="meeting_date" class="form-control date-picker" placeholder="Select date"/>
										</div>
									</div>
									<div class="form-group" id="meeting_date">
										<label class="col-md-3 control-label">Meeting Time</label>
										<div class="col-md-4">
											<div class="input-group">
												<input type="text" class="form-control timepicker timepicker-no-seconds" name="meeting_time" value="<?php echo $meeting_details['meeting_time']; ?>"/>
												<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group hidden" id="voting_deadline">
										<label class="col-md-3 control-label">Voting Deadline</label>
										<div class="col-md-4">
											<?php
											if(isset($meeting_details['voting_deadline'])) {
												$voting_deadline = $meeting_details['voting_deadline'] == "0000-00-00" ? "" : date_format(date_create_from_format('Y-m-d', $meeting_details['voting_deadline']), 'd-M-Y');
											}
											else {
												$voting_deadline="";
											}
											?>
											<input type="text" name="voting_deadline" value="<?php echo $voting_deadline; ?>" class="form-control date-picker" placeholder="Select date"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">e-Voting Platform</label>
										<div class="col-md-4">
											<select class="form-control" name="e_voting_platform" id="e_voting_platform">
												<option value="">Select</option>
												<?php
												$array_meeting_type = array('NSDL'=>'NSDL','CDSL'=>'CDSL','Karvy'=>'Karvy');
												foreach($array_meeting_type as $key=>$value) {
													if($meeting_details['e_voting_platform']==$key) {
														echo "<option selected value='$key'>$value</option>";
													}
													else {
														echo "<option value='$key'>$value</option>";
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">e-Voting Platform Website</label>
										<div class="col-md-4">
											<input class="form-control" value="<?php echo $meeting_details['e_voting_platform_website']; ?>" name="e_voting_platform_website" id="e_voting_platform_website_link" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">e-Voting Start</label>
										<div class="col-md-4">
											<?php
											if(isset($meeting_details['e_voting_start_date'])) {
												$e_voting_start_date = $meeting_details['e_voting_start_date'] == "0000-00-00" ? "" : date_format(date_create_from_format('Y-m-d', $meeting_details['e_voting_start_date']), 'd-M-Y');
											}
											else {
												$e_voting_start_date="";
											}
											?>
											<input type="text" name="e_voting_start_date" value="<?php echo $e_voting_start_date; ?>" class="form-control date-picker" placeholder="Select date" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">e-Voting End</label>
										<div class="col-md-4">
											<?php
											if(isset($meeting_details['e_voting_end_date'])) {
												$e_voting_end_date = $meeting_details['e_voting_end_date'] == "0000-00-00" ? "" : date_format(date_create_from_format('Y-m-d', $meeting_details['e_voting_end_date']), 'd-M-Y');
											}
											else {
												$e_voting_end_date="";
											}
											?>
											<input type="text" name="e_voting_end_date" value="<?php echo $e_voting_end_date; ?>"  class="form-control date-picker" placeholder="Select date" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Notice Link</label>
										<div class="col-md-4">
											<input type="text" name="notice_link" value="<?php echo $meeting_details['notice_link']; ?>"  class="form-control" placeholder="Provide notice link" />
										</div>
									</div>
									<div class="form-group" id="meeting_venue">
										<label class="col-md-3 control-label">Meeting Venue</label>
										<div class="col-md-4">
											<input type="text" name="meeting_venue" value="<?php echo $meeting_details['meeting_venue']; ?>" class="form-control" placeholder="Enter meeting venue" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Annual Report Name</label>
										<div class="col-md-4">
											<input type="text" name="annual_report_name" value="<?php echo $meeting_details['annual_report_name']; ?>" class="form-control" placeholder="Provide annual report name" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Annual Report Link</label>
										<div class="col-md-4">
											<input type="text" name="annual_report" value="<?php echo $meeting_details['annual_report']; ?>" class="form-control" placeholder="Provide annual report link" />
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" name="page_1_details" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/scripts/custom/sweet-alert.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="Scripts/custom.js"></script>
<script src="assets/scripts/core/app.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	App.init();
	<?php if($flag) {
	?>
		var info = ['<?php echo $response['report_id']; ?>','<?php echo $response['msg']; ?>'];
		object.initializePage1(true,info);
	<?php
	}
	else {
	?>
		var info = [];
		object.initializePage1(false,info);
	<?php
	}
	?>
});
</script>
</body>
</html>