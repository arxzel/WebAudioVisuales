<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOParametroReserva();


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
            	$this->daoParametroReserva->insertParametroReserva($parametroReserva);
            }

            public function deleteParametroReserva($parametroReserva,$usuario)
           {
            $this->daoParametroReserva->deleteParametroReserva($parametroReserva,$usuario);
           }

           public function updateParametroReserva($parametroReserva,$usuario)
          {
          	$this->daoParametroReserva->updateParametroReserva($parametroReserva,$usuario);
          }

          private function construirParametroReserva($resulset)
          {
          	$this->daoParametroReserva->construirParametroReserva($resulset);
          }

}
