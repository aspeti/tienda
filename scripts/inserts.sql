insert into rol (id_rol,nombre, descripcion, eliminado)values
(1,"admin","administrador",0),
(2,"cliente","cliente",0);

insert into usuario(id_usuario,fecha_creacion,eliminado,email,password,nombre,apellido,id_rol)values
(1,CURDATE(),0,"admin@gmail.com",MD5("admin"),'Admin','Apellido',1),
(2,CURDATE(),0,"usuario@gmail.com",MD5("cliente"),'usuario','Vargas',2);


INSERT INTO tipo_cliente (nombre, descripcion) VALUES ('Regular', 'cliente con compras regulares');
INSERT INTO  tipo_documento (nombre, cantidad) VALUES ('Carnet', 1);

insert into comprobante (nombre, cantidad,igv,serie) values ('Recibo',1,0,001 );