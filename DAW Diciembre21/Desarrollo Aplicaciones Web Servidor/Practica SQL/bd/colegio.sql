CREATE DATABASE colegio CHARACTER SET UTF8mb4 COLLATE utf8mb4_bin;
USE colegio;

CREATE TABLE asignatura
(
    id     INT(6)      NOT NULL auto_increment,
    nombre VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

CREATE TABLE alumno
(
    id               INT(6)      NOT NULL auto_increment,
    nombre           VARCHAR(25) NOT NULL,
    apellidos        VARCHAR(25) NOT NULL,
    password         VARCHAR(32) NOT NULL,
    telefono         VARCHAR(12),
    email            VARCHAR(64),
    sexo             CHAR(1),
    fecha_nacimiento DATE        NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

CREATE TABLE nota
(
    id            INT(6) NOT NULL auto_increment,
    asignatura_id INT,
    calificacion  FLOAT  NOT NULL,
    fecha_examen  DATE   NOT NULL,
    convocatoria  INT(6),
    alumno_id     INT,
    INDEX alum_ind (alumno_id),
    FOREIGN KEY (alumno_id)
        REFERENCES alumno (id)
        ON DELETE CASCADE,
    INDEX asignat_ind (asignatura_id),
    FOREIGN KEY (asignatura_id)
        REFERENCES asignatura (id)
        ON DELETE CASCADE,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

CREATE TABLE labor_extra
(
    id        INT(6) NOT NULL auto_increment,
    puesto    VARCHAR(32),
    alumno_id INT,
    INDEX alum_ind (alumno_id),
    FOREIGN KEY (alumno_id)
        REFERENCES alumno (id)
        ON DELETE CASCADE,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- insertar asignatura
INSERT INTO asignatura(nombre)
VALUES ('Matemáticas');
INSERT INTO asignatura(nombre)
VALUES ('Lengua');
-- insertar alumno
INSERT INTO alumno(nombre, apellidos, fecha_nacimiento, password)
VALUES ('Juan', 'Pardo', '1978-08-03', '1234'),
       ('Manuel', 'Fernandez', '1982-11-10', '1234'),
       ('Pedro', 'Lopez', '1980-03-21', '1234'),
       ('Maria', 'Gutierrez', '1976-12-19', '1234');

-- insertar nota
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (1, 7, '2018-12-19', 1, 1);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (2, 5, '2018-11-03', 2, 1);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (1, 3, '2018-11-03', 3, 2);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (2, 8, '2018-11-03', 1, 2);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (1, 2, '2018-07-05', 2, 3);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (2, 5, '2018-11-03', 1, 3);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (1, 9, '2018-09-13', 3, 4);
INSERT INTO nota(asignatura_id, calificacion, fecha_examen, convocatoria, alumno_id)
VALUES (2, 5, '2018-11-23', 1, 4);
-- insertar labor extra
INSERT INTO labor_extra(puesto, alumno_id)
VALUES ('Delegado de clase', 1);
INSERT INTO labor_extra(puesto, alumno_id)
VALUES ('Director del centro', 2);