<?php
class TestOfOrders extends UnitTestCase {
	function TestOfOrders() {
		parent::__construct("Orders Test Case");
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

	function testBuildOrderFromTarget() {
		$target = 2000;
		$order = new Order("Airtel", $target, $this->mockDatabase);
		$order->build();
		$this->assertEqual(count($order->topups), 2, "Two topups used");
		$this->assertEqual($order->topups[0], 1000, "First topup is 1000mkw");
		$this->assertEqual($order->topups[1], 1000);
		$this->assertEqual($order->sum(), $target, "Order total matches target");
	}
}
?>
