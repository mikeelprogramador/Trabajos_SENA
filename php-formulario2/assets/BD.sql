show databases;
drop schema bd_ejercicio_estudiantes1;
create schema bd_ejercicio_estudiantes1;

use bd_ejercicio_estudiantes1;


drop table tb_estudiantes;

create table tb_estudiantes(

	documento		varchar(20)		not null,
	nombre			varchar(50)		not null,
	fecha_nac		varchar(50)		not null,
	sn_beca			boolean			null,
	nota1			float			null,
	nota2			float			null,
	nota3			float			null,
	primary key(documento)
);

delete from tb_estudiantes;
select * from tb_estudiantes;
select count(*) from tb_estudiantes;

#Inserta el registro de un estudiante.
insert into tb_estudiantes(documento, nombre, fecha_nac)
values( '123', 'Pepito Perez', '2000-01-01' );

#Actualiza la nota  uno de un estudiante.
update tb_estudiantes
set nota1 = 3.5
where documento = '123';

#Actualiza todos los estudiantes para no tener beca.
update tb_estudiantes
set sn_beca = 0;





INSERT INTO tb_estudiantes(documento, nombre, fecha_nac, sn_beca, nota1, nota2, nota3) VALUES
('112', 'Jose James', '1999-02-02', NULL, NULL, NULL, NULL),
('123', 'Pepito Perez', '2000-01-01', 0, 3.5, NULL, NULL),
('456', 'Maria Mendez', '2000-02-02', NULL, NULL, NULL, NULL),
('789', 'Jose Jacinto', '1999-01-01', NULL, NULL, NULL, NULL);


