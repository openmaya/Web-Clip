<html>
<head>
	<title>small clipboard</title>
	<style>
	textarea {
	   width:320px;
	   height:240px;
		padding: 0;
		border: 1px solid #ccc;
	}
	</style>
</head>

<body>
	<h1>clipboard</h1>
	<?php
		$dir_for_content = "/home/fibonacci/public_html/scb/temp_clipboard/";

		$character_pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$max_code_length = 7;

		function generate_code($message)
      {
			global $character_pool, $max_code_length;
			$poolSize = strlen($character_pool);
			$code = "";
			for($i = 0; $i < $poolSize && $i < $max_code_length ; $i++)
			{
				$code .= $character_pool{rand(0,$poolSize)};
			}
			return $code;	
			
		}

		function generate_clipboard_file($fileName, $content)
		{
			global $dir_for_content;
			$fh = fopen($dir_for_content.$fileName, "w");
			fwrite($fh, $content);
			fclose($fh);
		}

		function loadClipedMessage($code)
		{
			global $dir_for_content;
			$filePath = $dir_for_content.$code;
			if(!file_exists($filePath))
			{
				return;
			}
			$savedMessage = file_get_contents($filePath, FILE_USE_INCLUDE_PATH);	
			unlink($filePath);
			return $savedMessage;

		}


		$recievedMessage = $_POST["message"];
		$recievedCode = $_GET["c"];

		if($recievedCode)
		{
			echo "<h3>Content</h3>";
			$clipedMessage = loadClipedMessage($recievedCode);
			if($clipedMessage)
			{
				echo "<textarea>$clipedMessage</textarea>";
			}
			else
			{
				echo "###### empty ######</br>";
			}

		} 
		else if($recievedMessage)
		{
			echo "<h3>Content</h3>";
			echo "<textarea>$recievedMessage</textarea>";
			$generatedCode = generate_code($recievedMessage);
			generate_clipboard_file($generatedCode, $recievedMessage);
			$url = "http://openmaya.com/scb/?c=".$generatedCode;
			echo "<h4>Temporary url</h4>";
			echo $url;
		} 
		else 
		{

	?>
	<form method="post" action="./">
	<textarea name="message"></textarea><br/>
	<input type="submit" value="copy"></input>
	</form>
	<?
		}
	?>
	<br/><br/>
	<a href="./">clear</a>
</body>

</html>

