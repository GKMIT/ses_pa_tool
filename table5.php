<?php 
	include_once('simple_html_dom.php');

	$html = file_get_html("http://www.bseindia.com/corporates/shpperent.aspx?scripcd=500547&qtrid=82&CompName=BHARAT%20PETROLEUM%20CORPORATION%20LTD%20&QtrName=June%202014");
		$table = $html->find('table ', 3);
		//echo $table;
		for ($i=1; $i <=7 ; $i++) { 
			$rev = $html->find('table', 3)->find('tr')[$i];
   			$revenue[][]=array();
   			for ($j=1; $j <=3 ; $j++) { 
   				$td=$rev->find('td')[$j];
   				$revenue[$i][$j]=$td->text();
   			}
		}

		echo $revenue[2][1];
		echo $revenue[2][3];
		echo $revenue[3][1];
		echo $revenue[7][1];
		//echo $revenue[8][1];
?>