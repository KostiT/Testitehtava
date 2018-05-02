<?php

require_once 'functions.php';


// if no Action is defined then stop.
if ( ! isset($_GET['Action']) ) {
	response('{ "error": "No Action specified" }');
}

// compare Action against defined ones.
switch ($_GET['Action']) {
	case 'sumandcheck':
		
		// numbers are required for sumandcheck
		if ( ! isset($_GET['numbers']) ) {
			response('{"error": "numbers not defined - sum and check"}');
		}

		$sum = sumNumbers($_GET['numbers']);
		$isPrime = isPrime($sum);

		$res = [
			'result'	=>	$sum,
			'isPrime'	=>	$isPrime
		];

		// encode the array the json and send it;
		response(json_encode($res));
		break;

	case 'checkprime':

		if ( ! isset($_GET['number']) ) {
			response('{"error": "number not defined - check prime"}');
		}

		$number = intval($_GET['number']);
		$isPrime = isPrime($number);

		$res = [
			'isPrime'	=>	$isPrime
		];
		
		response(json_encode($res));
		break;

	// otherwise
	default:
		response('{"error": "Action not defined"}');
		break;
}