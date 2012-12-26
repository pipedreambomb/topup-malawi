<?php

class TestOfAjax extends WebTestCase {

	// Used so tests that fetch URLs work on different machines with different file structures,
	// e.g. this on my machine would be http://localhost/topups/
	var $sitePrefix = "";

	function __construct() {
		parent::__construct();
		$this->setSitePrefix();
	}

	//This is a very naive way of doing this. If you know a better one, have a go!
	function setSitePrefix() {
		$this->sitePrefix = "http://" . $_SERVER["HTTP_HOST"]
		       .	str_replace( "tests/all_tests.php", "", $_SERVER["PHP_SELF"]);
	}

	//Because local $this->get() calls don't seem to work
	function getLocalPage($url, $params = null) {
		return $this->get($this->sitePrefix . $url, $params);
	}

	/*
	 * Check JSON results are valid JSON
	 * @param $get result from get request
	 */
	function checkJSON($get) {
		$this->assertNotEqual(null, json_decode($get), "JSON decoded okay"); 
		$this->assertMime("application/json");
	}

	function testGetTelcoReturnsJSON() {
		$get = $this->getLocalPage('ajax/getTelcos.php');
		$this->checkJSON($get);
		$this->assertText("Airtel");
	}

	function testGetDenominationsWorksForAirtel() {
		$get = $this->getLocalPage('ajax/getDenominations.php', array('telco' => 'Airtel'));
		$this->checkJSON($get);
		$this->assertText("1000");
		$this->assertText("5000");
		
	}
}
