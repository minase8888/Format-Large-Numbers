<?php
/* This is a PHP function to convert and display large numbers in shortened versions.
I.e: convert thousands into K's and millions into M's. (E.g: "12.52K", "15.61M" )
Also format unconverted thousands to be divided by comma (E.g: "9,512") */ 

function formatLargeNumbers($myNumber,$minConvertLimit = 10000, $displayConvertedNumber = true) {
/*takes 2 parameters, 
#1 is the number you want to convert. 
#2 is the smallest number that you want to convert (default = 10000) 
#3 sets if the result should be echoed. True by default.
*/

global $numDisplayResult;
//setting the result as global so it can be used outside of function

if ($myNumber >= $minConvertLimit) {
//if the number is larger than the $minConvertLimit

		$viewsNumMillions = intval($myNumber / 1000000);
		$viewsNumThousands = intval($myNumber / 1000);
		//check how many times the number includes a million / thousand

		//if at least one million	
		if ($viewsNumMillions > 0) {
			$remainder = $myNumber % 1000000;

			if (intval(ceil($remainder / 10000)) == 100){
			$remainder = 0;
			$viewsNumThousands = $viewsNumMillions +1;
			}
			//correct cases where the remainder rounds up to hundred

			else{
			$remainder = "." . intval(ceil($remainder / 10000));}
		//define the remainder after deviding it into millions
		//then divide it by 10K and round it up --> you will get numbers in format like "15.52(M)"

			if ($remainder == 0) {
				$remainder = "";
			}
		//but if it rounds to zero, don't display it

			$numDisplayResult = $viewsNumMillions . $remainder . "M";
		//define the display pattern of million figures

		}


		// if less than a million
		else {
		$remainder = $myNumber % 1000;
		if (intval(ceil($remainder / 10)) == 100) {
		//correct cases where the remainder rounds up to hundred
			$remainder = 0;
			$viewsNumThousands = $viewsNumThousands +1;
		} 
		else {
		$remainder = "." . intval(ceil($remainder / 10));
		// define the remainder after dividing the number by thousands
		// then divide it by 10 and round it up --> you will get numbers like "12.21(K)"
		}
			if ($remainder == 0) {
				$remainder = "";
			}

		//but if it rounds to zero, don't display it

		$numDisplayResult = $viewsNumThousands . $remainder . "K";
		//define the display pattern of thousand figures

	}
}


// add commas for thousands if $myNumber was below $minConvertLimit
if ($myNumber < $minConvertLimit) {
	$viewsNumLength = strlen($myNumber);
	//check the length of the number
	if($viewsNumLength > 3) {
	//check if length is at least 3 characters	
		$viewsNumArray = str_split($myNumber);
		//convert into array
		array_splice($viewsNumArray, -3, 0, ",");
		//inject coma into the array by counting 3 elements from the end of the array using array_splice
		$numDisplayResult = implode($viewsNumArray);
		//convert it back to string and define result
	}
	else {
	$numDisplayResult = $myNumber; }
}

if ($displayConvertedNumber == true) {
	//echo result if display is set to true
echo $numDisplayResult;}

return $numDisplayResult;
	// return result
}



?>