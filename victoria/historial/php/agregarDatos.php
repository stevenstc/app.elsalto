<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];

	$sql="INSERT into t_persona2 (nombre,apellido,email,telefono)
								values ('$n','$a','$e','$t')";
	mysqli_query($conexion,$sql);
	$sql="INSERT into t_persona2 (nombre,apellido,email,telefono)
								values ('$n','$a','$e','$t')";
	echo $result=mysqli_query($conexion,$sql);

 ?>