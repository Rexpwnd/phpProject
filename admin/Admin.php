<?php

namespace Admin;
require_once 'adminDbConfig.php';
class Admin
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

    public function getConnection(): \PDO {
        return $this->connection;
    }

    public function getPricingPlans(int $id = null): array
    {
        $tableName = "pricing";

        $sql = $id ? "SELECT * FROM $tableName WHERE id = $id" : "SELECT * FROM $tableName";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $pricingPlans = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $pricingPlans;
    }

    public function insertPricingPlan(array $data): bool
    {
        $menuInsertSQL = "INSERT INTO pricing (`title`, `price`, `content`) 
                  VALUES (:title, :price, :content)";
        $menuInsertStmt = $this->connection->prepare($menuInsertSQL);
        $title = $data['title'] ?? '';
        $price = $data['price'] ?? '';
        $content = $data['content'] ?? '';

        $insert = $menuInsertStmt->execute([
            ':title' => $title,
            ':price' => $price,
            ':content' => $content,
        ]);

        return $insert;
    }

    public function deletePricingPlan(int $id): bool
    {
        $menuDeleteSQL = "DELETE FROM pricing WHERE id = :id";
        $menuDeleteStmt = $this->connection->prepare($menuDeleteSQL);
        $delete = $menuDeleteStmt->execute([
            ':id' => $id
        ]);
        return $delete;
    }

    public function updatePricingPlan(int $id, array $data): bool
    {
        $menuUpdatetSQL = "UPDATE pricing 
                          SET `title` = :title, 
                              `price` = :price, 
                              `content` = :content 
                              WHERE id = :id";
        $menuUpdateStmt = $this->connection->prepare($menuUpdatetSQL);
        $title = $data['title'] ?? '';
        $price = $data['price'] ?? '';
        $content = $data['content'] ?? '';

        $update = $menuUpdateStmt->execute([
            ':title' => $title,
            ':price' => $price,
            ':content' => $content,
            ':id' => $id,
        ]);
        return $update;
    }
}