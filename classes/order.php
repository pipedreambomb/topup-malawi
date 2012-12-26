<?php

class Order {

	public $topups;
	public $targetSum, $actualSum, $telco;

	function __construct($telco, $targetSum) {

		$this->telco = $telco;
		$this->targetSum = $targetSum;
		$this->actualSum = $targetSum;
	}

	function build() {
		$denoms = Database::getDenominations($this->telco, "DESC");
		$this->topups = array(1000, 1000);
	}
}
