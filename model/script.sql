CREATE DATABASE php_mysql;

use php_mysql;

CREATE TABLE desarrolladores(
    id INT(12) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) not null, 
    cargo VARCHAR(30) not null, 
    correo VARCHAR(50),
    url_portafolio VARCHAR(250)
);


CREATE TABLE proyectos(
    id_proyecto INT(12) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(25) not null,
    descripcion VARCHAR(1000) not null,
    imagen VARCHAR(250),
    cliente VARCHAR(50) not null
);

CREATE TABLE asignar_desarrollador_proyecto(
    id_asignacion INT(12) PRIMARY KEY AUTO_INCREMENT,
    id_proyecto INT(12) not null,
    id_desarrollador INT(12) not null, 
    rol VARCHAR(20),

    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (id_desarrollador) REFERENCES desarrolladores (id)
)