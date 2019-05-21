/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  gambito code
 * Created: 07-ene-2019
 */

CREATE DATABASE IF NOT EXISTS gestoria_marquez;
USE gestoria_marquez;

CREATE TABLE IF NOT EXISTS users(
id              int(11) auto_increment not null,
role            varchar(100)not null,
name            varchar(50) not null,
name2           varchar(50) not null,
surname1        varchar(100) not null,
surname2        varchar(100) not null,
nick            varchar(50) not null,
email           varchar(100) not null,
telefono        int (15) not null,
password        varchar(100) not null,
image           varchar(100) not null,
create_at       timestamp null,
update_at       timestamp null,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
INSERT INTO users VALUES(NULL, 'SuperAdmin', 'Sidi Farid', 'Pedro', 'Raoui', 'Aguirre', 'gambito', 'webmaster@root.com', 929194560, 'C4tntnox3010*+', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(NULL, 'user', 'antonio', 'manuel', 'gomez', 'heredia', 'gothyck', 'webmaster@antonio.com', 929194561, 'pass', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(NULL, 'user', 'juan', 'carlos', 'gitano', 'gitano', 'gitano', 'webmaster@juan.com', 929194562, 'pass', null, CURTIME(), CURTIME(), null);

CREATE TABLE IF NOT EXISTS secciones(
id              int(11) auto_increment not null,
user_id         int(11) not null,
titulo          varchar(255) not null,
imagenCentral   varchar(255) null,
img1            varchar(255) null,
img2            varchar(255) null,
img3            varchar(255) null,
descripcionC    varchar(255) not null,
descripcionL    varchar(255) not null,
icono           varchar(255) not null,
metadesc        varchar(160) not null,
metatitle       varchar(67) not null,
metakey         MEDIUMTEXT not null,
create_at       timestamp null,
update_at       timestamp null,
CONSTRAINT pk_secciones PRIMARY KEY(id),
CONSTRAINT uq_titulo UNIQUE(titulo),
CONSTRAINT fk_secciones_users FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE
)ENGINE=InnoDb;
INSERT INTO secciones VALUES(null, 1, 'primera area legal', null, null, null, null, '1 descripcion corta del area', 'descripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del area', 'icon-medio', 'descripcion corta del area', 'primera area legal', 'hola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hace', CURTIME(), CURTIME());
INSERT INTO secciones VALUES(null, 2, 'segunda area legal', null, null, null, null, '2 descripcion corta del area', 'descripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del area', 'icon-medio', 'descripcion corta del area', 'primera area legal', 'hola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hace', CURTIME(), CURTIME());
INSERT INTO secciones VALUES(null, 3, 'tercera area legal', null, null, null, null, '3 descripcion corta del area', 'descripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del area', 'icon-medio', 'descripcion corta del area', 'primera area legal', 'hola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hace', CURTIME(), CURTIME());
INSERT INTO secciones VALUES(null, 3, 'cuarta area legal', null, null, null, null, '4 descripcion corta del area', 'descripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del area', 'icon-medio', 'descripcion corta del area', 'primera area legal', 'hola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hace', CURTIME(), CURTIME());
INSERT INTO secciones VALUES(null, 1, 'quinta area legal', null, null, null, null, '5 descripcion corta del area', 'descripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del areadescripcion corta del area', 'icon-medio', 'descripcion corta del area', 'primera area legal', 'hola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hacehola, que, hace', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS categorias(
id              int(11) auto_increment not null,
user_id         int(11) not null,
titulo          varchar(255) not null,
descripcionC    varchar(255) not null,
descripcionL    varchar(255) not null,
imagen          varchar(255) not null,
metadesc        varchar(160) not null,
metatitle       varchar(67) not null,
metakey         MEDIUMTEXT not null,
create_at       timestamp null,
update_at       timestamp null,
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT uq_titulo UNIQUE(titulo),
CONSTRAINT fk_categorias_users FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE
)ENGINE=InnoDb;
INSERT INTO categorias VALUES(NULL, 1, 'categoria 1', 'descripcionC', 'descripcionL', 'imagen.jpg', 'descripcionCC', 'Categoria 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO categorias VALUES(null, 2, 'categoria 2', 'descripcionC', 'descripcionL', 'imagen.jpg', 'descripcionCC', 'Categoria 12', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO categorias VALUES(null, 3, 'categoria 3', 'descripcionC', 'descripcionL', 'imagen.jpg', 'descripcionCC', 'Categoria 13', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO categorias VALUES(null, 1, 'categoria 4', 'descripcionC', 'descripcionL', 'imagen.jpg', 'descripcionCC', 'Categoria 14', 'Hola, Que, Haces,', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS tags(
id          int(11) auto_increment not null,
titulo      varchar(255) not null,
create_at   timestamp null,
update_at   timestamp null,
CONSTRAINT pk_tags PRIMARY KEY(id),
CONSTRAINT uq_titulo UNIQUE(titulo)
)ENGINE=InnoDb;
INSERT INTO tags VALUES(NULL, 'tag 1', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 2', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 3', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 4', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 5', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 6', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 7', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 8', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 9', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 10', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 11', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 12', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 13', CURTIME(), CURTIME());
INSERT INTO tags VALUES(NULL, 'tag 14', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS blogs(
id              int(11) auto_increment not null,
user_id         int(11) not null,
categoria_id    int(11) not null,
titulo          varchar(255) not null,
imagen          varchar(255) not null,
subtitulo       varchar(255) not null,
contenido       MEDIUMTEXT not null,
tag_id          int(11) not null,
metadesc        varchar(160) not null,
metatitle       varchar(67) not null,
metakey         MEDIUMTEXT not null,
create_at       timestamp null,
update_at       timestamp null,
CONSTRAINT pk_blogs PRIMARY KEY(id),
CONSTRAINT uq_titulo UNIQUE(titulo),
CONSTRAINT fk_blogs_users FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE,
CONSTRAINT fk_blogs_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id) ON UPDATE CASCADE,
CONSTRAINT fk_blogs_tag FOREIGN KEY(tag_id) REFERENCES tags(id) ON UPDATE CASCADE
)ENGINE=InnoDb;
INSERT INTO blogs VALUES(null, 1, 1, 'blog 1', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 1, 'blog 2', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 1, 'blog 3', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 2, 'blog 4', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 2, 'blog 5', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 2, 'blog 6', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 3, 'blog 7', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 3, 'blog 8', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 3, 'blog 9', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 4, 'blog 0', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 4, 'blog 10', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());
INSERT INTO blogs VALUES(null, 1, 4, 'blog 11', 'prueba.jpg', 'blog 1 sub', 'hola mundo como van', 1, 'descripcionCC', 'blog 11', 'Hola, Que, Haces,', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS likes(
id          int(11) auto_increment not null,
user_id     int(11) not null,
blog_id     int(11) not null,
create_at   timestamp null,
update_at   timestamp null,
CONSTRAINT pk_likes PRIMARY KEY(id)
)ENGINE=InnoDb;
INSERT INTO likes VALUES(NULL, 1, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 1, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 1, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 1, 5, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 5, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS comentarios(
id          int(11) auto_increment not null,
user_id     int(11) not null,
blog_id    int(11) not null,
contenido   MEDIUMTEXT not null,
create_at   timestamp null,
update_at   timestamp null,
CONSTRAINT pk_comentarios PRIMARY KEY(id),
CONSTRAINT fk_comentarios_users FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE,
CONSTRAINT fk_comentarios_blogs FOREIGN KEY(blogs_id) REFERENCES blogs(id) ON UPDATE CASCADE
)ENGINE=InnoDb;
INSERT INTO comentarios VALUES(NULL, 1, 1, 'comentario de prueba del usuario 1', CURTIME(), CURTIME());
INSERT INTO comentarios VALUES(NULL, 2, 4, 'comentario de prueba del usuario 2', CURTIME(), CURTIME());
INSERT INTO comentarios VALUES(NULL, 3, 5, 'comentario de prueba del usuario 3', CURTIME(), CURTIME());

/*--------------------------- no relacionadas----------------------------*/
CREATE TABLE IF NOT EXISTS prospectos(
id          int (11) auto_increment not null,
nombre      varchar(255) not null,
apellido    varchar(255) not null,
correo      varchar(255) not null,
asunto      varchar(255) null,
telefono    int(15) not null,
mensaje     MEDIUMTEXT not null,
solucion    MEDIUMTEXT null,
rellamar_en varchar(255) null,
create_at   timestamp null,
update_at   timestamp null,
CONSTRAINT pk_prospectos PRIMARY KEY(id)
)ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS configuracion(
id int(11) auto_increment not null,
semana varchar(25) not null,
sabado varchar(25) not null,
domingo varchar(25) not null,
facebook varchar(255) not null,
twitter varchar(255),
linkedin varchar(255),
correo1 varchar(100) not null,
correo2 varchar(100),
telefono1 int(15) not null,
telefono2 int(15),
direccion int(255),
marca varchar(255) not null,
nombre1 varchar(50) not null,
nombre2 varchar(50) not null,
apellido1 varchar(50) not null,
apellido2 varchar(50) not null,
firma MEDIUMTEXT not null,
fecha timestamp not null,
CONSTRAINT pk_configuracion PRIMARY KEY(id)
)ENGINE=MyISAM;
