<?php

	function FunctionName($i)
	{
		if ($i ==1) {
			echo "$i час";
		}elseif($i <= 4){
			echo "$i часа";
		}elseif($i <= 12){
			echo "$i часов";
		}
	}
	FunctionName(6);
?>
<br>
<?php
	function getNameOutHour($a){
		for($a=1;$a<=12;$a++){
			if ($a < 2) {
			echo "$a час"."<br>";
		}elseif($a <= 4){
			echo "$a часа"."<br>";
		}elseif($a <= 12){
			echo "$a часов"."<br>";
		}	
		}
	}
	getNameOutHour(2);
?>
<br>


	
<?php
	function getNameHour($b,$variebles){

	$b0 =$b % 10;
	if ($b > 4 && $b < 21) {
		$res = $variebles[0];
	}elseif($b0 == 1){
		$res = $variebles[1];
	}elseif($b0 > 1 && $b <5){
		$res = $variebles[2];
	}else{
		$res =$variebles[0];
	}
	return $res;
}
	$variebles=['минут','минута','минуты'];
	$variebles1=['часов','час','часа'];
	for($i=0;$i<60;$i++){
	echo $i.' '. getNameHour($i,$variebles1).'<br>';
}
?>