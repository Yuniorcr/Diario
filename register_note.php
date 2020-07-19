<?php
	session_start();
	$session = $_SESSION['Usuario'];
	if ($session  == null || $session = '') {
		header("location:error.html");
		die();	
	}
?>
<html>
	<head>
	<title>Escribe Diario</title>
	<link rel="stylesheet" href="css/stylenote.css">
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	</head>
<body>
<div class="note">   
	<img src="./img/note.gif">
	<form action="save.php" method="post" >
				<div style="position: absolute; top: 10px; right: 10px; text-align: right;">
					<a  href="notas.php" class="x" title="Close">x</a>
				</div>
				<table id="i1" class="ibox">
					<td class="input" width="*">
						<input type="text" name="titulo" id="title" placeholder="Titulo" maxlength="160" required="">
					</td>
				</table>
				<table id="i2" class="ibox">
						<input type="date" name="fecha" placeholder="fecha" required="">
				</table>
				<textarea  maxlength="15000"  name="contenido" placeholder="Que paso hoy?" required=""></textarea>
				<div style="margin-top: 1em;">
					<button type="submit" class="btn-pink" style="float: right; " name="save">
						<img src="./img/edit.gif" alt="Edit" style="margin-right: 5px;background: black;"> Save and Close
					</button>
					<button type="button" class="btn-gray" tabindex="-1" style="float: right; margin-right: 1em;">
						<img src="./img/cancel.gif" alt="Cancel" style="margin-right: 5px;"> Cancel
					</button>
					<button>
						<a href="#"  class="btn-gray" style="float: left;" >
						<img src="./img/bin.gif" alt="Bin" style="margin-right: 5px;" > Delete</a>
					</button>	
				</div>	
		</form>
	</body>
	<footer>
		<a href="https://www.facebook.com/Smith.87893373">Todos los derechos reservados Created By CLINTON CARDENAS</a>
	</footer>
</html>