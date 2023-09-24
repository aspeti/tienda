insert into rol (nombre, descripcion, eliminado)values
("admin","administrador",0),
("cliente","cliente",0);

insert into usuario(fecha_creacion,eliminado,email,password,nombre,apellido,id_rol)values
(CURDATE(),0,"admin@gmail.com",MD5("admin"),'Admin','Apellido',1),
(CURDATE(),0,"cliente@gmail.com",MD5("cliente"),'Susana','Vargas',2);
