<?php
session_start();
include_once("assets/config/config.php");
include_once("Classes/databasereport.php");
include_once("assets/functions.php");
$flag = false;
$response = array();
if(isset($_POST['page_3_details'])) {
	$db = new DatabaseReports();
	$info = $_POST;
	$response = $db->saveCompanyBackgroundDetails($info);
	if($response['status']==200) {
		$flag = true;
		echo "Saved";
	}
}

if(isset($_SESSION['report_id'])) {
	$db = new DatabaseReports();
	$report_id = $_SESSION['report_id'];
	$table_name="pa_report_market_data";
	if($db->isReportDataExists($report_id,$table_name)) {
		$report_data_exists = true;
		$generic_details = $db->getCompanyBackgroundData($report_id);
		$market_data =$generic_details['market_data'];
		$financial_indicators =$generic_details['financial_indicators'];
		$peer_comparision =$generic_details['peer_comparision'];
		$public_share_holders =$generic_details['public_share_holders'];
		$major_promoters =$generic_details['major_promoters'];
		$share_holding_pattern =$generic_details['share_holding_pattern'];
	}
}
?>
<!DOCTYPE html>
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
				<li class="active">
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
						Company Background
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
								Company Background
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" action="company-background.php" method="post">
								<?php
								if($report_data_exists) {
									echo "<input type='hidden' name='report_data_exists' />";
								}
								?>
								<div class="form-body">
									<h4 class="form-section">Table 2 - MARKET DATA</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
											<tr>
												<th>
													Price (<i class="fa fa-rupee"></i>)
												</th>
												<th>
													Market Capitalization (<i class="fa fa-rupee"></i> Cr.)
												</th>
												<th>
													Shares
												</th>
												<th>
													PE Ratio
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<th>
													<input class='form-control' name="price" value="<?php echo $market_data['price']; ?>" />
												</th>
												<th>
													<input class='form-control' name="market_capitalization" value="<?php echo $market_data['market_capitalization']; ?>"/>
												</th>
												<th>
													<input class='form-control' name="shares" value="<?php echo $market_data['shares']; ?>"/>
												</th>
												<th>
													<input class='form-control' name="pe_ratio" value="<?php echo $market_data['pe_ratio']; ?>"/>
													<input type="hidden" class='form-control' id="market_data_eps" name="" value=""/>

												</th>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								<?php
								if(!$report_data_exists) {
									$dom = new domDocument;
									$db = new DatabaseReports();
									$response = $db->getCurrentReportCompanyDetails($_SESSION['report_id']);
									$company_bse_code = $response['company_bse_code'];
									$peer_1_bse_code = $response['peer_1_bse_code'];
									$peer_2_bse_code = $response['peer_2_bse_code'];
									echo "<input type='hidden' id='company_bse_code' value='$company_bse_code' />";
									$link = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=$company_bse_code&expandable=0";
									@$dom->loadHTML(file_get_contents($link));
									$dom->preserveWhiteSpace = false;
									$tables = $dom->getElementById('acr');
									$years_row = $tables->getElementsByTagName('tr')->item(1);
									$array_years = array(
										$years_row->getElementsByTagName('td')->item(1)->nodeValue,
										$years_row->getElementsByTagName('td')->item(2)->nodeValue,
										$years_row->getElementsByTagName('td')->item(3)->nodeValue,
									);
									$rev = $tables->getElementsByTagName('tr')->item(3);
									$revenue = array();
									for ($i = 1; $i <= 3; $i++) {
										$revenue[] = $rev->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$other = $tables->getElementsByTagName('tr')->item(4);
									$other_income = array();
									for ($i = 1; $i <= 3; $i++) {
										$other_income[] = $other->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$total = $tables->getElementsByTagName('tr')->item(5);
									$total_income = array();
									for ($i = 1; $i <= 3; $i++) {
										$total_income[] = $total->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$pb = $tables->getElementsByTagName('tr')->item(8);
									$pbdt = array();
									for ($i = 1; $i <= 3; $i++) {
										$pbdt[] = $pb->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$net = $tables->getElementsByTagName('tr')->item(12);
									$net_profit = array();
									for ($i = 1; $i <= 3; $i++) {
										$net_profit[] = $net->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$ep = $tables->getElementsByTagName('tr')->item(14);
									$eps = array();
									for ($i = 1; $i <= 3; $i++) {
										$eps[] = $ep->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$op = $tables->getElementsByTagName('tr')->item(16);
									$opm = array();
									for ($i = 1; $i <= 3; $i++) {
										$opm[] = $op->getElementsByTagName('td')->item($i)->nodeValue;
									}
									$np = $tables->getElementsByTagName('tr')->item(17);
									$npm = array();
									for ($i = 1; $i <= 3; $i++) {
										$npm[] = $np->getElementsByTagName('td')->item($i)->nodeValue;
									}
									?>
									<div class="form-body">
										<h4 class="form-section">TABLE 3: FINANCIAL INDICATORS (STANDALONE)</h4>

										<div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead>
												<tr>
													<th>
														In <i class="fa fa-rupee"></i> Crores
													</th>
													<th style="position:relative;">
														<input class="form-control" name="financial_indicators_year[]" value="<?php echo $array_years[0]; ?>"/>
													</th>
													<th>
														<input class="form-control"
															   name="financial_indicators_year[]"
															   value="<?php echo $array_years[1]; ?>"/>
													</th>
													<th>
														<input class="form-control"
															   name="financial_indicators_year[]"
															   value="<?php echo $array_years[2]; ?>"/>
													</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>Revenue</td>
													<td><input name='financial_indicators_revenue[]' type='text'
															   class='form-control'
															   value='<?php echo $revenue[0]; ?>'/></td>
													<td><input type='text' name='financial_indicators_revenue[]'
															   class='form-control'
															   value='<?php echo $revenue[1]; ?>'/></td>
													<td><input type='text' name='financial_indicators_revenue[]'
															   class='form-control'
															   value='<?php echo $revenue[2]; ?>'/></td>
												</tr>
												<tr>
													<td>Other Income</td>
													<td><input type='text'
															   name='financial_indicators_other_income[]'
															   class='form-control'
															   value='<?php echo $other_income[0]; ?>'/></td>
													<td><input type='text'
															   name='financial_indicators_other_income[]'
															   class='form-control'
															   value='<?php echo $other_income[1]; ?>'/></td>
													<td><input type='text'
															   name='financial_indicators_other_income[]'
															   class='form-control'
															   value='<?php echo $other_income[2]; ?>'/></td>
												</tr>
												<tr>
													<td>Total Income</td>
													<td><input type='text'
															   name='financial_indicators_total_income[]'
															   class='form-control'
															   value='<?php echo $total_income[0]; ?>'/></td>
													<td><input type='text'
															   name='financial_indicators_total_income[]'
															   class='form-control'
															   value='<?php echo $total_income[1]; ?>'/></td>
													<td><input type='text'
															   name='financial_indicators_total_income[]'
															   class='form-control'
															   value='<?php echo $total_income[2]; ?>'/></td>
												</tr>
												<tr>
													<td>PBDT</td>
													<td><input type='text' name='financial_indicators_pbdt[]'
															   class='form-control'
															   value='<?php echo $pbdt[0]; ?>'/></td>
													<td><input type='text' name='financial_indicators_pbdt[]'
															   class='form-control'
															   value='<?php echo $pbdt[1]; ?>'/></td>
													<td><input type='text' name='financial_indicators_pbdt[]'
															   class='form-control'
															   value='<?php echo $pbdt[2]; ?>'/></td>
												</tr>
												<tr>
													<td>Net Profit</td>
													<td><input type='text' name='financial_indicators_net_profit[]'
															   class='form-control'
															   value='<?php echo $net_profit[0]; ?>'/></td>
													<td><input type='text' name='financial_indicators_net_profit[]'
															   class='form-control'
															   value='<?php echo $net_profit[1]; ?>'/></td>
													<td><input type='text' name='financial_indicators_net_profit[]'
															   class='form-control'
															   value='<?php echo $net_profit[2]; ?>'/></td>
												</tr>
												<tr>
													<td>EPS&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name='financial_indicators_eps[]'
															   class='form-control eps-1'
															   value='<?php echo $eps[0]; ?>'/></td>
													<td><input type='text' name='financial_indicators_eps[]'
															   class='form-control eps-2'
															   value='<?php echo $eps[1]; ?>'/></td>
													<td><input type='text' name='financial_indicators_eps[]'
															   class='form-control eps-3'
															   value='<?php echo $eps[2]; ?>'/></td>
												</tr>
												<tr>
													<td>Dividend / Share&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text'
															   name='financial_indicators_dividend_per_share[]'
															   class='form-control dividend-per-share'
															   data-dividend-no='1'
															   placeholder='Enter Dividend / Share'/></td>
													<td><input type='text'
															   name='financial_indicators_dividend_per_share[]'
															   class='form-control dividend-per-share'
															   data-dividend-no='2'
															   placeholder='Enter Dividend / Share'/></td>
													<td><input type='text'
															   name='financial_indicators_dividend_per_share[]'
															   class='form-control dividend-per-share'
															   data-dividend-no='3'
															   placeholder='Enter Dividend / Share'></td>
												</tr>
												<tr>
													<td>Dividend Pay-Out (%)</td>
													<td><input type='text'
															   name='financial_indicators_dividend_pay_out[]'
															   class='form-control dividend-pay-1'/></td>
													<td><input type='text'
															   name='financial_indicators_dividend_pay_out[]'
															   class='form-control dividend-pay-2'/></td>
													<td><input type='text'
															   name='financial_indicators_dividend_pay_out[]'
															   class='form-control dividend-pay-3'/></td>
												</tr>
												<tr>
													<td>OPM (%)</td>
													<td><input type='text' name='financial_indicators_opm[]'
															   class='form-control' value='<?php echo $opm[0]; ?>'/>
													</td>
													<td><input type='text' name='financial_indicators_opm[]'
															   class='form-control' value='<?php echo $opm[1]; ?>'/>
													</td>
													<td><input type='text' name='financial_indicators_opm[]'
															   class='form-control' value='<?php echo $opm[2]; ?>'/>
													</td>
												</tr>
												<tr>
													<td>NPM (%)</td>
													<td><input type='text' name='financial_indicators_npm[]'
															   class='form-control' value='<?php echo $npm[0]; ?>'/>
													</td>
													<td><input type='text' name='financial_indicators_npm[]'
															   class='form-control' value='<?php echo $npm[1]; ?>'/>
													</td>
													<td><input type='text' name='financial_indicators_npm[]'
															   class='form-control' value='<?php echo $npm[2]; ?>'/>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								<?php
								}
								else {
									?>
									<div class="form-body">
										<h4 class="form-section">TABLE 3: FINANCIAL INDICATORS (STANDALONE)</h4>
										<div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead>
												<tr><th>In <i class="fa fa-rupee"></i> Crores</th>
													<th style="position:relative;"><input class="form-control" name="financial_indicators_year[]" value="<?php echo $financial_indicators[0]['financial_year']; ?>"/></th>
													<th><input class="form-control" name="financial_indicators_year[]" value="<?php echo $financial_indicators[1]['financial_year']; ?>"/></th>
													<th><input class="form-control" name="financial_indicators_year[]" value="<?php echo $financial_indicators[2]['financial_year']; ?>"/></th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>Revenue</td>
													<td><input name='financial_indicators_revenue[]' type='text' class='form-control' value='<?php echo $financial_indicators[0]['revenue']; ?>'/></td>
													<td><input type='text' name='financial_indicators_revenue[]' class='form-control' value='<?php echo $financial_indicators[1]['revenue']; ?>'/></td>
													<td><input type='text' name='financial_indicators_revenue[]' class='form-control' value='<?php echo $financial_indicators[2]['revenue']; ?>'/></td>
												</tr>
												<tr>
													<td>Other Income</td>
													<td><input type='text' name='financial_indicators_other_income[]' class='form-control' value='<?php echo $financial_indicators[0]['other_income']; ?>'/></td>
													<td><input type='text' name='financial_indicators_other_income[]' class='form-control' value='<?php echo $financial_indicators[1]['other_income'];; ?>'/></td>
													<td><input type='text' name='financial_indicators_other_income[]' class='form-control' value='<?php echo $financial_indicators[2]['other_income'];; ?>'/></td>
												</tr>
												<tr>
													<td>Total Income</td>
													<td><input type='text' name='financial_indicators_total_income[]' class='form-control' value='<?php echo $financial_indicators[0]['total_income']; ?>'/></td>
													<td><input type='text' name='financial_indicators_total_income[]' class='form-control' value='<?php echo $financial_indicators[1]['total_income']; ?>'/></td>
													<td><input type='text' name='financial_indicators_total_income[]' class='form-control' value='<?php echo $financial_indicators[2]['total_income']; ?>'/></td>
												</tr>
												<tr>
													<td>PBDT</td>
													<td><input type='text' name='financial_indicators_pbdt[]' class='form-control' value='<?php echo $financial_indicators[0]['pbdt']; ?>'/></td>
													<td><input type='text' name='financial_indicators_pbdt[]' class='form-control' value='<?php echo $financial_indicators[1]['pbdt']; ?>'/></td>
													<td><input type='text' name='financial_indicators_pbdt[]' class='form-control' value='<?php echo $financial_indicators[2]['pbdt']; ?>'/></td>
												</tr>
												<tr>
													<td>Net Profit</td>
													<td><input type='text' name='financial_indicators_net_profit[]' class='form-control' value='<?php echo $financial_indicators[0]['net_profit']; ?>'/></td>
													<td><input type='text' name='financial_indicators_net_profit[]' class='form-control' value='<?php echo $financial_indicators[1]['net_profit']; ?>'/></td>
													<td><input type='text' name='financial_indicators_net_profit[]' class='form-control' value='<?php echo $financial_indicators[2]['net_profit']; ?>'/></td>
												</tr>
												<tr>
													<td>EPS&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name='financial_indicators_eps[]' class='form-control eps-1' value='<?php echo $financial_indicators[0]['eps']; ?>'/></td>
													<td><input type='text' name='financial_indicators_eps[]' class='form-control eps-2' value='<?php echo $financial_indicators[1]['eps']; ?>'/></td>
													<td><input type='text' name='financial_indicators_eps[]' class='form-control eps-3' value='<?php echo $financial_indicators[2]['eps']; ?>'/></td>
												</tr>
												<tr>
													<td>Dividend / Share&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name='financial_indicators_dividend_per_share[]' value='<?php echo $financial_indicators[0]['dividend_per_share']; ?>' class='form-control dividend-per-share' data-dividend-no='1' placeholder='Enter Dividend / Share'/></td>
													<td><input type='text' name='financial_indicators_dividend_per_share[]' value='<?php echo $financial_indicators[1]['dividend_per_share']; ?>' class='form-control dividend-per-share' data-dividend-no='2' placeholder='Enter Dividend / Share'/></td>
													<td><input type='text' name='financial_indicators_dividend_per_share[]' value='<?php echo $financial_indicators[2]['dividend_per_share']; ?>' class='form-control dividend-per-share' data-dividend-no='3' placeholder='Enter Dividend / Share'></td>
												</tr>
												<tr>
													<td>Dividend Pay-Out (%)</td>
													<td><input type='text' name='financial_indicators_dividend_pay_out[]' value='<?php echo $financial_indicators[0]['dividend_pay_out']; ?>' class='form-control dividend-pay-1'/></td>
													<td><input type='text' name='financial_indicators_dividend_pay_out[]' value='<?php echo $financial_indicators[1]['dividend_pay_out']; ?>' class='form-control dividend-pay-2'/></td>
													<td><input type='text' name='financial_indicators_dividend_pay_out[]' value='<?php echo $financial_indicators[2]['dividend_pay_out']; ?>' class='form-control dividend-pay-3'/></td>
												</tr>
												<tr>
													<td>OPM (%)</td>
													<td><input type='text' name='financial_indicators_opm[]' class='form-control' value='<?php echo $financial_indicators[0]['opm']; ?>'/></td>
													<td><input type='text' name='financial_indicators_opm[]' class='form-control' value='<?php echo $financial_indicators[0]['opm']; ?>'/></td>
													<td><input type='text' name='financial_indicators_opm[]' class='form-control' value='<?php echo $financial_indicators[0]['opm']; ?>'/></td>
												</tr>
												<tr>
													<td>NPM (%)</td>
													<td><input type='text' name='financial_indicators_npm[]' class='form-control' value='<?php echo $financial_indicators[0]['npm']; ?>'/></td>
													<td><input type='text' name='financial_indicators_npm[]' class='form-control' value='<?php echo $financial_indicators[0]['npm']; ?>'/></td>
													<td><input type='text' name='financial_indicators_npm[]' class='form-control' value='<?php echo $financial_indicators[0]['npm']; ?>'/>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								<?php
								}
								?>
								<?php
								if(!$report_data_exists) {
									$dom1 = new domDocument;
									$dom2 = new domDocument;
									$link1 = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=$peer_1_bse_code&expandable=0";
									$link2 = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=$peer_2_bse_code&expandable=0";
									@$dom1->loadHTML(file_get_contents($link1));
									@$dom2->loadHTML(file_get_contents($link2));
									$dom1->preserveWhiteSpace = false;
									$dom2->preserveWhiteSpace = false;

									$tables1 = $dom1->getElementById('acr');
									$years_row = $tables1->getElementsByTagName('tr')->item(1);
									$year1 = $years_row->getElementsByTagName('td')->item(1)->nodeValue;


									$rev1 = $tables1->getElementsByTagName('tr')->item(3);
									$revenue1 = $rev1->getElementsByTagName('td')->item(1)->nodeValue;

									$tables2 = $dom2->getElementById('acr');

									$years_row = $tables2->getElementsByTagName('tr')->item(1);
									$year2 = $years_row->getElementsByTagName('td')->item(1)->nodeValue;

									$rev2 = $tables2->getElementsByTagName('tr')->item(3);
									$revenue2 = $rev2->getElementsByTagName('td')->item(1)->nodeValue;

									$other1 = $tables1->getElementsByTagName('tr')->item(4);
									$other_income1 = $other1->getElementsByTagName('td')->item(1)->nodeValue;
									$other2 = $tables2->getElementsByTagName('tr')->item(4);
									$other_income2 = $other2->getElementsByTagName('td')->item(1)->nodeValue;

									$total1 = $tables1->getElementsByTagName('tr')->item(5);
									$total_income1 = $total1->getElementsByTagName('td')->item(1)->nodeValue;
									$total2 = $tables2->getElementsByTagName('tr')->item(5);
									$total_income2 = $total2->getElementsByTagName('td')->item(1)->nodeValue;

									$pb1 = $tables1->getElementsByTagName('tr')->item(8);
									$pbdt1 = $pb1->getElementsByTagName('td')->item(1)->nodeValue;
									$pb2 = $tables2->getElementsByTagName('tr')->item(8);
									$pbdt2 = $pb2->getElementsByTagName('td')->item(1)->nodeValue;

									$net1 = $tables1->getElementsByTagName('tr')->item(12);
									$net_profit1 = $net1->getElementsByTagName('td')->item(1)->nodeValue;
									$net2 = $tables2->getElementsByTagName('tr')->item(12);
									$net_profit2 = $net2->getElementsByTagName('td')->item(1)->nodeValue;

									$ep1 = $tables1->getElementsByTagName('tr')->item(14);
									$eps1 = $ep1->getElementsByTagName('td')->item(1)->nodeValue;
									$ep2 = $tables2->getElementsByTagName('tr')->item(14);
									$eps2 = $ep2->getElementsByTagName('td')->item(1)->nodeValue;

									$pay_out1 = ($peer1_dividend * 1.1623) / $eps1;
									$pay_out2 = ($peer2_dividend * 1.1623) / $eps2;

									$op1 = $tables1->getElementsByTagName('tr')->item(16);
									$opm1 = $op1->getElementsByTagName('td')->item(1)->nodeValue;
									$op2 = $tables2->getElementsByTagName('tr')->item(16);
									$opm2 = $op2->getElementsByTagName('td')->item(1)->nodeValue;

									$np1 = $tables1->getElementsByTagName('tr')->item(17);
									$npm1 = $np1->getElementsByTagName('td')->item(1)->nodeValue;
									$np2 = $tables2->getElementsByTagName('tr')->item(17);
									$npm2 = $np2->getElementsByTagName('td')->item(1)->nodeValue;

									?>
									<div class="form-body">
										<h4 class="form-section">TABLE 4: PEER COMPARISION</h4>

										<div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead>
												<tr>
													<td>&nbsp;</td>
													<td><input class="form-control" name="peer_comparision_year[]"
															   placeholder="Enter year" readonly
															   value="<?php echo $year1; ?>"/></td>
													<td><input class="form-control" name="peer_comparision_year[]"
															   placeholder="Enter year" readonly
															   value="<?php echo $year2; ?>"/></td>
												</tr>
												</thead>
												<thead>
												<tr>
													<th>
														In <i class="fa fa-rupee"></i> Crores
													</th>
													<th>
														<input type='text' readonly class='form-control'
															   value="<?php echo $response['peer_1_company_name']; ?>">
														<input type='hidden' name="peer_comparision_company_id[]"
															   class='form-control'
															   value="<?php echo $response['peer_1_company_id']; ?>">
													</th>
													<th>
														<input type='text' readonly class='form-control'
															   value="<?php echo $response['peer_2_company_name']; ?>">
														<input type='hidden' name="peer_comparision_company_id[]"
															   class='form-control'
															   value="<?php echo $response['peer_2_company_id']; ?>">
													</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>Revenue</td>
													<td><input type='text' name="peer_comparision_revenue[]"
															   class='form-control'
															   value='<?php echo $revenue1; ?>'/></td>
													<td><input type='text' name="peer_comparision_revenue[]"
															   class='form-control'
															   value='<?php echo $revenue2; ?>'/></td>
												</tr>
												<tr>
													<td>Other Income</td>
													<td><input type='text' name="peer_comparision_other_income[]"
															   class='form-control'
															   value='<?php echo $other_income1; ?>'/></td>
													<td><input type='text' name="peer_comparision_other_income[]"
															   class='form-control'
															   value='<?php echo $other_income2; ?>'/></td>
												</tr>

												<tr>
													<td>Total Income</td>
													<td><input type='text' name="peer_comparision_total_income[]"
															   class='form-control'
															   value='<?php echo $total_income1; ?>'/></td>
													<td><input type='text' name="peer_comparision_total_income[]"
															   class='form-control'
															   value='<?php echo $total_income2; ?>'/></td>
												</tr>
												<tr>
													<td>PBDT</td>
													<td><input type='text' name="peer_comparision_pbdt[]"
															   class='form-control' value='<?php echo $pbdt1; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_pbdt[]"
															   class='form-control' value='<?php echo $pbdt2; ?>'/>
													</td>
												</tr>
												<tr>
													<td>Net Profit</td>
													<td><input type='text' name="peer_comparision_net_profit[]"
															   class='form-control'
															   value='<?php echo $net_profit1; ?>'/></td>
													<td><input type='text' name="peer_comparision_net_profit[]"
															   class='form-control'
															   value='<?php echo $net_profit2; ?>'/></td>
												</tr>
												<tr>
													<td>EPS&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name="peer_comparision_eps[]"
															   class='form-control eps-4'
															   value='<?php echo $eps1; ?>'/></td>
													<td><input type='text' name="peer_comparision_eps[]"
															   class='form-control eps-5'
															   value='<?php echo $eps2; ?>'/></td>
												</tr>
												<tr>
													<td>Dividend / Share&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text'
															   name="peer_comparision_dividend_per_share[]"
															   class='form-control dividend-per-share'
															   data-dividend-no="4"
															   placeholder="Enter Dividend / Share"/></td>
													<td><input type='text'
															   name="peer_comparision_dividend_per_share[]"
															   class='form-control dividend-per-share'
															   data-dividend-no="5"
															   placeholder="Enter Dividend / Share"/></td>
												</tr>
												<tr>
													<td>Dividend Pay-Out (%)</td>
													<td><input type='text'
															   name="peer_comparision_dividend_pay_out[]"
															   class='form-control dividend-pay-4'/></td>
													<td><input type='text'
															   name="peer_comparision_dividend_pay_out[]"
															   class='form-control dividend-pay-5'/></td>
												</tr>
												<tr>
													<td>OPM %</td>
													<td><input type='text' name="peer_comparision_opm[]"
															   class='form-control' value='<?php echo $opm1; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_opm[]"
															   class='form-control' value='<?php echo $opm2; ?>'/>
													</td>
												</tr>
												<tr>
													<td>NPM %</td>
													<td><input type='text' name="peer_comparision_npm[]"
															   class='form-control' value='<?php echo $npm1; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_npm[]"
															   class='form-control' value='<?php echo $npm2; ?>'/>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								<?php
								}
								else {
                                    echo "comming into saved";
								?>
									<div class="form-body">
										<h4 class="form-section">TABLE 4: PEER COMPARISION</h4>

										<div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead>
												<tr>
													<td>&nbsp;</td>
													<td><input class="form-control" name="peer_comparision_year[]" placeholder="Enter year" readonly value="<?php echo $peer_comparision[0]['financial_year']; ?>"/></td>
													<td><input class="form-control" name="peer_comparision_year[]" placeholder="Enter year" readonly value="<?php echo $peer_comparision[1]['financial_year']; ?>"/></td>
												</tr>
												</thead>
												<thead>
												<tr>
													<th>In <i class="fa fa-rupee"></i> Crores</th>
													<th><input type='text' readonly class='form-control' value="<?php echo $peer_comparision[0]['name']; ?>">
														<input type='hidden' name="peer_comparision_company_id[]" class='form-control' value="<?php echo $peer_comparision[0]['name']; ?>">
													</th>
													<th><input type='text' readonly class='form-control' value="<?php echo $peer_comparision[1]['name']; ?>">
														<input type='hidden' name="peer_comparision_company_id[]" class='form-control' value="<?php echo $peer_comparision[1]['name']; ?>">
													</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>Revenue</td>
													<td><input type='text' name="peer_comparision_revenue[]" class='form-control' value='<?php echo $peer_comparision[0]['revenue']; ?>'/></td>
													<td><input type='text' name="peer_comparision_revenue[]" class='form-control' value='<?php echo $peer_comparision[1]['revenue']; ?>'/></td>
												</tr>
												<tr>
													<td>Other Income</td>
													<td><input type='text' name="peer_comparision_other_income[]" class='form-control' value='<?php echo $peer_comparision[0]['other_income']; ?>'/></td>
													<td><input type='text' name="peer_comparision_other_income[]" class='form-control' value='<?php echo $peer_comparision[1]['other_income']; ?>'/></td>
												</tr>

												<tr>
													<td>Total Income</td>
													<td><input type='text' name="peer_comparision_total_income[]" class='form-control' value='<?php echo $peer_comparision[0]['total_income']; ?>'/></td>
													<td><input type='text' name="peer_comparision_total_income[]" class='form-control' value='<?php echo $peer_comparision[1]['total_income']; ?>'/></td>
												</tr>
												<tr>
													<td>PBDT</td>
													<td><input type='text' name="peer_comparision_pbdt[]" class='form-control' value='<?php echo $peer_comparision[0]['pbdt']; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_pbdt[]" class='form-control' value='<?php echo $peer_comparision[1]['pbdt']; ?>'/>
													</td>
												</tr>
												<tr>
													<td>Net Profit</td>
													<td><input type='text' name="peer_comparision_net_profit[]" class='form-control' value='<?php echo $peer_comparision[0]['net_profit']; ?>'/></td>
													<td><input type='text' name="peer_comparision_net_profit[]" class='form-control' value='<?php echo $peer_comparision[1]['net_profit']; ?>'/></td>
												</tr>
												<tr>
													<td>EPS&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name="peer_comparision_eps[]" class='form-control eps-4' value='<?php echo $peer_comparision[0]['eps']; ?>'/></td>
													<td><input type='text' name="peer_comparision_eps[]" class='form-control eps-5' value='<?php echo $peer_comparision[1]['eps']; ?>'/></td>
												</tr>
												<tr>
													<td>Dividend / Share&nbsp;(<i class="fa fa-rupee"></i>)</td>
													<td><input type='text' name="peer_comparision_dividend_per_share[]" value='<?php echo $peer_comparision[0]['dividend_per_share']; ?>' class='form-control dividend-per-share' data-dividend-no="4" placeholder="Enter Dividend / Share"/></td>
													<td><input type='text' name="peer_comparision_dividend_per_share[]" value='<?php echo $peer_comparision[1]['dividend_per_share']; ?>' class='form-control dividend-per-share' data-dividend-no="5" placeholder="Enter Dividend / Share"/></td>
												</tr>
												<tr>
													<td>Dividend Pay-Out (%)</td>
													<td><input type='text' name="peer_comparision_dividend_pay_out[]" value='<?php echo $peer_comparision[0]['dividend_pay_out']; ?>' class='form-control dividend-pay-4'/></td>
													<td><input type='text' name="peer_comparision_dividend_pay_out[]" value='<?php echo $peer_comparision[1]['dividend_pay_out']; ?>' class='form-control dividend-pay-5'/></td>
												</tr>
												<tr>
													<td>OPM %</td>
													<td><input type='text' name="peer_comparision_opm[]" class='form-control' value='<?php echo $peer_comparision[0]['opm']; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_opm[]" class='form-control' value='<?php echo $peer_comparision[1]['opm']; ?>'/>
													</td>
												</tr>
												<tr>
													<td>NPM %</td>
													<td><input type='text' name="peer_comparision_npm[]" class='form-control' value='<?php echo $peer_comparision[0]['npm']; ?>'/>
													</td>
													<td><input type='text' name="peer_comparision_npm[]" class='form-control' value='<?php echo $peer_comparision[1]['npm']; ?>'/>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								<?php
								}
								?>
								<div class="form-body">
									<h4 class="form-section">TABLE 5: TOP PUBLIC SHAREHOLDERS</h4>
									<?php if(!$report_data_exists) {
										?>
										<div class="form-group">
											<label class="col-md-1">Month</label>
											<div class="col-md-2">
												<select class="form-control" id="month_bse_fething" name="public_shareholder_month">
													<option value="">-select month-</option>
													<option value="0">March</option>
													<option value="1">June</option>
													<option value="2">September</option>
													<option value="3">December</option>
												</select>
											</div>
											<label class="col-md-1">Year</label>

											<div class="col-md-2">
												<select class="form-control" id="year_bse_fething"
														name="public_shareholder_year">
													<option value="">-select year-</option>
													<?php
													for ($i = 2010; $i <= 2030; $i++) {
														echo "<option value='$i'>$i</option>";
													}
													?>
												</select>
											</div>
											<div class="col-md-2">
												<button id="btn_populate_share_holders" class="btn green" type="button"
														style="width:100%;">Get Data
												</button>
											</div>
										</div>
									<?php
									}
									?>
									<div class="table-responsive">
										<table class="table table-striped table-hover" id="top_public_shareholders">
											<?php
											if($report_data_exists) {
												echo "<input type='hidden' name='public_shareholder_month' value='".$public_share_holders[0]['holder_month']."'/>";
												echo "<input type='hidden' name='public_shareholder_year' value='".$public_share_holders[0]['financial_year']."'/>";
												foreach($public_share_holders as $share_holder) {
													?>
													<tr>
														<td><input type="text" name="share_holder_name[]" class="form-control" value="<?php echo $share_holder['share_holder_name']; ?>"></td>
														<td><input type="text" name="share_holding[]" class="form-control" value="<?php echo $share_holder['share_holding']; ?>"></td>
													</tr>
												<?php
												}
											}
											?>
										</table>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">TABLE 6: MAJOR PROMOTERS</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover" id="major_promoters">
											<?php
											if($report_data_exists) {
												foreach($major_promoters as $promoter) {
													?>
													<tr>
														<td><input type="text" name="major_promoter_name[]" class="form-control" value="<?php echo $promoter['major_promoter_name']; ?>"></td>
														<td><input type="text" name="major_promoter_share_holding[]" class="form-control" value="<?php echo $promoter['share_holding']; ?>"></td>
													</tr>
												<?php
												}
											}
											?>
										</table>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">TABLE 7: SHAREHOLDING PATTERNS</h4>
									<div class="table-responsive">
										<table class="table table-striped table-hover" id="share_holding_patters">
											<?php
											if($report_data_exists) {
											?>
											<tbody>
												<tr>
													<td></td>
													<td><b><?php echo $share_holding_pattern[0]['financial_year']; ?></b></td>
													<td><b><?php echo $share_holding_pattern[1]['financial_year']; ?></b></td>
													<td><b><?php echo $share_holding_pattern[2]['financial_year']; ?></b></td>
													<td><b><?php echo $share_holding_pattern[3]['financial_year']; ?></b></td>
												</tr>
												<tr>
													<td>Promoter</td>
													<td><input name="promoter[]" value="<?php echo $share_holding_pattern[0]['promoter']; ?>" class="form-control"></td>
													<td><input name="promoter[]" value="<?php echo $share_holding_pattern[1]['promoter']; ?>" class="form-control"></td>
													<td><input name="promoter[]" value="<?php echo $share_holding_pattern[2]['promoter']; ?>" class="form-control"></td>
													<td><input name="promoter[]" value="<?php echo $share_holding_pattern[3]['promoter']; ?>" class="form-control"></td>
												</tr>
												<tr>
													<td>FII</td>
													<td><input name="fii[]" value="<?php echo $share_holding_pattern[0]['fii']; ?>" class="form-control"></td>
													<td><input name="fii[]" value="<?php echo $share_holding_pattern[1]['fii']; ?>" class="form-control"></td>
													<td><input name="fii[]" value="<?php echo $share_holding_pattern[2]['fii']; ?>" class="form-control"></td>
													<td><input name="fii[]" value="<?php echo $share_holding_pattern[3]['fii']; ?>" class="form-control"></td>
												</tr>
												<tr>
													<td>DII</td>
													<td><input name="dii[]" value="<?php echo $share_holding_pattern[0]['dii']; ?>" class="form-control"></td>
													<td><input name="dii[]" value="<?php echo $share_holding_pattern[1]['dii']; ?>" class="form-control"></td>
													<td><input name="dii[]" value="<?php echo $share_holding_pattern[2]['dii']; ?>" class="form-control"></td>
													<td><input name="dii[]" value="<?php echo $share_holding_pattern[3]['dii']; ?>" class="form-control"></td>
												</tr>
												<tr>
													<td>Others</td>
													<td><input name="others[]" class="form-control" value="<?php echo $share_holding_pattern[0]['others']; ?>"></td>
													<td><input name="others[]" class="form-control" value="<?php echo $share_holding_pattern[1]['others']; ?>"></td>
													<td><input name="others[]" class="form-control" value="<?php echo $share_holding_pattern[2]['others']; ?>"></td>
													<td><input name="others[]" class="form-control" value="<?php echo $share_holding_pattern[3]['others']; ?>"></td>
												</tr>
											</tbody>
											<?php
											} ?>
										</table>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-12">
										<button type="submit" name="page_3_details" class="btn green"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
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
<script src="assets/scripts/core/app.js"></script>
<script src="Scripts/custom.js"></script>
<script>
	jQuery(document).ready(function() {
		App.init();
		<?php if($flag) {
        ?>
			object.initializePage3(true);
		<?php
        }
        else {
        ?>
			object.initializePage3();
		<?php
        }
        ?>
	});
</script>
</body>
</html>