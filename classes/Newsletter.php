<?php
namespace classes;
include_once "classes/Database.php";
use classes\Database;
class Newsletter
{
    private $db;

    public function __construct($email) {
        $this->db = new Database();
        $this->checkIfTableExists();
        $this->addSubscriber($email);
    }

    public function checkIfTableExists() {
        $sql = file_get_contents('sql/newsletter.sql');
        return $this->db->executeQuery($sql);
    }

    private function addSubscriber($insertedEmail): void
    {
        $connection = $this->db->getConnection();
    
        $email = $this->db->sanitizeInput($insertedEmail);
        $stmt = $connection->prepare("INSERT INTO newsletter (email) VALUES (:email)");
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
    
        try {
            $connection->beginTransaction();
            $stmt->execute(); // Execute the prepared statement
            $connection->commit();
            echo "You have been signed for newsletter successfully";
        } catch (\PDOException $e) {
            $connection->rollBack();
            error_log("Transaction failed: " . $e->getMessage());
            echo "Error inserting data. Please try again later.";
        }
    }
    
}