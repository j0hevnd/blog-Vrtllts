CREATE DATABASE virtual_blog;

USE virtual_blog;

CREATE TABLE articulos (
    id INT(11) AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(50)  NOT NULL,
    email_usuario VARCHAR(70)  NOT NULL,
    imagen VARCHAR(255)  NOT NULL,
    contenido TEXT NOT NULL,
    state TINYINT(1) NOT NULL DEFAULT 1,
    fecha DATE NOT NULL,
    CONSTRAINT pk_articulos PRIMARY KEY(id)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE administradores (
    id INT(11) AUTO_INCREMENT NOT NULL,
    email VARCHAR(70) NOT NULL,
    nombre_usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    CONSTRAINT pk_articulos PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;