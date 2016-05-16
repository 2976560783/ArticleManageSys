<?php 

/**
* 
*/
//  function shift(&$s,$n,$m){
//  	while ($m--) {
//  		$char = $s[0];
// 		 for ($i=1; $i < $n; $i++) { 
// 		 	$s[$i-1] = $s[$i];
// 		 }
// 		 $s[$n-1] = $char;

//  	}
// 	}
// $start = microtime();
// $s = 'abcdef';
// shift($s,strlen($s),3);
// $end = microtime();
// var_dump($s);
// echo $end-$start."<br>";

function ReverseString(&$s,$from,$to){
	while ($from < $to) {
		$t = $s[$from];
		$s[$from++] = $s[$to];
		$s[$to--] = $t;
	}
}
function LeftRotateString(&$s,$n,$m){
	// m% = n;
	ReverseString($s,0,$m-1);
	ReverseString($s,$m,$n-1);
	ReverseString($s,0,$n-1);
}
$s = 'abcdef';
LeftRotateString($s,6,3);
var_dump($s);


function RevserString(&$s,$from,$to){
	while($from < $to){
		$char = $s[$from];
		$s[$from++] = $s[$to];
		$s[$to--] = $char;
	}
}

function LianBiao(&$s,$k){
	RevserString($s,0,$k-1);
	RevserString($s,$k,sizeof($s)-1);
}

$s = array(1,2,3,4,5,6);
LianBiao($s,4);
$t = '';
foreach ($s as $key => $value) {
	$t.=$value.'-->';
}
var_dump($t);
$s = "I am a student";
$sarr = explode(' ',$s);
for ($i=sizeof($sarr); $i >=0; $i--) { 
	echo $sarr[$i].' ';
}
$a = '1';
var_dump($a-'0');

function StrToInt($str){
	if ($str == '') {
		return '0';
	}
	$str = trim($str);
	$sign = 1;
	if ($str[0] == '+' || $str[0] == '-') {
		if ($str[0] == '-') {
			$sign = -1;
			$i = 1;
		}else{
			$i = 0;
		}
	}else{
		$i = 0;
	}
	$sum = 0;
	$MAX_INT = 2147483647;
	$MIN_INT = 2147483646;
	while (intval($str[$i])) {
		if ($sign > 0 && ($sum > $MAX_INT/10 || ($um == $MAX_INT && intval($str[$i]) > $MAX_INT%10))) {
			$sum = $MAX_INT;
			break;
		}
		if ($sign < 0 && ($sum > $MAX_INT/10 || ($um == $MAX_INT && intval($str[$i]) > $MAX_INT%10))) {
			$sum = $MIN_INT;
			break;
		}
		$sum = $sum*10 + intval($str[$i]);
		$i++;
	}
	return $sign > 0 ? $sum : -$sum;
}
$str = '1234324321423412342431234';
$intStr = StrToInt($str);
var_dump($intStr);
