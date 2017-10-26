<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importDescanso();

class DAODescanso extends DataBase{

    public function __construct(){

    }

    public function getDescansoById($descanso)
    {
    
        $sql = "SELECT * FROM descansos WHERE id_descanso = " . $descanso->getIdDescanso();

        $resulset = $this->selectQuery($sql);

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

}


?>
