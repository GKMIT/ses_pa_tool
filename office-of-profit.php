<?php
	session_start();
	include_once("Classes/databasereport.php");
	include_once("assets/database/Connect.php");
	include_once("assets/config/config.php");
	include_once("Classes/database.php");
	if(isset($_POST['office_of_profit'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addOfficeOfProfit($info);
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
				<li class="active">
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
						<li class="active">
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
						Office of Profit
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
								Office of Profit
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="#">
								<input type="hidden" id="main_section" name="main_section" value="Office of Profit">
								<input type="hidden" id="edit_mode" name="edit_mode" value="">
								<div class="form-body">
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
														While not opposed to the appointment of relatives of directors/ promoters in the Company, SES does believe that such appointments may lead to conflict of interest issues / allegations of nepotism. Therefore, SES expects the Company to institute independent processes for the selection of a relative of a director for holding office or place or profit in the Company to minimize such issues. SES will analyse the fairness and transparency of the proposed appointment and make its recommendation on a case-by-case basis.
													</p>
												</div>
											</div>
										</div>
									</div>
									<h4 class="form-section">Resolution</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Office of Profit" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter resolution text"></textarea>
										</div>
									</div>
									<h4 class="form-section">Profile of Appointee</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Office of Profit" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text"></textarea>
										</div>
									</div>
									<h4 class="form-section">Annual Remuneration</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Office of Profit" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text"><b>Annual Remuneration:</b></textarea>
										</div>
									</div>
									<h4 class="form-section">Selection Process</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Office of Profit" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text"></textarea>
										</div>
									</div>
									<h4 class="form-section">Suitability of candidate</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Office of Profit" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter text"><b>Suitability of candidate</b></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">General</h4>
									<div class="form-group">
										<label class="col-md-10">Has the remuneration payable been disclosed?</label>
										<div class="col-md-2">
											<select class="form-control recommendations-fire" name="triggers[]" id="has_the_remuneration_payable_been_disclosed">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no" data-recommendation-table-id="8">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="has_the_remuneration_payable_been_disclosed_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Office of Profit" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Was interested director part of the selection process?</label>
										<div class="col-md-2">
											<select class="form-control recommendations-fire" name="triggers[]" id="interested_director_part_of_the_selection_process">
												<option value="">Select</option>
												<option value="yes" data-recommendation-table-id="9">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="interested_director_part_of_the_selection_process_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Office of Profit" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Does the Company have an independent selection committee to oversee appointment of relatives of directors?</label>
										<div class="col-md-2">
											<select class="form-control recommendations-fire" name="triggers[]" id="company_have_an_independent_selection_committee">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no" data-recommendation-table-id="10">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_an_independent_selection_committee_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Office of Profit" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the remuneration payable to the person being appointed aligned with the remuneration of other employees in similar positions/ grade?</label>
										<div class="col-md-2">
											<select class="form-control recommendations-fire" name="triggers[]" id="is_the_remuneration_payable_to_the_person">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no" data-recommendation-table-id="11">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="is_the_remuneration_payable_to_the_person_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Office of Profit" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the process followed by the Company for selection of the relative disclosed?</label>
										<div class="col-md-2">
											<select class="form-control recommendations-fire" name="triggers[]" id="is_the_process_followed_by_the_company">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no" data-recommendation-table-id="12">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="is_the_process_followed_by_the_company_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Office of Profit" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn" id="btn_recommendation_text">Get Recommendation Text</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="recommendation_section[]" value="Office of Profit" />
											<textarea rows="6" name="recommendation_text[]" class="form-control" id="recommendation_text"></textarea>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-12">
										<button type="submit" name="office_of_profit" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script type="text/javascript" src="Scripts/office-of-profit.js"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	App.init();
	object.initialization();
	object.pageload();
});
</script>
</body>
</html>