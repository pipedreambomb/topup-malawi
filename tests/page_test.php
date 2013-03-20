<?php /*
* Copyright 2013 George Nixon
* 
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
*   http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/ ?>
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

	function postLocalPage($url, $postParams) {
		return $this->post($this->sitePrefix . $url, $postParams);
	}

	function testHomePageSetToAirtelByDefault() {
		$this->getLocalPage("index.php");
		$this->assertFieldByName("Telco", "Airtel"); //Not a good test, does not use MockDB
		$this->checkNoErrors();
	}

	function testGoPageDisplaysEachTopup() {

		$this->postLocalPage("go.php", array("test" => true, "Telco" => "Airtel", "Amount" => "6000"));
		$this->assertText("1,000", "Displays little topup");
		$this->assertText("5,000", "Displays big topup");
		$this->assertText("6,000", "Displays total");
		$this->checkNoErrors();
	}

	function testGetToOrderConfirmation() {
		
		$this->postLocalPage("go.php", array("test" => true, "Telco" => "Airtel", "Amount" => "6000"));
		$this->clickSubmit("Submit");
		$url = $this->getUrl();
		$expectedUrl = $this->sitePrefix . "confirmed.php";
		$this->assertEqual($url, $expectedUrl, "Submitting confirmation should take user to order confirmed page.");
	}
}
