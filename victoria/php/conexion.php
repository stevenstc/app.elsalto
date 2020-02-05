

<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="u653641988_usuario_app";
			$password="ELamore123@_";
			$bd="u653641988_app";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}

 ?>