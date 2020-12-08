<!DOCTYPE html>
<html>
<head>
	<title>Login con Crud</title>
	<?php require_once "script.php";
	session_start();
	if(isset($_SESSION['usuario'])){
		header("location:vistas/inicio.php");
	} ?>
</head>
<body background="imagenes/fondo1.jpg">
	<div class="container">
		<h1>Login de Usuarios</h1>
		<div class="row">
			<div class="col-sm-4">
				<form action="procesos/login.php" method="post">
					
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<br>
					<button class="btn btn-primary">Entrar</button>
					<a href="registros.php" class="btn btn-success">Registrar</a>

				</form>
			</div>
		</div>
	</div>

</body>
</html>