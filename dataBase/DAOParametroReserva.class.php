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
             $sql = "SELECT * FROM parametros_reservas WHERE id_parametro_reserva = " . $parametroReserva->getIdParametro();
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
        $sql = "INSERT INTO `parametros_reservas`(`id_parametro_reserva`, `nombre`, `dias_minimos_reserva`, `tiempo_minimo_reserva`, `dias_maximos_reserva`, `tiempo_maximo_reserva`, `estado`) VALUES(".$parametroReserva->getIdParametro().",".$parametroReserva->getNombre().",".$parametroReserva->getDiasMinimos().",".$parametroReserva->getTiempoMinimo().",".$parametroReserva->getDiasMaximo().",".$parametroReserva->getTiempoMaximo().",".$parametroReserva->getEstado().")";
         $this->insertQuery($sql);
    }

   public function deleteParametroReserva($parametroReserva,$usuario)
    {
        $sql = "call delete_parametro_reserva(". $parametroReserva->getIdParametro()." , ". $usuario->getIdUsuario().");"
        $this->deleteQuery($sql); //muestra error en esta línea, para las vistas parametro_reserva
    }

  public function updateParametroReserva($parametroReserva,$usuario)
    {
       $sql = "call update_parametro_reserva(". $parametroReserva->getNombre()." , ". $parametroReserva->getDiasMinimos()." , ". $parametroReserva->getTiempoMinimo()." , ". $parametroReserva->getDiasMaximo()." , ". $parametroReserva->getTiempoMaximo()." , ". $parametroReserva->getEstado().", ". $usuario->getIdUsuario().");"
       $this->updateQuery($sql);
    }



    private function construirParametroReserva($resulset){
        $parametroReserva= new ParametroReserva();

                foreach($resulset as $row){

                    $parametroReserva -> setIdParametro((int)$row['id_parametro_reserva']);
                    /* Ojo Preguntar por los tipos de datos */
                    $parametroReserva -> setNombre($row['nombre']);
                    $parametroReserva->setDiasMinimos($row['dias_minimos_reserva']);
                    $parametroReserva->setTiempoMinimo($row['tiempo_minimo_reserva']);
                    $parametroReserva->setDiasMaximo($row['dias_maximos_reserva']);
                    $parametroReserva->setTiempoMaximo($row['tiempo_maximo_reserva']);
                    $parametroReserva->setEstado($row['estado']);

                }

                return $parametroReserva;
    }

    private function construirParametrosReserva($resulset){
        $parametrosReserva = [];
        foreach($resulset as $row)
                    {
                      $parametroReserva = new ParametroReserva();
                      $parametroReserva -> setIdParametro((int)$row['id_parametro_reserva']);
                      /* Ojo Preguntar por los tipos de datos */
                      $parametroReserva -> setNombre($row['nombre']);
                      $parametroReserva->setDiasMinimos($row['dias_minimos_reserva']);
                      $parametroReserva->setTiempoMinimo($row['tiempo_minimo_reserva']);
                      $parametroReserva->setDiasMaximo($row['dias_maximos_reserva']);
                      $parametroReserva->setTiempoMaximo($row['tiempo_maximo_reserva']);
                      $parametroReserva->setEstado($row['estado']);
                      $parametrosReserva[] = $parametroReserva;


                    }

                    return $parametrosReserva;
    }

}


?>
