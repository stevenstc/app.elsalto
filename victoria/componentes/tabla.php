
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>

 <script type="text/javascript">

function RelojS(){
var fechaHora = new Date();
var horas = fechaHora.getHours();
var minutos = fechaHora.getMinutes();
var segundos = fechaHora.getSeconds();

if(horas<10){horas='0'+ horas;}
if(minutos<10){minutos='0'+ minutos;}
if(segundos<10){segundos='0'+ segundos;}

hora = horas+':'+minutos+':'+segundos;
hora = moment(hora,'HH:mm:ss A').format('LT');

$('#telefono').prop({'value': hora});
}
</script>
<script src="js/formatoHora.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<div class="row">
	<div class="col-sm-12">

		

	<h2>Tabla Inflables EL SALTO | C.C. VICTORIA

	<a href="./historial" class="btn btn btn-info" role="button" aria-pressed="true">Ver Historial <span class="glyphicon glyphicon-folder-open"></span></a>

	<a href="../login/inicio.php" class="btn btn btn-danger" role="button" aria-pressed="true">Volver <span class="glyphicon glyphicon-arrow-left"></span></a></h2>

		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" onclick="RelojS();" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo niño 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>



		
			<tr>
				<td>Nombre del niño</td>
				<td>Responsable</td>
				<td>Entrada</td>
				<td>Salida</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona where id='$idp'";
					}else{
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona";
					}
				}else{
					$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr id=<?php echo '"n'.$ver[0].'"' ?>>
			
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td id=<?php echo '"h'.$ver[0].'"' ?>><?php echo $ver[4] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>