<?php
include_once("assets/database/Connect.php");
include_once("assets/config/config.php");
include_once("config.php");
if(empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
	header("location:$_config[base_url]");
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
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
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
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
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
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php include_once('side-nav-bar.php'); ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						SALE OF ASSETS/ BUSINESS/ UNDERTAKING
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
								SALE OF ASSETS/ BUSINESS/ UNDERTAKING
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form">
								<div class="form-body">
									<h4 class="form-section">Full Text of the Resolution</h4>
									<div class="form-group">
										<!-- <label class="col-md-3 control-label">Company Name</label> -->
										<div class="col-md-12">
											<input type="text" value="" class="form-control" placeholder="Enter text of the Resolution">
										</div>
									</div>
								</div>
								<div class="form-body">
									<h4 class="form-section">Justification (As stated by the Company)</h4>
									<div class="form-group">
										<!-- <label class="col-md-3 control-label">Company Name</label> -->
										<div class="col-md-12">
											<input type="text" value="" class="form-control" placeholder="">
										</div>
									</div>
								</div>
								<div class="form-body">
									<div id="comparsion" class='form-group'>
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-striped table-hover">
													<thead>
														<tr>
															<th>SNo</th> 
															<th>Parameter</th>
															<th>Options</th>
														</tr>
													</thead>
													<tbody>
														<tr id='question1'>
															<th>
																<label class=''>1</label>
															</th>
															<th>
																<label class=''>Is the Independent fairness opinion disclosed ?</label>
															</th>
															<th>
																<select class='form-control' id='question1_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question2'>
															<th>
																<label class=''>2</label>
															</th>
															<th>
																<label class=''>Has the Company disclosed a rationale behind the sale ?</label>
															</th>
															<th>
																<select class='form-control' id='question2_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question3'>
															<th>
																<label class=''>3</label>
															</th>
															<th>
																<label class=''>Has the Company fully disclosed the assets/undertaking/business being sold ?</label>
															</th>
															<th>
																<select class='form-control' id='question3_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question4'>
															<th>
																<label class=''>4</label>
															</th>
															<th>
																<label class=''>Has the Company disclosed the price for the sale ?</label>
															</th>
															<th>
																<select class='form-control' id='question4_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question5'>
															<th>
																<label class=''>5</label>
															</th>
															<th>
																<label class=''>Has the Company disclosed the details of the buyer ?</label>
															</th>
															<th>
																<select class='form-control' id='question5_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question6'>
															<th>
																<label class=''>6</label>
															</th>
															<th>
																<label class=''>Has the Company disclosed the impact of sale on the Company's financial (turnover, profits and working capital)?</label>
															</th>
															<th>
																<select class='form-control' id='question6_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question7'>
															<th>
																<label class=''>7</label>
															</th>
															<th>
																<label class=''>Is the assets/undertaking being sold material w.r.t. the Company ? Has the Company not disclosed adequate reasons/ rationale for such sale ?</label>
															</th>
															<th>
																<select class='form-control' id='question7_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
														<tr id='question8'>
															<th>
																<label class=''>8</label>
															</th>
															<th>
																<label class=''>Has the Company disclosed that how is it going to utilize the funds( generated from sale of assets/ business) ?</label>
															</th>
															<th>
																<select class='form-control' id='question8_select'>
																	<option>Select</option>
																	<option>Yes</option>
																	<option>No</option>
																</select>
															</th>
														</tr>
													</tbody>
												</table>
											</div>
											
										</div>
									</div>
								</div>
								<div class="form-body" >
									<div class="form-group" id="add_recommendation"></div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<button type="button" class="btn default">Cancel</button>
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
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function() {   
   // initiate layout and plugins
   App.init();
   $("#question1_select").change(function()
   	{
   		var val = $("#question1_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:1},function(data,status){
				$("#question1").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#1").remove();
   			adding_recommendation();	
   		}
   	});
   $("#question2_select").change(function()
   	{
   		var val = $("#question2_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:2},function(data,status){
				$("#question2").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#2").remove();
   			adding_recommendation();	
   		}
   	});
   $("#question3_select").change(function()
   	{
   		var val = $("#question3_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:7},function(data,status){
				$("#question3").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#7").remove();
   			adding_recommendation();	
   		}
   	});
    $("#question4_select").change(function()
   	{
   		var val = $("#question4_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:3},function(data,status){
				$("#question4").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#3").remove();
   			adding_recommendation();	
   		}
   	});
   	 $("#question5_select").change(function()
   	{
   		var val = $("#question5_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:4},function(data,status){
				$("#question5").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#4").remove();
   			adding_recommendation();	
   		}
   	});
   	$("#question6_select").change(function()
   	{
   		var val = $("#question6_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:5},function(data,status){
				$("#question6").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#5").remove();
   			adding_recommendation();	
   		}
   	});
   	 $("#question7_select").change(function()
   	{
   		var val = $("#question7_select").find('option:selected').val();
   		if(val=="Yes")
   		{
   			adding_recommendation();
   		}
   		else
   		{
   			//$("#7").remove();
   			adding_recommendation();	
   		}
   	});
   	$("#question8_select").change(function()
   	{
   		var val = $("#question8_select").find('option:selected').val();
   		if(val=="No")
   		{
   			$.get("jquery-data.php",{get_sales_analysis:1,id:6},function(data,status){
				$("#question8").after(data);
			});
			adding_recommendation();
   		}
   		else
   		{
   			$("#6").remove();
   			adding_recommendation();	
   		}
   	});
   	function adding_recommendation()
   	{
   		$.get("jquery-data.php",{get_sales_recommendation:1,val1:$("#question1_select").find('option:selected').val(),val2:$("#question2_select").find('option:selected').val(),val3:$("#question3_select").find('option:selected').val(),val4:$("#question4_select").find('option:selected').val(),val5:$("#question5_select").find('option:selected').val(),val6:$("#question6_select").find('option:selected').val(),val7:$("#question7_select").find('option:selected').val()},function(data,status){
				$("#add_recommendation").html(data);
		});
   	}
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>