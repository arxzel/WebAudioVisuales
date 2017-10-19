<?php
class Usuario{

    private $id_usuario;
    private $documento;
    private $nombres;
    private $apellidos;
    private $email;
    private $passwd;
    private $activo;
    private $id_tipo_de_usuario;
    private $id_jefe;

    public function __construct(){

    }

    public function __construct1($id){
        $this->id_usuario = $id;
    }

    public function __construct3($id_usuario, $documento, $nombres, $apellidos, $email, $passwd, $activo, $id_tipo_de_usuario, $id_jefe){
        $this->id_usuario = $id_usuario;
        $this->documento = $documento;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->passwd = $passwd;
        $this->activo = $activo;
        $this->id_tipo_de_usuario = $id_tipo_de_usuario;
        $this->id_jefe = $id_jefe;
    }

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
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

    public function getId_tipo_de_usuario(){
        return $this->id_tipo_de_usuario;
    }

    public function setId_tipo_de_usuario($id_tipo_de_usuario){
        $this->id_tipo_de_usuario = $id_tipo_de_usuario;
    }

    public function getId_jefe(){
        return $this->id_jefe;
    }

    public function setId_jefe($id_jefe){
        $this->id_jefe = $id_jefe;
    }

}
 ?>
