<?php
require_once("config.php");
class CodeGenerater {
	
	//private $character_pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	private $character_pool = "0123456789";
	private $max_code_length = 3;

	function generate(){
		$poolSize = strlen($this->character_pool);
		$code = "";
		for($i = 0; $i < $poolSize && $i < $this->max_code_length ; $i++)
		{
			$code .= $this->character_pool{rand(0,$poolSize-1)};
		}
		return $code;	
	}

}
?>
