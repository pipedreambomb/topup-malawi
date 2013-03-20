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
class Order {

	private $target, $telco, $database, $topups;

	/* 
	 * Order - represents a combination of topups that add up
	 * to a given total
	 * @param String $telco - name of the telco
	 * @param int $target - amount desired to be the total
	 * @param Database $database (optional) - used for testing, can pass in a
	 * 	mock database object if preferred
	 * @returns Order
	 */
	function __construct($telco, $target, $database = null) {

		$this->telco = $telco;
		$this->target = $target;
		$this->topups = array();
		if($database == null) {
			$database = new Database();
		}
		$this->database = $database;

		$this->validateTargetIsNumeric();
	}

	private function validateTargetIsNumeric() {
		if(! is_numeric($this->target)) {
			throw new Exception ("Requested order total is not a numeric value.");
		}
	}

	/* 
	 * build() - builds the list of topups needed in order to meet the target sum,
	 * starting with the biggest ones first so as to have as few as possible
	 */
	function build() {
		$denoms = $this->database->getDenominations($this->telco, "DESC");
		while($this->target > $this->sum()
			&& count($denoms) > 0) {

			if($denoms[0]['amount'] <= $this->target - $this->sum()) {
				array_push($this->topups, $denoms[0]);
			} else {
				array_shift($denoms);
			}	
		}
		$this->checkHitTarget();
	}

	private	function checkHitTarget() {
		$sum = $this->sum();
		if($sum != $this->target) {
			$this->topups = array();
			throw new Exception(sprintf("Could not generate order for %d. Generated order totalling %d with %d remaining.", $this->target, $sum, $this->target - $sum));
		}
	}

	// Add up topups
	// @returns sum of all topups selected
	function sum() {
		$sum = 0;
		foreach($this->topups as $topup) {
			$sum += $topup['amount'];
		}
		return $sum;
	}

	/*
	 * Accessor method to obtain a particular topup
	 * @param index of the topup in the collection
	 * @returns int Specified topup 
	 */
	function getTopup($index) {
		return $this->topups[$index];
	}

	/*
	 * Accessor method to obtain a particular topup's value
	 * @param index of the topup in the collection
	 * @returns int Specified topup amount
	 */
	function getTopupAmount($index) {
		return $this->topups[$index]['amount'];
	}

	/*
	 * Accessor method to obtain a count of the topups array
	 * @returns array Count of the topups in the Order
	 */
	function count() {
		return count($this->topups);
	}
}
