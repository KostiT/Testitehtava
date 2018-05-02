<?php

/**
 * Response helper function for json return.
 * @param  string $content
 */
function response($content) {
	header('Content-Type: application/json');
	echo $content;
	exit;
}

/**
 * Check if number is prime.
 * @param  int  $number
 * @return boolean
 */
function isPrime($number) {
	$i = 2;
	$n = abs($number);
	while ( $i <= sqrt($n) ) {
		if ($n % $i == 0) {
			return false;
		}
		$i++;
	}

	return true;
}

/**
 * sum comma separated numbers
 * @param  string $numbers
 * @return int
 */
function sumNumbers($numbers)
{
	$numbers = explode(',', $numbers);
	$sum = 0;
	foreach ($numbers as $number) {
		$number = intval($number);
		$sum += $number;
	}

	return $sum;
}