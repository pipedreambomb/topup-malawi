<?php
// Class for handling all sorts of database interactions
require_once "../db/db_cfg.php";

class Database {

	static function getDenominations($telco) {
		return DB::query("SELECT amount FROM denominations d, telcos t
				WHERE t.name = %s AND d.telco_id = t.id", $telco);
	}

	static function getTelcos() {
		return DB::query("SELECT name FROM telcos");
	}
}
