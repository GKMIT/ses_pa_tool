<?php
if(isset($_POST['btn_bulk_companies_upload'])) {
    include_once("../../Classes/database.php");
    $path = $_FILES['input_sheet']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $final_path = "company-sheet.".$ext;
    if(move_uploaded_file($_FILES['input_sheet']['tmp_name'],$final_path)) {
        include('../../Classes/PHPExcel/IOFactory.php');
        $sheet_name="Sheet1";
        $objReader = new PHPExcel_Reader_Excel2007();
        $objReader->setReadDataOnly(true);
        $objReader->setLoadSheetsOnly($sheet_name);
        $objPHPExcel = $objReader->load($final_path);
        $db = new Database();
        for($i=2;$i<=9999999999;$i++) {
            $company_name = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
            if($company_name=="")
                break;
            else {
                $info['name']=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
                $info['cin']=$objPHPExcel->getActiveSheet()->getCell('M'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getValue();
                $info['bse_code']=$objPHPExcel->getActiveSheet()->getCell('I'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getValue();
                $info['nse_code']=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getValue();
                $info['isin']=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getValue();
                $info['face_value']=$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getValue();
                $info['sector']=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getValue();
                $info['email']=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getValue();
                $info['website']=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getValue();
                $info['fax']=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getValue();
                $info['contact']=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue();
                $info['address']=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
                $info['fiscal_year_end']=1;
                $info['peer1']=0;
                $info['peer2']=0;
                $response = $db->addNewCompany($info);
                echo $response;
            }
        }

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
    <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed">
<div class="header navbar navbar-fixed-top">
    <div class="header-inner">
        <a class="navbar-brand" href="index.html">
            <img src="../../assets/img/logo-patool.png" alt="logo" class="img-responsive"/>
        </a>
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="../../assets/img/menu-toggler.png" alt=""/>
        </a>
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="../assets/img/avatar1_small.jpg"/>
					<span class="username">
						Admin
					</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
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
                <li class="start ">
                    <a href="index.html">
                        <i class="fa fa-home"></i>
						<span class="title">
							Dashboard
						</span>
                    </a>
                </li>
                <li>
                    <a href="page1.php">
                        <span>Company &amp; Meeting Details</span>
                    </a>
                </li>
                <li>
                    <a href="page2.php">
                        <span>SES Recommendations</span>
                    </a>
                </li>
                <li>
                    <a href="page3.php">
                        <span>Company Background</span>
                    </a>
                </li>
                <li>
                    <a href="page4.php">
                        <span>Appointment/Reappointment of Independent Directors</span>
                    </a>
                </li>
                <li>
                    <a href="page5.php">
                        <span>Adoption of Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="page6.php">
                        <span>Declaration of Dividend</span>
                    </a>
                </li>
                <li>
                    <a href="page7.php">
                        <span>Appointment of Auditors</span>
                    </a>
                </li>
                <li>
                    <a href="page8.php">
                        <span>Sales of Assets/Business/Undertaking</span>
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
                        Bulk Companies Upload
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
                                InputSheet
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                Upload sheet
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-upload"></i>&nbsp;Upload your company details sheet
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" action="add-bulk-companies.php" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section">Choose Company Sheet</h4>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Input Sheet</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group">
                                                    <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
														<span class="fileinput-filename">
														</span>
                                                    </div>
													<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
															 Select file
														</span>
														<span class="fileinput-exists">
															 Change
														</span>
														<input type="file" name="input_sheet" />
													</span>
                                                    <a href="#" class="input-group-addon btn default fileinput-exists" data-dismiss="fileinput">
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="btn_bulk_companies_upload" class="btn green">Submit</button>
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
<script src="../../assets/plugins/respond.min.js"></script>
<script src="../../assets/plugins/excanvas.min.js"></script>
<script src="../../assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="../../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="Scripts/custom.js"></script>
<script src="../../assets/scripts/core/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>