create database login2;
	use login2;

	create table t_usuarios (id_usuario int auto_increment,
								nombre varchar(255),
								apellido varchar(255),
								email varchar(255),
								usuario varchar(255),
								password varchar(255),
								primary key(id_usuario)
								);

	create table t_registro (id_gasto int auto_increment,
								cont varchar(255),
								precio int,
								fecha date, PRIMARY KEY(id_gasto)
								);