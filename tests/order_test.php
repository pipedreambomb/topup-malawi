<?php
class TestOfOrders extends UnitTestCase {
	function TestOfOrders() {
		parent::__construct("Orders Test Case");
	}

	function testBuildOrderFromTarget() {
		$target = 2000;
		$order = new Order("Airtel", $target);
		$order->build();
		$this->assertEqual($order->topups[0], 1000, "First topup is 1000mkw");
		$this->assertEqual($order->topups[1], 1000);
		$this->assertEqual($order->actualSum, $target, "Order total matches target");
	}
}
?>
