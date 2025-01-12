<?php
namespace classes;
include_once "classes/Database.php";
use classes\Database;
class Pricing
{
    private $pricing;
    private $db;
    private static $dataWowDelay = 0.4;

    public function __construct() {
        $this->db = new Database();
        $this->pricing = $this->getPricingFromDatabase();
    }

    public function checkIfTableExists() {
        $sql = file_get_contents('sql/pricing.sql');
        return $this->db->executeQuery($sql);
    }

    public function getPricing(): string {
        return $this->pricing;
    }

    public function getPricingFromDatabase(): string 
    {   
        $html = "";
        try {
            $connection = $this->db->getConnection();
            $menuSQL = "SELECT * FROM pricing";
            $menuStmt = $connection->prepare($menuSQL);
            $menuStmt->execute();
            $menuData = $menuStmt->fetchAll(\PDO::FETCH_ASSOC);

            $delay = 0.4; $delayIncrement = 0.2;
            foreach ($menuData as $plan) {
                 $html .= $this->generatePricingPlanItem($plan, $delay);
                 $delay += $delayIncrement;
                }

        } catch (\PDOException $e) {
            error_log("Error fetching menu data: " . $e->getMessage());
            echo "Error fetching menu data. Please try again later.";
        }
        return $html;
    }

    private function generatePricingPlanItem(array $plan, float $delay): string {
        $price = htmlspecialchars($plan['price']);
        $title = htmlspecialchars($plan['title']);
        $content = htmlspecialchars_decode($plan['content']);
        $buttonText = htmlspecialchars($plan['button_text']);

        return <<<HTML
        <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="{$delay}s">
            <div class="pricing-plan">
                <div class="pricing-month">
                    <h2>{$price}</h2>
                </div>
                <div class="pricing-title">
                    <h3>{$title}</h3>
                </div>
                {$content}
                <button class="btn btn-default section-btn">{$buttonText}</button>
            </div>
        </div>
        HTML;
    }
}