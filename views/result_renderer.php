<?php
require_once("config.php");

class ResultRenderer{
	protected $fileName;
	function __construct($viewFilename){
		$this->fileName = $viewFilename;
	}

	function render($model){
		global $VIEW_PATH, $CP_BASEURL;
		include $VIEW_PATH."header.php";
		include $VIEW_PATH.$this->fileName;
		include $VIEW_PATH."footer.php";
	}

}
?>
