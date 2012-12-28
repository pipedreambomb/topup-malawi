<?php

require_once(dirname(dirname(__FILE__)) . "/classes/MockDatabaseFactory.php");

class TestOfDatabase extends UnitTestCase {

    private $mockDatabase;

	function TestOfDatabase() {
		parent::__construct("Database Test Case");
	}

	function setUp() {
		$this->mockDatabase = MockDatabaseFactory::getInstance();
	}

	function testTelcoListIsNotEmpty() {
		$telcos = $this->mockDatabase->getTelcos();
		$this->assertNotNull($telcos);
		$this->assertNotEqual(count($telcos), 0, "More than zero Telcos returned");
	}

	function testDenominationsFoundForATelco() {
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertNotNull($denoms, "Found matching denoms for first telco");
	}

	function testDenominationAmountFormats() {
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertPattern("/[0-9]/", $denoms[0]['amount'], "Unformatted 'amount'");
		$this->assertPattern("/[0-9,]/", $denoms[0]['nice_amount'], "Formatted 'nice_amount'");
	}

	function testDenominationsSorting() {
		
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertTrue($denoms[0]['amount'] < $denoms[1]['amount'], "Ascending sort");
		$denoms = $this->mockDatabase->getDenominations("Airtel", "DESC");
		$this->assertFalse($denoms[0]['amount'] < $denoms[1]['amount'], "Descending sort");
		
	}

}
?>
