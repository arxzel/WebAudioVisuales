
/****
***** PROCEDURES Y TRIGGERS DEL ESQUEMA MAGISTRAL *****
****/

USE audio_visuales;

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
    ;

    DELETE FROM parametros_horarios
        WHERE id_parametro_horario = idParametroHorario
    ;

    CALL calcular_horario();
END;
$$ DELIMITER ;




DROP PROCEDURE IF EXISTS insert_descansos;
DELIMITER $$
CREATE PROCEDURE insert_descansos(
    in newNombre VARCHAR(20),
    in newHoraInicio TIME,
    in newDuracion TIME,
    in newEstado BOOLEAN
)
BEGIN
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
END;
$$ DELIMITER ;

DROP PROCEDURE IF EXISTS delete_descansos;
DELIMITER $$
CREATE PROCEDURE delete_descansos(
    in idDescanso INT,
    in idUsuario INT
)
BEGIN
END;
$$ DELIMITER ;



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
    FROM parametros_horario
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
