
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/formatoHora.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<div class="row">
	<div class="col-sm-12">

		

	<h2>HISTORIAL EL SALTO | C.C. VICTORIA
	<a href="../index.php" class="btn btn btn-danger" role="button" aria-pressed="true">Volver <span class="glyphicon glyphicon-arrow-left"></span></a></h2>

	<?php 

		$sql="SELECT id,nombre,apellido,email,telefono from t_persona2";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result)

	?>

	
		<p>
			<button class="btn btn-danger glyphicon glyphicon-remove" 
			onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
				
			Eliminar Historial</button>
		</p>
		
		<p>
			<a href="componentes/output.php" target="_blank">
				<button class="btn btn-info glyphicon glyphicon-download-alt">
			 	Descargar reporte en PDF</button>
			</a>
				</p>

				
		<table class="table table-hover table-condensed table-bordered" id="tabladinamica">
		
			<thead>
				<tr>
				<td>Nombre del niño</td>
				<td>Responsable</td>
				<td>Entrada</td>
				<td>Salida</td>
				</tr>
			</thead>
			<tbody>
				
			
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona2 where id='$idp'";
					}else{
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona2";
					}
				}else{
					$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona2";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				
			</tr>
			<?php 
		}
			 ?>
			 </tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabladinamica').DataTable();
	});
</script>