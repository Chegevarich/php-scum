<?php 

$a = [1,1,1,1,1,1,1,100];

function findIt($array, $sumNeeded) {
	if (array_search($sumNeeded, $array)) {
		return true;
	}
	
	$sum = 0;
	for ($i=0;$i<count($array); $i++)
	{
		$sum += $array[$i];
		if ($sum === $sumNeeded) {
			return true;
		} else {
			$sum -= ($array[$i-1] ?? 0);
		}
	}
	
	return false;
}

print_r(['imposible', findIt($a, 999) === true ? 'true' : 'false']);

print_r(['0 to find (impossible)', findIt($a, 0) === true ? 'true' : 'false']);

print_r(['first is the answer', findIt($a, 1) === true ? 'true' : 'false']);

print_r(['last is the answer', findIt($a, 100) === true ? 'true' : 'false']);

print_r(['last + prev is the answer', findIt($a, 100) === true ? 'true' : 'false']);

print_r(['middle is the answer', findIt($a, 4) === true ? 'true' : 'false']);

print_r(['N < 0 searched', findIt($a, -1) === true ? 'true' : 'false']);