<?php
function is_in_array($array, $value){
	$exist = false;
	foreach($array as $item){
		if($item==$value)
			return true;
	}
	return $exist;
}
