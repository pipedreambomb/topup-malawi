<?php 

require_once(dirname(dirname(__FILE__)) . '/tests/simpletest/mock_objects.php');
require_once("database.php");

class MockDatabaseFactory {

	static function getInstance() {
		
		Mock::generate('Database');
		$res = new MockDatabase();
		$res->returns("getTelcos", array(array("name" => "Airtel"), array("name" => "TNM"), array("name" => "TestTelco")));

		$mockDenomsAsc = array(0 => array("amount" => 1000, "nice_amount" => "1,000"), 1 => array("amount" => 5000, "nice_amount" => "5,000"));
		$res->returns("getDenominations", $mockDenomsAsc, array("Airtel"));

		$mockDenomsDesc = array(0 =>array("amount" => 5000, "nice_amount" => "5,000") , 1 => array("amount" => 1000, "nice_amount" => "1,000"));
		$res->returns("getDenominations", $mockDenomsDesc, array("Airtel", "DESC"));
		return $res;
	}
}
