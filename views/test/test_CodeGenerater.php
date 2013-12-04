<?php
	include "config.php";
	include "test_common.php";	
	include $CONTROL_PATH."code_generater.php";

	function test_create(){
		$generater = new CodeGenerator();
		println("OK");
	}

	test_create();
?>
