<?php

class Order {

	public $topups;
	public $targetSum, $telco;
	private $database;

	function __construct($telco, $targetSum, $database = null) {

		$this->telco = $telco;
		$this->targetSum = $targetSum;
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
		while($this->targetSum > $this->sum()
			&& count($denoms) > 0) {

			if($denoms[0]['amount'] <= $this->targetSum - $this->sum()) {
				array_push($this->topups, $denoms[0]['amount']);
			} else {
				array_shift($denoms);
			}	
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
