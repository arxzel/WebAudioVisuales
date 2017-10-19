
DROP DATABASE IF EXISTS audio_visuales;
CREATE DATABASE IF NOT EXISTS audio_visuales
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE audio_visuales;


/****
***** ESQUEMA PERMISOS Y USUARIOS EN DESARROLLO *****
****/

DROP TABLE IF EXISTS permisos CASCADE;
DROP TABLE IF EXISTS permisos_tipos_de_usuarios CASCADE;
DROP TABLE IF EXISTS tipos_de_usuarios CASCADE;
DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE IF NOT EXISTS permisos(
    id_permiso                      INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    permiso                         VARCHAR(20)     NOT NULL,
    valor                           INT             NOT NULL,
    PRIMARY KEY (id_permiso),
    UNIQUE(valor)
);

CREATE TABLE IF NOT EXISTS tipos_de_usuarios(
    id_tipo_de_usuario              INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    tipo_usuario                    VARCHAR(20)     NOT NULL,
    PRIMARY KEY (id_tipo_de_usuario)
);

CREATE TABLE IF NOT EXISTS permisos_tipos_de_usuarios(
    id_permiso_tipo_de_usuario      INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    id_tipo_de_usuario              INT             NOT NULL,
    id_permiso                      INT             NOT NULL,
    PRIMARY KEY (id_permiso_tipo_de_usuario),
    FOREIGN KEY (id_tipo_de_usuario)                REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
    FOREIGN KEY (id_permiso)                        REFERENCES permisos(id_permiso),
    CONSTRAINT permiso_tipo_de_usuario UNIQUE (id_permiso, id_tipo_de_usuario)
);

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario                      INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    documento                       VARCHAR(20)     NOT NULL,
    nombres                         VARCHAR(20)     NOT NULL,
    apellidos                       VARCHAR(20)     NOT NULL,
    email                           VARCHAR(30)     NOT NULL,
    passwd                          VARCHAR(100)    NOT NULL,
    activo                          BOOLEAN         NOT NULL,
    id_tipo_de_usuario              INT             NOT NULL,
    id_jefe                         INT             NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_tipo_de_usuario)                REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
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

INSERT INTO tipos_de_usuarios
    (tipo_usuario) VALUES
    ('ROOT'),
    ('ADMINISTRADOR'),
    ('RECURSOS'),
    ('JEFE ACADEMICO'),
    ('DOCENTE'),
    ('INVITADO')
;

INSERT INTO permisos_tipos_de_usuarios
    (id_tipo_de_usuario, id_permiso) VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (1, 7)
;

INSERT INTO usuarios
    (documento, nombres, apellidos, email, passwd, activo, id_tipo_de_usuario, id_jefe) VALUES
    ('0', 'ROOT', 'ADMIN', 'support@unisangil.edu.co', SHA1(MD5('toor')), TRUE, 1, NULL)
;




/****
***** ESQUEMA MAGISTRAL EN DESARROLLO *****
****/



CREATE TABLE IF NOT EXISTS descansos(
    id_descanso                     INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    nombre                          VARCHAR(20)     NOT NULL,
    hora_inicio                     TIME            NOT NULL,
    duracion                        TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL
);

CREATE TABLE IF NOT EXISTS parametros_horario(
    id_parametro_horario            INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    nombre                          VARCHAR(30)     NOT NULL,
    hora_inicio_jornada             TIME            NOT NULL,
    hora_final_jornada              TIME            NOT NULL,
    duracion_hora_academica         TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL
);

CREATE TABLE IF NOT EXISTS parametros_reservas(
    id_parametro_reserva            INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    nombre                          VARCHAR(30)     NOT NULL,
    dias_minimos_reserva            SMALLINT        NOT NULL,
    tiempo_minimo_reserva           TIME            NOT NULL,
    dias_maximos_reserva            SMALLINT        NOT NULL,
    tiempo_maximo_reserva           TIME            NOT NULL,
    estado                          BOOLEAN         NOT NULL
);

CREATE TABLE IF NOT EXISTS horas(
    id_hora                         INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    hora                            TIME            NOT NULL;
);

CREATE TABLE IF NOT EXISTS periodos_academicos(
    id_periodo_academico            INT             NOT NULL        AUTO_INCREMENT      COMMENT 'este_es_un_comentario',
    nombre                          VARCHAR(50)     NOT NULL,
    fecha_inicio                    DATE            NOT NULL,
    fecha_final                     DATE            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    descripcion                     TEXT            NULL
);


INSERT INTO descansos
    (nombre, hora_inicio, duracion, estado) VALUES
    ('Primer descanso mañana', '08:30:00', '00:10:00', TRUE),
    ('Segundo descanso mañana', '10:20:00', '00:10:00', TRUE),
    ('Descanso medio día', '12:10:00', '01:40:00', TRUE),
    ('Descanso media tarde', '18:00:00', '00:15:00', TRUE),
    ('Descanso noche', '20:45', '00:15:00', TRUE)
;

INSERT INTO parametros_semestres
    (hora_inicio_jornada, hora_final_jornada, duracion_hora_academica, estado) VALUES
    ('hora_inicio_jornada', 'hora_final_jornada', 'duracion_hora_academica', FALSE),
    ('hora_inicio_jornada', 'hora_final_jornada', 'duracion_hora_academica', FALSE),
    ('hora_inicio_jornada', 'hora_final_jornada', 'duracion_hora_academica', FALSE),
    ('hora_inicio_jornada', 'hora_final_jornada', 'duracion_hora_academica', FALSE)
;
