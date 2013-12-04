<?php
require_once("config.php");
require_once("base_action.php");
require_once($MODEL_PATH."generated_content.php");
class ClipAction extends BaseAction {
	
	function exec() {
		$recievedMessage = $_POST["message"];
		$code = $this->codeGenerater->generate();
		$this->generateClipFile($code, $recievedMessage);
		return new GeneratedContent($code, $recievedMessage);
	}
	
	private $codeGenerater = null;
	function __construct($codeGeneraterOfParameter){
	    $this->codeGenerater = $codeGeneraterOfParameter;
	}
	//FIXME : need to extract to class about file transaction
	function generateClipFile($fileName, $content) {
		$fh = fopen($this->dirForContent.$fileName, "w");
		fwrite($fh, $content);
		fclose($fh);
	}
}
?>
