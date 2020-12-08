<?php 

	require_once "conexion.php";

	class Usuarios extends conectar{
		public function agregarUsuario($nombre,$apellido,$email,$usuario,$password){
			$conexion = conectar::conexion();

			$password = sha1($password);

			$sql = "INSERT INTO t_usuarios (nombre, apellido, email, usuario, password)
					VALUES('$nombre','$apellido','$email','$usuario','$password')";
			$result = mysqli_query($conexion, $sql);

			return $result;
		}

		public function login($usuario, $password){
			$conexion = conectar::conexion();
			$password = sha1($password);

			$sql = "SELECT count(*) as total FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion,$sql);
			$datos = mysqli_fetch_array($result);

			if($datos['total']>0){
				$_SESSION['usuario']=$usuario;
				header("location:../vistas/inicio.php");
			}else{
				header("location:../index.php");
			}
		}
	}

 ?>