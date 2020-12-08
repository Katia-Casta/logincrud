<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost','root','','login2');

			$conexion->set_charset('utf8');
			return $conexion;
		}
	}

	#$obj= new conectar();

	#if ($obj->conexion()) {
		#echo "conectado";
	#}

 ?>