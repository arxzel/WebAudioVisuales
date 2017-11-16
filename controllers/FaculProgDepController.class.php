<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOFaculProgDep();


class FaculProgDepController
{
    private $daoFacultadPrograma;
    public function __construct()
    {
        $this->daoFacultadPrograma = new DAOFaculProgDep();
    }

    
}