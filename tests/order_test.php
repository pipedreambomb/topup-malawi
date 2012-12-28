<?php
class TestOfOrders extends UnitTestCase {

	private $database;

	function TestOfOrders() {
		parent::__construct("Orders Test Case");
	}

	function setUp() {

		$this->database = MockDatabaseFactory::getInstance();
	}

	function testBuildOrderFromTarget() {
		$target = 2000;
		$order = new Order("Airtel", $target, $this->database);
		$order->build();
		$this->assertEqual($order->count(), 2, "Two topups used");
		$this->assertEqual($order->getTopupAmount(0), 1000, "First topup is 1000mkw");
		$this->assertEqual($order->getTopupAmount(1), 1000);
		$this->assertEqual($order->sum(), $target, "Order total matches target");
	}

	function testBuildUsesBiggestTopups() {

		$target = 5000;
		$order = new Order("Airtel", $target, $this->database);
		$order->build();
		$this->assertEqual($order->count(), 1, "One topups used");
		$this->assertEqual($order->getTopupAmount(0), 5000, "Only topup is 5000mkw");
		$this->assertEqual($order->sum(), $target, "Order total matches target");

	}

	function testBuildUsesCombinationOfTopupSizes() {

		$target = 6000;
		$order = new Order("Airtel", $target, $this->database);
		$order->build();
		$this->assertEqual($order->count(), 2, "Two topups used");
		$this->assertEqual($order->getTopupAmount(0), 5000, "First topup is 5000mkw");
		$this->assertEqual($order->getTopupAmount(1), 1000, "Second topup is 1000mkw");
		$this->assertEqual($order->sum(), $target, "Order total matches target");

	}

	function testImpossibleTarget() {

		$target = 2001;
		$order = new Order("Airtel", $target, $this->database);
		$this->expectException(new Exception("Could not generate order for 2001. Generated order totalling 2000 with 1 remaining."));
		$order->build();
	}

	function testNonNumericTarget() {

		$target = "hr3h92h90";
		$this->expectException(new Exception("Requested order total is not a numeric value."));
		new Order("Airtel", $target, $this->database); //exception thrown in constructor
	}

}
?>
