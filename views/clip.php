	<h4>아래주소로 복사되었습니다.</h4>
<?php
$url = $CP_BASEURL.$model->getCode();
?>
	<a href="<?=$url?>"><?=$url?></a>
	<h4>Qrcode for mobile</h4>
	<canvas id="qrcode"></canvas>
	<script type="text/javascript" src="js/jsqr-0.2-min.js"></script>
	<script type="text/javascript">
		var qr = new JSQR();

		var code = new qr.Code();
		code.encodeMode = code.ENCODE_MODE.UTF8_SIGNATURE;
		code.version = code.DEFAULT;
		code.errorCorrection = code.ERROR_CORRECTION.H;

		var input = new qr.Input();
		input.dataType = input.DATA_TYPE.URL;
		input.data = {
				  "url": "<?=$url?>"
		};

		var matrix = new qr.Matrix(input, code);

		var canvas = document.getElementById('qrcode');
		canvas.setAttribute('width', matrix.pixelWidth);
		canvas.setAttribute('height', matrix.pixelWidth);
		var context = canvas.getContext('2d');
		context.fillStyle = 'rgb(255,255,255)';
		context.fillRect(0,0,matrix.pixelWidth, matrix.pixelWidth);
		context.fillStyle = 'rgb(0,0,0)';
		matrix.draw(canvas, 0, 0);
	</script>
	<hr />
	<h3>Copyed Content</h3>
	<textarea><?php echo $model->getMessage();?></textarea>
<br/>
	<br/>
