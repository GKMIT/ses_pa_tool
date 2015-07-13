<?php
session_start();
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
	header("location:$_config[base_url]");
}
if(isset($_POST['declaration_of_divident'])) {
	$db=new DatabaseReports();
	$info = $_POST;
	$response=$db->saveDeclarationOfDividentInfo($info);
}
?>
<!DOCTYPE html>
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
						<li class="active">
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
						Declaration of Dividend
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
								Declaration of Dividend
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
							<form class="form-horizontal" role="form" method="post" action="declaration-of-dividend.php">
                                <input type="hidden" id="edit_mode" name="edit_mode" value="">
                                <input type="hidden" id="main_section" name="main_section" value="Declaration of Dividend">
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
                                                    SES is of the opinion that the option of paying dividend or conserving cash is a strategic decision, which is best taken by the Board of Directors of the Company, keeping in view the growth plans and long term goals of the Company.<br/>
                                                    SES is of the opinion that the Board is responsible for the future plans of the Company and therefore, is in the best position to decide the amount of profits to be retained for future use and the amount of profits to be distributed as dividend. Therefore, SES would normally recommend voting for the resolutions declaring dividend unless strong reasons are found. However, SES does expect companies to have consistent dividend payouts (based on a publicly disclosed policy, if any) and explain any deviations from the historical dividend pay-out policy to the shareholders.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><strong>Resolution</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="used_in[]" value="Resolution" />
                                        <input type="hidden" name="resolution_section[]" value="Declaration of Dividend" />
                                        <textarea rows="4" class="form-control other-text" name="used_in_text[]" placeholder="Enter the text of Resolution"></textarea>
                                    </div>
                                </div>
								<div class="form-body">
									<h4 class="form-section">TABLE 1</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th>
														Year
													</th>
													<th>
														Dividend
													</th>
													<th>
														EPS
													</th>
													<th>
														Dividend Pay-Out (%)
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="company-dividend-info table1">
													<th>
														<select class="form-control" id="divident_info_year_1" name="financial_year[]">
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
													</th>
													<th>
														<input type='text' class='form-control dividend' name="dividend[]"  >
													</th>
													<th>
														<input type='text' class='form-control eps' name="eps[]" />
													</th>
													<th>
														<input type='text' class='form-control payout' name="dividend_payout[]"  />
													</th>
												</tr>
												<tr class="company-dividend-info-2 table1">
													<th>
														<input type="text" class="form-control year" name="financial_year[]"  readonly/>
													</th>
													<th>
														<input type='text' class='form-control dividend' name="dividend[]"  />
													</th>
													<th>
														<input type='text' class='form-control eps' name="eps[]" />
													</th>
													<th>
														<input type='text' class='form-control payout' name="dividend_payout[]"  />
													</th>
												</tr>
												<tr class="company-dividend-info-3 table1">
													<th>
														<input type="text" class="form-control year" name="financial_year[]"  readonly/>
													</th>
													<th>
														<input type='text' class='form-control dividend' name="dividend[]" >
													</th>
													<th>
														<input type='text' class='form-control eps' name="eps[]"  />
													</th>
													<th>
														<input type='text' class='form-control payout' name="dividend_payout[]"  />
													</th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">TABLE 2</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th></th>
													<th>
														Year
													</th>
													<th>
														Dividend
													</th>
													<th>
														EPS
													</th>
													<th>
                                                        Dividend Pay-Out (%)
													</th>
												</tr>
											</thead>
											<?php
											$company_id=$_SESSION['company_id'];
											$db = new DatabaseReports();
											$response = $db->getCurrentReportCompanyDetails($_SESSION['report_id']);
											$company_bse_code = $response['company_bse_code'];
											$company_name = $response['company_name'];
											$peer_1_company_id = $response['peer_1_company_id'];
											$peer_2_company_id = $response['peer_2_company_id'];
											$peer_1_company_name = $response['peer_1_company_name'];
											$peer_2_company_name = $response['peer_2_company_name'];
											?>
											<tbody>
												<tr class="company-dividend-row table2">
													<td><input type="text" name="peer_company_name_table2[]" class="form-control" readonly value="<?php echo $company_name; ?>"/></td>
													<td>
														<select class="form-control dividend-years" name="financial_year_table2[]" data-company-id="<?php echo $company_id; ?>">
															<?php
															for($i=2012;$i<=2020;$i++) {
																echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td><input type='text' class='form-control dividend' name="dividend_table2[]"  ></td>
													<td><input type='text' class='form-control eps' name="eps_table2[]"></td>
													<td><input type='text' class='form-control payout' name="dividend_payout_table2[]"></td>
												</tr> 
												<tr class="company-dividend-row table2">
													<td><input type="text" name="peer_company_name_table2[]" class="form-control" readonly value="<?php echo $peer_1_company_name; ?>"/></td>
													<td>
														<select class="form-control dividend-years" name="financial_year_table2[]" data-company-id="<?php echo $peer_1_company_id; ?>">
															<?php
															for($i=2012;$i<=2020;$i++) {
																echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td><input type='text' class='form-control dividend'name="dividend_table2[]"></td>
													<td><input type='text' class='form-control eps'name="eps_table2[]"></td>
													<td><input type='text' class='form-control payout'name="dividend_payout_table2[]" ></td>
												</tr> 
												<tr class="company-dividend-row table2">
													<td><input type="text" name="peer_company_name_table2[]" readonly class="form-control" value="<?php echo $peer_2_company_name; ?>"/></td>
													<td>
														<select class="form-control dividend-years" name="financial_year_table2[]" data-company-id="<?php echo $peer_2_company_id; ?>">
															<?php
															for($i=2012;$i<=2020;$i++) {
																echo "<option value='$i'>$i</option>";
															}
															?>
														</select>
													</td>
													<td><input type='text' class='form-control dividend' name="dividend_table2[]"></td>
													<td><input type='text' class='form-control eps' name="eps_table2[]"></td>
													<td><input type='text' class='form-control payout' name="dividend_payout_table2[]" ></td>
												</tr> 
											</tbody>
										</table>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">General</h4>
									<div class="question-block" data-question-no="1">
										<div class="form-group">
											<label class="col-md-10">Are operating cash flows and the cash and cash equivalents sufficient to pay out dividend?</label>
											<div class="col-md-2">
												<select class="form-control quest triggers" name="triggers[]" data-trigger-value="no">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_hidden_block">
											<label class="col-md-10">Is it due to an explained event?</label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="18">Yes</option>
													<option value="no" data-table-id="19" data-recommendation-table-id="1">No</option>
												</select>
											</div>
										</div>
                                            <div class="form-group hidden quest_analysis_text">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
                                                    <textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
                                                </div>
                                            </div>
									</div>
									<div class="question-block" data-question-no="2">
										<div class="form-group">
											<label class="col-md-10">Is the Company increasing dividend despite operating losses and negative operational cash flows? </label>
											<div class="col-md-2">
												<select class="form-control quest triggers" name="triggers[]" data-trigger-value="yes">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_hidden_block">
											<label class="col-md-10">Are there any extraordinary net gains despite operating losses?</label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="20">Yes</option>
													<option value="no" data-table-id="21" data-recommendation-table-id="2">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
									<div class="question-block" data-question-no="3">
										<div class="form-group">
											<label class="col-md-10">Has the Company defaulted on servicing its debt obligations?</label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="22" data-recommendation-table-id="7">Yes</option>
													<option value="no" data-table-id="">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
									<div class="question-block" data-question-no="4">
										<div class="form-group">
											<label class="col-md-10">Is the current ratio of the Company less than 1?</label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="23" data-recommendation-table-id="3">Yes</option>
													<option value="no" data-table-id="">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
									<div class="question-block" data-question-no="5">
										<div class="form-group">
											<label class="col-md-10">Have short term funds been used for long term investments?</label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="24" data-recommendation-table-id="4">Yes</option>
													<option value="no" data-table-id="">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
									<div class="question-block" data-question-no="6">
										<div class="form-group">
											<label class="col-md-10">Is the rate of dividend recommended by the Board in case of loss in the last financial year is more than the average dividend rate in the previous three years? </label>
											<div class="col-md-2">
												<select class="form-control quest triggers" name="triggers[]" data-trigger-value="yes">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_hidden_block">
											<label class="col-md-10">Is the loss due to an extraordinary event? </label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="25">Yes</option>
													<option value="no" data-table-id="26" data-recommendation-table-id="5">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
									<div class="question-block" data-question-no="7">
										<div class="form-group">
											<label class="col-md-10">Has the Board recommended dividend rather than setting-off losses from its free reserves? </label>
											<div class="col-md-2">
												<select class="form-control quest_analysis_fire recommendations-fire triggers" name="triggers[]">
													<option value="" data-table-id="">Select</option>
													<option value="yes" data-table-id="27" data-recommendation-table-id="6">Yes</option>
													<option value="no" data-table-id="">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden quest_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Consistency of dividend payment</h4>
									<div class="form-group">
										<label class="col-md-10">Does the Company have a stated dividend pay-out policy including a proposed dividend pay-out ratio?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_have_stated_dividend_pay_out_policy">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_stated_dividend_pay_out_policy_hidden_a">
										<label class="col-md-10">Is the dividend paid consistent with the stated policy?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="dividend_paid_consistent_stated_policy">
												<option value="" data-table-id="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="dividend_paid_consistent_stated_policy_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_stated_dividend_pay_out_policy_hidden_b">
										<label class="col-md-10">Has the Company explained the deviation to the shareholders?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_explained_deviation_to_shareholders">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_explained_deviation_to_shareholders_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_stated_dividend_pay_out_policy_hidden_c">
										<label class="col-md-10">Has the dividend pay-out been consistent in the last 3 years? </label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="dividend_pay_out_been_consistent_last_3_years">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="dividend_pay_out_been_consistent_last_3_years_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_stated_dividend_pay_out_policy_hidden_d">
										<label class="col-md-10">Has the Company explained the deviation?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="has_the_Company_explained_the_deviation">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="has_the_Company_explained_the_deviation_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Capacity to pay the dividend</h4>
									<div class="form-group">
										<label class="col-md-10">Is the Company making losses but paying/increasing dividend?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_making_losses_but_paying_increasing_dividend">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_making_losses_but_paying_increasing_dividend_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Does the Company have high debt equity ratio + low debt coverage ratio but paying/increasing dividend?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_have_high_debt_equity_debt_coverage_ratio">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_high_debt_equity_debt_coverage_ratio_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Does the Company have sufficient cash flow from operations and/or sufficient cash and cash equivalents to pay the proposed dividends?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_have_sufficient_cash_flow_from_operations">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_have_sufficient_cash_flow_from_operations_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company defaulted on any of its debt obligations/ undergone restructuring and has still declared dividend?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_defaulted_on_any_of_its_debt_obligations">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_defaulted_on_any_of_its_debt_obligations_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the Company required to conserve resources to fund large upcoming capital expenditure?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_required_to_conserve_resources_to_fund">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_required_to_conserve_resources_to_fund_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Low Dividend</h4>
									<div class="form-group">
										<label class="col-md-10">Is the Company consistently making large profits and has large cash balance but its dividend pay-out ratio is consistently very low? </label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_consistently_making_large_profits">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_consistently_making_large_profits_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company decreased the dividend pay-out to an exceptionally low level (or eliminated dividend pay-out altogether) without sufficient explanation?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_decreased_the_dividend_pay_out">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_decreased_the_dividend_pay_out_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the growth in dividend been consistent with the growth in royalty payments and/or executive remuneration?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="has_the_growth_in_dividend_been_consistent">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="has_the_growth_in_dividend_been_consistent_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the dividend payout ratio consistently lower/higher than that of its peers?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="dividend_payout_ratio_consistently_lower">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="dividend_payout_ratio_consistently_lower_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Excessive dividend</h4>
									<div class="form-group">
										<label class="col-md-10">Are the dividend pay-outs consistently high relative to peers without any satisfactory explanation?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="dividend_pay_outs_consistently_high_relative_to_peers">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="dividend_pay_outs_consistently_high_relative_to_peers_hidden_block hidden">
										<div class="form-group">
											<label class="col-md-10">Is the promoter shareholding in the Company higher than that at peer companies?</label>
											<div class="col-md-2">
												<select class="form-control triggers" name="triggers[]" id="is_the_promoter_shareholding_in_the_company_higher">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden" id="is_the_promoter_shareholding_in_the_company_higher_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-10">Have the promoters pledged any of their shareholdings and are still receiving high dividend?</label>
											<div class="col-md-2">
												<select class="form-control triggers" name="triggers[]" id="promoters_pledged_any_of_their_shareholdings">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden" id="promoters_pledged_any_of_their_shareholdings_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-10">Is the Company consistently paying dividend out of reserves?</label>
											<div class="col-md-2">
												<select class="form-control triggers" name="triggers[]" id="company_consistently_paying_dividend_out">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden" id="company_consistently_paying_dividend_out_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-10">Is the Company making losses?</label>
											<div class="col-md-2">
												<select class="form-control triggers" name="triggers[]" id="is_the_Company_making_losses">
													<option value="">Select</option>
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
										</div>
										<div class="form-group hidden" id="is_the_Company_making_losses_analysis_text">
											<div class="col-md-12">
                                                <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
												<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
											</div>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company disclosed the reason for paying excess dividend in the current financial year?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_disclosed_the_reason_for_paying_excess_dividend">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_disclosed_the_reason_for_paying_excess_dividend_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Has the Company proposed to pay dividend on preference shares and not on ordinary equity shares however the Company has sufficient cash balance?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="company_proposed_to_pay_dividend_on_preference_shares">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="company_proposed_to_pay_dividend_on_preference_shares_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-10">Is the increase in dividend pay-out ratio more than 5%?</label>
										<div class="col-md-2">
											<select class="form-control triggers" name="triggers[]" id="is_the_increase_in_dividend">
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="form-group hidden" id="is_the_increase_in_dividend_analysis_text">
										<div class="col-md-12">
                                            <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
											<textarea rows="4" class="form-control analysis-text" name="analysis_text[]"></textarea>
										</div>
									</div>
								</div>
                                <h4 class="form-section">General Analysis</h4>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="analysis_section[]" value="Declaration of Dividend"/>
                                        <textarea class="form-control analysis-text" rows="4" name="analysis_text[]"></textarea>
                                    </div>
                                </div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn" id="btn_recommendation_text">Get Recommendation Text</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
                                            <input type="hidden" name="recommendation_section[]" value="Declaration of Dividend" />
											<textarea rows="6" class="form-control recommendation-text" id="recommendation_text" name="recommendation_text[]"></textarea>
										</div>
									</div>
								<div class="form-actions fluid">
									<div class="col-md-12">
										<button type="submit" name="declaration_of_divident" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
		 2015 &copy; SES.
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
<script type="text/javascript" src="Scripts/declaration-of-dividend.js"></script>
<script type="text/javascript" src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/ckeditor.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
	App.init();
	object.initialization();
	object.pageload();
});
</script>
</body>
</html>
