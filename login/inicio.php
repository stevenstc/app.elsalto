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
				<a href="php/salir.php" class="btn btn-danger">Salir del sistema</a>
					<h2>Entraste con éxito</h2>
				</div>
			</div>
		</div>
	

	
		<div class="row">
			<div class="col-sm-4">

			<div class="jumbotron">

				<p>
					<a href="../victoria/index.php" class="btn btn-success">C.C. VICTORIA</a>
					<br>
					En juego:
					<?php 
						$servidor="localhost";
						$usuario="u653641988_usuario_app";
						$password="ELamore123@_";
						$bd="u653641988_app";

						$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

					  	$sql3="SELECT id from t_persona";
					  	$result3=mysqli_query($conexion,$sql3);
					  	$n = 0;

					    while(true==mysqli_fetch_array($result3)){ 

					        $n = $n+1;
					    
					  	}
					  	echo $n;
					?>
				<br>
				Total:
					<?php 
					  $sql2="SELECT id from t_persona2";
					  $result2=mysqli_query($conexion,$sql2);
					  $i = 0;
					  
					    while(mysqli_fetch_row($result2)){ 

					        $i = $i+1;
					    
					  	}
					  	echo $i;
					?>
				</p>
			</div>
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
