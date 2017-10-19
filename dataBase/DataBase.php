<?php
class DataBase
{
    private $server = 'localhost';
    private $user = 'root';
    private $passwd = '';
    private $conn = null;

    public function __construct()
    {
    }

    private function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=audio_visuales", $this->user, $this->passwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function closeConnection()
    {
        $conn = null;
    }


    protected function insertOrDeleteQuery($query)
    {
        $this->getConnection();
        $this->conn->exec($sql);
        $this->closeConnection();
    }

    protected function selectQuery($query)
    {
        $this->getConnection();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $this->closeConnection();
        return $result;
    }

    protected function updateQuery($query)
    {
        $this->getConnection();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $this->closeConnection();
    }
}
