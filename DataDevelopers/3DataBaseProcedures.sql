
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

/*
//
*/

DROP PROCEDURE IF EXISTS delete_categoria;
DELIMITER $$
CREATE PROCEDURE delete_categoria(
    in idCategoria          INT,
    in idUsuario            INT
)
BEGIN
    INSERT INTO AUDITORIA_DELETE_CATEGORIAS(
        id_categoria,
        categoria,
        descripcion,
        usuario_id,
        hora_action
    ) SELECT
    id_categoria,
    categoria,
    descripcion,
    idUsuario,
    now()
    FROM CATEGORIAS
    WHERE id_categoria = idCategoria;

    UPDATE CATEGORIAS
    SET estado = 0
    WHERE id_categoria = idCategoria;
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

COMMIT;
END;
$$ DELIMITER ;
