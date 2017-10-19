<?php
class DataBase
{
    private $driver = 'mysql'; //opcional
    private $server = 'localhost';
    private $database = 'audio_visuales';//opcional
    private $user = 'root';
    private $passwd = '';
    private $conn = null;

    public function __construct()
    {
    }

    private function getConnection()
    {
        try {
            $conn = new PDO("$driver:host=$server;dbname=$database", $user, $passwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function closeConnection()
    {
        $conn = null;
    }


    protected function insertOrDeleteQuery($query = null)
    {
        this.getConnection();
        $conn->exec($sql);
        this.closeConnection();
    }

    protected function selectQuery($query = null)
    {
        this.getConnection();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        this.closeConnection();
        return $result;
    }

    protected function updateQuery()
    {
        this.getConnection();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        this.closeConnection();
    }
}
