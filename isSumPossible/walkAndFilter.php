<?php 

$a = [1,1,1,1,1,1,1,100];


function findIt($array, $sumNeeded) {
	
	$originalArray = $array;
	
	for ($i=0; $i<count($array); $i++) {
		
		if (array_search($sumNeeded, $array) !== false) {
			return true;
		}
		
		if ($i > 0) {
			array_walk($array, 'sumNextToThis', [$i, $originalArray]);
			array_filter($array, fn($item) => $item <= $sumNeeded);
		}
	}
	
	return false;
}

function sumNextToThis(&$item, $key, $list) {
	list($i, $array) = $list;
	$item += ($array[$i + $key] ?? 0);
}

print_r(['imposible', findIt($a, 999) === true ? 'true' : 'false']);

print_r(['0 to find (impossible)', findIt($a, 0) === true ? 'true' : 'false']);

print_r(['first is the answer', findIt($a, 1) === true ? 'true' : 'false']);

print_r(['last is the answer', findIt($a, 100) === true ? 'true' : 'false']);

print_r(['last + prev is the answer', findIt($a, 100) === true ? 'true' : 'false']);

print_r(['middle is the answer', findIt($a, 4) === true ? 'true' : 'false']);

print_r(['N < 0 searched', findIt($a, -1) === true ? 'true' : 'false']);
