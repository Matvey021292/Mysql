<?php
	$h = date('H');
	if ($h<6) {
		$img ='1';
	}elseif ($h<12) {
		$img ='2';

	}elseif ($h<18) {
		$img = '3';
	}else{
		$img ='4';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctupe</title>
	<style type="text/css">
		body{
			    background-size: cover;
    background-repeat: repeat;
		}
	</style>
</head>
<body style="background-image: url(header_v/<?php echo $img;?>.jpg);">
<h1 style="text-align: center"><?php echo $h ?></h1>

</body>
</html>