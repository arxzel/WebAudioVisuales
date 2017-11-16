
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

CREATE TABLE IF NOT EXISTS horas(
    id_hora                         INT             NOT NULL        AUTO_INCREMENT,
    hora                            TIME            NOT NULL,
    PRIMARY KEY (id_hora)
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


CREATE TABLE IF NOT EXISTS periodos_academicos(
    id_periodo_academico            INT             NOT NULL        AUTO_INCREMENT,
    nombre                          VARCHAR(50)     NOT NULL,
    fecha_inicio                    DATE            NOT NULL,
    fecha_final                     DATE            NOT NULL,
    estado                          BOOLEAN         NOT NULL,
    descripcion                     TEXT            NULL,
    PRIMARY KEY (id_periodo_academico)
);









/****
***** ESQUEMA RESERVAS EN DESARROLLO *****
****/
































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





CREATE TABLE IF NOT EXISTS auditoria_delete_descansos(
    id_auditoria_delete_descansos   INT             AUTO_INCREMENT,
    id_descanso                     INT             NULL,
    nombre                          VARCHAR(20)     NULL,
    hora_inicio                     TIME            NULL,
    duracion                        TIME            NULL,
    estado                          BOOLEAN         NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_descansos)
);


CREATE TABLE IF NOT EXISTS auditoria_delete_parametros_horarios(
    id_auditoria_delete_parametro_horario  INT             AUTO_INCREMENT,
    id_parametro_horario            INT             NULL,
    nombre                          VARCHAR(30)     NULL,
    hora_inicio_jornada             TIME            NULL,
    hora_final_jornada              TIME            NULL,
    duracion_hora_academica         TIME            NULL,
    estado                          BOOLEAN         NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_parametro_horario)
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


CREATE TABLE IF NOT EXISTS auditoria_delete_horas(
    id_auditoria_delete_horas   INT             AUTO_INCREMENT,
    id_hora                         INT             NULL,
    hora                            TIME            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_delete_horas)
);


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





CREATE TABLE IF NOT EXISTS auditoria_update_descansos(
    id_auditoria_update_descansos   INT             AUTO_INCREMENT,
    id_descanso                     INT             NULL,
    nombre_old                          VARCHAR(20)     NULL,
    nombre_new                          VARCHAR(20)     NULL,
    hora_inicio_old                     TIME            NULL,
    hora_inicio_new                     TIME            NULL,
    duracion_old                        TIME            NULL,
    duracion_new                        TIME            NULL,
    estado_old                          BOOLEAN         NULL,
    estado_new                          BOOLEAN         NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_descansos)
);

CREATE TABLE IF NOT EXISTS auditoria_update_parametro_horarios(
    id_auditoria_update_parametro_horario  INT             AUTO_INCREMENT,
    id_parametro_horario                    INT             NULL,
    nombre_old                              VARCHAR(30)     NULL,
    nombre_new                              VARCHAR(30)     NULL,
    hora_inicio_jornada_old                 TIME            NULL,
    hora_inicio_jornada_new                 TIME            NULL,
    hora_final_jornada_old                  TIME            NULL,
    hora_final_jornada_new                  TIME            NULL,
    duracion_hora_academica_old             TIME            NULL,
    duracion_hora_academica_new             TIME            NULL,
    estado_old                              BOOLEAN         NULL,
    estado_new                              BOOLEAN         NULL,
    usuario_id                              INT             NOT NULL,
    hora_action                             TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_parametro_horario)
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

CREATE TABLE IF NOT EXISTS auditoria_update_horas(
    id_auditoria_update_horas   INT             AUTO_INCREMENT,
    id_hora                         INT             NULL,
    hora                            TIME            NULL,
    usuario_id                      INT             NOT NULL,
    hora_action                     TIMESTAMP       NOT NULL,
    PRIMARY KEY (id_auditoria_update_horas)
);

CREATE TABLE IF NOT EXISTS auditoria_update_periodos_academicos(
    id_auditoria_update_periodos_academicos INT             AUTO_INCREMENT,
    id_periodo_academico            INT             NULL,
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














































/****
***** PROCEDURES Y TRIGGERS DEL ESQUEMA MAGISTRAL *****
****/

USE audio_visuales;

/**
************PROCEDURES PARAMETROS RESERVAS
**/

DROP PROCEDURE IF EXISTS update_parametro_reserva;
DELIMITER $$
CREATE PROCEDURE update_parametro_reserva(
    in idParametroReserva             INT,
    in newNombre                      VARCHAR(30),
    in newDiasMinimosReserva          SMALLINT,
    in newTiempoMinimoReserva         TIME,
    in newDiasMaximosReserva          SMALLINT,
    in newTiempoMaximoReserva         TIME,
    in newEstado                      BOOLEAN,
    in idUsuario                      INT
)
BEGIN
    INSERT INTO auditoria_update_parametros_reservas(
        auditoria_update_parametros_reservas.id_parametro_reserva,
        nombre_old,
        nombre_new,
        dias_minimos_reserva_old,
        dias_minimos_reserva_new,
        tiempo_minimo_reserva_old,
        tiempo_minimo_reserva_new,
        dias_maximos_reserva_old,
        dias_maximos_reserva_new,
        tiempo_maximo_reserva_old,
        tiempo_maximo_reserva_new,
        estado_old,
        estado_new,
        usuario_id,
        hora_action
        ) SELECT
            parametros_reservas.id_parametro_reserva,
            nombre,
            newNombre,
            dias_minimos_reserva,
            newDiasMinimosReserva,
            tiempo_minimo_reserva,
            newTiempoMinimoReserva,
            dias_maximos_reserva,
            newDiasMaximosReserva,
            tiempo_maximo_reserva,
            newTiempoMaximoReserva,
            estado,
            newEstado,
            idUsuario,
            now()
            FROM parametros_reservas
            WHERE
            id_parametro_reserva = idParametroReserva

    ;

    UPDATE parametros_reservas
        SET
        nombre = newNombre,
        dias_minimos_reserva = newDiasMinimosReserva,
        tiempo_minimo_reserva = newTiempoMinimoReserva,
        dias_maximos_reserva = newDiasMaximosReserva,
        tiempo_maximo_reserva = newTiempoMaximoReserva,
        estado = newEstado
        WHERE id_parametro_reserva =  idParametroReserva
    ;
    COMMIT;
END;
$$ DELIMITER ;


DROP PROCEDURE IF EXISTS delete_parametro_reserva;
DELIMITER $$
CREATE PROCEDURE delete_parametro_reserva(
    in idParametroReserva             INT,
    in idUsuario                      INT
)
BEGIN
    INSERT INTO auditoria_delete_parametros_reservas(
        id_parametro_reserva,
        nombre,
        dias_minimos_reserva,
        tiempo_minimo_reserva,
        dias_maximos_reserva,
        tiempo_maximo_reserva,
        estado,
        usuario_id,
        hora_action
        ) SELECT
            id_parametro_reserva,
            nombre,
            dias_minimos_reserva,
            tiempo_minimo_reserva,
            dias_maximos_reserva,
            tiempo_maximo_reserva,
            estado,
            idUsuario,
            now()
            WHERE
            id_parametro_reserva = idParametroReserva
    ;

    DELETE FROM parametros_reservas
    WHERE id_parametro_reserva = idParametroReserva;
    COMMIT;
END;
$$ DELIMITER ;




/**
    PROCEDURES PERIODOS ACADEMICOS
**/

DROP PROCEDURE IF EXISTS update_periodo_academico;
DELIMITER $$
CREATE PROCEDURE update_periodo_academico(
    in idPeriodoAcademico           INT,
    in newNombre                    VARCHAR(50),
    in newFechaInicio               DATE,
    in newFechaFinal                DATE,
    in newEstado                    BOOLEAN,
    in newDescripcion               TEXT,
    in idUsuario                    INT
)
BEGIN
    INSERT INTO auditoria_update_periodos_academicos(
        id_periodo_academico,
        nombre_old,
        nombre_new,
        fecha_inicio_old,
        fecha_inicio_new,
        fecha_final_old,
        fecha_final_new,
        estado_old,
        estado_new,
        descripcion_old,
        descripcion_new,
        usuario_id,
        hora_action
        ) SELECT
        id_periodo_academico,
        nombre,
        newNombre,
        fecha_inicio,
        newFechaInicio,
        fecha_final,
        newFechaFinal,
        estado,
        newEstado,
        descripcion,
        newDescripcion
        FROM periodos_academicos
        WHERE id_periodo_academico = idPeriodoAcademico
    ;

    UPDATE periodos_academicos
        SET
        nombre = newNombre,
        fecha_inicio = newFechaInicio,
        fecha_final = newFechaFinal,
        estado = newEstado,
        descripcion = newDescripcion
        WHERE id_periodo_academico = idPeriodoAcademico
    ;
    COMMIT;
END;
$$ DELIMITER ;





DROP PROCEDURE IF EXISTS delete_periodo_academico;
DELIMITER $$
CREATE PROCEDURE delete_periodo_academico(
    in idPeriodoAcademico           INT,
    in idUsuario                    INT
)
BEGIN
    INSERT INTO auditoria_delete_periodos_academicos(
        id_periodo_academico,
        nombre_old,
        nombre_new,
        fecha_inicio_old,
        fecha_inicio_new,
        fecha_final_old,
        fecha_final_new,
        estado_old,
        estado_new,
        descripcion_old,
        descripcion_new,
        usuario_id,
        hora_action
    ) SELECT
        id_periodo_academico,
        nombre,
        fecha_inicio,
        fecha_final,
        estado,
        descripcion,
        idUsuario,
        now()
        FROM periodos_academicos
        WHERE id_periodo_academico = idPeriodoAcademico
    ;

    DELETE FROM
    periodos_academicos
    WHERE id_periodo_academico = idPeriodoAcademico;
    COMMIT;
END;
$$ DELIMITER ;



























































/****
***** INSERTS DEL ESQUEMA USUARIOS Y PERMISOS *****
****/
USE audio_visuales;


TRUNCATE TABLE permisos;
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

TRUNCATE TABLE tipos_usuarios;
INSERT INTO tipos_usuarios
    (tipo_usuario) VALUES
    ('ROOT'),
    ('ADMINISTRADOR'),
    ('RECURSOS'),
    ('JEFE ACADEMICO'),
    ('DOCENTE'),
    ('INVITADO')
;

TRUNCATE TABLE permisos_tipos_usuarios;
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

TRUNCATE TABLE usuarios;
INSERT INTO usuarios
    (documento, nombres, apellidos, email, passwd, activo, id_tipo_usuario, id_jefe) VALUES
    ('0', 'ROOT', 'ADMIN', 'support@unisangil.edu.co', SHA1(MD5('toor')), TRUE, 1, NULL),
    ('123', 'Faver', 'Amorocho', 'decano@unisangil.edu.co', SHA1(MD5('decano')), TRUE, 4, 1),
    ('234', 'Yaneida', 'Longas', 'programa@unisangil.edu.co', SHA1(MD5('programa')), TRUE, 4, 2),
    ('345', 'Igor', 'Bautista', 'docente@unisangil.edu.co', SHA1(MD5('docente')), TRUE, 5, 3)
;



TRUNCATE TABLE parametros_reservas;
INSERT INTO parametros_reservas
    (nombre, dias_minimos_reserva, tiempo_minimo_reserva, dias_maximos_reserva, tiempo_maximo_reserva, estado) VALUES
    ('antes', 0, '12:00:00', 6, '23:59:59', FALSE),
    ('ahora', 1, '00:00:00', 7, '23:59:59', TRUE)
;

TRUNCATE TABLE periodos_academicos;
INSERT INTO periodos_academicos
    (nombre, fecha_inicio, fecha_final, estado, descripcion) VALUES
    ('2016-1', '2016-2-1', '2016-6-30', FALSE, 'descripcion'),
    ('2016-2', '2016-8-1', '2016-11-30', FALSE, 'descripcion'),
    ('2017-1', '2017-2-1', '2017-6-30', FALSE, 'descripcion'),
    ('2017-2', '2017-8-1', '2017-11-30', TRUE, 'descripcion')
;
