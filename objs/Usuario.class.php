<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class Usuario{

    private $idUsuario;
    private $documento;
    private $nombres;
    private $apellidos;
    private $email;
    private $passwd;
    private $activo;
    private $tipoUsuario;
    private $jefe;

    public function __construct(){
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    public function getActivo(){
        return $this->activo;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getJefe(){
        return $this->jefe;
    }

    public function setJefe($jefe){
        $this->jefe = $jefe;
    }

}
 ?>
