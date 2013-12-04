	<hr />
	http://openmaya.com/cp/<input type="tel" id="code" onKeyDown="javascript:if(event.keyCode==13) document.getElementById('view').onclick();"></input>
	<input type="submit" id="view" value="paste" onClick="javascript:location.href='./'+document.getElementById('code').value;" ></input>
	<hr />
	<h3>clip board</h3>
	<form method="post" action="./">
	<textarea name="message"></textarea><br/>
	<input type="submit" value="copy" /><br/>
	</form>

