<?php
require_once("config.php");
require_once($MODEL_PATH."generated_content.php");
class CPFile {
	
	function exec() {
		$recievedMessage = $_POST["message"];
		$code = $this->codeGenerater->generate();
		$this->generateClipFile($code, $recievedMessage);
		return new GeneratedContent($code, $recievedMessage);
	}
	
    private $fileAddress = null;
    function __construct($fileFullPath){
      $this->fileAddress = $fileFullPath;
    }

    private $fp = null;
    function open() {
	$this->fp = fopen($this->fileAddress, "a+");
	if($this->fp)
	    return true;
	else 
	    return false;
    }

    function close(){
	return fclose($this->fp);
    }

    function exist() {
	return file_exists($this->fileAddress);
    }

    function remove() {
	return unlink($this->fileAddress);
    }

   function write($contents) {
	return fwrite($this->fp,$contents);
    } 

    function read(){
	return fread($this->fp, filesize($this->fileAddress));	
    }
}
?>
