<?php
	$arr = [1,2,3,4,5];
	
	for($i = 0; $i < count($arr); $i++)
	{
		echo $arr[$i].",";
	}
	/////
	echo "<br/>";

	foreach($arr as $a)
	{
		echo $a.",";
	}
	echo "<br/>";

	for($i = 0; $i < count($arr); $i++):
	echo $arr[$i].",";
	endfor;
	
?>