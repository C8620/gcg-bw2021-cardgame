<?php
function decode($encoded, $range, $items){
    $temp=$encoded%$range;
    $arr=array($temp);
    $encoded-=$temp;
    $encoded/=$range;
    for($i=0; $i<$items; $i++){
        $temp=$encoded%$range;
        array_push($arr, $temp);
        $encoded-=$temp;
        $encoded/=$range;
    }
    return $arr;
}

function encode($list, $range){
	$items=count($list);
    $base=1;
	$encoded=0;
    for($i=0; $i<$items; $i++){
        //echo gettype($value);
		$encoded+=$base*$list[$i];
		$base*=$range;
    }
    return $encoded;
}
?>