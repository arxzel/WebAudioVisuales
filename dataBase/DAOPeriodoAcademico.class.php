<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importPeriodoAcademico();
$requires->importUsuario();

class DAOPeriodoAcademico extends DataBase{

        public function __construct(){

        }

        public function getPeriodoAcademicoById($PeriodoAcademico)
            {
                 $sql = "SELECT * FROM periodos_academicos  WHERE id_periodo_academico = " . $PeriodoAcademico->getIdperiodoacademico();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirPeriodoAcademico($resulset);
            }

        public function getAllPeridoAcademico()
        {
          $sql = "SELECT * FROM periodos_academicos";
          $resulset = $this->selectQuery($sql);
          return $this->construirPeriodosAcademicos($resulset);
        }

      public function getPeriodoAcademicoByEstado($PeriodoAcademico)
            {
                 $sql = "SELECT * FROM periodos_academicos WHERE estado = " . $PeriodoAcademico->getEstado();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirPeriodosAcademicos($resulset);
            }

    public function insertPeriodoAcademico($PeriodoAcademico)
    {

      $sql = "INSERT INTO `periodos_academicos`(`nombre`, `fecha_inicio`, `fecha_final`, `estado`, `descripcion`)  VALUES  ('".$PeriodoAcademico->getNombre()."','".$PeriodoAcademico->getFechaInicio()."','".$PeriodoAcademico->getFechaFinal()."','".$PeriodoAcademico->getEstado()."','".$PeriodoAcademico->getDescripcion()."')";
        
         $this->insertQuery($sql);
    }

   public function deletePeriodoAcademico($PeriodoAcademico,$usuario)
    {
        $sql = "call delete_periodo_academico('".$PeriodoAcademico->getIdPeriodoAcademico()."'' , '". $usuario->getIdUsuario()."');";
        $this->deleteQuery($sql); //muestra error en esta linea
    }

  public function updatePeriodoAcademico($PeriodoAcademico,$usuario)
    {
       $sql = "call update_periodo_academico(".$PeriodoAcademico->getNombre().",".$PeriodoAcademico->getFechaInicio().",".$PeriodoAcademico->getFechaFinal().",".$PeriodoAcademico->getEstado().",".$PeriodoAcademico->getDescripcion().",".$usuario->getIdUsuario().")";
       $this->updateQuery($sql);
    }

        private function construirPeriodoAcademico($resulset){
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

        private function construirPeriodosAcademicos($resulset){
            $PeriodosAcademicos = [];

                    foreach($resulset as $row){
                        $PeriodoAcademico = new PeriodoAcademico();
                        $PeriodoAcademico -> setIdPeriodoAcademico((int)$row['id_periodo_academico']);
                        /* Ojo Preguntar por los tipos de datos */
                        $PeriodoAcademico -> setNombre($row['nombre']);
                        $PeriodoAcademico->setFechaInicio($row['fecha_inicio']);
                        $PeriodoAcademico->setFechaFinal($row['fecha_final']);
                        $PeriodoAcademico->setEstado((int)$row['estado']);
                        $PeriodoAcademico->setDescripcion((int)$row['descripcion']);
                        $PeriodosAcademicos [] = $PeriodoAcademico;
                    }

                    return $PeriodosAcademicos;
        }


    }


    ?>
