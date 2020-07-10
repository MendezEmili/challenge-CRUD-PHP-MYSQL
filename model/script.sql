CREATE DATABASE php_mysql;

use php_mysql;

CREATE TABLE desarrolladores(
    id INT(12) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) not null, 
    cargo VARCHAR(30) not null, 
    correo VARCHAR(50),
    url_portafolio VARCHAR(250),
    fecha_creacion TIMESTAMP
);


CREATE TABLE proyectos(
    id_proyecto INT(12) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(25) not null,
    descripcion VARCHAR(1000) not null,
    imagen VARCHAR(250),
    cliente VARCHAR(50) not null,
    fecha_creacion TIMESTAMP
);

CREATE TABLE asignar_desarrollador_proyecto(
    id_asignacion INT(12) PRIMARY KEY AUTO_INCREMENT,
    id_proyecto INT(12) not null,
    id_desarrollador INT(12) not null, 
    rol VARCHAR(20),
    fecha_asignacion TIMESTAMP,

    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (id_desarrollador) REFERENCES desarrolladores (id)
);

CREATE TABLE bitacora(
    id_cambio INT(15) PRIMARY KEY AUTO_INCREMENT,
    fecha TIMESTAMP,
    accion VARCHAR(15),
    tabla VARCHAR(25)
);


CREATE OR REPLACE TRIGGER bitacora_eliminar_proyecto 
AFTER DELETE ON proyectos
FOR EACH ROW
INSERT INTO bitacora(accion, tabla) VALUES ( "Eliminar", "Proyectos");


CREATE OR REPLACE TRIGGER bitacora_eliminar_desarrollador 
AFTER DELETE ON desarrolladores
FOR EACH ROW
INSERT INTO bitacora(accion, tabla) VALUES ( "Eliminar", "Desarrolladores");


CREATE OR REPLACE TRIGGER bitacora_eliminar_asignacion
AFTER DELETE ON asignar_desarrollador_proyecto
FOR EACH ROW
INSERT INTO bitacora(accion, tabla) VALUES ( "Eliminar", "Asignar_desarrollador_proyecto");
