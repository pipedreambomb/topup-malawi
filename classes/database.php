<?php
// Class for handling all sorts of database interactions
require_once(dirname(dirname(__FILE__)) . "/db/db_cfg.php");

class Database {

	function getDenominations($telco, $order = "ASC") {
		return DB::query("SELECT amount, FORMAT(amount, 0) AS nice_amount FROM denominations d, telcos t
				WHERE t.name = %s AND d.telco_id = t.id ORDER BY amount " . $order, $telco);
	}

	function getTelcos() {
		return DB::query("SELECT name FROM telcos");
	}
}
