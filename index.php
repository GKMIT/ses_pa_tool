<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>PA Tool Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
<div class="content" style="margin-top: 40px;">
	<form class="login-form" action="index.html" method="post">
		<div align="center" style="margin:0 0 20px 0 ">
			<img src="assets/img/logo.png">
		</div>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 Enter any username and password.
			</span>
		</div>
		<div class="alert alert-danger display-hide" id="unauth_alert">
			<button class="close" data-close="alert"></button>
			<span>
				 Either user name or password is wrong.
			</span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="user_name"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<select class="form-control" name="user_type" id="user_type">
					<option value="">select type</option>
					<option value="report_maker">Maker</option>
					<option value="report_checker">Checker</option>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn green pull-right" id="login_button"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
		</div>
		<div class="forget-password">
			<h4>Reset password ?</h4>
			<p>
				Click
				<a href="javascript:;" id="forget-password">
					here
				</a>
				to reset your password.
			</p>
		</div>
	</form>
	<form class="forget-form" action="index.html" method="post">
		<h3>Reset Your password</h3>
		<div class="alert alert-danger display-hide" id="unauth_alert">
			<button class="close" data-close="alert"></button>
			<span>
				 Username and password does not match
			</span>
		</div>
		<div class="alert alert-danger display-hide" id="internal_error">
			<button class="close" data-close="alert"></button>
			<span>
				 Internal server error occured
			</span>
		</div>
		<div class="alert alert-info display-hide" id="success_alert">
			<button class="close" data-close="alert"></button>
			<span>
				 Password changed successfully
			</span>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" id="cp_user_name" type="text" autocomplete="off" placeholder="Enter user name" name="cp_user_name"/>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" id="current_password" type="password" autocomplete="off" placeholder="Current password" name="current_password"/>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" id="new_password" type="password" autocomplete="off" placeholder="New password" name="new_password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
				<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn green pull-right" id="change_password_proceed">
				Proceed <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
</div>
<div class="copyright" style="font-size:15px; width:100%">
	Designed &amp; Maintained by <a href="http://www.gkmit.co" target="_blank">GKM IT Pvt. Ltd.</a>
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
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script src="assets/scripts/core/app.js" type="text/javascript"></script>
<script src="assets/scripts/custom/login.js" type="text/javascript"></script>
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
</body>
</html>