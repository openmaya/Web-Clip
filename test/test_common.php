<?php
function println($message){
	echo $message."\n";
}

function assertNotNull($data){
	if($data){
		return true;
	} else {
		throw new Exception("Variable is NULL!!");
	}
}

?>
