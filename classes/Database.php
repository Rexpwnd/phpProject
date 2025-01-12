<?php
namespace classes;
require_once 'dbConfig.php';

class Database
{
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new \PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            echo "Database connection error. Please try again later.";
            exit;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($sql, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            return false;
        }
    }
}
