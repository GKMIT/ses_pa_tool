<?php
include_once("Classes/database.php");
require_once('config.php');
include_once("Classes/databasereport.php");
include_once("assets/config/config.php");
include_once("assets/functions.php");

if(isset($_GET['standard_analysis_text'])) {
	$db = new DatabaseReports();
	$response = $db->getStandardAnalysisText($_GET['table_id']);
	echo json_encode($response);
}
elseif(isset($_GET['standard_recommendation_text'])) {
	$db = new DatabaseReports();
	$response = $db->getRecommendationAnalysisText($_GET['table_id']);
	echo json_encode(array('recommendation_text'=>$response));
}
elseif(isset($_GET['get_fulltime_textarea'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=12");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	$d=$_GET['des'];
	$c=$_GET['comp'];
	$tp=$_GET['total_position'];
	if($s=="Select")
		$s='';
	if($name=='')
		$name='()';
	$analysis['Text']=str_replace('[Director]', $name, $analysis['Text']);
	$analysis['Text']=str_replace('[designation, company]', $d.', '.$c, $analysis['Text']);
	$analysis['Text']=str_replace('[]', $tp, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:100px;'>$s $analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_competitor'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=30");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	$compet=$_GET['compe'];
	if($s=="Select")
		$s='';
	if($name=='')
		$name='()';
	$analysis['Text']=str_replace('[Director]', $name, $analysis['Text']);
	$analysis['Text']=str_replace('[competitor]', $compet, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$s $analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_stock'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=9");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	if($s=="Select")
		$s='';
	if($name=='')
		$name='()';
	$analysis['Text']=str_replace('[director]',$s.$name, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:75px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_question_one'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=15");
	$analysis = $db->get_row();
	$s=$_GET['ncs'];
	$d=$_GET['donc'];
	$analysis['Text']=str_replace('[date]',$s, $analysis['Text']);
	$analysis['Text']=str_replace('[Details of non-compliance]',$d, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_material_failure'])) {
	$m_b=$_GET['mb'];
	$m_d=$_GET['md'];
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$m_b"."&#10$m_d</textarea></div>";	
}
elseif(isset($_GET['get_time_commit'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=14");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	$no_of_dire=$_GET['nofd'];
	if($s=="Select")
		$s='';
	if($name=='' || $name=='Select')
		$name='()';
	$analysis['Text']=str_replace('[Director]',$s.$name, $analysis['Text']);
	$analysis['Text']=str_replace('[directorships]', $no_of_dire, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'> $analysis[Text]</textarea></div>";

}
elseif(isset($_GET['get_question_two'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=16");
	$analysis = $db->get_row();
	$month = $_GET['mon'];
	$analysis['Text']=str_replace('[months]',$month, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_question_three'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=17");
	$analysis = $db->get_row();
	$details = $_GET['detail'];
	$analysis['Text']=str_replace('[description]',$details, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_tenure'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=6");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	$t_t=$_GET['tt'];
	if($s=="Select")
		$s='';
	if($name=='' || $name=='Select')
		$name='()';
	$analysis['Text']=str_replace('[Director]',$s.$name, $analysis['Text']);
	$analysis['Text']=str_replace('[]', $t_t, $analysis['Text']);
	if(strcmp($s, "Mr.")==0)
	{
		$analysis['Text']=str_replace('[his/her]', 'his', $analysis['Text']);
	}
	if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
	{
		$analysis['Text']=str_replace('[his/her]', 'her', $analysis['Text']);
	}
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'> $analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_qualification'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=18");
	$analysis = $db->get_row();
	$quali = $_GET['acc_quali'];
	$analysis['Text']=str_replace('[standalone/consolidated]',$quali, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_material_weakness'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=21");
	$analysis = $db->get_row();
	$mwd = $_GET['mdetail'];
	$analysis['Text']=str_replace('[details]',$mwd, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_material_restatement'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=22");
	$analysis = $db->get_row();
	$financial = $_GET['f_p'];
	if($financial=='')
		$financial='()';
	$impact = $_GET['i_o'];
	if($impact=='')
		$impact='()';
	$analysis['Text']=str_replace('[financial period]',$financial, $analysis['Text']);
	$analysis['Text']=str_replace('[impact]',$impact, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_late_fillings'])) {

	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=23");
	$analysis = $db->get_row();
	$date = $_GET['f_d'];
	if($date=='')
		$date='()';
	$quater = $_GET['quat'];
	if($quater=='')
		$quater='()';
	$analysis['Text']=str_replace('[quarter]',$quater, $analysis['Text']);
	$analysis['Text']=str_replace('[date]',$date, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_accounting_fraud'])) {

	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=24");
	$analysis = $db->get_row();
	$fd = $_GET['fraud'];
	if($fd=='')
		$fd='()';
	$analysis['Text']=str_replace('[accounting fraud]',$fd, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_reappointment'])) {

	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=25");
	$analysis = $db->get_row();
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_attendence'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=26");
	$analysis = $db->get_row();
	$d_name=$_GET['director'];
	if($d_name=='' || $d_name=="Select")
		$d_name='()';
	$analysis['Text']=str_replace('[director 2]',$d_name, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_skewed'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=28");
	$analysis = $db->get_row();
	$favour=$_GET['sk_f'];
	$compare=$_GET['sk_c'];
	if($favour=='' || $favour=="Select")
		$favour='()';
	if($compare=='' || $compare=="Select")
		$compare='()';
	$analysis['Text']=str_replace('[director 2]',$favour, $analysis['Text']);
	$analysis['Text']=str_replace('[other whole time directors as well as peers in industry]',$compare, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_repriced'])) {
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_analysis` where `id`=29");
	$analysis = $db->get_row();
	$date=$_GET['price_date'];
	if($date=='')
		$date='()';
	$analysis['Text']=str_replace('[date]',$date, $analysis['Text']);
	echo "<div class='col-md-12'><textarea class='form-control' style='height:110px;'>$analysis[Text]</textarea></div>";
}
elseif(isset($_GET['get_fulltime_recommendation'])) {
	$case1="<div class='col-md-12'><textarea class='form-control' style='height:130px;'>";
	$case2='';
	$case3='';
	$case4='';
	$case5='';
	$case6='';
	$case7='';
	$case8='';
	$case9='';
	$case10='';
	$case11='';
	$case12='';
	$case13='';
	$case14='';
	$case15='';
	$case16='';
	$case17='';
	$case18='';
	$case19='';
	$case20='';
	$case21='';
	$case22='';
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=18");
	$analysis = $db->get_row();
	$s=$_GET['sal'];
	$name=$_GET['nod'];
	$d=$_GET['des'];
	$c=$_GET['comp'];
	if(strcmp($s, "Select")==0)
		$s='';
	if($name=='' || $name=="Select")
		$name='()';
	$tp=$_GET['total_position'];
	if($tp>1)
	{
		$analysis['value']=str_replace('[Director]', $s.$name, $analysis['value']);
		$analysis['value']=str_replace('[designation, company]', $d.', '.$c, $analysis['value']);
		$analysis['value']=str_replace('[number of full time positions]', $tp, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case1 .="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=5");
	$analysis = $db->get_row();
	// $s=$_GET['sal'];
	// $name=$_GET['nod'];
	$compet=$_GET['compe'];
	$cv=$_GET['compe_val'];
	// if($s=="Select")
	// 	$s='';
	// if($name=='')
	// 	$name='()';
	if($cv=='Yes')
	{
		$analysis['value']=str_replace('[Director]', $name, $analysis['value']);
		$analysis['value']=str_replace('[competitor]', $compet, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case2= "$s $analysis[value]";
	}
	$db = new SqlConnect();
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=14");
	$analysis = $db->get_row();
	// $s=$_GET['sal'];
	// $name=$_GET['nod'];
	$sv=$_GET['s_val'];
	// if($s=="Select")
	// 	$s='';
	// if($name=='')
	// 	$name='()';
	if($sv=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case3.= "$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=21");
	$analysis = $db->get_row();
	$s1=$_GET['ncs'];
	$d=$_GET['donc'];
	$av=$_GET['a_val'];
	if($av=="No")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[date]',$s1, $analysis['value']);
		$analysis['value']=str_replace('[Details of non-compliance]',$d, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case4.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=8");
	$analysis = $db->get_row();
	$e=$_GET['e_val'];
	$ec=$_GET['e_comp'];
	if($ec=='')
		$ec='()';
	$ed=$_GET['e_desc'];
	if($e=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[Director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[company]',$ec, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case5.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=9");
	$analysis = $db->get_row();
	$pv=$_GET['pr_val'];

	if($pv=='Yes')
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case6.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=12");
	$analysis = $db->get_row();
	$nv=$_GET['no_val'];
	$nc=$_GET['no_comp'];
	if($nc=='')
		$nc='()';
	if($nv=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[Director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[company]',$nc, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case7.="$analysis[value]";	
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=11");
	$analysis = $db->get_row();
	$pev=$_GET['pe_val'];
	if($pev=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case8.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=13");
	$analysis = $db->get_row();
	$exv=$_GET['ex_val'];
	if($exv=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case9.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=4");
	$analysis = $db->get_row();
	$mav=$_GET['mat_val'];
	$mad=$_GET['mat_de'];
	if($mav=="Yes")
	{
		$analysis['value']=str_replace('[Brief description of Failure]',$mad, $analysis['value']);
		$case10.="$analysis[value]";	
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=7");
	$analysis = $db->get_row();
	$tenure_t=$_GET['ten_t'];
	$tenure_a=$_GET['ten_app'];
	$total = $tenure_t + $tenure_a;
	if($tenure_t > 10 || $total > 10)
	{
		$analysis['value']=str_replace('[Director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[tenure]',$tenure_t, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case11.="$analysis[value]";	
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=22");
	$analysis = $db->get_row();
	$months=$_GET['mon'];
	if($months > 6)
	{
		$analysis['value']=str_replace('[months]',$months, $analysis['value']);
		$case12.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=22");
	$analysis = $db->get_row();
	$wv=$_GET['were_val'];
	if($wv=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case13.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=26");
	$analysis = $db->get_row();
	$aqv=$_GET['quali'];
	$aq=$_GET['acc_quali'];
	if($aqv=="No")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[standalone/consolidated]',$aq, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case14.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=29");
	$analysis = $db->get_row();
	$mwv=$_GET['m_weak'];
	if($mwv=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case15.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=30");
	$analysis = $db->get_row();
	$re_val=$_GET['restate'];
	$financial=$_GET['f_p'];
	if($financial=='')
		$financial='()';
	if($re_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[financial period]',$financial, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case16.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=31");
	$analysis = $db->get_row();
	$lf_val=$_GET['late'];
	$date=$_GET['f_d'];
	if($date=='')
		$date='()';
	$quater=$_GET['quat'];
	if($quater=='')
		$quater='()';
	if($lf_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[quarter]',$quater, $analysis['value']);
		$analysis['value']=str_replace('[date]',$date, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case17.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=32");
	$analysis = $db->get_row();
	$af_val=$_GET['acc_fraud'];
	$fdetail=$_GET['fraud'];
	if($fdetail=='')
		$fdetail='()';
	if($af_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[accounting fraud]',$fdetail, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case18.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=34");
	$analysis = $db->get_row();
	$reapp_val=$_GET['reapp'];
	if($reapp_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case19.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=36");
	$analysis = $db->get_row();
	$pa_val=$_GET['poor_attend'];
	$dname=$_GET['director'];
	if($dname=='' || $dname=="Select")
		$dname='()';
	if($pa_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[director 2]',$dname, $analysis['value']);
		$analysis['value']=str_replace('[other director]',$dname, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case20.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=38");
	$analysis = $db->get_row();
	$sk_val=$_GET['skew_val'];
	$favour=$_GET['sk_f'];
	$compare=$_GET['sk_c'];
	if($favour=='' || $favour=="Select")
		$favour='()';
	if($compare=='' || $compare=="Select")
		$compare='()';
	if($sk_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[director 2]',$favour, $analysis['value']);
		$analysis['value']=str_replace('[other whole time directors as well as peers in industry]',$compare, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case21.="$analysis[value]";
	}
	$db->fetch_query("select * from `ses_standard_text_recommendation_detail` where `id`=39");
	$analysis = $db->get_row();
	$price_val=$_GET['reprice'];
	$date=$_GET['price_date'];
	if($date=='' || $date=="Select")
		$date='()';
	if($price_val=="Yes")
	{
		$analysis['value']=str_replace('[director]',$s.$name, $analysis['value']);
		$analysis['value']=str_replace('[date]',$date, $analysis['value']);
		if(strcmp($s, "Mr.")==0)
		{
			$analysis['value']=str_replace('[his/her]', 'his', $analysis['value']);
		}
		if((strcmp($s, "Mrs.")==0) || (strcmp($s, "Ms.")==0))
		{
			$analysis['value']=str_replace('[his/her]', 'her', $analysis['value']);
		}
		$case22.="$analysis[value]";
	}
	echo $case1.'&#10;'.$case2."&#10;".$case3."&#10".$case4."&#10".$case5."&#10".$case6."&#10".$case7."&#10".$case8."&#10".$case9."&#10".$case10."&#10".$case11."&#10".$case12."&#10".$case13."&#10".$case14."&#10".$case15."&#10".$case16."&#10".$case17."&#10".$case18."&#10".$case19."&#10".$case20."&#10".$case21."&#10".$case22."</textarea></div>";
}
elseif(isset($_GET['get_questions'])) {
	$id=$_GET['id'];
	$db = new SqlConnect();
	$db->fetch_query("select * from `recommendation` where `id`=$_GET[id]");
	$analysis = $db->get_row();
	echo "<tr id='$_GET[id]'><td>Recommendation</td><td colspan='3'><textarea class='form-control' style='height:90px;'>$analysis[description]</textarea></td></tr>";
}
elseif(isset($_GET['get_questions_analysis']))
{
	$id=$_GET['id'];
	//echo $id;
	$db = new SqlConnect();
	$db->fetch_query("select * from `analysis` where `id`=$_GET[id]");
	$analysis = $db->get_row();
	echo "<tr id=a$_GET[id]><td>Analysis</td><td colspan='3'><textarea class='form-control' style='height:90px;'>$analysis[description]</textarea></td></tr>";
}
elseif(isset($_GET['get_sales_analysis'])) {
	$id=$_GET['id'];
	//echo $id;
	$db = new SqlConnect();
	$db->fetch_query("select * from `sales_of_business_analysis` where `id`=$_GET[id]");
	$analysis = $db->get_row();
	echo "<tr id='$_GET[id]'><td>Analysis</td><td colspan='2'><textarea class='form-control' style='height:90px;'>$analysis[description]</textarea></td></tr>";
}
elseif(isset($_GET['get_sales_recommendation'])) {
	$v1=$_GET['val1'];
	$case1="<div class='col-md-12'><textarea class='form-control' style='height:130px;'>";
	$case2='';
	$case3='';
	$case4='';
	$case5='';
	$case6='';
	$case7='';
	$db = new SqlConnect();
	if($v1=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=1");
		$analysis = $db->get_row();
		$case1.= $analysis['description'];
	}
	$v2=$_GET['val2'];
	if($v2=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=2");
		$analysis = $db->get_row();
		$case2.= $analysis['description'];
	}
	$v3=$_GET['val3'];
	if($v3=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=3");
		$analysis = $db->get_row();
		$case3.= $analysis['description'];
	}
	$v4=$_GET['val4'];
	if($v4=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=4");
		$analysis = $db->get_row();
		$case4.= $analysis['description'];
	}
	$v5=$_GET['val5'];
	if($v5=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=5");
		$analysis = $db->get_row();
		$case5.= $analysis['description'];
	}
	$v6=$_GET['val6'];
	if($v6=="No")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=6");
		$analysis = $db->get_row();
		$case6.= $analysis['description'];
	}
	$v7=$_GET['val7'];
	if($v7=="Yes")
	{
		$db->fetch_query("select * from `sales_of_business_recommendations` where `id`=7");
		$analysis = $db->get_row();
		$case7.= $analysis['description'];
	}
	echo $case1."&#10".$case2."&#10".$case3."&#10".$case4."&#10".$case5."&#10".$case6."&#10".$case7."</textarea>";
}
elseif(isset($_GET['get_auditor_analysis'])) {
	$id=$_GET['id'];
	//echo $id;
	$db = new SqlConnect();
	$db->fetch_query("select * from `appointment_auditor_analysis` where `id`=$_GET[id]");
	$analysis = $db->get_row();
	echo "<div class='col-md-12'><textarea class='form-control' style='height:90px;'>$analysis[description]</textarea></div>";
}
elseif(isset($_GET['get_auditor_recommendation'])) {
	$case1 = "<div class='col-md-12'><h4>Recommendation</h4></div><div class='col-md-12'><textarea class='form-control' style='height:130px;'>";
	$case2 = '';
	$case3 = '';
	$case4 = '';
	$case5 = '';
	$case6 = '';
	$case7 = '';
	$case8 = '';
	$case9 = '';
	$case10 = '';
	$db = new SqlConnect();
	$dn = $_GET['notice'];
	$dar = $_GET['annual'];
	if($dn == "No" && $dar == "No")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=1");
		$analysis = $db->get_row();
		$case1.= $analysis['description'];
	}
	$cnt=$_GET['cnt'];
	$v = $_GET['value'];
	
	if($cnt < 2)
	{	
		if($v > 10)
		{
			$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=2");
			$analysis = $db->get_row();
			$case2.= $analysis['description'];
		}
	}
	if($cnt >=2)
	{
		$v1=$_GET['value1'];
		if($v > 10 || $v1 > 10)
		{
			$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=3");
			$analysis = $db->get_row();
			$case2.= $analysis['description'];	
		}
		else 
			$case2='';
	}
	$f_val = $_GET['financial_value'];
	if($f_val == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=4");
		$analysis = $db->get_row();
		$case3.= $analysis['description'];	
	}
	$b_val = $_GET['business_value'];
	if($b_val == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=5");
		$analysis = $db->get_row();
		$case4.= $analysis['description'];	
	}
	$t1 = $_GET['term1'];
	$t2 = $_GET['term2'];
	$total = $t1 + $t2;
	//echo $total;
	if($total > 10)
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=21");
		$analysis = $db->get_row();
		$case5.= $analysis['description'];
	}
	if($t1 != '' && $t1 != 'NaN')
	{
		if(($total < 10) && (($t2 + 5) <= 10 ) && ($t1 < 5))
		{
			$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=22");
			$analysis = $db->get_row();
			$case5.= $analysis['description'];
		}
	}
	$restate = $_GET['restated'];
	if($restate == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=7");
		$analysis = $db->get_row();
		$case6.= $analysis['description'];
	}
	$mat = $_GET['material'];
	if($mat == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=8");
		$analysis = $db->get_row();
		$case7.= $analysis['description'];	
	}
	$check = $_GET['check'];
	if($check == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=9");
		$analysis = $db->get_row();
		$case8.= $analysis['description'];
	} 
	$check50 = $_GET['check50'];
	if($check50 == "Yes")
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=10");
		$analysis = $db->get_row();
		$case9.= $analysis['description'];
	}
	$tg = $_GET['group'];
	if($tg > 10)
	{
		$db->fetch_query("select * from `appointment_auditor_recommendation` where `id`=20");
		$analysis = $db->get_row();
		$case10.= $analysis['description'];
	}
	echo $case1."&#10".$case2."&#10".$case3."&#10".$case4."&#10".$case5."&#10".$case6."&#10".$case7."&#10".$case8."&#10".$case9."&#10".$case10."</textarea>";
}
elseif(isset($_GET['page3bsedata'])) {

	$year = intval($_GET['year']);
	date_default_timezone_get("Asia/Kolkata");
	$qtr_id_final = ($year-2015)*4 + 85 + intval($_GET['month']);
	$company_bse_code = $_GET['company_bse_code'];
	try {
		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/shpperent.aspx?scripcd=$company_bse_code&qtrid=$qtr_id_final&CompName=BOMBAY+DYEING+MFG+CO+LTD+&QtrName=December+2014";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$shareholders=array();
		$tables = $dom->getElementById('tdData');
		for ($i=7; $i <=457845 ; $i++) {
			$share1= $tables->getElementsByTagName('tr')->item($i);
			$val=strcmp($share1->getElementsByTagName('td')->item(1)->nodeValue,"Total");
			if($val==0) {
				goto s1;
			}
			else {
				$share_value = $share1->getElementsByTagName('td')->item(3)->nodeValue;
				$shareholders[]= array($share1->getElementsByTagName('td')->item(1)->nodeValue,$share_value);
			}
		}
		s1:
		$shareholders=page3SortAdd($shareholders);
		$str="";
		$x=1;
		foreach ($shareholders as $shareholder_name=>$share) {
			$str.="<tr>
			   	<td><input type='text' name='share_holder_name[]' class='form-control' value='$shareholder_name'/></td>
				<td><input type='text' name='share_holding[]' class='form-control' value='$share'/></td>
			   </tr>";
			if($x++==7) break;
		}
		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/shpPromoters_60.aspx?scripcd=$company_bse_code&qtrid=$qtr_id_final&CompName=BOMBAY+DYEING+MFG+CO+LTD+&QtrName=$_GET[month]+$_GET[year]";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$tables = $dom->getElementById('tdData');
		$major_promoters=array();
		for ($i=6; $i <=1929812 ; $i++) {
			$share1= $tables->getElementsByTagName('tr')->item($i);
			$val=strcmp($share1->getElementsByTagName('td')->item(1)->nodeValue,"Total");
			if($val==0)
				goto s2;
			else {
				$share_value = $share1->getElementsByTagName('td')->item(3)->nodeValue;
				$major_promoters[]= array($share1->getElementsByTagName('td')->item(1)->nodeValue,$share_value);
			}
		}
		s2:
		$major_promoters = page3SortAdd($major_promoters);
		$counter = 1;
		$str2="";
		foreach ($major_promoters as $promoter_name=>$grand_total) {
			$str2.="<tr>
					<td><input type='text' name='major_promoter_name[]' class='form-control' value='$promoter_name'/></td>
					<td><input type='text' name='major_promoter_share_holding[]' class='form-control' value='".number_format($grand_total,2,'.','')."'/></td>
				</tr>";
			if($counter++==7) {
				break;
			}
		}

		// shareholding patterns

		$share_holding_years = "<tr><td></td><td><b>$year</b></td><td><b>".($year-1)."</b></td><td><b>".($year-2)."</b></td><td><b>".($year-3)."</b></td></tr>";

		$share_holding_pattern_promoters = "<tr><td>Promoter</td>";
		$share_holding_pattern_fii = "<tr><td>FII</td>";
		$share_holding_pattern_dii = "<tr><td>DII</td>";
		$share_holding_pattern_others = "<tr><td>Others</td>";

		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=$company_bse_code&flag_qtr=1&qtrid=$qtr_id_final&Flag=New";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$tables = $dom->getElementById('tdData');
		$share1= $tables->getElementsByTagName('tr')->item(26);
		$promoter= $share1->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_promoters.="<td><input name='promoter[]' value='$promoter' class='form-control'/></td>";
		$share2= $tables->getElementsByTagName('tr')->item(31);
		$fii = $share2->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_fii.="<td><input name='fii[]' value='$fii' class='form-control'/></td>";
		$share3= $tables->getElementsByTagName('tr')->item(32);
		$sub_total = $share3->getElementsByTagName('td')->item(5)->nodeValue;
		$dii = $sub_total-$fii;
		$share_holding_pattern_dii.="<td><input name='dii[]' value='$dii' class='form-control'/></td>";
		$share_holding_pattern_others.="<td><input name='others[]' class='form-control' value='".(100-($fii+$promoter+$dii))."' /></td>";

		$qtr_id_final=$qtr_id_final-4;
		$share_holding_pattern.= "<tr><td>FII</td>";
		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=$company_bse_code&flag_qtr=1&qtrid=$qtr_id_final&Flag=New";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$tables = $dom->getElementById('tdData');
		$share1= $tables->getElementsByTagName('tr')->item(26);
		$promoter= $share1->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_promoters.="<td><input name='promoter[]' value='$promoter' class='form-control'/></td>";
		$share2= $tables->getElementsByTagName('tr')->item(31);
		$fii = $share2->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_fii.="<td><input name='fii[]' value='$fii' class='form-control'/></td>";
		$share3= $tables->getElementsByTagName('tr')->item(32);
		$sub_total = $share3->getElementsByTagName('td')->item(5)->nodeValue;
		$dii = $sub_total-$fii;
		$share_holding_pattern_dii.="<td><input name='dii[]' value='$dii' class='form-control'/></td>";
		$share_holding_pattern_others.="<td><input name='others[]' class='form-control' value='".(100-($fii+$promoter+$dii))."' /></td>";

		$qtr_id_final=$qtr_id_final-4;
		$share_holding_pattern.= "<tr><td>DII</td>";
		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=$company_bse_code&flag_qtr=1&qtrid=$qtr_id_final&Flag=New";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$tables = $dom->getElementById('tdData');
		$share1= $tables->getElementsByTagName('tr')->item(26);
		$promoter= $share1->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_promoters.="<td><input name='promoter[]' value='$promoter' class='form-control'/></td>";
		$share2= $tables->getElementsByTagName('tr')->item(31);
		$fii = $share2->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_fii.="<td><input name='fii[]' value='$fii' class='form-control'/></td>";
		$share3= $tables->getElementsByTagName('tr')->item(32);
		$sub_total = $share3->getElementsByTagName('td')->item(5)->nodeValue;
		$dii = $sub_total-$fii;
		$share_holding_pattern_dii.="<td><input name='dii[]' value='$dii' class='form-control'/></td>";
		$share_holding_pattern_others.="<td><input name='others[]' class='form-control' value='".(100-($fii+$promoter+$dii))."' /></td>";

		$qtr_id_final=$qtr_id_final-4;
		$share_holding_pattern.= "<tr><td>Others</td>";
		$dom = new domDocument;
		$link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=$company_bse_code&flag_qtr=1&qtrid=$qtr_id_final&Flag=New";
		@$dom->loadHTML(file_get_contents($link));
		$dom->preserveWhiteSpace = false;
		$tables = $dom->getElementById('tdData');
		$share1= $tables->getElementsByTagName('tr')->item(26);
		$promoter= $share1->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_promoters.="<td><input name='promoter[]' value='$promoter' class='form-control'/></td></tr>";
		$share2= $tables->getElementsByTagName('tr')->item(31);
		$fii = $share2->getElementsByTagName('td')->item(5)->nodeValue;
		$share_holding_pattern_fii.="<td><input name='fii[]' value='$fii' class='form-control'/></td></tr>";
		$share3= $tables->getElementsByTagName('tr')->item(32);
		$sub_total = $share3->getElementsByTagName('td')->item(5)->nodeValue;
		$dii = $sub_total-$fii;
		$share_holding_pattern_dii.="<td><input name='dii[]' value='$dii' class='form-control'/></td></tr>";
		$share_holding_pattern_others.="<td><input name='others[]' class='form-control' value='".(100-($fii+$promoter+$dii))."' /></td></tr>";

		$share_holding_pattern = $share_holding_years.$share_holding_pattern_promoters.$share_holding_pattern_fii.$share_holding_pattern_dii.$share_holding_pattern_others;


	}
	catch(Exception $e) {
		echo json_encode(array('top_public_shareholders'=>"No data found",'major_promoters'=>"No data found",'link'=>$qtr_id_final));
	}
	echo json_encode(array('top_public_shareholders'=>$str,'major_promoters'=>$str2,'share_holding_patters'=>$share_holding_pattern));
}
elseif(isset($_GET['get_audit_committee_directors'])) {
	$db= new Database();
	$directors = $db->getAuditCommitteeDirectors($_GET['bse_code']);
	$str="<option>Select Director</option>";
	foreach($directors as $director) {
		$str.="<option value='$director[din_no]'>$director[dir_name]</option>";
	}
	echo json_encode(array('directors'=>$str));
}
elseif(isset($_GET['get_nomination_committee_directors'])) {
	$db= new Database();
	$directors = $db->getNominationCommitteeDirectors($_GET['bse_code']);
	$str="<option>Select Director</option>";
	foreach($directors as $director) {
		$str.="<option value='$director[din_no]'>$director[dir_name]</option>";
	}
	echo json_encode(array('directors'=>$str));
}
elseif(isset($_GET['get_remuneration_committee_directors'])) {
	$db= new Database();
	$directors = $db->getRemunerationCommitteeDirectors($_GET['bse_code']);
	$str="<option>Select Director</option>";
	foreach($directors as $director) {
		$str.="<option value='$director[din_no]'>$director[dir_name]</option>";
	}
	echo json_encode(array('directors'=>$str));
}
elseif(isset($_GET['get_company_directors'])) {
	$db= new Database();
	if(isset($_GET['financial_year'])) {
		$generic_array = $db->getCompanyDirectors($_GET['company_id'],$_GET['financial_year']);
	}
	else {
		$generic_array = $db->getCompanyDirectors($_GET['company_id']);
	}
	$directors = $generic_array['directors'];
	$str="<option>Select Director</option>";
	foreach($directors as $director) {
		$str.="<option value='$director[din_no]'>$director[dir_name]</option>";
	}
	echo json_encode(array('directors'=>$str));
}
elseif(isset($_GET['get_company_directors_in_year'])) {
	$db= new Database();
	$directors = $db->getCompanyDirectors($_GET['company_id'],$_GET['financial_year']);
	echo json_encode($directors);
}
elseif(isset($_GET['get_director_attendance_values'])) {
	$db = new Database();
	$director_attendance_values = $db->getDirectorAttendanceValues($_GET['company_id'],$_GET['dir_din_no'],$_GET['att_year']);
	$director_details = $db->getDirectorAttendanceDetails($_GET['company_id'],$_GET['dir_din_no'],$_GET['att_year']);
	$str = "";
	$comm_details = $db->areNominationRemunerationSame($_GET['company_id'],$_GET['att_year']);
	if($director_details['audit_committee']=='C' || $director_details['audit_committee']=='M') {
		$str.=" <div class='form-group'>
				<label class='col-md-3 control-label'>Audit Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='audit_committee_meetings_attended' id='audit_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Audit Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='audit_committee_meetings_held' id='audit_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='audit_committee_member' />";
	}
	if($comm_details['are_committees_seperate']=='no') {
		if ($director_details['nomination_remuneration'] == 'C' || $director_details['nomination_remuneration'] == 'M') {
			$str .= " <div class='form-group'>
				<label class='col-md-3 control-label'>Nomination and Remuneration Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='nom_and_rem_committee_meetings_attended' id='nom_and_rem_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Nomination and Remuneration Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='nom_and_rem_committee_meetings_held' id='nom_and_rem_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='rem_nom_same_committee' value='yes'/>";
		}
	}
	else {
		if ($director_details['nomination'] == 'C' || $director_details['nomination'] == 'M') {
			$str .= " <div class='form-group'>
				<label class='col-md-3 control-label'>Nomination Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='nomination_committee_meetings_attended' id='nomination_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Nomination Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='nomination_committee_meetings_held' id='nomination_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>";
		}
		if ($director_details['remuneration'] == 'C' || $director_details['remuneration'] == 'M') {
			$str.="<div class='form-group'>
				<label class='col-md-3 control-label'>Remuneration Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='remuneration_committee_meetings_attended' id='remuneration_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Remuneration Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='remuneration_committee_meetings_held' id='remuneration_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='rem_nom_same_committee' value='no'/>";
		}
	}
	if($director_details['investor_grievance']=='C' || $director_details['investor_grievance']=='M') {
		$str.=" <div class='form-group'>
				<label class='col-md-3 control-label'>Investors' Grievance/Stakeholders Relationship Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='investors_grievance_meetings_attended' id='investors_grievance_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Investors' Grievance/Stakeholders Relationship Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='investors_grievance_meetings_held' id='investors_grievance_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='investors_grievance_committee_member' />";
	}
	if($director_details['csr']=='C' || $director_details['csr']=='M') {
		$str.=" <div class='form-group'>
				<label class='col-md-3 control-label'>CSR Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='csr_committee_meetings_attended' id='csr_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>CSR Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='csr_committee_meetings_held' id='csr_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='csr_committee_member' />";
	}
	if($director_details['risk_management_committee']=='C' || $director_details['risk_management_committee']=='M') {
		$str.=" <div class='form-group'>
				<label class='col-md-3 control-label'>Risk Management Committee Meetings Attended</label>
				<div class='col-md-4'>
					<input class='form-control' name='risk_management_committee_meetings_attended' id='risk_management_committee_meetings_attended' placeholder='Enter no. of meetings attended or ND if not disclosed'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-md-3 control-label'>Risk Management Committee Meetings Held</label>
				<div class='col-md-4'>
					<input class='form-control' name='risk_management_committee_meetings_held' id='risk_management_committee_meetings_held' placeholder='Enter no. of meetings held or ND if not disclosed'/>
				</div>
			</div>
			<input type='hidden' name='risk_management_committee_member' />";
	}
	echo json_encode(array('attendance_values'=>$director_attendance_values,'blocks'=>$str));
}
elseif(isset($_GET['get_company_list_filtered'])) {
	$db = new Database();
	$company_details = $db->getCompanyDetailsFiltered($_GET['keywords']);
	$str = "<ul class='auto-fill-ul'>";
	foreach($company_details as $company) {
		$str.= "<li data-company-id='$company[id]'>$company[name]</li>";
	}
	$str.="</ul>";
	echo json_encode(array('list'=>$str,'counts'=>count($company_details)));
}
elseif(isset($_GET['get_company_details'])) {
	$db = new Database();
	$response = $db->isCompanyExists($_GET['cin']);
	echo json_encode(array('exists'=>$response));
}
elseif(isset($_GET['get_all_company_details'])) {
	$db = new Database();
	$company_details= $db->getCompanyDetails($_GET['company_id']);
	echo json_encode($company_details);
}
elseif(isset($_GET['get_company_details_editable'])) {
	$db = new Database();
	$company_details = $db->getCompanyDetails($_GET['company_id']);
	$company_peer_details = $db->getCompanyPeerDetails($_GET['company_id']);
	$str="<tr><th class='col-md-3'>BSE Code</th><td><input name='bse_code' class='form-control' value='$company_details[bse_code]'/></td></tr>
		  <tr><th>Company Name</th><td><input class='form-control' name='name' value='$company_details[name]'/></td></tr>
		  <tr><th>Corporate Identity Number (CIN)</th><td><input class='form-control' name='cin' value='$company_details[cin]'/></td></tr>
		  <tr><th>NSE Code</th><td><input class='form-control' name='nse_code' value='$company_details[nse_code]'/></td></tr>
		  <tr><th>ISIN</th><td><input class='form-control' name='isin' value='$company_details[isin]'/></td></tr>
		  <tr><th>Face Value</th><td><input class='form-control' name='face_value' value='$company_details[face_value]'/></td></tr>
		  <tr><th>Sector</th><td><input class='form-control' name='sector' value='$company_details[sector]'/></td></tr>
		  <tr><th>Email</th><td><input class='form-control' name='email' value='$company_details[email]'/></td></tr>
		  <tr><th>Website</th><td><input class='form-control' name='website' value='$company_details[website]'/></td></tr>
		  <tr><th>Fax</th><td><input class='form-control' name='fax' value='$company_details[fax]'/></td></tr>
		  <tr><th>Contact</th><td><input class='form-control' name='contact' value='$company_details[contact]'/></td></tr>
		  <tr><th>Registered Office Address</th><td><input class='form-control' name='address' value='$company_details[address]'/></td></tr>
		  <tr><th>Fiscal Year End</th><td>";
		  $str.="<select class='form-control' name='fiscal_year_end'>
				<option value=''>Select</option>";
				$months = array('3'=>'March','6'=>'June','9'=>'September','12'=>'December');
				foreach($months as $key=>$month) {
					if($key==$company_details['fiscal_year_end'])
						$str.= "<option selected value='$key'>$month</option>";
					else
						$str.= "<option value='$key'>$month</option>";
				}
				$str.="</select></td></tr>";
		  $str.="<tr>
			  		<th>Peer 1 Company</th>
			  		<td>
			  			<input type='hidden' name='peer_1_company_id' id='peer_1_company_id' value='".$company_peer_details['peer1_company_details']['id']."'/>
			  			<div style='position: relative;' class='auto-fill-container'>
							<input type='text' autocomplete='off' name='peer_1_company_name' placeholder='Enter peer 1 company name' id='peer_1_company_keywords' class='form-control' value='".$company_peer_details['peer1_company_details']['name']."'/>
							<div class='auto-fill hidden'>

							</div>
						</div>
			  		</td>
			  	 </tr>";
	      $str.="<tr>
					<th>Peer 2 Company</th>
					<td>
						<input type='hidden' name='peer_2_company_id' id='peer_2_company_id' value='".$company_peer_details['peer2_company_details']['id']."'/>
						<div style='position: relative;' class='auto-fill-container'>
							<input type='text' autocomplete='off' name='peer_2_company_name' placeholder='Enter peer 2 company name' id='peer_2_company_keywords' class='form-control' value='".$company_peer_details['peer2_company_details']['name']."'/>
							<div class='auto-fill hidden'>

							</div>
						</div>
					</td>
				 </tr>";
	      echo json_encode(array('details'=>$str));
}
elseif(isset($_GET['get_director_list_filtered'])) {
	$db = new Database();
	$director_details = $db->getDirectorDetailsFiltered($_GET['keywords']);
	$str = "<ul class='auto-fill-ul'>";
	foreach($director_details as $director) {
		$str.= "<li data-director_id='$director[id]' data-din-no='$director[din_no]'>$director[dir_name]</li>";
	}
	$str.="</ul>";
	echo json_encode(array('list'=>$str,'counts'=>count($director_details)));
}
elseif(isset($_GET['get_director_details'])) {
	$db = new Database();
	$director_details = $db->getDirectorDetails($_GET['director_id']);
	echo json_encode($director_details);
}
elseif(isset($_GET['get_director_info_json'])) {
	$db = new Database();
	if(isset($_GET['edit'])) {
		$_GET['financial_year'] = intval($_GET['financial_year'])+1;
	}
	$director_info = $db->getDirectorInfo($_GET['company_id'],$_GET['dir_din_no'],$_GET['financial_year']);
	if($director_info['row_count']!=0) {
		$director_info['appointment_date'] = date_format(date_create_from_format('Y-m-d', $director_info['appointment_date']), 'd-m-Y');
		if($director_info['resignation_date']!="0000-00-00")
			$director_info['resignation_date'] = date_format(date_create_from_format('Y-m-d', $director_info['resignation_date']), 'd-m-Y');
		else
			$director_info['resignation_date']="";
	}
	echo json_encode(array('director_info'=>$director_info,'count'=>$director_info['row_count']));
}
elseif(isset($_GET['get_company_auditor_info'])) {
	$db = new Database();
	$company_auditors = $db->getCompanyAuditorsInfo($_GET['company_id'],$_GET['financial_year']);
	echo json_encode($company_auditors);
}
elseif(isset($_GET['get_dividend_info_last_year'])) {
	$db = new Database();
	$financial_year = intval($_GET['financial_year'])-1;
	$dividend_info = $db->getDividendInfo($_GET['company_id'],$financial_year);
	$dividend_info_this_year = $db->getDividendInfo($_GET['company_id'],$_GET['financial_year']);
	$dividend_info['this_year_count']= $dividend_info_this_year['count'];
	echo json_encode($dividend_info);
}
elseif(isset($_GET['get_dividend_info'])) {
	$db = new Database();
	$financial_year = intval($_GET['financial_year']);
	$dividend_info = $db->getDividendInfo($_GET['company_id'],$financial_year);
	echo json_encode($dividend_info);
}
elseif(isset($_POST['remove_director_file'])) {
	$path="InputSheet/admin/uploads/$_POST[file_id]";
	if(unlink($path))
		echo json_decode(array('success'=>200));
	else
		echo json_decode(array('error'=>400));
}
elseif(isset($_POST['user_login'])) {
	$db = new Database();
	$response = $db->checkLogin($_POST,$_config['base_url']);
	echo json_encode($response);
}
elseif(isset($_GET['remuneration_analysis_3_years'])) {
	session_start();
	$start_year = $_GET['first_year'];
	$din_nos = $_GET['din_nos'];
	$db = new Database();
	$response = $db->remunerationLast3Years($start_year,$din_nos);
	echo json_encode($response);
}
elseif(isset($_GET['company_profit_5_years'])) {
	session_start();
	$company_id = $_SESSION['company_id'];
	$db = new Database();
	$response = $db->getCompanyProfit5Years($_GET['financial_year_start'],$company_id);
	echo json_encode($response);
}
elseif(isset($_GET['appointment_directors'])) {
	session_start();
	$company_id = $_SESSION['company_id'];
	$financial_year = $_SESSION['report_year'];
	$dir_din_no = $_GET['dir_din_no'];
	$db = new DatabaseReports();
	$response = $db->getAppointedDirectorInfo($company_id,$financial_year,$dir_din_no);
	echo json_encode($response);
}
elseif(isset($_POST['set_start_report'])) {
	$db = new DatabaseReports();
	$response = $db->getReportDetails($_POST['report_id']);
	if(count($response)>0) {
		session_start();
		$_SESSION['report_id'] = $_POST['report_id'];
		$report_details = $response['report_details'];
		$_SESSION['company_id'] = $report_details['company_id'];
		$_SESSION['report_year'] = $report_details['report_year'];
		echo json_encode(array('status'=>200,'row'=>$report_details));
	}
	else {
		echo json_encode(array('status'=>500));
	}
}
elseif(isset($_GET['load_dashboard'])) {
	session_start();
	$db = new DatabaseReports();
	$response = $db->reportDetails();
	$incomplete_reports = $response['incomplete_reports'];
	$completed_reports = $response['completed_reports'];
	$incomplete_report_str = "";
	foreach($incomplete_reports as $report) {
		$incomplete_report_str.="<tr class='tr-td-center''>
									<td class='text-center'>$report[report_id]</td>
									<td class='text-center'>$report[name]</td>
									<td class='text-center'>$report[report_year]</td>
									<td class='text-center''>";
										if(isset($_SESSION['report_id'])) {
											if($_SESSION['report_id']==$report['report_id']) {
												$incomplete_report_str.="<button type='button' class='btn btn-primary continue-with-report disabled' data-report-id=''$report[report_id]'>Running Report</button>&nbsp;&nbsp;&nbsp;&nbsp;";
											}
											else {
												$incomplete_report_str.="<button type='button' class='btn btn-primary continue-with-report' data-report-id='$report[report_id]'>Continue with Report</button>&nbsp;&nbsp;&nbsp;&nbsp;";
											}
										}
										else {
											$incomplete_report_str.="<button type='button' class='btn btn-primary continue-with-report' data-report-id='$report[report_id]'>Continue with Report</button>&nbsp;&nbsp;&nbsp;&nbsp;";
										}
										$incomplete_report_str.="<button type='button' data-report-id='$report[report_id]' class='btn btn-success mark-completed'>Mark Completed</button>
									</td>
								</tr>";
	}
	$complete_report_str = "";
	foreach($completed_reports as $report) {
		$complete_report_str.="<tr class='tr-td-center''>
									<td class='text-center'>$report[report_id]</td>
									<td class='text-center'>$report[name]</td>
									<td class='text-center'>$report[report_year]</td>
									<td class='text-center''><button type='button' class='btn btn-success'>Download Report</button></td>
								</tr>";
	}
	echo json_encode(array(
		'incomplete_reports'=>$incomplete_report_str,
		'complete_reports'=>$complete_report_str,
		'complete_count'=>count($completed_reports),
		'incomplete_count'=>count($incomplete_reports)
	));
}
elseif(isset($_GET['mark_completed'])) {
	$db = new DatabaseReports();
	$response = $db->markCompleted($_GET['report_id']);
	if($response) {
		echo json_encode(array('status'=>200));
	}
	else {
		echo json_encode(array('status'=>500));
	}
}
elseif(isset($_POST['change_password'])) {
	$db = new DatabaseReports();
	$response = $db->changePassword($_POST['cp_user_name'],$_POST['current_password'],$_POST['new_password']);
	echo json_encode($response);
}
elseif(isset($_POST['remember_selection'])) {
	session_start();
	$_SESSION['input_sheet_company_name'] = $_POST['company_name'];
	$_SESSION['input_sheet_financial_year'] = $_POST['financial_year'];
	$_SESSION['input_sheet_company_id'] = $_POST['company_id'];
	echo json_encode(array('status'=>200));
}

// Pradeep's section
// Adoption of accounts
elseif(isset($_GET['Financial_indicator'])) {
	$db=new DatabaseReports();
	$year=$_GET['Year'];
	$response=$db->financial_indicator($year);
	echo json_encode($response);
}
elseif(isset($_GET['CheckDataExisting'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$response=$db->checkExistingOfData($main_section);
	echo json_encode($response);
}
elseif(isset($_GET['GetExistingDataofAdoption'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$financial_indicators=$db->getAdoptionOfAccountsFinancialIndicators();
	$unaudited_statements=$db->getAdoptionOfAccountsUnauditedStatements();
	$contingent_liabilities=$db->getAdoptionOfAccountsContingentLiabilities();
	$rpt=$db->getAdoptionOfAccountsRpt();
	$standalone_consolidated=$db->getAdoptionOfAccountsStandaloneConsolidatedAcc();
	echo json_encode(array(
		'other_text'=>$other_text,
		'analysis'=>$analysis,
		'recommendation'=>$recommendation,
		'triggers'=>$triggers,
		'checkbox'=>$checkbox,
		'financial_indicators'=>$financial_indicators,
		'unaudited_statements'=>$unaudited_statements,
		'contingent_liabilities'=>$contingent_liabilities,
		'rpt'=>$rpt,
		'standalone_consolidated'=>$standalone_consolidated
	));
}
// Declaration of dividend
elseif(isset($_GET['GetExistingDataOfDeclaration'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$table2=$db->getDeclarationOfDividentTable2();
	$table1=$db->getDeclarationOfDividentTable1();
	echo json_encode(array('other_text'=>$other_text,'analysis'=>$analysis,'recommendation'=>$recommendation,
		'triggers'=>$triggers,'table1'=>$table1,'table2'=>$table2));
}
// appointment of auditors
elseif(isset($_GET['GetExistingDataofAppointmentOfAuditors'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$table1=$db->getAppointmentOfAuditorsTable1();
	echo json_encode(array('other_text'=>$other_text,'analysis'=>$analysis,'recommendation'=>$recommendation,
		'triggers'=>$triggers,'checkbox'=>$checkbox,'table1'=>$table1));
}
elseif(isset($_GET['auditor_info'])) {
	session_start();
	$db=new Database();
	$company_id=$_SESSION['company_id'];
	$financial_year=$_SESSION['report_year'];
	$auditors_info=$db->getCompanyAuditorsInfo($company_id, $financial_year);
	echo json_encode($auditors_info);
}
// Director remuneration
elseif(isset($_GET['GetExistingDataofDirectorsRemuneration'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$totalcommission=$db->getDirectorRemunerationTotalCommission();
	$past_remuneration=$db->getDirectorRemunerationPastRemuneration();
	$remuneration_package=$db->getDirectorRemunerationPackage();
	$peer_comparsion=$db->getDirectorRemunerationPeerComparsion();
	$ed_remuneration=$db->getDirectorRemunerationEDRemuneration();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox,
			'totalcommission'=>$totalcommission,
			'past_remuneration'=>$past_remuneration,
			'remuneration_package'=>$remuneration_package,
			'peer_comparsion'=>$peer_comparsion,
			'ed_remuneration'=>$ed_remuneration)
	);
}
elseif(isset($_GET['DirectorsInfo'])){
	session_start();
	$db=new DatabaseReports();
	$company_id = $_SESSION['company_id'];
	$financial_year = $_SESSION['report_year'];
	$director_info=$db->getRemunerationAnalysisDetails($company_id,$financial_year);
	echo json_encode($director_info);
}
elseif(isset($_GET['DirectorsCommission'])){
	session_start();
	$db=new DatabaseReports();
	$nedp=$db->getDirectorRemunerationCalculateTotalCommission();
	echo json_encode($nedp);
}
elseif(isset($_GET['TotalCommission'])){
	session_start();
	$db=new DatabaseReports();
	$year=$_GET['Year'];
	$commission=$db->getDirectorRemunerationTotalCommissionOfYear($year);
	echo json_encode($commission);
}
elseif(isset($_GET['DirectorsPeerInfo'])){
	session_start();
	$db=new DatabaseReports();
	$company_id = $_SESSION['company_id'];
	$financial_year = $_SESSION['report_year'];
	$director_peer_info=$db->executiveRemnunerationPeerComparisionData($company_id,$financial_year);
	echo json_encode($director_peer_info);
}
// ESOPS
elseif(isset($_GET['GetExistingDataofEsop'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$esop_repricing=$db->getEsopRepricingOptiosBeingRepriced();
	$esop_stock=$db->getEsopRepricingStockPerformance();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox,
			'esop_stock'=>$esop_stock,
			'esop_repricing'=>$esop_repricing)
	);
}
// RPT
elseif(isset($_GET['GetExistingDataOfRPT'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$table1=$db->getRPTTable1();
	$table2=$db->getRPTTable2();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'table1'=>$table1,
			'table2'=>$table2)
	);
}
//Corporate Action
elseif(isset($_GET['GetExistingDataofCorporateAction'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$shareholding_pattern=$db->getCorporateActionShareholdingPattern();
	$borrowing_limits=$db->getCorporateActionBorrowingLimits();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox,
			'shareholding_pattern'=>$shareholding_pattern,
			'borrowing_limits'=>$borrowing_limits)
	);
}
// Issues of Share
elseif(isset($_GET['GetExistingDataofIssuesOfShares'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$past_equity=$db->getIssuesOfSharesPastEquity();
	$dilution_to_shareholding=$db->getIssuesOfSharesDilutionToShareholding();
	$dilution_to_shareholding_securities=$db->getIssuesOfSharesDilutionToShareholdingSecurities();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox,
			'past_equity'=>$past_equity,
			'dilution_to_shareholding'=>$dilution_to_shareholding,
			'dilution_to_shareholding_securities'=>$dilution_to_shareholding_securities
		));
}
//Alteration in MOA-AOA
elseif(isset($_GET['GetExistingDataofAlterationInMOA'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox)
	);
}
//Committee Performance
elseif(isset($_GET['CheckDataExistingOfCommiteePerformance'])) {
	session_start();
	$db=new DatabaseReports();
	$table_name="pa_report_board_committee_performance";
	$report_id=$_SESSION['report_id'];
	$response=$db->isReportDataExists($report_id,$table_name);
	echo json_encode($response);
}
elseif(isset($_GET['GetExistingDataofCommitteePerformance'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$commitee_performance=$db->getCommitteePerformanceDetails();
	$board_governance_score=$db->getBoardGovernanceScore();
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	echo json_encode(array(
		'commitee_performance'=>$commitee_performance,
		'analysis'=>$analysis,
		'board_governance_score'=>$board_governance_score
	));
}
//Remuneration Analysis
elseif(isset($_GET['CheckDataExistingOfRemunerationAnalysis'])) {
	session_start();
	$db=new DatabaseReports();
	$table_name="pa_report_remuneration_analysis";
	$report_id=$_SESSION['report_id'];
	$response=$db->isReportDataExists($report_id,$table_name);
	echo json_encode($response);
}
elseif(isset($_GET['GetExistingDataofRemunerationAnalysis'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$remuneration_analysis=$db->getRemunerationAnalysis();
	$executive_remuneration_growth=$db->getExecutiveRemunerationGrowth();
	$executive_remuneration_peer_comparison=$db->getExecutiveRemunerationPeerComparison();
	$variation_director_remuneration=$db->getVariationDirectorRemuneration();
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	echo json_encode(array(
		'remuneration_analysis'=>$remuneration_analysis,
		'executive_remuneration_growth'=>$executive_remuneration_growth,
		'executive_remuneration_peer_comparison'=>$executive_remuneration_peer_comparison,
		'analysis'=>$analysis,
		'variation_director_remuneration'=>$variation_director_remuneration));
}
// Intercorporate Loan
elseif(isset($_GET['GetExistingDataOfIntercorporateLoan'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$checkbox=$db->getCheckbox($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$existing_transactions=$db->getIntercorporateLoanExistingTransactions();
	$the_recipient=$db->getIntercorporateLoanTheRecipient();
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'checkbox'=>$checkbox,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'existing_transactions'=>$existing_transactions,
			'the_recipient'=>$the_recipient)
	);
}
// SCHEME OF ARRANGEMENT/AMALGAMATION
elseif(isset($_GET['GetExistingDataofSchemeOfArrangement'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$capital_structure=$db->getCapitalStructure();
	$profiles_of_the_companies=$db->getProfilesOfTheCompanies();
	$share_holding=$db->getShareHolding();

	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'capital_structure'=>$capital_structure,
			'profiles_of_the_companies'=>$profiles_of_the_companies,
			'share_holding'=>$share_holding)
	);
}
// appointment directors
elseif(isset($_GET['CheckDataExistingAD'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$slot_no=$_GET['Slot_no'];
	$response=$db->checkExistingOfDataAD($main_section,$slot_no);
	echo json_encode($response);
}
elseif(isset($_GET['GetExistingDataofAppointmentOfDirectors'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$slot_no=$_GET['Slot_no'];
	$analysis=$db->getAnalysisDataAD($resolution_section,$main_section,$slot_no);
	$recommendation=$db->getRecommendationDataAD($resolution_section,$main_section,$slot_no);
	$other_text=$db->getOtherTextDataAD($resolution_section,$main_section,$slot_no);
	$triggers=$db->getTriggersAD($resolution_section,$main_section,$slot_no);
	$checkbox=$db->getCheckboxAD($resolution_section,$main_section,$slot_no);
	$past_remuneration=$db->getAppointmentOfDirectorPastRemuneration($resolution_section,$main_section,$slot_no);
	$peer_comparsion=$db->getAppointmentOfDirectorPeerComparsion($resolution_section,$main_section,$slot_no);
	$table_2=$db->getAppointmentOfDirectorTable2($resolution_section,$main_section,$slot_no);
	$remuneration_package=$db->getAppointmentOfDirectorRemunerationPackage($resolution_section,$main_section,$slot_no);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'checkbox'=>$checkbox,
			'past_remuneration'=>$past_remuneration,
			'peer_comparsion'=>$peer_comparsion,
			'table_2'=>$table_2,
			'remuneration_package'=>$remuneration_package)
	);
}
// fill investment
elseif(isset($_GET['GetExistingDataofFillInvestment'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$fii=$db->getOtherResolutionFillInvestment($resolution_section,$main_section);
	$promoter=$db->getOtherResolutionPromoterShareholding($resolution_section,$main_section);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'fii'=>$fii,
			'promoter'=>$promoter)
	);
}
// delisting of shares
elseif(isset($_GET['GetExistingDataofDelistingOfShares'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation)
	);
}
// donation of chritable trust
elseif(isset($_GET['GetExistingDataofDonationsToCharitableTrust'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	$csr_contributors=$db->getDonationsOfCharitableCSR($resolution_section,$main_section);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers,
			'csr_contributors'=>$csr_contributors)
	);
}
// office of profit
elseif(isset($_GET['GetExistingDataofOfficeOfProfit'])) {
	session_start();
	$db=new DatabaseReports();
	$main_section=$_GET['MainSection'];
	$resolution_section=$_GET['ResolutionName'];
	$analysis=$db->getAnalysisData($resolution_section,$main_section);
	$recommendation=$db->getRecommendationData($resolution_section,$main_section);
	$other_text=$db->getOtherTextData($resolution_section,$main_section);
	$triggers=$db->getTriggers($resolution_section,$main_section);
	echo json_encode(array(
			'other_text'=>$other_text,
			'analysis'=>$analysis,
			'recommendation'=>$recommendation,
			'triggers'=>$triggers)
	);
}
// disclousres
elseif(isset($_GET['CheckDataExistingDisclosure'])) {
	session_start();
	$db=new DatabaseReports();
	$response=$db->checkExistingOfDataDisclosures();
	echo json_encode($response);
}
elseif(isset($_GET['GetExistingDataofDisclosures'])) {
	session_start();
	$db=new DatabaseReports();
	$disclosures=$db->getDisclosures();
	echo json_encode(array(
			'disclosures'=>$disclosures
		)
	);
}
?>
