<?php
require_once("base_action.php");
require_once($MODEL_PATH."cliped_message.php");
class LoadAction extends BaseAction {
	
	function exec(){
		$recievedCode = $_GET["c"];
		$msg = $this->loadClipedMessage($recievedCode);
		return new ClipedMessage($msg);
	}

	function loadClipedMessage($code)
	{
		$filePath = $this->dirForContent.$code;
		if(!file_exists($filePath))
		{
			return;
		}
		$savedMessage = file_get_contents($filePath, FILE_USE_INCLUDE_PATH);	
		unlink($filePath);
		return $savedMessage;

	}

}

?>
