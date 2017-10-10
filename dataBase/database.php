<?php
class database{

    private $user = 'root';
    private $passwd = '';
    private $conn = null;

    private function getConnection(){
        $conn = new PDO('mysql:host=localhost;dbname=audio_visuales', $user, $passwd);
    }

    private function closeConnection(){
        $conn = null;
    }

    public function getRows($query = null){
        this.getConnection();
        $fila = $mbd->query($query);
        this.closeConnection();
        return $fila;
    }
}
?>
