 <?php
 include('Classes/PHPExcel/IOFactory.php');


//$inputFileType = 'Excel5';
	$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';
$inputFileName = 'assets/excel/book1.xlsx';
$sheetname = 'Sheet1';


class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
	public function readCell($column, $row, $worksheetName = '') {
		// Read rows 1 to 7 and columns A to E only
		if ($row >= 116 && $row <= 133) {
			if (in_array($column,range('B','H'))) {

				return true;
			}
		}
		return false;
	}
}

$filterSubset = new MyReadFilter();


// echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
// echo 'Loading Sheet "',$sheetname,'" only<br />';
$objReader->setLoadSheetsOnly($sheetname);
// echo 'Loading Sheet using filter<br />';
$objReader->setReadFilter($filterSubset);
$objPHPExcel = $objReader->load($inputFileName);



//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$sheetDataC=$objPHPExcel->getActiveSheet()->getCell('C116')->getValue();
$sheetDataD=$objPHPExcel->getActiveSheet()->getCell('D116')->getValue();
$sheetDataE=$objPHPExcel->getActiveSheet()->getCell('E116')->getValue();
$peer1Value=$objPHPExcel->getActiveSheet()->getCell('B131')->getValue();
$peer2Value=$objPHPExcel->getActiveSheet()->getCell('B132')->getValue();
$peer1_dividend=$objPHPExcel->getActiveSheet()->getCell('H131')->getValue();
$peer2_dividend=$objPHPExcel->getActiveSheet()->getCell('H132')->getValue();
// echo $sheetDataC."<br>".$sheetDataD."<br>".$sheetDataE;
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

 	$pay_outC=($sheetDataC * 1.1623)/$eps[0];
 	$pay_outD=($sheetDataD * 1.1623)/$eps[1];
 	$pay_outE=($sheetDataE * 1.1623)/$eps[2];

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
   		<td>$sheetDataC</td>
   		<td>$sheetDataD</td>
   		<td>$sheetDataE</td>
   	</tr>
   	<tr>
   		<td>$pay_outC</td>
   		<td>$pay_outD</td>
   		<td>$pay_outE</td>
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
   	//echo $peer1Value;

   	echo "<br>Values of peers:";
	$dom1 = new domDocument;
	$dom2 = new domDocument;
    $link1 = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=$peer1Value&expandable=0"; 
    $link2 = "http://www.bseindia.com/stock-share-price/stockreach_financials.aspx?scripcode=$peer2Value&expandable=0";
    /*** get the HTML (suppress errors) ***/
    @$dom1->loadHTML(file_get_contents($link1));
    @$dom2->loadHTML(file_get_contents($link2));
     
    /*** remove silly white space ***/
    $dom1->preserveWhiteSpace = false;
    $dom2->preserveWhiteSpace = false;
    /*** get the links from the HTML ***/
    $tables1 = $dom1->getElementById('acr');
 	$rev1= $tables1->getElementsByTagName('tr')->item(3);
 	$revenue1= $rev1 -> getElementsByTagName('td')->item(1)->nodeValue;

 	$tables2 = $dom2->getElementById('acr');
 	$rev2= $tables2->getElementsByTagName('tr')->item(3);
 	$revenue2= $rev2 -> getElementsByTagName('td')->item(1)->nodeValue;

 	$other1= $tables1->getElementsByTagName('tr')->item(4);
 	$other_income1= $other1 -> getElementsByTagName('td')->item(1)->nodeValue;
 	$other2= $tables2->getElementsByTagName('tr')->item(4);
 	$other_income2= $other2 -> getElementsByTagName('td')->item(1)->nodeValue;

	$total1= $tables1->getElementsByTagName('tr')->item(5);
 	$total_income1= $total1 -> getElementsByTagName('td')->item(1)->nodeValue;
 	$total2= $tables2->getElementsByTagName('tr')->item(5);
 	$total_income2= $total2 -> getElementsByTagName('td')->item(1)->nodeValue; 	

 	$pb1= $tables1->getElementsByTagName('tr')->item(8);
 	$pbdt1= $pb1-> getElementsByTagName('td')->item(1)->nodeValue;
 	$pb2= $tables2->getElementsByTagName('tr')->item(8);
 	$pbdt2= $pb2-> getElementsByTagName('td')->item(1)->nodeValue; 	

 	$net1= $tables1->getElementsByTagName('tr')->item(12);
 	$net_profit1= $net1-> getElementsByTagName('td')->item(1)->nodeValue;
 	$net2= $tables2->getElementsByTagName('tr')->item(12);
 	$net_profit2= $net2-> getElementsByTagName('td')->item(1)->nodeValue; 	

 	$ep1= $tables1->getElementsByTagName('tr')->item(14);
 	$eps1= $ep1-> getElementsByTagName('td')->item(1)->nodeValue;
 	$ep2= $tables2->getElementsByTagName('tr')->item(14);
 	$eps2= $ep2-> getElementsByTagName('td')->item(1)->nodeValue;

 	$pay_out1 = ($peer1_dividend * 1.1623)/ $eps1;
 	$pay_out2 = ($peer2_dividend * 1.1623)/ $eps2;

 	$op1= $tables1->getElementsByTagName('tr')->item(16);
 	$opm1= $op1-> getElementsByTagName('td')->item(1)->nodeValue;
 	$op2= $tables2->getElementsByTagName('tr')->item(16);
 	$opm2= $op2-> getElementsByTagName('td')->item(1)->nodeValue;

 	$np1= $tables1->getElementsByTagName('tr')->item(17);
 	$npm1= $np1-> getElementsByTagName('td')->item(1)->nodeValue;
 	$np2= $tables2->getElementsByTagName('tr')->item(17);
 	$npm2= $np2-> getElementsByTagName('td')->item(1)->nodeValue;

 	echo "<table>
 			<tr>
	 			<td>$revenue1</td>
	 			<td>$revenue2</td>
 			</tr>
 			<tr>
	 			<td>$other_income1</td>
	 			<td>$other_income2</td>
 			</tr>
 			<tr>
	 			<td>$total_income1</td>
	 			<td>$total_income2</td>
 			</tr>
 			<tr>
	 			<td>$pbdt1</td>
	 			<td>$pbdt2</td>
 			</tr>
 			<tr>
	 			<td>$net_profit1</td>
	 			<td>$net_profit2</td>
 			</tr>
 			<tr>
	 			<td>$eps1</td>
	 			<td>$eps2</td>
 			</tr>
 			<tr>
	 			<td>$peer1_dividend</td>
	 			<td>$peer2_dividend</td>
 			</tr>
 			<tr>
	 			<td>$pay_out1</td>
	 			<td>$pay_out2</td>
 			</tr>
 			<tr>
	 			<td>$opm1</td>
	 			<td>$opm2</td>
 			</tr>
 			<tr>
	 			<td>$npm1</td>
	 			<td>$npm2</td>
 			</tr>
 	</table>"
?>