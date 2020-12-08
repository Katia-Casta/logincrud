<!DOCTYPE html>
<html>
<head>
	<title>CurCrudPhp</title>
	<?php  require_once "script.php"; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						PROYECTO
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar nuevo <span class="fa fa-plus-circle"></span>
					</span>
					<hr>
					<div id="tablaDatatable"></div>
				</div>
				<div class="card-footer text-muted">
					By Katia Castañeda 
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmnuevo">
					<label>Cont</label>
					<input type="text" class="form-control input-sm" id="cont" name="cont">
					<label>Precio</label>
					<input type="text" class="form-control input-sm" id="precio" name="precio">
					<label>Fecha</label>
					<input type="text" class="form-control input-sm" id="fecha" name="fecha">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar Dato</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmnuevoU">
					<input type="text" hidden="" id="idgasto" name="idgasto">
					<label>Cont</label>
					<input type="text" class="form-control input-sm" id="contU" name="contU">
					<label>Precio</label>
					<input type="text" class="form-control input-sm" id="precioU" name="precioU">
					<label>Fecha</label>
					<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito Yuju");
					}else{
						alertify.error("Error al agregar :c");
					}
				}
			});

		});

		$('#btnActualizar').click(function(){

			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/actualizar.php",
				success:function(r){
					if(r==1){
						
						$('#tablaDatatable').load('tabla.php');
						alertify.success("actualizado con exito Yuju");
					}else{
						alertify.error("Error al actualizar :c");
					}
				}
			});


		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto=" + idgasto,
			url:"../procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#contU').val(datos['cont']);
				$('#precioU').val(datos['precio']);
				$('#fechaU').val(datos['fecha']);

			}
		});
	}

	function eliminarDatos(idgasto){
		alertify.confirm('Eliminar un contenido', '¿Seguro de eliminar este contenido ?',function(){ 

			$.ajax({
				type:"POST",
				data:"idgasto=" + idgasto,
				url:"../procesos/eliminar.php",
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			})
		}
		, function(){

		});
	}

</script>