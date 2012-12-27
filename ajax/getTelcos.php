<?php
// getTelcos.php
// Returns a list of Telco names, e.g. Airtel, in JSON format
header('Content-Type: application/json');

require_once "../classes/database.php";
require_once "../classes/MockDatabaseFactory.php";
$database = isset($_GET['test']) ? MockDatabaseFactory::getInstance() : new Database();
$telcoNames = $database->getTelcos();
echo json_encode($telcoNames);
