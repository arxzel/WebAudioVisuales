
/****
***** PROCEDURES Y TRIGGERS DEL ESQUEMA MAGISTRAL *****
****/

USE audio_visuales;
/*
****PROCEDURES PARA PARAMETROS HORARIO
*/
DROP PROCEDURE IF EXISTS insert_parametro_horario;
DELIMITER $$
CREATE PROCEDURE insert_parametro_horario(
    in nombrei text,
    in horaInicioJornada time,
    in horaFinalJornada time,
    in duracionHoraAcademica time,
    in estadoi boolean
)
BEGIN
    INSERT INTO parametros_horarios (
        nombre,
        hora_inicio_jornada,
        hora_final_jornada,
        duracion_hora_academica,
        estado
    ) VALUES (
        nombrei,
        horaInicioJornada,
        horaFinalJornada,
        duracionHoraAcademica,
        estadoi
    );

    CALL calcular_horario();
END;
$$ DELIMITER ;

DROP PROCEDURE IF EXISTS update_parametro_horario;
DELIMITER $$
CREATE PROCEDURE update_parametro_horario(
    in idParametroHorario int,
    in newNombrei text,
    in newHoraInicioJornada time,
    in newHoraFinalJornada time,
    in newDuracionHoraAcademica time,
    in newEstado boolean,
    in idUsuario int
)
BEGIN
    INSERT INTO auditoria_update_parametros_horarios(
        nombre_old,
        nombre_new,
        hora_inicio_jornada_old,
        hora_inicio_jornada_new,
        hora_final_jornada_old,
        hora_final_jornada_new,
        duracion_hora_academica_old,
        duracion_hora_academica_new,
        estado_old,
        estado_new,
        usuario_id,
        hora_action
    )SELECT
        nombre,
        newNombrei,
        hora_inicio_jornada,
        newHoraInicioJornada,
        hora_final_jornada,
        newHoraFinalJornada,
        duracion_hora_academica,
        newDuracionHoraAcademica,
        estado ,
        newEstado,
        idUsuario,
        now()
        FROM parametros_horarios
        WHERE id_parametro_horario = idParametroHorario
    ;

    UPDATE parametros_horarios
    SET nombre = newNombrei,
        hora_inicio_jornada = newHoraInicioJornada,
        hora_final_jornada = newHoraFinalJornada,
        duracion_hora_academica = newDuracionHoraAcademica,
        estado = newEstado
    WHERE id_parametro_horario = idParametroHorario
    ;

    CALL calcular_horario();
END;
$$ DELIMITER ;

DROP PROCEDURE IF EXISTS delete_parametro_horario;
DELIMITER $$
CREATE PROCEDURE delete_parametro_horario(
    in idParametroHorario int,
    in idUsuario int
)
BEGIN
    INSERT INTO auditoria_delete_parametros_horarios (
        id_parametro_horario,
        nombre,
        hora_inicio_jornada,
        hora_final_jornada,
        duracion_hora_academica,
        estado,
        usuario_id,
        hora_action
    ) SELECT
        id_parametro_horario,
        nombre,
        hora_inicio_jornada,
        hora_final_jornada,
        duracion_hora_academica,
        estado,
        idUsuario,
        now()
        FROM parametros_horarios
        WHERE id_parametro_horario = idParametroHorario;

    DELETE FROM parametros_horarios
        WHERE id_parametro_horario = idParametroHorario
    ;

    CALL calcular_horario();
END;
$$ DELIMITER ;


/***
******* PROCEDURES PARA DESCANSOS
*/

DROP PROCEDURE IF EXISTS insert_descansos;
DELIMITER $$
CREATE PROCEDURE insert_descansos(
    in newNombre VARCHAR(20),
    in newHoraInicio TIME,
    in newDuracion TIME,
    in newEstado BOOLEAN
)
BEGIN
    INSERT INTO descansos(
        nombre,
        hora_inicio,
        duracion,
        estado
    ) VALUES (
        newNombre,
        newHoraInicio,
        newDuracion,
        newEstado
    );
    CALL calcular_horario();
END;
$$ DELIMITER ;

DROP PROCEDURE IF EXISTS update_descansos;
DELIMITER $$
CREATE PROCEDURE update_descansos(
    in idDescanso INT,
    in newNombre VARCHAR(20),
    in newHoraInicio TIME,
    in newDuracion TIME,
    in newEstado BOOLEAN,
    in idUsuario INT
)
BEGIN

    INSERT INTO auditoria_update_descansos(
        id_descanso,
        nombre_old,
        nombre_new,
        hora_inicio_old,
        hora_inicio_new,
        duracion_old,
        duracion_new,
        estado_old,
        estado_new,
        usuario_id,
        hora_action
        ) SELECT
        idDescanso,
        nombre,
        newNombre,
        hora_inicio,
        newHoraInicio,
        duracion,
        newDuracion,
        estado,
        newEstado,
        idUsuario,
        now()
        FROM descansos
        WHERE id_descanso = idDescanso
    ;

    UPDATE descansos
    SET
        nombre = newNombre,
        hora_inicio = newHoraInicio,
        duracion = newDuracion,
        estado = newEstado
    WHERE
        id_descanso = idDescanso;
END;
$$ DELIMITER ;

DROP PROCEDURE IF EXISTS delete_descanso;
DELIMITER $$
CREATE PROCEDURE delete_descanso(
    in idDescanso INT,
    in idUsuario INT
)
BEGIN
    INSERT INTO auditoria_delete_descansos(
        id_descanso,
        nombre,
        hora_inicio,
        duracion,
        estado,
        usuario_id,
        hora_action
    ) SELECT id_descanso
        nombre,
        hora_inicio,
        duracion,
        estado,
        idUsuario,
        now()
        FROM descansos
        WHERE id_descanso = idDescanso;

        DELETE FROM descansos
        WHERE id_descanso = idDescanso;
END;
$$ DELIMITER ;




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
        id_parametro_reserva,
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
            id_parametro_reserva,
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
END;
$$ DELIMITER ;











/**
*************** PROCEDURE CALCULAR HORARIO
**/
DROP PROCEDURE IF EXISTS calcular_horario;
DELIMITER $$
CREATE PROCEDURE calcular_horario()
BEGIN
    DECLARE horaTemp TIME;
    DECLARE finalJornada TIME;
    DECLARE duracionHora TIME;

    DECLARE maxDescansos INT;
    DECLARE iterator INT;

    DECLARE horaDescanso INT;
    DECLARE duracionDescanso TIME;
    DECLARE descanso TIME;

    SET iterator = 0;

    TRUNCATE TABLE horas;

    CREATE TEMPORARY TABLE IF NOT EXISTS descansostable (
        id INT NOT NULL AUTO_INCREMENT,
        iniciodescanso TIME NOT NULL,
        duraciondescanso TIME NOT NULL,
        finaldescanso TIME NOT NULL,
        PRIMARY KEY(id)
    );

    INSERT INTO descansostable (iniciodescanso, duraciondescanso, finaldescanso)
        SELECT hora_inicio, duracion, sec_to_time(time_to_sec(hora_inicio) + time_to_sec(duracion)) final
        FROM descansos
        WHERE estado = TRUE
        ORDER BY hora_inicio ASC;

    SELECT hora_inicio_jornada, hora_final_jornada, duracion_hora_academica
    INTO horaTemp, finalJornada, duracionHora
    FROM parametros_horarios
    WHERE estado = TRUE;

    SELECT COUNT(id) INTO maxDescansos FROM descansostable;

    IF(maxDescansos > iterator) THEN
        SET iterator = 1;
    END IF;

    SET descanso = (SELECT iniciodescanso FROM descansostable WHERE id = iterator);

    WHILE (horaTemp < finalJornada) DO

        IF(horaTemp > descanso) THEN
            SET horaTemp = (SELECT finaldescanso FROM descansostable WHERE id = iterator);
            SET iterator = iterator + 1;
            SET descanso = (SELECT iniciodescanso FROM descansostable WHERE id = iterator);
        END IF;

        INSERT INTO horas (hora) VALUES (horaTemp);
        SET horaTemp = sec_to_time(time_to_sec(horaTemp) + time_to_sec(duracionHora));

        IF(horaTemp >= finalJornada) THEN
            INSERT INTO horas (hora) VALUES (finalJornada);
        END IF;
    END WHILE;
    TRUNCATE TABLE descansostable;
END;
$$ DELIMITER ;
