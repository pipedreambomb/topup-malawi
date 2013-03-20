<?php /*
* Copyright 2013 George Nixon
* 
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
*   http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/ ?>
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
