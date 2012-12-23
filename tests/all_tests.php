<?php
require_once('ReporterShowingPasses.php');
require_once("simpletest/web_tester.php");
require_once("simpletest/unit_tester.php");
require_once("../classes/database.php");

class AllTests extends TestSuite {
	function AllTests() {
		parent::__construct();
		$this->addFile('db_test.php');
		$this->addFile('ajax_test.php');
	}
}
$tests = new AllTests();
$tests->run(new ReporterShowingPasses());
?>
