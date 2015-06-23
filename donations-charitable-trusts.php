<?php
	session_start();
	include_once("Classes/databasereport.php");
	include_once("assets/database/Connect.php");
	include_once("assets/config/config.php");
	include_once("Classes/database.php");
	if(isset($_POST['donations'])) {
    $db=new DatabaseReports();
    $info=$_POST;
    $response=$db->addDonationToCharitableTrust($info);
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
						<li class="active">
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
						Donations to Charitable Trusts
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
								Donations to Charitable Trusts
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box">
						<div class="portlet-body form">
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
												The Companies Act, 2013 mandates that at least 2% of the average net profits of the Company, made during the three immediately preceding financial years, should be used for corporate social responsibility (CSR) activities. Additionally, the Companies Act, 2013 also requires the Company to seek shareholders’ approval if the CSR spending exceeds 5% of the average net profits of the Company.
											</p>
											<p>
												SES strongly believes that every company should make sufficient contributions to the society through CSR spending. Such activities improve the society and the community that the Company operates in and benefit the company in the long run by providing a sustainable business environment to operate in and enhancing the Company’s long-term value through increased reputation, brand image and goodwill.
											</p>
											<p>
												However, since CSR contributions result in outflow of cash from the Company, excessive contributions may have a negative impact on shareholders’ value. SES recommends that the Board should calibrate its CSR spending by balancing impact on the society with the impact on shareholders’ value. Therefore, while evaluating proposals for increased CSR spending, SES will analyze the potential impact on shareholders’ value and make its recommendation on a case-by-case basis.
											</p>
										</div>
									</div>
								</div>
							</div>
							<form class="form-horizontal" role="form" method="post" action="donations-charitable-trusts.php">
								<input type="hidden" id="main_section" name="main_section" value="Donations to Charitable Trusts">
								<input type="hidden" id="edit_mode" name="edit_mode" value="">
								<div class="form-body">
									<h4 class="form-section">Resolution</h4>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Resolution" />
                                            <input type="hidden" name="resolution_section[]" value="Donations to Charitable Trusts" />
											<textarea rows="4" name="used_in_text[]" class="form-control" placeholder="Enter resolution text"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">CSR Contributions</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th>
														Year
													</th>
													<th>
														CSR
													</th>
													<th>
														CSR as % of Net Profit
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="find_tr">
													<td>
														<select name="year[]" class="form-control csr-contributions-year">
														<?php
														$year1 = date("Y");
														for($i=2012;$i<=2020;$i++) {
															if($year1==$i)
																echo "<option selected value='$i'>$i</option>";
															else
																echo "<option value='$i'>$i</option>";
														}
														?>
														</select>
													</td>
													<td>
														<input type='text' name="csr[]" class='form-control dividend csr' placeholder='Enter value in Rs. Crore' >
													</td>
													<td>
														<input type='text' name="csr_np[]" class='form-control eps csr_np' value='' />
													</td>
												</tr>
												<tr class="find_tr">
													<td>
														<select name="year[]" class="form-control csr-contributions-year">
															<?php
															$year1 = date("Y");
															for($i=2012;$i<=2020;$i++) {
																if($year1==$i)
																	echo "<option selected value='$i'>$i</option>";
																else
																	echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td>
														<input type='text' name="csr[]" class='form-control csr' placeholder="Enter value in Rs. Crore" >
													</td>
													<td>
														<input type='text' name="csr_np[]" class='form-control csr_np' value='' />
													</td>
												</tr>
												<tr class="find_tr">
													<td>
														<select name="year[]" class="form-control csr-contributions-year">
															<?php
															$year1 = date("Y");
															for($i=2012;$i<=2020;$i++) {
																if($year1==$i)
																	echo "<option selected value='$i'>$i</option>";
																else
																	echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td>
														<input type='text' name="csr[]" class='form-control csr' placeholder="Enter value in Rs. Crore" >
													</td>
													<td>
														<input type='text' name="csr_np[]" class='form-control csr_np' value='' />
													</td>
												</tr>
												<tr class="find_tr">
													<td>
														<select name="year[]" class="form-control csr-contributions-year">
															<?php
															$year1 = date("Y");
															for($i=2012;$i<=2020;$i++) {
																if($year1==$i)
																	echo "<option selected value='$i'>$i</option>";
																else
																	echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td>
														<input type='text' name="csr[]" class='form-control csr' placeholder="Enter value in Rs. Crore">
													</td>
													<td>
														<input type='text' name="csr_np[]" class='form-control csr_np' value='' />
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="used_in[]" value="Discussion on chart" />
                                            <input type="hidden" name="resolution_section[]" value="Donations to Charitable Trusts" />
											<textarea rows="4" class="form-control" name="used_in_text[]" placeholder="Discussion on chart"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Key Consideration</h4>
									<p style="font-size: 14px;"><strong>Financial position of the Company</strong></p>
									<div class="form-group">
										<label class="col-md-10">Is the Company making CSR contributions despite losses in the last three years?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="company_making_CSR_contributions_despite">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_making_CSR_contributions_despite_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the Company making CSR contributions despite decline in growth of profit in the last 3 years?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="company_making_CSR_contributions_despite_decline">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_making_CSR_contributions_despite_decline_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company spent more than 2% of the average net profits on CSR but the Company's borrowing increased in the last three years?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="company_spent_more_than_2_the_average_net_profits">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_spent_more_than_2_the_average_net_profits_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company spent more than 2% of the average net profits on CSR but not paid dividends to its shareholders in the last three years?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<p style="font-size: 14px;"><strong>Conflict of interest issues</strong></p>
									<div class="form-group">
										<label class="col-md-10">Has the Company disclosed the exact amount of contributions it plans to make and the proposed recipients of the said contributions?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="company_disclosed_the_exact_amount_of_contributions">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_disclosed_the_exact_amount_of_contributions_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is any director/KMP interested in the recipients of the said contributions?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="is_any_director_KMP_interested_in_the_recipients">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="is_any_director_KMP_interested_in_the_recipients_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the recipient entity part of the promoter group or promoter controlled?</label>
										<div class="col-md-2">
											<select class="form-control" name="triggers[]" id="is_the_recipient_entity_part_of_the_promoter">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												<option value="na">Not Applicable</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="is_the_recipient_entity_part_of_the_promoter_analysis_text">
										<div class="col-md-12">
											<input type="hidden" name="analysis_section[]" value="Donations to Charitable Trusts" />
											<textarea name="analysis_text[]" class="form-control" rows="4"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="recommendation_section[]" value="Donations to Charitable Trusts" />
											<textarea rows="6" name="recommendation_text[]" class="form-control" id="recommendation_text" placeholder="Add Recommendation"></textarea>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-12">
										<button type="submit" name="donations" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script type="text/javascript" src="Scripts/loader-plugin.js"></script>
<script type="text/javascript" src="Scripts/donation-charitable-trusts.js"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
	App.init();
	object.pageload();
	object.initialization();
});
</script>
</body>
</html>