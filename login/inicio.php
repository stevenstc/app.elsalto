<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
				<a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
					<h2>Entraste con exito</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<a href="../victoria/index.php" class="btn btn-success">C.C. VICTORIA</a>
			</div>
			<div class="col-sm-6">

			</div>
		</div>
	</div>
</body>
</html>

<?php
} else {
	header("location:index.php");
	}
 ?>
