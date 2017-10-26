

/****
***** INSERTS DEL ESQUEMA USUARIOS Y PERMISOS *****
****/
USE audio_visuales;
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

INSERT INTO tipos_usuarios
    (tipo_usuario) VALUES
    ('ROOT'),
    ('ADMINISTRADOR'),
    ('RECURSOS'),
    ('JEFE ACADEMICO'),
    ('DOCENTE'),
    ('INVITADO')
;

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

INSERT INTO usuarios
    (documento, nombres, apellidos, email, passwd, activo, id_tipo_usuario, id_jefe) VALUES
    ('0', 'ROOT', 'ADMIN', 'support@unisangil.edu.co', SHA1(MD5('toor')), TRUE, 1, NULL),
    ('123', 'Faver', 'Amorocho', 'decano@unisangil.edu.co', SHA1(MD5('decano')), TRUE, 4, 1),
    ('234', 'Yaneida', 'Longas', 'programa@unisangil.edu.co', SHA1(MD5('programa')), TRUE, 4, 2),
    ('345', 'Igor', 'Bautista', 'docente@unisangil.edu.co', SHA1(MD5('docente')), TRUE, 5, 3)
;




/****
***** INSERTS DEL ESQUEMA MAGISTRAL *****
****/


INSERT INTO parametros_horario
    (hora_inicio_jornada, hora_final_jornada, duracion_hora_academica, estado) VALUES
    ('06:00:00', '23:00:00', '60:00:00', FALSE),
    ('06:00:00', '23:00:00', '00:45:00', FALSE),
    ('06:00:00', '23:00:00', '00:50:00', TRUE)
;

INSERT INTO parametros_reservas
    (nombre, dias_minimos_reserva, tiempo_minimo_reserva, dias_maximos_reserva, tiempo_maximo_reserva, estado) VALUES
    ('antes', 0, '12:00:00', 6, '23:59:59', FALSE),
    ('ahora', 1, '00:00:00', 7, '23:59:59', TRUE)
;

INSERT INTO periodos_academicos
    (nombre, fecha_inicio, fecha_final, estado, descripcion) VALUES
    ('2016-1', '2016-2-1', '2016-6-30', FALSE, 'descripcion'),
    ('2016-2', '2016-8-1', '2016-11-30', FALSE, 'descripcion'),
    ('2017-1', '2017-2-1', '2017-6-30', FALSE, 'descripcion'),
    ('2017-2', '2017-8-1', '2017-11-30', TRUE, 'descripcion')
;

/*
INSERT INTO descansos
    (nombre, hora_inicio, duracion, estado) VALUES
    ('Primer descanso mañana', '08:30:00', '00:10:00', TRUE),
    ('Segundo descanso mañana', '10:20:00', '00:10:00', TRUE),
    ('Descanso medio día', '12:10:00', '01:40:00', TRUE),
    ('Descanso media tarde', '18:00:00', '00:15:00', TRUE),
    ('Descanso noche', '20:45', '00:10:00', TRUE)
;
*/


CALL calculo_horario_on_insert('Primer descanso mañana', '08:30:00', '00:10:00', TRUE);
CALL calculo_horario_on_insert('Segundo descanso mañana', '10:20:00', '00:10:00', TRUE);
CALL calculo_horario_on_insert('Descanso medio día', '12:10:00', '01:40:00', TRUE);
CALL calculo_horario_on_insert('Descanso media tarde', '18:00:00', '00:15:00', TRUE);
CALL calculo_horario_on_insert('Descanso noche', '20:45', '00:10:00', TRUE);
