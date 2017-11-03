
DROP DATABASE IF EXISTS audio_visuales;
CREATE DATABASE IF NOT EXISTS audio_visuales
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE audio_visuales;

SET autocommit=0;

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
    id_permiso_tipo_usuario         INT             NOT NULL        AUTO_INCREMENT,
    id_tipo_usuario                 INT             NOT NULL,
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

CREATE TABLE IF NOT EXISTS parametros_horarios(
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
    id_hora                         INT             NOT NULL        AUTO_INCREMENT COMMENT 'no es AUTO_INCREMENT debido a que el trigger no soporta DDL solo DML',
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
