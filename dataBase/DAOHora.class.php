<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires->importHora();
$requires->importUsuario();

/**
 *
 */
class DAOHora extends DataBase
{

  function __construct()
  {

  }

  public function getHoras()
      {
           $sql = "SELECT * FROM horas";
           $resulset = $this->selectQuery($sql);
           return $this-> construirHoras($resulset);
      }

  public function getHoraById($hora)
      {
          $sql = "SELECT * FROM horas WHERE id_hora = ".$hora->getIdHora();
          $resulset = $this->selectQuery($sql);
          return $this-> construirHora($resulset);
      }

  private function construirHora($resulset){
      $hora = new Hora();

              foreach($resulset as $row)
              {
                  $hora -> setIdHora((int)$row['id_hora']);
                  $hora -> setHora($row['hora']);
              }
              return $hora;
  }
  

  public function insertarHoras($horas){
        $sql = "TRUNCATE TABLE horas";
        $this->deleteQuery($sql);
        
        foreach($horas as $hora){
           
            $sql = "INSERT INTO horas (`hora`) VALUES ('". $hora->getHora()."')";
            $this->insertQuery($sql);
        }
        
  }
 
  private function construirHoras($resulset){
      $horas = [];

              foreach($resulset as $row){
                  $hora = new Hora();
                  $hora -> setIdHora((int)$row['id_hora']);
                  $hora -> setHora($row['hora']);
                  $horas [] = $hora;
              }

              return $horas;
  }



}


 ?>
