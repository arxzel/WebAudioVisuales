<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importParametroHorario();

class DAOParametroHorario extends DataBase{
    
        public function __construct(){
    
        }
    
        public function getParametroHorarioById($ParametroHorario)
            {
                 $sql = "SELECT * FROM parametro_horario  WHERE id_parametro_horario = " . $ParametroHorario->getIdparametrohorario();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametroHorario($resulset);
            }
    
        private function construirParametroHorario(){
            $ParametroHorario = new ParametroHorario();
            
                    foreach($resulset as $row){
            
                        $ParametroHorario -> setIdParametroHorario((int)$row['id_parametro_horario']);
                        /* Ojo Preguntar por los tipos de datos */
                        $ParametroHorario -> setNombre($row['nombre']);
                        $ParametroHorario->setHoraInicioJornada($row['hora_inicio_jornada']);
                        $ParametroHorario->setHoraFinalJornada($row['hora_final_jornada']);
                        $ParametroHorario->setDuracionHoraAcademica((int)$row['duracion_hora_academica']);
                        $ParametroHorario->setEstado((int)$row['estado']);
                    }
            
                    return $descanso;
        }
    
    }
    
    
    ?>
    