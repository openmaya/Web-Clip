<?php
include "config.php";
include $CONTROL_PATH."load_action.php";
include "test_common.php";

function test_create(){
	$controller = new LoadAction();
	println("OK");
}

function test_loadMessage(){
	$path_of_base = "/home/fibonacci/public_html/cp";
	$dir_for_content = $path_of_base."/temp_clipboard/";
	$dummy_file = $path_of_base."/test/dummy";
	$code = "dummy2";
	$dummy_for_test = $dir_for_content.$code;	
	copy($dummy_file, $dummy_for_test);
	//test
	$controller = new LoadAction();
	$msg = $controller->loadClipedMessage($code);
	assertNotNull($msg);	
	
	if(file_exists($dummy_for_test)){
		println("FAIL : file remove fail");
	} else {
		println("OK : ".$dummy_for_test);
	}
}

function test_return_type_is_ClipedMessage(){
	$path_of_base = "/home/fibonacci/public_html/cp";
	$dir_for_content = $path_of_base."/temp_clipboard/";
	$dummy_file = $path_of_base."/test/dummy";
	$code = "dummy2";
	$dummy_for_test = $dir_for_content.$code;	
	copy($dummy_file, $dummy_for_test);
	$_GET["c"] = $code;
	
	$controller = new LoadAction();
	$result = $controller->exec();

	if($result instanceof ClipedMessage){
		println("OK");
	} else {
		println("FAIL : type is different");
	}
}

test_create();
test_loadMessage();
test_return_type_is_ClipedMessage();
?>
