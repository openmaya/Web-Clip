<?php
class GeneratedContent
{
	protected $code;
	protected $message;
	function __construct($code, $msg){
		$this->code = $code;
		$this->message = $msg;
	}
	
	function getCode(){
		return $this->code;
	}

	function getMessage(){
		return $this->message;
	}

}

?>
