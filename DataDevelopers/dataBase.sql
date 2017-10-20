
DROP DATABASE IF EXISTS audio_visuales;
CREATE DATABASE IF NOT EXISTS audio_visuales
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE audio_visuales;


/****
***** ESQUEMA PERMISOS Y USUARIOS EN DESARROLLO *****
****/

DROP TABLE IF EXISTS permisos CASCADE;
DROP TABLE IF EXISTS permisos_tipos_usuarios CASCADE;
DROP TABLE IF EXISTS tipos_usuarios CASCADE;
DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE IF NOT EXISTS permisos(
    id_permiso                      INT             NOT NULL        AUTO_INCREMENT,
    permiso                         VARCHAR(20)     NOT NULL,
    valor                           INT             NOT NULL,
    PRIMARY KEY (id_permiso),
    UNIQUE(valor)
);

CREATE TABLE IF NOT EXISTS tipos_usuarios(
    id_tipo_usuario                 INT             NOT NULL        AUTO_INCREMENT,
    tipo_usuario                    VARCHAR(20)     NOT NULL,
    descripcion                     TEXT            NULL,
    PRIMARY KEY (id_tipo_usuario)
);

CREATE TABLE IF NOT EXISTS permisos_tipos_usuarios(
    id_permiso_tipo_usuario      INT             NOT NULL        AUTO_INCREMENT,
    id_tipo_usuario              INT             NOT NULL,
    id_permiso                      INT             NOT NULL,
    PRIMARY KEY (id_permiso_tipo_usuario),
    FOREIGN KEY (id_tipo_usuario)                REFERENCES tipos_usuarios(id_tipo_usuario),
    FOREIGN KEY (id_permiso)                        REFERENCES permisos(id_permiso),
    CONSTRAINT permiso_tipo_de_usuario UNIQUE (id_permiso, id_tipo_usuario)
);

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario                      INT             NOT NULL        AUTO_INCREMENT,
    documento                       VARCHAR(20)     NOT NULL,
    nombres                         VARCHAR(20)     NOT NULL,
    apellidos                       VARCHAR(20)     NOT NULL,
    email                           VARCHAR(30)     NOT NULL,
    passwd                          VARCHAR(100)    NOT NULL,
    activo                          BOOLEAN         NOT NULL,
    id_tipo_usuario              INT             NOT NULL,
    id_jefe                         INT             NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_tipo_usuario)                REFERENCES tipos_usuarios(id_tipo_usuario),
    FOREIGN KEY (id_jefe)                           REFERENCES usuarios(id_usuario)
);


INSERT INTO permisos
    (permiso, valor) VALUES
    ('CREAR USUARIO',1),
    ('ELIMINAR USUARIO',2),
    ('MODIFICAR USUARIO',3),
    ('ADMINISTRAR RECURSOS',4),
    ('LEER INFORMES',5),
    ('ADMIN MAGISTRAL',6),
    ('ADMIN ACADEMICO',7)
;

INSERT INTO tipos_usuarios
    (tipo_usuario) VALUES
    ('ROOT'),
    ('ADMINISTRADOR'),
    ('RECURSOS'),
    ('JEFE ACADEMICO'),
    ('DOCENTE'),
    ('INVITADO')
;

INSERT INTO permisos_tipos_usuarios
    (id_tipo_usuario, id_permiso) VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (1, 7)
;

INSERT INTO usuarios
    (documento, nombres, apellidos, email, passwd, activo, id_tipo_usuario, id_jefe) VALUES
    ('0', 'ROOT', 'ADMIN', 'support@unisangil.edu.co', SHA1(MD5('toor')), TRUE, 1, NULL),
    ('123', 'Faver', 'Amorocho', 'decano@unisangil.edu.co', SHA1(MD5('decano')), TRUE, 4, 1),
    ('234', 'Yaneida', 'Longas', 'programa@unisangil.edu.co', SHA1(MD5('programa')), TRUE, 4, 2),
    ('345', 'Igor', 'Bautista', 'docente@unisangil.edu.co', SHA1(MD5('docente')), TRUE, 5, 3)
;




/****
***** ESQUEMA MAGISTRAL EN DESARROLLO *****
****/



CREATE TABLE IF NOT EXISTS descansos(
    id_descanso                     INT             NOT NULL        AUTO_INCREMENT,
    nombre                          VARCHAR(20)     NOT NULL,
    hora_inicio                     TIME            NOT NULL,
    duracion                        TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    PRIMARY KEY (id_descanso)
);

CREATE TABLE IF NOT EXISTS parametros_horario(
    id_parametro_horario            INT             NOT NULL        AUTO_INCREMENT,
    nombre                          VARCHAR(30)     NOT NULL,
    hora_inicio_jornada             TIME            NOT NULL,
    hora_final_jornada              TIME            NOT NULL,
    duracion_hora_academica         TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    PRIMARY KEY (id_parametro_horario)
);

CREATE TABLE IF NOT EXISTS parametros_reservas(
    id_parametro_reserva            INT             NOT NULL        AUTO_INCREMENT,
    nombre                          VARCHAR(30)     NOT NULL,
    dias_minimos_reserva            SMALLINT        NOT NULL,
    tiempo_minimo_reserva           TIME            NOT NULL,
    dias_maximos_reserva            SMALLINT        NOT NULL,
    tiempo_maximo_reserva           TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    PRIMARY KEY (id_parametro_reserva)
);

CREATE TABLE IF NOT EXISTS horas(
    id_hora                         INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    hora                            TIME            NOT NULL,
    PRIMARY KEY (id_hora)
);

CREATE TABLE IF NOT EXISTS periodos_academicos(
    id_periodo_academico            INT             NOT NULL        AUTO_INCREMENT,
    nombre                          VARCHAR(50)     NOT NULL,
    fecha_inicio                    DATE            NOT NULL,
    fecha_final                     DATE            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    descripcion                     TEXT            NULL,
    PRIMARY KEY (id_periodo_academico)
);


INSERT INTO descansos
    (nombre, hora_inicio, duracion, estado) VALUES
    ('Primer descanso mañana', '08:30:00', '00:10:00', TRUE),
    ('Segundo descanso mañana', '10:20:00', '00:10:00', TRUE),
    ('Descanso medio día', '12:10:00', '01:40:00', TRUE),
    ('Descanso media tarde', '18:00:00', '00:15:00', TRUE),
    ('Descanso noche', '20:45', '00:15:00', TRUE)
;

INSERT INTO parametros_horario
    (hora_inicio_jornada, hora_final_jornada, duracion_hora_academica, estado) VALUES
    ('06:00:00', '23:00:00', '60:00:00', FALSE),
    ('06:00:00', '23:00:00', '00:45:00', FALSE),
    ('06:00:00', '23:00:00', '00:50:00', TRUE)
;

INSERT INTO parametros_reservas
    (nombre, dias_minimos_reserva, tiempo_minimo_reserva, dias_maximos_reserva, tiempo_maximo_reserva, estado) VALUES
    ('antes', 0, '12:00:00', 6, '23:59:59', FALSE),
    ('ahora', 1, '00:00:00', 7, '23:59:59', TRUE)
;

INSERT INTO periodos_academicos
    (nombre, fecha_inicio, fecha_final, estado, descripcion) VALUES
    ('2016-1', '2016-2-1', '2016-6-30', FALSE, 'descripcion'),
    ('2016-2', '2016-8-1', '2016-11-30', FALSE, 'descripcion'),
    ('2017-1', '2017-2-1', '2017-6-30', FALSE, 'descripcion'),
    ('2017-2', '2017-8-1', '2017-11-30', TRUE, 'descripcion')
;

/*
delimiter $$
CREATE TRIGGER actualizar_horas BEFORE INSERT ON descansos
    FOR EACH ROW
    BEGIN
    DECLARE inicio_jornada
    DECLARE final_jornada
    DECLARE ids_descansos CURSOR FOR SELECT temp.ids FROM (SELECT id_descanso AS ids, hora_inicio  FROM descansos WHERE estado = TRUE ORDER BY hora_inicio ASC) AS temp;
        FOR
        SELECT * FROM
        IF NEW.amount < 0 THEN
            SET NEW.amount = 0;
        ELSEIF NEW.amount > 100 THEN
            SET NEW.amount = 100;
        END IF;
    END;
$$
delimiter ;
*/

/*
DROP PROCEDURE IF EXISTS calculo_horario;

DELIMITER $$
CREATE PROCEDURE calculo_horario(OUT dato char(100))
BEGIN
    DECLARE inicio_jornada TIME;
    DECLARE final_jornada TIME;
    DECLARE duracion_hora TIME;

    CREATE TEMPORARY TABLE tempo AS
    SELECT id_descanso, hora_inicio
    FROM descansos
    WHERE estado = TRUE
    ORDER BY hora_inicio ASC;

    SELECT hora_inicio_jornada, hora_final_jornada, duracion_hora_academica
    INTO inicio_jornada, final_jornada, duracion_hora
    FROM parametros_horario
    WHERE estado = TRUE;



    SELECT  CONCAT('Hello, ',inicio_jornada, ' ', final_jornada, ' ', duracion_hora,'!') INTO dato;
END;$$ DELIMITER ;

CALL calculo_horario(@dato);

SELECT @dato;
*/
