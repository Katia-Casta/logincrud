
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<?php require_once "script.php"; ?>
</head>
<body background="imagenes/fondo1.jpg">
	<div class="container">
		<h1>Registro de Usuarios</h1>
		<div class="row">
			<div class="col-sm-4">
				<form action="procesos/registros.php" method="post">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required="">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" class="form-control" required="">
					<label for="email">Correo Electronico</label>
					<input type="text" name="email" class="form-control" required="">
					<label for="apellido">Usuario</label>
					<input type="text" name="usuario" class="form-control" required="">
					<label for="email">Password</label>
					<input type="text" name="password" class="form-control" required="">
					<br>
					<button class="btn btn-danger">Registrar</button>
					<a href="index.php" class="btn btn-primary">Login</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>