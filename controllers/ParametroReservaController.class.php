<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOParametroReserva();
$requires -> importParametroReserva();
$requires -> importUsuario();

class ParametroReservaController
{
    private $daoParametroReserva;
    public function __construct()
    {
        $this->daoParametroReserva = new DAOParametroReserva();
    }

    public function getParametroReservaById($parametroReserva)
        {

        	return $this->daoParametroReserva->getParametroReservaById($parametroReserva);
        }

        public function getParametroReservaByEstado($parametroReserva)
            {
            	return$this->daoParametroReserva->getParametroReservaByEstado($parametroReserva);
            }
            
           public function insertParametroReserva($parametroReserva)
            {
            	return $this->daoParametroReserva->insertParametroReserva($parametroReserva);
            }

            public function deleteParametroReserva($parametroReserva,$usuario)
           {
            return $this->daoParametroReserva->deleteParametroReserva($parametroReserva,$usuario);
           }

           public function updateParametroReserva($parametroReserva,$usuario)
          {
          	return $this->daoParametroReserva->updateParametroReserva($parametroReserva,$usuario);
          }

          public function construirParametroReserva($resulset)
          {
          	return $this->daoParametroReserva->construirParametroReserva($resulset);
          }
          public function getAllParametrosReserva()
          {
            return $this->daoParametroReserva->getAllParametrosReserva();

          }
          public function test(){
            echo "test";
          }

}
    /*************************************************************************
    * Manejadores de Eventos desde la vista
    *************************************************************************/

    /** Manejador del evento Eliminar parámetro desde la vista */
    if(isset($_GET["idParametro"]))
    {
       $miParametroReservaController = new ParametroReservaController();
       $miParametroReserva = new ParametroReserva();
       $miUsuario = new Usuario();
       //El id del usuario puede ser cualquiera ya que no hemos llegado a ese módulo.
       $miUsuario->setIdUsuario(1);
       $miParametroReserva->setIdParametroReserva($_GET["idParametro"]);
       echo $miUsuario->getIdUsuario();
       echo $miParametroReserva->getIdParametroReserva();
       echo $miParametroReservaController->test();
       $miParametroReservaController->deleteParametroReserva($miParametroReserva,$miUsuario);
       header("Location: http://localhost/WebAudioVisuales/interfaz/parametro_Reserva/listar_parametros_reservas.php");
    }

   
    
?>
