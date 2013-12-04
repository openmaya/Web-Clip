	<h3>Content</h3>
<?php
$msg = $model->getMessage(); 
if($msg)
{
?>	<textarea id="clipData"><?php echo $msg;?></textarea>
	<hr />
	<input type="button" value="toLink" onclick="javascript:onClickLink();"/>
	<input type="button" value="toEmbed"onclick="javascript:onClickEmbed();"/>
	<hr />
	<div id="printArea" width=330></div>
	<script>
		var printArea = document.getElementById("printArea");
		function onClickClipboard(){
			if (window.clipboardData && clipboardData.setData) {
				clipboardData.setData('text', s);
			} else {
				alert("not yet implemented...");
			}
		}

		function onClickLink(){
			var clipedData = document.getElementById("clipData").value;
			printArea.innerHTML = "<a href="+clipedData+" />"+clipedData+"</a>";
		}

		function onClickEmbed(){
			var clipedData = document.getElementById("clipData").value;
			printArea.innerHTML = clipedData;
		}
	</script>
<br/>
<br/>
<?php
}
else
{;
?>###### empty ######</br><?php
}?>
