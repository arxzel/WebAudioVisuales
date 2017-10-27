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
             return $this-> construirDescanso($resulset);
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
        $descansos = new Array();
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
