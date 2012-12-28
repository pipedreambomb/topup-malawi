<?php
// getTelcos.php
// Returns a list of Telco names, e.g. Airtel, in JSON format
require_once("../classes/Ajax.php");
$ajax = new Ajax();
$ajax->getTelcos();