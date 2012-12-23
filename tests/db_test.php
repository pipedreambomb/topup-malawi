<?php

class TestOfDatabase extends UnitTestCase {
	function TestOfDatabase() {
		parent::__construct("Database Test Case");
	}

	function testTelcoListIsNotEmpty() {
		$telcos = Database::getTelcos();
		$this->assertNotNull($telcos, "Object returned from Telco query");
		$this->assertNotEqual(count($telcos), 0);
	}

	function testDenominationsFoundForATelco() {
		$telcos = Database::getTelcos();
		$this->assertNotNull($telcos, "Object returned from Telco query");
		$denoms = Database::getDenominations($telcos[0]['name']);
		$this->assertNotNull($denoms, "Found matching denoms for first telco");
	}
	/*
	function testClockTellsTime() {
		$clock = new Clock();
		$this->assertSameTime($clock->now(), time(), 'Now is the right time');
	}
	function testClockAdvance() {
		$clock = new Clock();
		$clock->advance(10);
		$this->assertSameTime($clock->now(), time() + 10, 'Advancement');
	}
	 */
}
?>
