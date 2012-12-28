<?php
// getDenominations.php
// @param GET telco - Name of the telco in the database
// Returns a JSON list of denominations of topups for the specified telco from the database
require_once("../classes/Ajax.php");
$ajax = new Ajax();
$ajax->getDenominations($_GET['telco']);