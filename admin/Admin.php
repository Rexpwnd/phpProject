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

    public function getMenu(int $id = null): array
    {
        if($id) {
            $sql = "SELECT * FROM menu WHERE id = " . $id;
        } else {
            $sql = "SELECT * FROM menu";
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $menuData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $menuData;
    }

    public function insertMenu(array $data): bool
    {
        $menuInsertSQL = "INSERT INTO menu (`class`, `class-a`, `href`, `css-id`, `role`, `data-bs-toggle`, `aria-expanded`, `content`, `class-ul`, `aria-labelledby`) 
                  VALUES (:class, :class_a, :href, :css_id, :role, :data_bs_toggle, :aria_expanded, :content, :class_ul, :aria_labelledby)";
        $menuInsertStmt = $this->connection->prepare($menuInsertSQL);
        // Hodnoty pre hlavnú položku menu
        $class = $data['class'] ?? '';
        $class_a = $data['class-a'] ?? '';
        $href = $data['href'] ?? '';
        $css_id = $data['css-id'] ?? '';
        $role = $data['role'] ?? '';
        $data_bs_toggle = $data['data-bs-toggle'] ?? '';
        $aria_expanded = $data['aria-expanded'] ?? '';
        $content = $data['content'] ?? '';
        $class_ul = $data['class-ul'] ?? '';
        $aria_labelledby = $data['aria-labelledby'] ?? '';

        // Vloženie hlavnej položky menu
        $insert = $menuInsertStmt->execute([
            ':class' => $class,
            ':class_a' => $class_a,
            ':href' => $href,
            ':css_id' => $css_id,
            ':role' => $role,
            ':data_bs_toggle' => $data_bs_toggle,
            ':aria_expanded' => $aria_expanded,
            ':content' => $content,
            ':class_ul' => $class_ul,
            ':aria_labelledby' => $aria_labelledby,
        ]);

        return $insert;
    }

    public function deleteMenu(int $id): bool
    {
        $menuDeleteSQL = "DELETE FROM menu WHERE id = :id";
        $menuDeleteStmt = $this->connection->prepare($menuDeleteSQL);

        // Vloženie hlavnej položky menu
        $delete = $menuDeleteStmt->execute([
            ':id' => $id
        ]);

        return $delete;
    }

    public function updateMenu(int $id, array $data): bool
    {
        $menuUpdatetSQL = "UPDATE menu 
                          SET `class` = :class, 
                              `class-a` = :class_a, 
                              `href` = :href, 
                              `css-id` = :css_id, 
                              `role` = :role, 
                              `data-bs-toggle` = :data_bs_toggle, 
                              `aria-expanded` = :aria_expanded, 
                              `content` = :content, 
                              `class-ul` = :class_ul, 
                              `aria-labelledby` = :aria_labelledby
                              WHERE id = :id";
        $menuUpdateStmt = $this->connection->prepare($menuUpdatetSQL);
        // Hodnoty pre hlavnú položku menu
        $class = $data['class'] ?? '';
        $class_a = $data['class-a'] ?? '';
        $href = $data['href'] ?? '';
        $css_id = $data['css-id'] ?? '';
        $role = $data['role'] ?? '';
        $data_bs_toggle = $data['data-bs-toggle'] ?? '';
        $aria_expanded = $data['aria-expanded'] ?? '';
        $content = $data['content'] ?? '';
        $class_ul = $data['class-ul'] ?? '';
        $aria_labelledby = $data['aria-labelledby'] ?? '';

        // Vloženie hlavnej položky menu
        $update = $menuUpdateStmt->execute([
            ':class' => $class,
            ':class_a' => $class_a,
            ':href' => $href,
            ':css_id' => $css_id,
            ':role' => $role,
            ':data_bs_toggle' => $data_bs_toggle,
            ':aria_expanded' => $aria_expanded,
            ':content' => $content,
            ':class_ul' => $class_ul,
            ':aria_labelledby' => $aria_labelledby,
            ':id' => $id,
        ]);

        return $update;
    }
}