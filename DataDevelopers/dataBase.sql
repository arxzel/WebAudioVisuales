
DROP DATABASE IF EXISTS audio_visuales;
CREATE DATABASE audio_visuales;
USE audio_visuales;

DROP TABLE IF EXISTS permisos CASCADE;
DROP TABLE IF EXISTS permisos_tipos_de_usuarios CASCADE;
DROP TABLE IF EXISTS tipos_de_usuarios CASCADE;
DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE IF NOT EXISTS permisos(
    id_permiso                      INT             NOT NULL        AUTO_INCREMENT,
    permiso                         VARCHAR(20)     NOT NULL,
    PRIMARY KEY (id_permiso)
);

CREATE TABLE IF NOT EXISTS tipos_de_usuarios(
    id_tipo_de_usuario              INT             NOT NULL        AUTO_INCREMENT,
    tipo_usuario                    VARCHAR(20)     NOT NULL,
    PRIMARY KEY (id_tipo_de_usuario)
);

CREATE TABLE IF NOT EXISTS permisos_tipos_de_usuarios(
    id_permiso_tipo_de_usuario      INT             NOT NULL        AUTO_INCREMENT,
    id_permiso                      INT             NOT NULL,
    id_tipo_de_usuario              INT             NOT NULL,
    PRIMARY KEY (id_permiso_tipo_de_usuario),
    FOREIGN KEY (id_permiso)                        REFERENCES permisos(id_permiso),
    FOREIGN KEY (id_tipo_de_usuario)                REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
    CONSTRAINT permiso_tipo_de_usuario UNIQUE (id_permiso, id_tipo_de_usuario)
);

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario                      INT             NOT NULL        AUTO_INCREMENT,
    documento                       VARCHAR(20)     NOT NULL,
    nombres                         VARCHAR(20)     NOT NULL,
    apellidos                       VARCHAR(20)     NOT NULL,
    passwd                          VARCHAR(20)     NOT NULL,
    activo                          BOOLEAN         NOT NULL,
    id_tipo_de_usuario              INT             NOT NULL,
    id_jefe                         INT             NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_tipo_de_usuario)                REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
    FOREIGN KEY (id_jefe)                           REFERENCES usuarios(id_usuario)
);
