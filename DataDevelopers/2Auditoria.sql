USE audio_visuales;

/*DELETE*/
CREATE TABLE IF NOT EXISTS auditoria_delete_permisos(
    id_auditoria_delete_permisos    INT             AUTO_INCREMENT,
    id_permiso                      INT             NULL,
    permiso                         VARCHAR(20)     NULL,
    valor                           INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_permisos)
);

CREATE TABLE IF NOT EXISTS auditoria_delete_tipos_usuarios(
    id_auditoria_delete_tipos_usuarios  INT             AUTO_INCREMENT,
    id_tipo_usuario                 INT             NULL,
    tipo_usuario                    VARCHAR(20)     NULL,
    descripcion                     TEXT            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_tipos_usuarios)
);

CREATE TABLE IF NOT EXISTS auditoria_delete_permisos_tipos_usuarios(
    id_auditoria_delete_permisos_tipos_usuarios INT             AUTO_INCREMENT,
    id_permiso_tipo_usuario         INT             NULL,
    id_tipo_usuario                 INT             NULL,
    id_permiso                      INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_permisos_tipos_usuarios)
);

CREATE TABLE IF NOT EXISTS auditoria_delete_usuarios(
    id_auditoria_delete_usuarios    INT             AUTO_INCREMENT,
    id_usuario                      INT             NULL,
    documento                       VARCHAR(20)     NULL,
    nombres                         VARCHAR(20)     NULL,
    apellidos                       VARCHAR(20)     NULL,
    email                           VARCHAR(30)     NULL,
    passwd                          VARCHAR(100)    NULL,
    activo                          BOOLEAN         NULL,
    id_tipo_usuario              INT             NULL,
    id_jefe                         INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_usuarios)
);


CREATE TABLE IF NOT EXISTS auditoria_delete_parametros_reservas(
    id_auditoria_delete_parametros_reservas INT             AUTO_INCREMENT,
    id_parametro_reserva            INT             NULL,
    nombre                          VARCHAR(30)     NULL,
    dias_minimos_reserva            SMALLINT        NULL,
    tiempo_minimo_reserva           TIME            NULL,
    dias_maximos_reserva            SMALLINT        NULL,
    tiempo_maximo_reserva           TIME            NULL,
    estado                          BOOLEAN         NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_parametros_reservas)
);

/*
CREATE TABLE IF NOT EXISTS auditoria_delete_horas(
    id_auditoria_delete_horas   INT             AUTO_INCREMENT,
    id_hora                         INT             NULL,
    hora                            TIME            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_horas)
);
*/

CREATE TABLE IF NOT EXISTS auditoria_delete_periodos_academicos(
    id_auditoria_delete_periodos_academicos INT             AUTO_INCREMENT,
    id_periodo_academico            INT             NULL,
    nombre                          VARCHAR(50)     NULL,
    fecha_inicio                    DATE            NULL,
    fecha_final                     DATE            NULL,
    estado                          BOOLEAN         NULL,
    descripcion                     TEXT            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_periodos_academicos)
);


/*UPDATE */
CREATE TABLE IF NOT EXISTS auditoria_update_permisos(
    id_auditoria_update_permisos    INT             AUTO_INCREMENT,
    id_permiso                      INT             NULL,
    permiso                         VARCHAR(20)     NULL,
    valor                           INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_permisos)

);


CREATE TABLE IF NOT EXISTS auditoria_update_tipos_usuarios(
    id_auditoria_update_tipos_usuarios  INT             AUTO_INCREMENT,
    id_tipo_usuario                 INT             NULL,
    tipo_usuario                    VARCHAR(20)     NULL,
    descripcion                     TEXT            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_tipos_usuarios)
);


CREATE TABLE IF NOT EXISTS auditoria_update_permisos_tipos_usuarios(
    id_auditoria_update_permisos_tipos_usuarios INT             AUTO_INCREMENT,
    id_permiso_tipo_usuario         INT             NULL,
    id_tipo_usuario                 INT             NULL,
    id_permiso                      INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_permisos_tipos_usuarios)
);

CREATE TABLE IF NOT EXISTS auditoria_update_usuarios(
    id_auditoria_update_usuarios    INT             AUTO_INCREMENT,
    id_usuario                      INT             NULL,
    documento                       VARCHAR(20)     NULL,
    nombres                         VARCHAR(20)     NULL,
    apellidos                       VARCHAR(20)     NULL,
    email                           VARCHAR(30)     NULL,
    passwd                          VARCHAR(100)    NULL,
    activo                          BOOLEAN         NULL,
    id_tipo_usuario              INT             NULL,
    id_jefe                         INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_usuarios)
);


CREATE TABLE IF NOT EXISTS auditoria_update_parametros_reservas(
    id_auditoria_update_parametros_reservas INT             AUTO_INCREMENT,
    id_parametro_reserva                INT             NULL,
    nombre_old                          VARCHAR(30)     NULL,
    nombre_new                          VARCHAR(30)     NULL,
    dias_minimos_reserva_old            SMALLINT        NULL,
    dias_minimos_reserva_new            SMALLINT        NULL,
    tiempo_minimo_reserva_old           TIME            NULL,
    tiempo_minimo_reserva_new           TIME            NULL,
    dias_maximos_reserva_old            SMALLINT        NULL,
    dias_maximos_reserva_new            SMALLINT        NULL,
    tiempo_maximo_reserva_old           TIME            NULL,
    tiempo_maximo_reserva_new           TIME            NULL,
    estado_old                          BOOLEAN         NULL,
    estado_new                          BOOLEAN         NULL,
    usuario_id                          INT             NOT NULL,
    hora_action                         TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_parametros_reservas)
);
/*
CREATE TABLE IF NOT EXISTS auditoria_update_horas(
    id_auditoria_update_horas       INT             AUTO_INCREMENT,
    id_hora                         INT             NULL,
    hora                            TIME            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_horas)
);
*/
CREATE TABLE IF NOT EXISTS auditoria_update_periodos_academicos(
    id_auditoria_update_periodos_academicos INT             AUTO_INCREMENT,
    id_periodo_academico                INT             NULL,
    nombre_old                          VARCHAR(50)     NULL,
    nombre_new                          VARCHAR(50)     NULL,
    fecha_inicio_old                    DATE            NULL,
    fecha_inicio_new                    DATE            NULL,
    fecha_final_old                     DATE            NULL,
    fecha_final_new                     DATE            NULL,
    estado_old                          BOOLEAN         NULL,
    estado_new                          BOOLEAN         NULL,
    descripcion_old                     TEXT            NULL,
    descripcion_new                     TEXT            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_periodos_academicos)
);


CREATE TABLE IF NOT EXISTS AUDITORIA_DELETE_CATEGORIAS(
    id_auditoria_delete_categoria                   INT             NOT NULL        AUTO_INCREMENT,
    id_categoria                    INT             NULL,
    categoria                       VARCHAR(25)     NULL,
    descripcion                     TEXT            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_categoria)
);

CREATE TABLE IF NOT EXISTS AUDITORIA_DELETE_RECURSOS(
        id_auditoria_delete_recurso                 INT             NOT NULL        AUTO_INCREMENT,
        id_recurso                  INT             NULL,
        ciu                         VARCHAR(10)     NULL,
        serial                      VARCHAR(100)    NULL,
        recurso                     VARCHAR(50)     NULL,
        descripcion                 TEXT            NULL,
        estado                      BOOLEAN         NULL COMMENT 'El estado es: 1 para pendiente, 2 para atentida y 3 para cancelada',
        id_categoria                INT             NULL,
        usuario_id                      INT             NOT NULL,
        hora_action                     TIMESTAMP       NOT NULL,
        PRIMARY KEY (id_auditoria_delete_recurso)

);

CREATE TABLE IF NOT EXISTS AUDITORIA_DELETE_RESERVAS(
    id_auditoria_delete_reserva                     INT             NOT NULL        AUTO_INCREMENT,
    id_reserva                      INT             NULL,
    fecha_hora_creada               TIMESTAMP       NULL,
    info_adicional                  TEXT            NULL,
    fecha_reserva                   DATE            NULL,
    estado                          BIT             NULL,
    id_aula                         INT             NULL,
    hora_inicio                     TIME            NULL,
    hora_final                      TIME            NULL,
    id_materia                      INT             NULL,
    id_usuario                      INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_reserva)
);

CREATE TABLE IF NOT EXISTS AUDITORIA_DELETE_RESERVAS_RECURSOS(
    id_auditoria_delete_reserva_recurso         INT             NOT NULL        AUTO_INCREMENT,
    id_reserva_recurso          INT             NULL,
    id_reserva                  INT             NULL,
    id_recurso                  INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_reserva_recurso)
);


CREATE TABLE IF NOT EXISTS AUDITORIA_UPDATE_CATEGORIAS(
    id_auditoria_update_categoria       INT             NOT NULL        AUTO_INCREMENT,
    id_auditoria                        INT             NOT NULL,
    categoria_old                       VARCHAR(25)     NOT NULL,
    categoria_new                       VARCHAR(25)     NOT NULL,
    descripcion_old                     TEXT            NOT NULL,
    descripcion_new                     TEXT            NOT NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_categoria)
);

CREATE TABLE IF NOT EXISTS AUDITORIA_UPDATE_RECURSOS(
        id_auditoria_update_recurso                 INT             NOT NULL        AUTO_INCREMENT,
        id_recurso                  INT             NULL,
        ciu_old                         VARCHAR(10)     NULL,
        ciu_new                         VARCHAR(10)     NULL,
        serial_old                      VARCHAR(100)    NULL,
        serial_new                      VARCHAR(100)    NULL,
        recurso_old                     VARCHAR(50)     NULL,
        recurso_new                     VARCHAR(50)     NULL,
        descripcion_old                 TEXT            NULL,
        descripcion_new                 TEXT            NULL,
        estado_old                      BOOLEAN         NULL,
        estado_new                      BOOLEAN         NULL,
        id_categoria_old                INT             NULL,
        id_categoria_new                INT             NULL,
        usuario_id                      INT             NULL,
        hora_action                     TIMESTAMP       NULL,
        PRIMARY KEY (id_auditoria_update_recurso)
);

CREATE TABLE IF NOT EXISTS AUDITORIA_UPDATE_RESERVAS(
    id_auditoria_update_reserva                     INT             NOT NULL        AUTO_INCREMENT,
    id_reserva                      INT             NULL,
    fecha_hora_creada_old               TIMESTAMP       NULL,
    fecha_hora_creada_new               TIMESTAMP       NULL,
    info_adicional_old                  TEXT            NULL,
    info_adicional_new                  TEXT            NULL,
    fecha_reserva_old                   DATE            NULL,
    fecha_reserva_new                   DATE            NULL,
    estado_old                          BIT             NULL,
    estado_new                          BIT             NULL,
    id_aula_old                         INT             NULL,
    id_aula_new                         INT             NULL,
    hora_inicio_old                     TIME            NULL,
    hora_inicio_new                     TIME            NULL,
    hora_final_old                      TIME            NULL,
    hora_final_new                      TIME            NULL,
    id_materia_old                      INT             NULL,
    id_materia_new                      INT             NULL,
    id_usuario_old                      INT             NULL,
    id_usuario_new                      INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_reserva)
);

CREATE TABLE IF NOT EXISTS AUDITORIA_UPDATE_RESERVAS_RECURSOS(
    id_auditoria_update_reserva_recurso         INT             NOT NULL        AUTO_INCREMENT,
    id_reserva_recurso          INT             NULL,
    id_reserva_old                  INT             NULL,
    id_reserva_new                  INT             NULL,
    id_recurso_old                  INT             NULL,
    id_recurso_new                  INT             NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_reserva_recurso)
);
