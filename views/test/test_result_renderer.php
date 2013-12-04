<?php
	include "config.php";
	include "test_common.php";	
	include $VIEW_PATH."result_renderer.php";
	include $MODEL_PATH."generated_content.php";
	include $MODEL_PATH."cliped_message.php";
	function test_clipRender(){
		$renderer = new ResultRenderer("clip.php");
		$model = new GeneratedContent("code","message");
		$renderer->render($model);
		println("OK");
	}

	function test_loadRender(){
		$renderer = new ResultRenderer("print.php");
		$model = new ClipedMessage("message") ;
		$renderer->render($model);
		println("OK");
	}

	function test_inputForm(){
		$renderer = new ResultRenderer("input_form.php");
		$renderer->render(null);
		println("OK");

	}
	test_clipRender();
	test_loadRender();
	test_inputForm();
?>
