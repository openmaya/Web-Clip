<?php
	include "config.php";
	include "test_common.php";	
	include $MODEL_PATH."generated_content.php";

	function test_create(){
		$content = new GeneratedContent("key","content");
		println("OK");
	}

	function test_get_realdata(){
		$content = new GeneratedContent("key","content");
		assertNotNull($content->getCode());
		assertNotNull($content->getMessage());
		println("OK");
	}

	test_create();
	test_get_realdata();
?>
