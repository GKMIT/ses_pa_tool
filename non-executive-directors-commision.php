<?php
include_once("assets/database/Connect.php");
include_once("assets/config/config.php");
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en" class="ie8 no-js">
<html lang="en" class="ie9 no-js">
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
            <!-- BEGIN SIDEBAR MENU -->
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
                        Non Executive Director's Commision
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
                                Non Executive Director's Commision
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box">
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
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
                                                    SES is of the opinion that commission payable to non-executive directors should have an absolute cap (overall or otherwise) and the Company should clearly disclose objective criteria which will be used to determine the actual commission to be paid to the non-executive directors within the cap. The Company should not pay performance linked commission, ESOPs or other equity based remuneration to independent directors not only because it is prohibited by law, but also to maintain their independence/objectivity, and to promote long term value creation for shareholders.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><strong>Resolution</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control" placeholder="Enter text of the Resolution"></textarea>
                                    </div>
                                </div>
                                <h4 class="form-section">SES ANALYSIS</h4>
                                <h5 class="form-section">Commission Payable</h5>
                                <p><strong>Remuneration Limits</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" name="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p><strong>Commission distribution criteria</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" name="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p><strong>Directors’ covered under the resolution</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" name="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="6" name="" class="form-control">As per the resolution, the Board (including the NEDs) will have the discretion to determine the amount of commission to be paid for each financial year to each NED within the limit of [1%/3%] of the net profits. Objective criteria for determining the quantum of commission payable to individual NEDs has not been disclosed by the Company. SES is of the opinion that in absence of disclosure on commission distribution criteria, conflict of interest situations may arise.
                                                SES is of the opinion that to remove conflict of interest situations and to maintain the independence and objectivity of the independent NEDs, the Company should disclose the objective criteria to be used to distribute commission amongst IDs and place an absolute cap on commission payable to each NED. As a best practice, the Company should not pay any fee other than sitting fee, and profit based commission calculated on pre disclosed performance criteria. Further, SES recommends that the company should take shareholders’ approval of exact commission payable to NEDs.
                                        </textarea>
                                    </div>
                                </div>
                                <h4 class="form-section">DISTRIBUTION OF COMMISSION </h4>
                                <p><strong>Average Commission (<i class="fa fa-rupee"></i> Lakhs)</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="col-md-3">Promoter NED</label>
                                        <div class="col-md-9"><textarea class="form-control" name=""></textarea></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="col-md-3">Independent Directors</label>
                                        <div class="col-md-9"><textarea class="form-control" name=""></textarea></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="col-md-3">Other NEDs</label>
                                        <div class="col-md-9"><textarea class="form-control" name=""></textarea></div>
                                    </div>
                                </div>
                                <p><strong>Total Commission (<i class="fa fa-rupee"></i> Lakhs)</strong></p>
                                <div class="template">
                                    <div class="form-group description-row row-copy">
                                        <div class="col-md-3">
                                            <select name="" class="form-control">
                                                <option value="">Select Year</option>
                                                <?php
                                                for($i=2010;$i<=2020;$i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="" /></div>
                                        <div class="col-md-1"><button type="button" class="btn btn-danger disabled btn-delete-row"><i class="fa fa-times"></i></button></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label></label>
                                        <button class="btn btn-primary" id="btn_add_row" type="button"><i class="fa fa-plus"></i> Add Rows</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control" name="" placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <p><strong>General Recommendation Guidelines</strong></p>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company placed an absolute cap on commission?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="has_the_company_placed_an_absolute_cap_on_commission">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="109">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_placed_an_absolute_cap_on_commission_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company disclosed the objective remuneration distribution criteria?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="has_the_company_disclosed_the_objective_remuneration">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no" data-recommendation-table-id="110">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_disclosed_the_objective_remuneration_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Has the Company paid disproportionate commission to non-executive directors?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="has_the_company_paid_disproportionate_commission">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no"  id="table_id">No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="has_the_company_paid_disproportionate_commission_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Does the commission plus sitting fee to any one NED exceeds 25% of the average remuneration of any ED, without adequate justification? (Not applicable if non-independent NED is employed ED somewhere else)</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="does_the_commission_plus_sitting_fee">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="111">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="does_the_commission_plus_sitting_fee_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the Commission paid in excess of 1% or 3% (If no Managing Director or Executive Director is employed) of net profits of the Company?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_commission_paid_in_excess">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="112">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_commission_paid_in_excess_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the Commission paid to Individual Directors disclosed in the Annual Report?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_commission_paid_to_individual_directors">
                                            <option value="">Select</option>
                                            <option value="yes" >Yes</option>
                                            <option value="no" data-recommendation-table-id="113" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_commission_paid_to_individual_directors_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the Commission paid to select Directors only, without proper justification? (unless the director voluntarily forgoes his commission)</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_commission_paid_to_select_directors">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="114">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_commission_paid_to_select_directors_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the Nomination and Remuneration Committee non- compliant?</label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_nomination_and_remuneration">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="115">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_nomination_and_remuneration_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the distribution of commission disproportionate between IDs and NEDs without proper justification? </label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_distribution_of_commission">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="116">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_distribution_of_commission_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-10">Is the Company seeking shareholders' approval for perpetuity?  </label>
                                    <div class="col-md-2">
                                        <select class='form-control recommendations-fire' id="is_the_company_seeking_shareholders">
                                            <option value="">Select</option>
                                            <option value="yes" data-recommendation-table-id="117">Yes</option>
                                            <option value="no" >No</option>
                                            <option value="na">Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="is_the_company_seeking_shareholders_analysis_text">
                                    <div class="col-md-12">
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p><strong>General Analysis</strong></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea rows="4" name="" class="form-control"></textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="button" class="btn" id="btn_recommendation_text">Get Recommendation Text</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea rows="6" class="form-control" id="recommendation_text"></textarea>
                                        </div>
                                    </div>

                            </form>
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
        <script src="assets/scripts/core/app.js"></script>
        <script type="text/javascript" src="Scripts/custom.js"></script>
        <script type="text/javascript" src="Scripts/non-executive-directors-commision.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                object.initialization();
            });
        </script>
</body>
</html>