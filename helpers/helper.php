<?php
	function subview($file){
		$file = __DIR__.'/../views/sub-views/'.$file;
		include $file;
	}

	function controlDigit($message){
		$sum = 0;
		$messageArrRe = str_split(strrev($message));
		$endItem = array_splice($messageArrRe, 0, 1);

		foreach($messageArrRe as $key => $value){
			$sum += ((int)$value) * (3 - 2*($key%2)); 
		}

		return ((10 - ($sum%10)) % 10) == $endItem[0];
	}

	function comparePWB($messageB, $messageP) {
		$value = array_splice(str_split($messageB), 3, 4);

		return implode($value) == $messageP;
	}
?>
