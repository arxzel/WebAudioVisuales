<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importDescanso();
$requires -> importUsuario();

class DAODescanso extends DataBase{

    public function __construct(){

    }

    public function getDescansoById($descanso)
        {
             $sql = "SELECT * FROM descansos WHERE id_descanso = " . $descanso->getIdDescanso();
             $resulset = $this->selectQuery($sql);
             return $this-> construirDescanso($resulset);
        }

    public function getDescansoByNombre($descanso)
    {
      $sql = "SELECT * FROM descansos WHERE nombre = " . $descanso->getNombre();
      $resulset = $this->selectQuery($sql);
      return $this-> construirDescanso($resulset);
    }

    public function getDescansoByEstado($descanso)
    {
      $sql = "SELECT * FROM estado WHERE nombre = " . $descanso->getEstado();
      $resulset = $this->selectQuery($sql);
      return $this-> construirDescanso($resulset);
    }

    public function insertDescanso($descanso)
    {
        $sql = "INSERT INTO `descanso`(`id_descanso`, `nombre`, `hora_inicio`, `duracion`, `estado`) VALUES (".$descanso->getIdHorarioDescanso().",".$descanso->getNombre().",".$descanso->getHoraInicio().",".$descanso->getDuration().",".$descanso->getEstado().")";
         $this->insertQuery($sql);
    }

    public function deleteDescanso($descanso,$usuario)
     {
         $sql = "call delete_descanso(". $descanso->getIdHorarioDescanso()." , ". $usuario->getIdUsuario().");"
         $this->insertQuery($sql);
     }

     public function updateDescanso($descanso,$usuario)
      {
        $sql = "call update_descansos(".$descanso->getNombre().",".$descanso->getHoraInicio().",".$descanso->getDuration().",".$descanso->getEstado().",". $usuario->getIdUsuario().");"
        $this->insertQuery($sql);
      }


    private function construirDescanso($resulset){
        $descanso = new Descanso();

                foreach($resulset as $row){

                    $descanso -> setIdDescanso((int)$row['id_descanso']);
                    /* Ojo Preguntar por los tipos de datos */
                    $descanso -> setNombre($row['nombre']);
                    $descanso->setHoraInicio($row['hora_inicio']);
                    $descanso->setDuracion($row['duracion']);
                    $descanso->setEstado((int)$row['estado']);

                }

                return $descanso;
    }

    private function construirDescansos(){
        $descansos = [];
        foreach($resulset as $row)
                    {
                        $descanso = new Descanso();
                        $descanso -> setIdDescanso((int)$row['id_descanso']);
                        /* Ojo Preguntar por los tipos de datos */
                        $descanso -> setNombre($row['nombre']);
                        $descanso->setHoraInicio($row['hora_inicio']);
                        $descanso->setDuracion($row['duracion']);
                        $descanso->setEstado((int)$row['estado']);
                        $descansos[] = $descanso;


                    }

                    return $descansos;
    }

}


?>
