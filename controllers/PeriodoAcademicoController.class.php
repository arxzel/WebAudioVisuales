<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOPeriodoAcademico();


class PeriodoAcademicoController
{
    private $daoPeriodoAcademico;
    public function __construct()
    {
        $this->daoPeriodoAcademico = new DAOPeriodoAcademico();
    }

    public function getPeriodoAcademicoById($PeriodoAcademico)
    {
    	return $this->daoPeriodoAcademico->getPeriodoAcademicoById($PeriodoAcademico);
    }

    public function getPeriodoAcademicoByEstado($PeriodoAcademico)
    {
    	return $this->daoPeriodoAcademico->getPeriodoAcademicoByEstado($PeriodoAcademico);
    }

    public function insertPeriodoAcademico($PeriodoAcademico)
    {
    	return $this->daoPeriodoAcademico->insertPeriodoAcademico($PeriodoAcademico);
    }

    public function deletePeriodoAcademico($PeriodoAcademico,$usuario)
    {
    	return $this->daoPeriodoAcademico->deletePeriodoAcademico($PeriodoAcademico,$usuario);
    }

    public function updatePeriodoAcademico($PeriodoAcademico,$usuario)
    {
    	return $this->daoPeriodoAcademico->updatePeriodoAcademico($PeriodoAcademico,$usuario);
    }

    public function construirPeriodoAcademico($resulset)
    {
        return $this->daoPeriodoAcademico->construirPeriodoAcademico($resulset);
    }

    public function construirPeriodosAcademicos($resulset)
    {
    	return $this->daoPeriodoAcademico->construirPeriodoAcademico($resulset);
    }

    public function getAllPeridoAcademico()
    {
        return $this->daoPeriodoAcademico->getAllPeridoAcademico();
    }
}

