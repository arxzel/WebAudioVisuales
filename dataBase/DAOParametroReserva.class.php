<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires-> importUsuario();
$requires->importDAOParametroReserva();

class DAOParametroReserva extends DataBase{

    public function __construct(){

    }

    public function getParametroReservaById($parametroReserva)
        {
             $sql = "SELECT * FROM parametros_reservas WHERE id_parametro_reserva = " . $parametroReserva->getId_parametro();
             $resulset = $this->selectQuery($sql);
             return $this-> construirParametroReserva($resulset);
        }

    public function getParametroReservaByEstado($parametroReserva)
            {
                 $sql = "SELECT * FROM parametros_reservas WHERE estado = " . $parametroReserva->getEstado();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametrosReserva($resulset);
            }

    public function insertParametroReserva($parametroReserva)
            {
                  $sql = "INSERT INTO `parametros_reservas`(`id_parametro_reserva`, `nombre`, `dias_minimos_reserva`, `tiempo_minimo_reserva`, `dias_maximos_reserva`, `tiempo_maximo_reserva`, `estado`) VALUES (".$parametroReserva->getId_parametro().",".$parametroReserva->getNombre().",".$parametroReserva->getDias_minimos().",".$parametroReserva->getTiempo_minimo().",".$parametroReserva->getDias_maximo().",".$parametroReserva->getTiempo_maximo().",".$parametroReserva->getEstado().")";
                   $this->insertQuery($sql);
           }

   public function deleteParametroReserva($parametroReserva,$usuario)
           {
                 $sql = "call delete_parametro_reserva(". $parametroReserva->getId_parametro()." , ". $usuario->getIdUsuario().");"
                 $this->insertQuery($sql);
          }

  public function updateParametroReserva($parametroReserva,$usuario)
          {
                $sql = "call update_parametro_reserva(". $parametroReserva->getId_parametro()." , ". $usuario->getIdUsuario().");"
                $this->insertQuery($sql);
         }



    private function construirParametroReserva($resulset){
        $parametroReserva= new ParametroReserva();

                foreach($resulset as $row){

                    $parametroReserva -> setId_parametro((int)$row['id_parametro_reserva']);
                    /* Ojo Preguntar por los tipos de datos */
                    $parametroReserva -> setNombre($row['nombre']);
                    $parametroReserva->setDias_minimos($row['dias_minimos_reserva']);
                    $parametroReserva->setTiempo_minimo($row['tiempo_minimo_reserva']);
                    $parametroReserva->setDias_maximo($row['dias_maximos_reserva']);
                    $parametroReserva->setTiempo_maximo($row['tiempo_maximo_reserva']);
                    $parametroReserva->setEstado($row['estado']);

                }

                return $parametroReserva;
    }

    private function construirParametrosReserva(){
        $parametrosReserva = [];
        foreach($resulset as $row)
                    {
                      $parametroReserva -> setId_parametro((int)$row['id_parametro_reserva']);
                      /* Ojo Preguntar por los tipos de datos */
                      $parametroReserva -> setNombre($row['nombre']);
                      $parametroReserva->setDias_minimos($row['dias_minimos_reserva']);
                      $parametroReserva->setTiempo_minimo($row['tiempo_minimo_reserva']);
                      $parametroReserva->setDias_maximo($row['dias_maximos_reserva']);
                      $parametroReserva->setTiempo_maximo($row['tiempo_maximo_reserva']);
                      $parametroReserva->setEstado($row['estado']);
                      $parametrosReserva[] = $parametroReserva;


                    }

                    return $parametrosReserva;
    }

}


?>
