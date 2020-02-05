<?php 


	session_start();
	require_once "conexion.php";

	$conexion=conexion();

		$usuario=$_POST['usuario'];
		$pass=sha1($_POST['password']);

		$sql="SELECT * from usuarios where usuario='$usuario' and password='$pass'";
		$result=mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0){
			$_SESSION['user']=$usuario;
			echo 1;
		}else{
			echo 0;
		}
 ?>