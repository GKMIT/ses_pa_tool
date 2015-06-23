 <?php
   $dom = new domDocument;
    $link = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=500547&expandable=0"; 
    /*** get the HTML (suppress errors) ***/
    @$dom->loadHTML(file_get_contents($link));
     
    /*** remove silly white space ***/
    $dom->preserveWhiteSpace = false;
     
    /*** get the links from the HTML ***/
    $tables = $dom->getElementById('acr');
 	$rev= $tables->getElementsByTagName('tr')->item(3);
 	$revenue=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$revenue[]= $rev -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

 	$other= $tables->getElementsByTagName('tr')->item(4);
 	$other_income=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$other_income[]= $other -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

 	$total= $tables->getElementsByTagName('tr')->item(5);
 	$total_income=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$total_income[]= $total -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

 	$pb= $tables->getElementsByTagName('tr')->item(8);
 	$pbdt=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$pbdt[]= $pb -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

 	$net= $tables->getElementsByTagName('tr')->item(12);
 	$net_profit=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$net_profit[]= $net -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

	$ep= $tables->getElementsByTagName('tr')->item(14);
 	$eps = array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$eps[]= $ep -> getElementsByTagName('td')->item($i)->nodeValue;
 	} 

 	$op= $tables->getElementsByTagName('tr')->item(16);
 	$opm=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$opm[]= $op -> getElementsByTagName('td')->item($i)->nodeValue;
 	}

 	$np= $tables->getElementsByTagName('tr')->item(17);
 	$npm=array();
 	for ($i=1; $i <= 3 ; $i++) { 
 		$npm[]= $np -> getElementsByTagName('td')->item($i)->nodeValue;
 	}	

 	echo "<table>
   	<tr>
	   	<td>$revenue[0]</td>
	   	<td>$revenue[1]</td>
	   	<td>$revenue[2]</td>
   	</tr>
   	<tr>
	   	<td>$other_income[0]</td>
	   	<td>$other_income[1]</td>
	   	<td>$other_income[2]</td>
   	</tr>
   	<tr>
	   	<td>$total_income[0]</td>
	   	<td>$total_income[1]</td>
	   	<td>$total_income[2]</td>
   	</tr>
   	<tr>
	   	<td>$pbdt[0]</td>
	   	<td>$pbdt[1]</td>
	   	<td>$pbdt[2]</td>
   	</tr>
   	<tr>
	   	<td>$net_profit[0]</td>
	   	<td>$net_profit[1]</td>
	   	<td>$net_profit[2]</td>
   	</tr>
   	<tr>
	   	<td>$eps[0]</td>
	   	<td>$eps[1]</td>
	   	<td>$eps[2]</td>
   	</tr>
   	<tr>
	   	<td>$opm[0]</td>
	   	<td>$opm[1]</td>
	   	<td>$opm[2]</td>
   	</tr>
	<tr>
	   	<td>$npm[0]</td>
	   	<td>$npm[1]</td>
	   	<td>$npm[2]</td>
   	</tr>
   	</table>";
?>