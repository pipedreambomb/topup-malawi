<?
// getDenominations.php
// @param GET telco - Name of the telco in the database
// Returns a JSON list of denominations of topups for the specified telco from the database
require_once "../db/db.php";
$selectedTelco = $_GET['telco'];
$denominations = DB::query("SELECT amount FROM denominations d, telcos t
				WHERE t.name = %s AND d.telco_id = t.id", $selectedTelco);
echo json_encode($denominations);
