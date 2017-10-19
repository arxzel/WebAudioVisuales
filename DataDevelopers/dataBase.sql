
DROP DATABASE IF EXISTS audio_visuales;
CREATE DATABASE IF NOT EXISTS audio_visuales
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE audio_visuales;


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
