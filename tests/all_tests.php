<?php
$path = dirname(dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('ReporterShowingPasses.php');
require_once("simpletest/web_tester.php");
require_once("simpletest/unit_tester.php");
require_once("simpletest/autorun.php");
require_once("db_test_case.php");
require_once("../classes/database.php");
require_once("../classes/order.php");

class AllTests extends TestSuite {
	function AllTests() {
		parent::__construct();
		$this->addFile('db_test.php');
		$this->addFile('ajax_test.php');
		$this->addFile('page_test.php');
		$this->addFile('order_test.php');
	}
}
?>
