<?
// getTelcos.php
// Returns a list of Telco names, e.g. Airtel, in JSON format
require_once "../db/db.php";
$telcoNames = DB::query("SELECT name FROM telcos");
echo json_encode($telcoNames);
