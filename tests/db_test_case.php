<?php
class DatabaseTestCase extends UnitTestCase {

	protected $mockDatabase;

	function generateMockDatabase() {
		Mock::generate('Database');
		$this->mockDatabase = new MockDatabase();
		$this->mockDatabase->returns("getTelcos", array(array("name" => "Airtel"), array("name" => "TNM")));

		$mockDenomsAsc = array(0 => array("amount" => 1000, "nice_amount" => "1,000"), 1 => array("amount" => 5000, "nice_amount" => "5,000"));
		$this->mockDatabase->returns("getDenominations", $mockDenomsAsc, array("Airtel"));

		$mockDenomsDesc = array(0 =>array("amount" => 5000, "nice_amount" => "5,000") , 1 => array("amount" => 1000, "nice_amount" => "1,000"));
		$this->mockDatabase->returns("getDenominations", $mockDenomsDesc, array("Airtel", "DESC"));
	}
}
