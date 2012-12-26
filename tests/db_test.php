<?php
class TestOfDatabase extends UnitTestCase {

	protected $mockDatabase;

	function TestOfDatabase() {
		parent::__construct("Database Test Case");
	}

	function setUp() {
		Mock::generate('Database');
		$this->mockDatabase = new MockDatabase();
		$this->mockDatabase->returns("getTelcos", array(array("name" => "Airtel"), array("name" => "TNM")));

		$mockDenomsAsc = array(0 => array("amount" => 1000, "nice_amount" => "1,000"), 1 => array("amount" => 5000, "nice_amount" => "5,000"));
		$this->mockDatabase->returns("getDenominations", $mockDenomsAsc, array("Airtel"));

		$mockDenomsDesc = array(0 =>array("amount" => 5000, "nice_amount" => "5,000") , 1 => array("amount" => 1000, "nice_amount" => "1,000"));
		$this->mockDatabase->returns("getDenominations", $mockDenomsDesc, array("Airtel", "DESC"));
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
