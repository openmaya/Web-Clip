<?php
include "config.php";
include $CONTROL_PATH."clip_action.php";
require_once($CONTROL_PATH."code_generater.php");
include "test_common.php";

$temp_codeGen = new CodeGenerater();
function test_create(){
    global $temp_codeGen;
	$controller = new ClipAction($temp_codeGen);
	println("OK");
}

function test_run(){
    global $temp_codeGen;
	$controller = new ClipAction($temp_codeGen);
	if($controller->exec()){
		println("OK");
	} else {
		println("run fail");
	}
}

function test_generateClipFile(){
	$dir_for_content = "/home/fibonacci/public_html/cp/temp_clipboard/";
	$tempFilename = $dir_for_content."testFile";
	if(file_exists($tempFilename)){
		unlink($tempFilename);
	}

    global $temp_codeGen;
	$controller = new ClipAction($temp_codeGen);
	$controller->generateClipFile("testFile", "message");
	unlink($tempFilename);
	println("OK : ".$tempFilename);
}

function test_result_of_exec_is_GeneratedContent_type(){
    global $temp_codeGen;
	$controller = new ClipAction($temp_codeGen);
	$type = $controller->exec();

	if($type instanceof GeneratedContent){
		println("OK : same type");
	}else{
		println("FAIL :different type");
	}

}

test_create();
test_run();
test_generateClipFile();
test_result_of_exec_is_GeneratedContent_type();
?>
