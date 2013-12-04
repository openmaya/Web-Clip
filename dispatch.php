<?php
	require_once("./config.php");
	require_once($CONTROL_PATH."load_action.php");
	require_once($CONTROL_PATH."clip_action.php");
	require_once($CONTROL_PATH."base_action.php");
	require_once($CONTROL_PATH."code_generater.php");
	require_once($VIEW_PATH."result_renderer.php");

	$recievedMessage = $_POST["message"];
	$recievedCode = $_GET["c"];

	$controller;
	$view;

	if($recievedCode)
	{
		$controller = new LoadAction();
		$view = new ResultRenderer("print.php");

	} 
	else if($recievedMessage)
	{
		$codeGenerater = new CodeGenerater();
		$controller = new ClipAction($codeGenerater);
		$view = new ResultRenderer("clip.php");
	} 
	else 
	{
		$controller = new BaseAction();
		$view = new ResultRenderer("input_form.php");
	}

	$model = $controller->exec();
	$view->render($model);
	
?>

