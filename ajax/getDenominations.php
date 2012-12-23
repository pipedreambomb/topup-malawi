<?
// getDenominations.php
// @param GET telco - Name of the telco in the database
// Returns a JSON list of denominations of topups for the specified telco from the database
require_once "../classes/database.php";
$telco = $_GET['telco'];
$denoms = Database::getDenominations($telco); 
echo json_encode($denoms);
