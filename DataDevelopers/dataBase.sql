CREATE TABLE permisos(
    id_permiso                      SERIAL      PRIMARY KEY,
    permiso                         VARCHAR     NOT NULL
);

CREATE TABLE permisos_tipos_de_usuarios(
    id_permiso_tipo_de_usuario      SERIAL      PRIMARY KEY,
    id_permiso                      INT         NOT NULL,
    id_tipo_de_usuario              INT         NOT NULL,
    FOREIGN KEY (id_permiso) REFERENCES permisos(id_permiso),
    FOREIGN KEY (id_tipo_de_usuario) REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
    UNIQUE (id_credito, id_garantia)
);

CREATE TABLE tipos_de_usuarios(
    id_tipo_de_usuario              SERIAL      PRIMARY KEY,
    tipo_usuario                    VARCHAR     NOT NULL
);

CREATE TABLe usuarios(
    id_usuario                      SERIAL      PRIMARY KEY,
    documento                       VARCHAR     NOT NULL,
    nombres                         VARCHAR     NOT NULL,
    apellidos                       VARCHAR     NOT NULL,
    passwd                          VARCHAR     NOT NULL,
    activo                          BOOLEAN     NOT NULL,
    id_tipo_de_usuario              INT         NOT NULL,
    id_jefe                         INT         NULL,
    FOREIGN KEY (id_tipo_de_usuario) REFERENCES tipos_de_usuarios(id_tipo_de_usuario),
    FOREIGN KEY (id_jefe) REFERENCES usuarios(id_jefe)
);
