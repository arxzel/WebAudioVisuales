<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importParametroHorario();
$requires->importUsuario();

class DAOParametroHorario extends DataBase{

        public function __construct(){

        }

        public function getParametroHorarioById($ParametroHorario)
            {
                 $sql = "SELECT * FROM parametro_horario  WHERE id_parametro_horario = " . $ParametroHorario->getIdparametrohorario();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametroHorario($resulset);
            }
      public function getParametroHorarioByEstado($ParametroHorario)
            {
                 $sql = "SELECT * FROM parametros_horarios WHERE estado = " . $ParametroHorario->getEstado();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametrosHorario($resulset);
            }

    public function insertParametroHorario($ParametroHorario)
    {
        $sql = "INSERT INTO `parametros_horarios`(`id_parametro_horario`, `nombre`, `hora_inicio_jornada`, `hora_final_jornada`, `duracion_hora_academica`, `estado`) VALUES(".$ParametroHorario->getNombre().",".$ParametroHorario->getHoraInicioJornada().",".$ParametroHorario->getHoraFinalJornada().",".$ParametroHorario->getDuracionHoraAcademica().",".$ParametroHorario->getEstado().")";
         $this->insertQuery($sql);
    }

   public function deleteParametroHorario($ParametroHorario,$usuario)
    {
        $sql = "call delete_parametro_horario(". $ParametroHorario->getIdParametroHorario()." , ". $usuario->getIdUsuario().");"
        $this->deleteQuery($sql);
    }

  public function updateParametroHorario($ParametroHorario,$usuario)
    {
       $sql = "call update_parametro_horario(". $ParametroHorario->getNombre()." , ". $ParametroHorario->getHoraInicioJornada()." , ". $ParametroHorario->getHoraFinalJornada()." , ". $ParametroHorario->getDuracionHoraAcademica().",". $ParametroHorario->getEstado().", ". $usuario->getIdUsuario().");"
       $this->updateQuery($sql);
    }



        private function construirParametroHorario($resulset){
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

                    return $ParametroHorario;
        }

        private function construirParametrosHorario($resulset){
            $ParametrosHorario =[];

                    foreach($resulset as $row){
                        $ParametroHorario = new ParametroHorario();
                        $ParametroHorario -> setIdParametroHorario((int)$row['id_parametro_horario']);
                        /* Ojo Preguntar por los tipos de datos */
                        $ParametroHorario -> setNombre($row['nombre']);
                        $ParametroHorario->setHoraInicioJornada($row['hora_inicio_jornada']);
                        $ParametroHorario->setHoraFinalJornada($row['hora_final_jornada']);
                        $ParametroHorario->setDuracionHoraAcademica((int)$row['duracion_hora_academica']);
                        $ParametroHorario->setEstado((int)$row['estado']);
                        $ParametrosHorario [] = $ParametroHorario;
                    }

                    return $ParametrosHorario;
        }




    ?>
