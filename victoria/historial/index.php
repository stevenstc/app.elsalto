<?php 
  session_start();

  unset($_SESSION['consulta']);

  if(isset($_SESSION['user'])){
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Historial</title>
  
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>



	<script src="librerias/jquery-3.3.1.js"></script>
  <script src="librerias/moment.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/formatoHora.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  <script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
  <script src="librerias/datatable/jquery.dataTables.min.js"></script>
  
</script>

</head>
<body>

	<div class="container">
    <div id="buscador"></div>
		<div id="tabla"></div>
	</div>

	<!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        	<label>Nombre del niño</label>
        	<input type="text" name="" id="nombre" class="form-control input-sm">
        	<label>Responsable</label>
        	<input type="text" name="" id="apellido" class="form-control input-sm">
        	<label>Entrada</label>
        	<input type="text" id="email" onclick="RelojS();" class="form-control input-sm">
        	<label>salida</label>
        	<input type="text" id="telefono" class="form-control input-sm">
          <label>Tiempo</label><br>
          <button type="button" class="btn btn-default" onclick="RelojS();" id="suma15">+15 min</button>
          <button type="button" class="btn btn-default" onclick="RelojS();" id="suma30">+30 min</button>
          <button type="button" class="btn btn-default" onclick="RelojS();" id="suma60">+60 min</button>
          <button type="button" class="btn btn-warning" onclick="RelojS();" id="restablecer">Reiniciar tiempo</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idpersona" name="">
        	<label>Nombre del niño</label>
        	<input type="text" name="" id="nombreu" class="form-control input-sm">
        	<label>Responsable</label>
        	<input type="text" name="" id="apellidou" class="form-control input-sm">
        	<label>Entrada</label>
        	<input type="text" name="" id="emailu" class="form-control input-sm">
        	<label>Salida</label>
        	<input type="text" name="" id="telefonou" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          nombre=$('#nombre').val();
          apellido=$('#apellido').val();
          email=$('#email').val();
          telefono=$('#telefono').val();
            agregardatos(nombre,apellido,email,telefono);
        });



        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>


<?php
} else {
  header("location:../login/index.php");
  }
 ?>