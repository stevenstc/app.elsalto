
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>
<head>
	<meta charset="utf-8">
	<title>listado niños</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../librerias/moment.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">

		#titulo{
		  font-weight:bold;
		  font-family:'Arial','Helvetica','Verdana','Monaco',sans-serif;
		}
  	</style>

  	<script type="text/javascript">
  		h15min=0;
  		h20min=0;
  		h30min=0;
  		h60min=0;
  	</script>

</head>




<div class="row">
	<div class="col-sm-12">

		

	<h2 id="titulo">HISTORIAL EL SALTO | C.C. VICTORIA</h2>
		
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

				$cont = 0;

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
					$cont = $cont+1;
			 ?>
			 

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				
			</tr>
			<script type="text/javascript">

				moment.locale('es');

			    var hEntrada = moment(<?php echo "'".$ver[3]."'" ?>,'HH:mm A');
			    var hSalida = moment(<?php echo "'".$ver[4]."'" ?>,'HH:mm A');
			    
			    var result = moment.duration(hSalida - hEntrada).humanize();
			    alert(result);
			    if (result > '15 minutes'&&result < '20 minutes') {h15min=h15min+1;}
			    if (result > '20 minutes'&&result < '30 minutes') {h20min=h20min+1;}
			    if (result > '30 minutes'&&result < 'an hour') {h30min=h30min+1;}
			    if (result > 'an hour') {h60min=h60min+1;}
  
			</script>
			<?php 
		}
			 ?>
			 </tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p> 15min:
		<span id="n15min"></span>
		</p>
		<p> 20min:
		<span id="n20min"></span>
		</p>
		<p> 30min:
		<span id="n30min"></span>
		</p>
		<p> 60min:
		<span id="n60min"></span>
		</p>
		<p> Niños en total:
		<span id="totalN"></span>
		</p>
	</div>
</div>

<script type="text/javascript">
	$("#n15min").text(h15min);
	$("#n20min").text(h20min);
	$("#n30min").text(h30min);
	$("#n60min").text(h60min);
	$("#totalN").text(h15min+h20min+h30min+h60min);

	$(document).ready(function(){
		$('#tabladinamica').DataTable();
	});
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
var breakfast = moment('8:32','HH:mm');
var lunch = moment('12:52','HH:mm');
console.log( moment.duration(lunch - breakfast).humanize() + ' between meals' )
</script>