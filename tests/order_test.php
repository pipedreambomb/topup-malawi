<?php
class TestOfOrders extends DatabaseTestCase {
	function TestOfOrders() {
		parent::__construct("Orders Test Case");
	}

	function setUp() {
		$this->generateMockDatabase();
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

	function testBuildUsesBiggestTopups() {

		$target = 5000;
		$order = new Order("Airtel", $target, $this->mockDatabase);
		$order->build();
		$this->assertEqual(count($order->topups), 1, "One topups used");
		$this->assertEqual($order->topups[0], 5000, "Only topup is 5000mkw");
		$this->assertEqual($order->sum(), $target, "Order total matches target");

	}

	function testBuildUsesCombinationOfTopupSizes() {

		$target = 6000;
		$order = new Order("Airtel", $target, $this->mockDatabase);
		$order->build();
		$this->assertEqual(count($order->topups), 2, "Two topups used");
		$this->assertEqual($order->topups[0], 5000, "First topup is 5000mkw");
		$this->assertEqual($order->topups[1], 1000, "Second topup is 1000mkw");
		$this->assertEqual($order->sum(), $target, "Order total matches target");

	}

	function testImpossibleTarget() {

		$target = 2001;
		$order = new Order("Airtel", $target, $this->mockDatabase);
		$this->expectException(new Exception("Could not generate order for 2001. Generated order totalling 2000 with 1 remaining."));
		$order->build();
	}
}
?>
