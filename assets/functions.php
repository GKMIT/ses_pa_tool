<?php
function bubbleSort(array $arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        for ($j = $n - 1; $j >= $i; $j--) {
            if(floatval($arr[$j-1][1]) < floatval($arr[$j][1])) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}
function page3SortAdd($shareholders) {
    $shareholders = bubbleSort($shareholders);
    $final_array = array();
    foreach($shareholders as $val) {
        if(!array_key_exists($val[0],$final_array)) {
            $final_array[$val[0]]=$val[1];
        }
        else {
            $final_array[$val[0]]=$final_array[$val[0]]+$val[1];
        }
    }
    return $final_array;
}
?>