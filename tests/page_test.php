<?php

class TestOfPage extends WebTestCase {

	// Used so tests that fetch URLs work on different machines with different file structures,
	// e.g. this on my machine would be http://localhost/topups/
	var $sitePrefix = "";

	function __construct() {
		parent::__construct();
		$this->setSitePrefix();
	}

	function checkNoErrors() {
		$this->assertNoText("Fatal error:");
		$this->assertNoText("Parse error:");
		$this->assertNoText("Warning:");
		$this->assertNoText("Notice:");
	}

	//This is a very naive way of doing this. If you know a better one, have a go!
	function setSitePrefix() {
		$this->sitePrefix = "http://" . $_SERVER["HTTP_HOST"]
		       .	str_replace( "tests/all_tests.php", "", $_SERVER["PHP_SELF"]);
	}

	//Because local $this->get() calls don't seem to work
	function getLocalPage($url) {
		return $this->get($this->sitePrefix . $url);
	}

	function postLocalPage($url, $post) {
		return $this->post($this->sitePrefix . $url, $post);
	}

	function testHomePageSetToAirtelByDefault() {
		$this->getLocalPage("index.php");
		$this->assertFieldByName("Telco", "Airtel");
		$this->checkNoErrors();
	}

	function testGoPageDisplaysEachTopup() {

		$this->postLocalPage("go.php", array("test" => true, "Telco" => "Airtel", "Amount" => "6000"));
		$this->assertText("1,000", "Displays little topup");
		$this->assertText("5,000", "Displays big topup");
		$this->assertText("6,000", "Displays total");
		$this->checkNoErrors();
	}
}
