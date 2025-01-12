<?php
namespace classes;
include_once "classes/Database.php";
use classes\Database;
class Menu
{
    private $menu;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->menu = $this->loadMenu();
    }

    public function createTable() {
        $sql = file_get_contents('sql/menu.sql');
        return $this->db->executeQuery($sql);
    }

    public function getMenu(): string {
        return $this->menu ?? $this->loadMenu();
    }

    private function loadMenu(): string {
        if(!file_exists("menu.json")) { 
            $this->getMenuFromDbAndSaveItToFile(); 
        } 
        return $this->getMenuFromFile();
    }

    public function getMenuFromFile($type = "header"): string
    {
        $menuDataFromFile = file_get_contents("menu.json");
        $this->menu = json_decode($menuDataFromFile, true);
        $html = "";
        if ($type === "header") {
            foreach ($this->menu as $menu) {
                $html .= $this->generateListItem($menu);
                $html .= '</li>';
            }
        }
        return $html;
    }

    public function getMenuFromDbAndSaveItToFile(): void
    {
        $menu = $this->getMenuFromDatabase();
        $jsonMenu = json_encode($menu, JSON_PRETTY_PRINT);
        $save = file_put_contents("menu.json", $jsonMenu);
        if($save) {
            echo "Menu file was created.";
        } else {
            echo "An Error occured creating Menu file.";
        }
    }

    public function getMenuFromDatabase(): array|string 
    {
        $html = "";
        try {
            $connection = $this->db->getConnection();
            $menuSQL = "SELECT * FROM menu";
            $menuStmt = $connection->prepare($menuSQL);
            $menuStmt->execute();
            $menuData = $menuStmt->fetchAll(\PDO::FETCH_ASSOC);

            return array_map(function ($row) { 
                $transformedRow = [
                    'class' => $row['class'],
                    'class-a' => $row['class_a'],
                    'href' => $row['href'],
                    'content' => $row['content'],
                    'data-toggle' => $row['data_toggle'],
                    'data-target' => $row['data_target']
                ];
                return array_filter($transformedRow, function ($value) {
                    return $value !== '';
                });
            }, $menuData);
            
        } catch (\PDOException $e) {
            error_log("Error fetching menu data: " . $e->getMessage());
            echo "Error fetching menu data. Please try again later.";
        }
        return $html;
    }

    public function insertMenuDataFromFileToDatabase()
    {
        $this->createTable();

        $menuDataFromFile = file_get_contents("menu.json");
        $this->menu = json_decode($menuDataFromFile, true);

        $sql = "INSERT INTO menu (`class`, `class_a`, `href`, `data_toggle`, `data_target`, `content`) 
                VALUES (:class, :class_a, :href, :data_toggle, :data_target, :content)";
        $stmt = $this->db->getConnection()->prepare($sql);

        try {
            $this->db->getConnection()->beginTransaction();
            foreach ($this->menu as $menu) {
                $stmt->execute([
                    ':class' => htmlspecialchars($menu['class'] ?? '', ENT_QUOTES, 'UTF-8'),
                    ':class_a' => htmlspecialchars($menu['class-a'] ?? '', ENT_QUOTES, 'UTF-8'),
                    ':href' => htmlspecialchars($menu['href'] ?? '', ENT_QUOTES, 'UTF-8'),
                    ':data_toggle' => htmlspecialchars($menu['data-toggle'] ?? '', ENT_QUOTES, 'UTF-8'),
                    ':data_target' => htmlspecialchars($menu['data-target'] ?? '', ENT_QUOTES, 'UTF-8'),
                    ':content' => htmlspecialchars($menu['content'] ?? '', ENT_QUOTES, 'UTF-8')
                ]);
            }
            $this->db->getConnection()->commit();
            echo "Menu was inserted into table successfuly.";
        } catch (\PDOException $e) {
            $this->db->getConnection()->rollBack();
            error_log("Transaction failed: " . $e->getMessage());
            echo "Error inserting data. Please try again later.";
        }
    }


    private function generateListItem(array $menu): string {
        $liClass = !empty($menu['class']) ? ' class="' . htmlspecialchars($menu['class']) . '"' : '';
        $aClass = !empty($menu['class-a']) ? ' class="' . htmlspecialchars($menu['class-a']) . '"' : '';
        $dataToggle = !empty($menu['data-toggle']) ? ' data-toggle="' . htmlspecialchars($menu['data-toggle']) . '"' : '';
        $dataTarget = !empty($menu['data-target']) ? ' data-target="' . htmlspecialchars($menu['data-target']) . '"' : '';
    
        return <<<HTML
            <li{$liClass}>
                <a{$aClass} href="{$menu['href']}"{$dataToggle}{$dataTarget}>{$menu['content']}</a>
            </li>
    HTML;
    }
}