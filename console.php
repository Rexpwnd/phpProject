<?php
include_once "classes/Menu.php";
use classes\Menu;

$menu = new Menu();
$menu->insertMenuDataFromFileToDatabase();