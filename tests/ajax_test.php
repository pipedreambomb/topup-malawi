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

	function testGetTelcoReturnsJSON() {
		$test = $this->getLocalPage('ajax/getTelcos.php');
		$this->assertText("Airtel");
		$this->assertNotEqual(null, json_decode($test), "JSON decoded okay"); 
		$this->assertMime("application/json");
		
	}

	function testGetDenominationsWorksForAirtel() {
		$test = $this->getLocalPage('ajax/getDenominations.php', array('telco' => 'Airtel'));
		$this->assertText("1000");
		$this->assertText("5000");
		$this->assertNotEqual(null, json_decode($test), "JSON decoded okay"); 
		$this->assertMime("application/json");
		
	}
}
