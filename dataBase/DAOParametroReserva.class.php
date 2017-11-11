<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');

$requires = new Requires();
$requires->importDatabase();
$requires-> importUsuario();
$requires->importParametroReserva();

class DAOParametroReserva extends DataBase{

    public function __construct(){

    }

    public function getParametroReservaById($parametroReserva)
        {
             //$sql = "SELECT * FROM parametros_reservas WHERE id_parametro_reserva = 1";
             $sql = "SELECT * FROM parametros_reservas WHERE id_parametro_reserva = " . $parametroReserva->getIdParametroReserva();
             $resulset = $this->selectQuery($sql);
             return $this-> construirParametroReserva($resulset);
        }

    public function getParametroReservaByEstado($parametroReserva)
            {
                 $sql = "SELECT * FROM parametros_reservas WHERE estado = " . $parametroReserva->getEstado();
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametrosReserva($resulset);
            }
            
    public function getAllParametrosReserva()
            {
                 $sql = "SELECT * FROM parametros_reservas";
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirParametrosReserva($resulset);
            }

    public function insertParametroReserva($parametroReserva)
    {
        $sql = "INSERT INTO `parametros_reservas`(`nombre`, `dias_minimos_reserva`, `tiempo_minimo_reserva`, `dias_maximos_reserva`, `tiempo_maximo_reserva`, `estado`) VALUES(".$parametroReserva->getNombre().",".$parametroReserva->getDiasMinimos().",".$parametroReserva->getTiempoMinimo().",".$parametroReserva->getDiasMaximo().",".$parametroReserva->getTiempoMaximo().",".$parametroReserva->getEstado().")";
         $this->insertQuery($sql);
    }

   public function deleteParametroReserva($parametroReserva,$usuario)
    {
        $sql = "call delete_parametro_reserva(". $parametroReserva->getIdParametroReserva()." , ". $usuario->getIdUsuario().");";
        $this->deleteQuery($sql); //muestra error en esta línea, para las vistas parametro_reserva
    }

  public function updateParametroReserva($parametroReserva,$usuario)
    {
       $sql = "call update_parametro_reserva(". $parametroReserva->getNombre()." , ". $parametroReserva->getDiasMinimos()." , ". $parametroReserva->getTiempoMinimo()." , ". $parametroReserva->getDiasMaximo()." , ". $parametroReserva->getTiempoMaximo()." , ". $parametroReserva->getEstado().", ". $usuario->getIdUsuario().");";
       $this->updateQuery($sql);
    }



    private function construirParametroReserva($resulset){
        $parametroReserva= new ParametroReserva();

                foreach($resulset as $row){

                    $parametroReserva -> setIdParametroReserva((int)$row['id_parametro_reserva']);
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
        $parametroReserva = new ParametroReserva();
        foreach($resulset as $row)
                    {
                      $parametroReserva = new ParametroReserva();
                      $parametroReserva -> setIdParametroReserva((int)$row['id_parametro_reserva']);
                      /* Ojo Preguntar por los tipos de datos */
                      $parametroReserva->setNombre($row['nombre']);
                      $parametroReserva->setDiasMinimos($row['dias_minimos_reserva']);
                      $parametroReserva->setTiempoMinimo($row['tiempo_minimo_reserva']);
                      $parametroReserva->setDiasMaximo($row['dias_maximos_reserva']);
                      $parametroReserva->setTiempoMaximo($row['tiempo_maximo_reserva']);
                      $parametroReserva->setEstado($row['estado']);
                      //$parametrosReserva[] = $parametroReserva;
                      array_push ( $parametrosReserva , $parametroReserva );


                    }

                    return $parametrosReserva;
    }

}


?>
