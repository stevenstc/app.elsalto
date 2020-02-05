
<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$sql="DELETE from t_persona2 ";
	echo $result=mysqli_query($conexion,$sql);
 ?>