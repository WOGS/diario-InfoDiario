/* base infonete */

DROP SCHEMA IF EXISTS  Infonete;
CREATE SCHEMA IF NOT EXISTS Infonete;
USE Infonete;


CREATE TABLE Tipo_doc
(
Cod_doc int NOT NULL,
Descripcion varchar(20),
CONSTRAINT PK_Tipo_doc PRIMARY KEY (Cod_doc)
);

insert into Tipo_doc (Cod_doc,Descripcion) value
	(1,"DNI"),
	(2,"DNI ext");
    
CREATE TABLE Provincia     
(
Cod_provincia int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Provincia PRIMARY KEY (Cod_Provincia)
);

insert into Provincia (Cod_provincia,Descripcion) value 
	(1,"CABA"),
    (2,"BsAs");

CREATE TABLE Localidad 
(
Cod_Localidad int,
Descripcion varchar(50),
Cod_Provincia int,
CONSTRAINT PK_Localidad PRIMARY KEY (Cod_Localidad),
CONSTRAINT FK_LocalidadProvincia FOREIGN KEY (Cod_Provincia) REFERENCES Provincia (Cod_provincia)	
);

insert into Localidad (Cod_Localidad,Descripcion,Cod_Provincia) value 
	(1,"Ramos Mejía",2),
    (2,"Villa Luzuriaga",2),
    (3,"San justo",2),
    (4,"Caballito",1);


CREATE TABLE Producto     
(
Cod_producto int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Producto PRIMARY KEY (Cod_producto)
);

insert into Producto (Cod_producto,Descripcion) value
	(1,"Diario"),
	(2,"Revista");


CREATE TABLE Plan     
(
Cod_plan int NOT NULL,
Periodo int NOT NULL,
Detalle varchar(50),
Precio int NOT NULL,
CONSTRAINT PK_plan PRIMARY KEY (Cod_plan)
);

insert into Plan (Cod_plan,Periodo,Detalle,Precio) value 
	(1,1,"Pago Mensual",100),
	(2,3,"Pago Trimestral",250),
	(3,12,"Pago Anual",1000);

/* Rol como entidad aparte, relacionada con usuario*/
CREATE TABLE Rol     
(
Cod_rol int NOT NULL,
Descripcion_rol varchar(20),
CONSTRAINT PK_Rol PRIMARY KEY (Cod_Rol)
);

insert into Rol (Cod_Rol,Descripcion_rol) value
	(1,"ADMIN"),
	(2,"CONTENIDISTA"),
	(3,"LECTOR");

CREATE TABLE Usuario    				
(
Id_usuario int NOT NULL auto_increment,
Nro_doc int NOT NULL,
Cod_doc int NOT NULL,
Nombre varchar(50),
Mail varchar(64),
Telefono int,
Cod_Localidad int NOT NULL,										
Cod_Usuario int NOT NULL,										 
Pass varchar(50),																						
CONSTRAINT PK_Usuario PRIMARY KEY (Id_usuario),
CONSTRAINT FK_Usuario_Documento FOREIGN KEY (Cod_doc) REFERENCES Tipo_doc (Cod_doc),
CONSTRAINT FK_Usuario_Localidad FOREIGN KEY (Cod_Localidad) REFERENCES Localidad (Cod_Localidad),
CONSTRAINT FK_Usuario_Rol FOREIGN KEY (Cod_Usuario) REFERENCES Rol (Cod_Rol) 
);

insert into Usuario (Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Localidad,Cod_Usuario,Pass) value
	(30555000,1,"Walter","walter@gmail.com",1133445566,3,1,"1234"),
	(32000000,1,"Diego","diego@gmail.com",113333888,1,3,"1234"),
	(35123456,1,"Pepe II","pepe2@gmail.com",1533445566,3,2,"1234");
    

CREATE TABLE Diario_Revista
(
Id int NOT NULL auto_increment,
Id_Admin int NOT NULL,
Titulo  varchar(50),
Numero int NOT NULL,
Descripcion varchar(100),
CONSTRAINT PK_Revista PRIMARY KEY (Id),
CONSTRAINT FK_Revista_Usuario FOREIGN KEY (Id_Admin) REFERENCES Usuario(Id_usuario)
);    

CREATE TABLE Suscripcion      
(
Cod_suscripcion int NOT NULL auto_increment,
Cod_Usuario int NOT NULL,
Cod_producto int NOT NULL,
Cod_plan int NOT NULL,
Fecha_suscripcion date NOT NULL,
CONSTRAINT PK_Suscripcion PRIMARY KEY (Cod_suscripcion),
CONSTRAINT FK_Suscripcion_Plan FOREIGN KEY (Cod_plan) REFERENCES Plan (Cod_plan),
CONSTRAINT FK_Suscripcion_Usuario FOREIGN KEY (Cod_usuario) REFERENCES Usuario (Id_Usuario),
CONSTRAINT FK_Suscripcion_Producto FOREIGN KEY (Cod_producto) REFERENCES Diario_Revista (Id)
);


CREATE TABLE Pago
(
Id_pago int NOT NULL auto_increment,
Nro_tarjeta BigInt NOT NULL,
Fecha_vencTarjeta date NOT NULL,
Cod_seguridad int NOT NULL,
Id_usuario int NOT NULL,
Cod_plan int NOT NULL,
Cod_producto int NOT NULL,
Fecha_pago date NOT NULL,
Precio int Not NULL,
CONSTRAINT PK_Pago PRIMARY KEY (Id_Pago),
CONSTRAINT FK_Pago_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario),
CONSTRAINT FK_Pago_Plan FOREIGN KEY (Cod_plan) REFERENCES Plan (Cod_plan),
CONSTRAINT FK_Pago_Producto FOREIGN KEY (Cod_producto) REFERENCES Diario_Revista (Id)
);


/* Usuario conectado por red social - FALTARIA RESOLVER para integrar API´s*/
-- CREATE TABLE UsuarioRedSocial    				
-- (
-- alias varchar(50),
-- Mail varchar(64),
-- Cod_Usuario int,							 
-- Pass varchar(50)									
-- );

CREATE TABLE Seccion     
(
Cod_seccion int auto_increment PRIMARY KEY,
NombreSeccion varchar(50),
Descripcion varchar(200),
EstadoAutorizado varchar(2), 
Cod_producto int NOT NULL,
Cod_contenidista int NOT NULL,
CONSTRAINT FK_Seccion_Producto FOREIGN KEY (Cod_producto) REFERENCES Producto (Cod_producto),
CONSTRAINT FK_Seccion_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario)   
);
-- insert into Seccion (NombreSeccion,Descripcion,EstadoAutorizado,Cod_producto,Cod_contenidista) value
-- 	("POLITICA","POLITICA","NO",1,1),
-- 	("SOCIEDAD","SOCIEDAD","NO",1,2),
-- 	("DEPORTES","DEPORTES","NO",2,3),
-- 	("TECNOLOGIA","TECNOLOGIA","NO",2,4);


CREATE TABLE Cuota     
(
Cod_cuota int NOT NULL,
Detalle varchar(50),
Id_usuario int NOT NULL,
CONSTRAINT PK_cuota PRIMARY KEY (Cod_cuota),
CONSTRAINT FK_Cuota_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario)
);

insert into Cuota (Cod_cuota,Detalle,Id_usuario) value 
	(1,"Pago Semanal",1),
	(2,"Pago Mensual",2),
	(3,"Pago Anual",3);


/* La GEOREFERENCIA puede ser bueno usarlo como: Grados decimales (DD): 41.40338, 2.17403  (LATITUD-LONGITUD)*/
/* EJ: Buenos aires tiene Latitud: -34.60842 , Longitud: -58.37210 -  o la UNLaM -34.669254, -58.564420 */

CREATE TABLE Georeferencia
(
Cod_georef int NOT NULL,
Latitud real NOT NULL,
Longitud real NOT NULL,
CONSTRAINT PK_Georeferecia PRIMARY KEY (Cod_georef)
);

insert into Georeferencia (Cod_georef,Latitud,Longitud) value
	(1,-34.60842,-58.37210),
	(2,-34.669254,-58.564420);

CREATE TABLE Noticia
(
Cod_noticia int NOT NULL auto_increment,
Titulo varchar(200) NOT NULL, 
Subtitulo varchar(500) NOT NULL, /* Hace referencia al COPETE */
informe_noticia varchar(10000) NOT NULL,
link_noticia varchar(300),									 	
Cod_georef int NOT NULL,									
imagen_noticia varchar(200),		-- la path de la imagen							
Cod_seccion int NOT NULL,
Cod_contenidista int NOT NULL,
EstadoAutorizado varchar(2),
Origen varchar(10),
Cod_revista int,
CONSTRAINT PK_Noticia PRIMARY KEY (Cod_noticia),
CONSTRAINT FK_Seccion_Noticia FOREIGN KEY (Cod_seccion) REFERENCES Seccion (Cod_seccion),
CONSTRAINT FK_Noticia_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario),   /* ver id usuario/autor de la noticia */	
CONSTRAINT FK_Noticia_Georeferencia FOREIGN KEY (Cod_georef) REFERENCES Georeferencia (Cod_georef),
CONSTRAINT FK_Noticia_Revista FOREIGN KEY (Cod_revista) REFERENCES Diario_Revista (Id)
);