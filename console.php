<?php
include_once "classes/Menu.php";
include_once "classes/Pricing.php";
use classes\Menu;
use classes\Pricing;
$menu = new Menu();
#$menu->insertMenuDataFromFileToDatabase();
$pricing = new Pricing();
$pricing->checkIfTableExists();