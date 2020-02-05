<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre,apellido,usuario,password)
				values ('$nombre','$apellido','$usuario','$password')";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from usuarios 
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>