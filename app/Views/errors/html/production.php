<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">

	<title>Whoops!</title>

	<style type="text/css">
		<?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
	</style>
</head>
<body onload="decrement()">

	<div class="container text-center">

		<h1 class="headline">Ralat!</h1>

		<h3 class="lead" align="center">Log masuk kembali ke Sistem Helpdesk </h3><input type="hidden" id="timer" name="redirect2" value="2" />


	</div>

</body>
<script type="text/javascript">
var targetURL="/menu"
var currentsecond=5;
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.getElementById('timer').value=currentsecond;
}
else{
window.location=targetURL;
return
}
setTimeout("countredirect()",1000)
}
countredirect();
    </script>
  
</html>
