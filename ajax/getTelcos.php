<?
// getTelcos.php
// Returns a list of Telco names, e.g. Airtel, in JSON format
require_once "../classes/database.php";
$telcoNames = Database::getTelcos();
echo json_encode($telcoNames);
