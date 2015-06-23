<?php
$dom = new domDocument;
    $link = "http://www.bseindia.com/corporates/ShareholdingPattern.aspx?scripcd=500547&flag_qtr=1&qtrid=82.00&Flag=New"; 
    /*** get the HTML (suppress errors) ***/
    @$dom->loadHTML(file_get_contents($link));
     
    /*** remove silly white space ***/
    $dom->preserveWhiteSpace = false;
     
    /*** get the links from the HTML ***/
    $count=5;
    $tables = $dom->getElementById('tdData');


    // $pro= $tables->getElementsByTagName('tr')->item(25);
    //  $protomer= $pro->getElementsByTagName('td')->item(0)->nodeValue;
      
    // $f= $tables->getElementsByTagName('tr')->item(32);
    // $fii= $f->getElementsByTagName('td')->item(5)->nodeValue;

    // $d= $tables->getElementsByTagName('tr')->item(33);
    // $dii= $d->getElementsByTagName('td')->item(5)->nodeValue;
    $fii='';
    $dii='';
    for ($i=0; $i <= 50; $i++) { 
        $pro= $tables->getElementsByTagName('tr')->item($i);
        $pro1= $pro->getElementsByTagName('td')->item(0)->nodeValue;
        $val=strcmp($pro1,"Total shareholding of Promoter and Promoter Group (A)");
        if($val==0)
            $promoter= $pro->getElementsByTagName('td')->item(5)->nodeValue;
        $val1=strcmp($pro1,"Foreign Institutional Investors");
        if($val1==0)
            $fii= $pro->getElementsByTagName('td')->item(5)->nodeValue;
        $val2=strcmp($pro1,"Sub Total");
        if($val2==0)
            $dii= $pro->getElementsByTagName('td')->item(5)->nodeValue;
    }
    //echo $promoter;
    //$other=100-($protomer+$fii+$dii);
    echo "<table>
            <tr>
                <td>$promoter</td>
            </tr>
            <tr>
                <td>$fii</td>
            </tr>
            <tr>
                <td>$dii</td>
            </tr>
            
    </table>";
    ?>