create dabase vennex;

--Mysql versiones nuevas ejecutar comando
--set global sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
create table usuarios(
	id bigint NOT NULL AUTO_INCREMENT  primary key,
	tipo_identificacion_id int,
	numero_identificacion varchar(30),
	nombres varchar(50),
	apellidos varchar(50),
	telefono varchar(30),
	correo_electronico varchar(30),
	fecha_nacimiento date,
	recibir_boletin boolean,
	observaciones_generales varchar(250),
	foto varchar(50),
	created_at timestamp,
	updated_at timestamp
);

INSERT INTO `usuarios` (`id`, `tipo_identificacion_id`, `numero_identificacion`, `nombres`, `apellidos`, `telefono`, `correo_electronico`, `fecha_nacimiento`, `recibir_boletin`, `observaciones_generales`, `foto`, `created_at`, `updated_at`) VALUES ('1', '1', '1144203907', 'Jaime', 'Fajardo', '3177005053', 'jaimefajardorodas@gmail.com', '1997-11-06', '1', 'Desarrollador de software', NULL, current_timestamp(), '0000-00-00 00:00:00.000000');

create table identificaciones(
	id int NOT NULL AUTO_INCREMENT  primary key,
	descripcion varchar(30)
);

insert into identificaciones values (1,'TI');
insert into identificaciones values (2,'CC');
insert into identificaciones values (3,'CE');

alter table usuarios add FOREIGN KEY (tipo_identificacion_id) REFERENCES identificaciones(id);
