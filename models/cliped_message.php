<?php
class ClipedMessage {
	protected $message;	

	function __construct($msg){
		$this->message = $msg;
	}

	function getMessage(){
		return $this->message;
	}
}
?>
