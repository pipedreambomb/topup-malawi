<?php

class Order {

	public $topups;
	public $target, $telco;
	private $database;

	function __construct($telco, $target, $database = null) {

		$this->telco = $telco;
		$this->target = $target;
		$this->topups = array();
		if($database == null) {
			$database = new Database();
		}
		$this->database = $database;
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
				array_push($this->topups, $denoms[0]['amount']);
			} else {
				array_shift($denoms);
			}	
		}
		$this->checkHitTarget();
	}

	function checkHitTarget() {
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
			$sum += $topup;
		}
		return $sum;
	}
}
