<?php

class AppConfig
{
    private $host = "mysql:host=localhost";
    private $db = "dbname=zoo_db";
    private $user = "root";
    private $password = "root";
    private $connection = null;

    private static $instance = null;

    /**
     * AppConfig constructor.
     */
    private function __construct()
    {
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new AppConfig();
        }

        return self::$instance;
    }


    public function getConnection()
    {
        if (!is_null($this->connection)) {
            return $this->connection;
        }
        try {
            $this->connection = new PDO($this->host.";".$this->db, $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->errorInfo;
        }
        return $this->connection;
    }
}
