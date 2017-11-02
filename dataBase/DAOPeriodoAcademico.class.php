<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importPeriodoAcademico();

class DAOPeriodoAcademico extends DataBase{

        public function __construct(){

        }

        public function getPeriodoAcademicoById($PeriodoAcademico)
            {
                 $sql = "SELECT * FROM periodo_academico  WHERE id_periodo_academico = " . $PeriodoAcademico->getIdperiodoacademico();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirPeriodoAcademico($resulset);
            }

        private function construirPeriodoAcademico(){
            $PeriodoAcademico = new PeriodoAcademico();

                    foreach($resulset as $row){

                        $PeriodoAcademico -> setIdPeriodoAcademico((int)$row['id_periodo_academico']);
                        /* Ojo Preguntar por los tipos de datos */
                        $PeriodoAcademico -> setNombre($row['nombre']);
                        $PeriodoAcademico->setFechaInicio($row['fecha_inicio']);
                        $PeriodoAcademico->setFechaFinal($row['fecha_final']);
                        $PeriodoAcademico->setEstado((int)$row['estado']);
                        $PeriodoAcademico->setDescripcion((int)$row['descripcion']);
                    }

                    return $PeriodoAcademico;
        }

    }


    ?>
    
