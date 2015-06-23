<?php

$dom = new domDocument;
$link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=532873&flag_qtr=1&qtrid=84.00&Flag=New";
@$dom->loadHTML(file_get_contents($link));
$dom->preserveWhiteSpace = false;
$shareholders=array();
$tables = $dom->getElementById('tdData');
$total_shareholding_row= $tables->getElementsByTagName('tr')->item(31);
$shares_promoters = $total_shareholding_row->getElementsByTagName('td')->item(5)->nodeValue;
echo "Promo - ".$shares_promoters;

echo "<br/>";

$fii_row= $tables->getElementsByTagName('tr')->item(37);
$shares_fii = $fii_row->getElementsByTagName('td')->item(5)->nodeValue;
echo "Fii - ".$shares_fii;

echo "<br/>";

$fii_plus_dii_row= $tables->getElementsByTagName('tr')->item(38);
$shares_fii_plus_dii = $fii_plus_dii_row->getElementsByTagName('td')->item(5)->nodeValue;
//echo $shares_fii_plus_dii;

echo "<br/>";

echo "Dii - ".$shares_dii = $shares_fii_plus_dii-$shares_fii;

echo "<br/>";

echo "Rest - ".(100-($shares_dii+$shares_fii+$shares_promoters));


?>