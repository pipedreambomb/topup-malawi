<?php

class TestOfPage extends WebTestCase {

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
	function getLocalPage($url) {
		return $this->get($this->sitePrefix . $url);
//		echo($this->sitePrefix . $url);
	}

	function testHomePageSetToAirtelByDefault() {
		$this->getLocalPage("index.php");
		$this->assertFieldByName("Telco", "Airtel");
	}

	function testHomePageNoErrors() {
		$this->getLocalPage("index.php");
		$this->assertNoText("Warning:");
		$this->assertNoText("Notice:");
	}
}
