<?php
$dom = new domDocument;
    $link = "http://www.bseindia.com/corporates/shpperent.aspx?scripcd=500380&qtrid=82&CompName=JK%20LAKSHMI%20CEMENT%20LTD%20&QtrName=June%202014"; 
    /*** get the HTML (suppress errors) ***/
    @$dom->loadHTML(file_get_contents($link));
     
    /*** remove silly white space ***/
    $dom->preserveWhiteSpace = false;
     
    /*** get the links from the HTML ***/
    $count=6;
    echo "hello";
    $tables = $dom->getElementById('tdData');
    for ($i=7; $i <=13 ; $i++) { 
    	$share1= $tables->getElementsByTagName('tr')->item($i);
    	$shareholder1[][]=array();
 		for ($j=1; $j <= 3 ; $j=$j+2) { 
 			//echo $shareholder1[$i][$j];
 			$val=strcmp($share1->getElementsByTagName('td')->item($j)->nodeValue,"Total");
 			if($val==0)
 				goto s1;
 			else
 				$shareholder1[$i][$j]= $share1->getElementsByTagName('td')->item($j)->nodeValue;
 		}	
 		$count++;
    }
 	

 	//print_r($shareholder1);
 	s1:	
 	//echo $count;
 	echo "<table>";
 			for ($i=7; $i <=$count ; $i++) { 
 				echo "<tr>";
 	 			for ($j=1; $j <=3 ; $j=$j+2) { 
 	 			echo "<td>".$shareholder1[$i][$j]."</td>";
 	 			}
 	 			
 	 			echo "</tr>";
 			}
 	 		
 	echo "</table>";
 ?>