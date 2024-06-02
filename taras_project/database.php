<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'porsche_shop';
    private $username = 'root';
    private $password = '';
    
    protected $connection;
    
    protected function connection(){
        try {
            $connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8",
                                  $this->username,
                                  $this->password);
            
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            
            return $connection;
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
