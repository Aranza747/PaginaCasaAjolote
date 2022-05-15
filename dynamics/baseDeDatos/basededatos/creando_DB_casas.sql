
/* Inicio de sesión en Maria DB 
	./mysql -u root */ 
	
/*Creando la DB con la codificación correcta*/ 
CREATE DATABASE registroCasas CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
SHOW DATABASES; 

USE registroCasas; 

CREATE TABLE usuario( 
usuario_ID INT PRIMARY KEY,
casa_ID INT,
apodo VARCHAR(50) NOT NULL, 
nombre VARCHAR(50) NOT NULL, 
apellido VARCHAR(50) NOT NULL, 
FOREIGN KEY(casa_ID) REFERENCES casa(casa_ID)
); 

CREATE TABLE casa(
casa_ID INT PRIMARY KEY, 
casa CHAR(50) NOT NULL
); 

/*Esta es la sección de las fotos*/ 
CREATE TABLE cabeza(
	cabeza_ID INT PRIMARY KEY, 
	nombreArchivo VARCHAR(50) NOT NULL,
	archivoCabeza BLOB
); 

CREATE TABLE tronco(
	tronco_ID INT PRIMARY KEY, 
	nombreArchivo VARCHAR(50) NOT NULL,
	archivoTronco BLOB NOT NULL 
);

CREATE TABLE piernas(
	piernas_ID INT PRIMARY KEY, 
	nombreArchivo VARCHAR(50) NOT NULL,
	archivoPiernas BLOB NOT NULL
); 

CREATE TABLE zapatos(
	zapatos_ID INT PRIMARY KEY, 
	nombreArchivo VARCHAR(50) NOT NULL,
	archivoZapatos BLOB NOT NULL
); 


CREATE TABLE avatar(
avatar_ID INT PRIMARY KEY,
cabeza_ID INT,
tronco_ID INT,
piernas_ID INT,
zapatos_ID INT,
FOREIGN KEY(cabeza_ID) REFERENCES cabeza(cabeza_ID)
FOREIGN KEY(tronco_ID) REFERENCES tronco(tronco_ID)
FOREIGN KEY(piernas_ID) REFERENCES piernas(piernas_ID)
FOREIGN KEY(zapatos_ID) REFERENCES zapatos(zapatos_ID)
); 

/*Esta es la sección de las tablas para las fechas*/ 
CREATE TABLE fechaC(
	fechaC_ID INT PRIMARY KEY, 
	fechaCabeza DATE NOT NULL
);

CREATE TABLE fechaT(
	fechaT_ID INT PRIMARY KEY, 
	fechaTronco DATE NOT NULL
);

CREATE TABLE fechaP(
	fechaP_ID INT PRIMARY KEY, 
	fechaPiernas DATE NOT NULL
); 

CREATE TABLE fechaZ(
	fechaZ_ID INT PRIMARY KEY, 
	fechaZapatos DATE NOT NULL 
);


/*Esta es la sección de las tablas con formato AlgoHasAlgo*/ 

CREATE TABLE usuarioHasAvatar(
	UhA_ID INT PRIMARY KEY, 
	avatar_ID INT,
	usuario_ID INT, 
	FOREIGN KEY(avatar_ID) REFERENCES avatar(avatar_ID),
	FOREIGN KEY(usuario_ID) REFERENCES usuario(usuario_ID)
); 

CREATE TABLE cabezaHasFecha(
	ChF_ID INT PRIMARY KEY, 
	cabeza_ID INT, 
	fechaC_ID INT, 
	FOREIGN KEY(cabeza_ID) REFERENCES cabeza(cabeza_ID)
	FOREIGN KEY(fechaC_ID) REFERENCES fechaC(fechaC_ID)
); 

CREATE TABLE troncoHasFecha(
	ThF_ID INT PRIMARY KEY, 
	tronco_ID INT, 
	fechaT_ID INT,
	FOREIGN KEY(tronco_ID) REFERENCES tronco(tronco_ID)
	FOREIGN KEY(fechaT_ID) REFERENCES fechaT(fechaT_ID)
);

CREATE TABLE piernaHasFecha(
	PhF_ID INT PRIMARY KEY, 
	piernas_ID INT, 
	fechaP_ID INT, 
	FOREIGN KEY(piernas_ID) REFERENCES piernas(piernas_ID)
	FOREIGN KEY(fechaP_ID) REFERENCES fechaP(fechaP_ID)
);

CREATE TABLE zapatoHasFecha(
	ZhF_ID INT PRIMARY KEY, 
	zapatos_ID INT, 
	fechaZ_ID INT, 
	FOREIGN KEY(zapatos_ID) REFERENCES zapatos(zapatos_ID)
	FOREIGN KEY(fechaZ_ID) REFERENCES fechaZ(fechaZ_ID)
);



