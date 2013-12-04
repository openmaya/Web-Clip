<?php
include "config.php";
require_once($CONTROL_PATH."cp_file.php");
require_once($CONTROL_PATH."code_generater.php");
require_once("test_common.php");


$cpFilename = "test_cpfile";
$cpPath = "/home/fibonacci/public_html/cp/temp_clipboard/";
function prepare_test(){
    global $cpFilename, $cpPath;

    $tempFilename = $cpPath.$cpFilename;
    if(file_exists($tempFilename)){
	echo "PREPARE :: file exist, so deleted it\n";
	unlink($tempFilename);
    }
}

function test_create(){
    global $cpFilename, $cpPath;
    prepare_test();
    $file = new CPFile($cpPath.$cpFilename);
    echo "create success\n";
}
test_create();
//:%s/\(^test_.*\(\);$\)/function \1{\r\r}\r\1/g
//:%s/) {/) {/g
function test_open() {
    global $cpFilename, $cpPath;
    prepare_test();
    $file = new CPFile($cpPath.$cpFilename);
    if($file->open()) {
	echo "open success\n";
	if($file->close())
	    echo "close success\n";
	else
	    echo "close fail\n";
    }
    else
	echo "open fail\n";

}
test_open();
function test_exist() {
    global $cpFilename, $cpPath;
    $tempFilename = $cpPath.$cpFilename;

    $file = new CPFile($tempFilename);
    if(file_exists($tempFilename) == $file->exist())
	echo "exist success\n";
    else
	echo "exist fail\n";
}
test_exist();
function test_remove() {
    global $cpFilename, $cpPath;
    $tempFilename = $cpPath.$cpFilename;

    $file = new CPFile($tempFilename);
    if($file->remove())
	echo "remove success\n";
    else
	echo "remove fail\n";
}
test_remove();

$text = "asdf";
function test_write() {
    global $cpFilename, $cpPath, $text;
    $tempFilename = $cpPath.$cpFilename;

    $file = new CPFile($tempFilename);

    if($file->exist()){
	echo "write fail :: file already exist\n";
	return;
    }
    $file->open();
    if($file->write($text)) {
	echo "write success".$file->read()."\n";
    }
    else
	echo "write fail\n";
    $file->close();
    
}
test_write();

function test_read() {
    global $cpFilename, $cpPath, $text;
    $tempFilename = $cpPath.$cpFilename;

    $file = new CPFile($tempFilename);
    if(!$file->exist()){
	echo "read fail :: file doesn't exist\n";
	return;
    }
    $file->open();
    $contents = $file->read();
    if($contents == $text)
	echo "read success ::".$contents.", ".$text."\n";
    else
	echo "read fail ::".$contents.", ".$text."\n";
    $file->close();
}
test_read();

?>
