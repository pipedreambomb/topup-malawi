<?php

class TestOfDatabase extends UnitTestCase {
	function TestOfDatabase() {
		parent::__construct("Database Test Case");
	}

	function testTelcoListIsNotEmpty() {
		$telcos = Database::getTelcos();
		$this->assertNotNull($telcos);
		$this->assertNotEqual(count($telcos), 0, "More than zero Telcos returned");
	}

	function testDenominationsFoundForATelco() {
		$telcos = Database::getTelcos();
		$this->assertNotNull($telcos);
		$denoms = Database::getDenominations($telcos[0]['name']);
		$this->assertNotNull($denoms, "Found matching denoms for first telco");
	}
}
?>
