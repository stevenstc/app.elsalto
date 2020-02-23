<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();
$html = file_get_contents('https://app.dogelino.com/elsalto_v1/victoria/historial/componentes/lista-niños.php'); //Convierte la información de la URL en cadena
echo $html;
?>