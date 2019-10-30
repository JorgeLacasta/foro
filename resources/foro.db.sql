/*

Base de datos de foro

Por Jorge Dueñás Lerín

*/

DROP TABLE IF EXISTS Respuesta;
DROP TABLE IF EXISTS Tema;

CREATE TABLE Tema (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  titulo    varchar(120) NOT NULL ,
  nombre    varchar(20)  NOT NULL,
  pass      varchar(20) NOT NULL,
  etiqueta  varchar(20) NOT NULL,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);


DROP TABLE IF EXISTS Respuesta;
CREATE TABLE Respuesta (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  titulo    varchar(120) NOT NULL ,
  contenido varchar(1024)  NOT NULL,
  nombre    varchar(20) NOT NULL,
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  id_tema MEDIUMINT NOT NULL,
  FOREIGN KEY (id_tema) REFERENCES Tema(id)
);

INSERT INTO Tema (id, titulo, nombre, pass, etiqueta)
 VALUES
  (1, 'DWES mola', 'jorge', '1234', 'Cosas ciertas'),
  (2, 'Sugerencias en Mini foro', 'pepe', '1234', 'Administración')
;

INSERT INTO Respuesta (id, id_tema, titulo, nombre, contenido)
 VALUES
  (1, 1, 'Cierto', 'pepe', 'Tienes razón'),
  (2, 1, 'Cierto', 'almudena', 'Yo también lo creo'),
  (3, 1, 'Nop', 'Iniaki', 'Y una kk'),
  (4, 2, 'Algo', 'nombre1', 'Cosa, cosa'),
  (5, 2, 'Algo', 'nombre2', 'Asd, Dsf, Cosa, cosa'),
  (6, 2, 'Yeah', 'nombre3', 'Cosa, cosa, JKU, LOP'),
  (7, 1, 'KLK', 'pepa', 'Holaaaa'),
  (8, 2, 'Algo', 'rufian', 'suuuuu'),
  (9, 2, 'Algo', 'flora', 'Cosa1'),
  (10, 1, 'Cosa', 'pepe', 'Cosa2'),
  (11, 1, 'Maneras', 'almudena', 'Cosa3'),
  (12, 2, 'Cierto', 'jose', 'eoooo'),
  (13, 1, 'Recuperacion', 'profesor', 'suspenso'),
  (14, 1, 'Ya era hora', 'julian', 'eoooo'),
  (15, 2, 'Si claro', 'jorge', 'que tal'),
  (16, 2, 'Hola', 'maria', 'preparacion de trabajos'),
  (17, 2, 'Recursos', 'jose', 'eoooo'),
  (18, 1, 'Joooo', 'sofia', 'ya es muy tarde'),
  (19, 2, 'eso no se hace', 'german', 'a buenas horas'),
  (20, 1, 'tenemos que hablar', 'monica', 'embarazo'),
  (21, 1, 'que pasaaaa', 'monica', 'mami'),
  (22, 1, 'como te va', 'julian', 'a ver si quedamos')
;
