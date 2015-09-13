This is a PHP function to convert and display large numbers in shortened versions.
I.e: convert thousands into K's and millions into M's. (E.g: "12.52K", "15.61M" )
Also format unconverted thousands to be divided by comma (E.g: "9,512")

By default it only converts numbers over 10000, however you can define custom value for $minConvertLimit.

formatLargeNumbers($myNumber,$minConvertLimit);

The 1st parameter is your number.
The 2nd parameter is the minimum value that should be converted.



Example to use:

$myNumber = 123456;
// define your number

$minConvertLimit = 100000;
// define the minimum value that should be converted (by default it is 10000)

formatLargeNumbers($myNumber,$minConvertLimit);
//run the function

//before trying to run it, ensure that the whole function is present in your code