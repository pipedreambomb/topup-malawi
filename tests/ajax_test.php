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
		$get = $this->getLocalPage('ajax/getTelcos.php', array("test" => true));
		$this->checkJSON($get);
		$this->assertText("Airtel");
		$this->assertText("TestTelco");
	}

	function testGetDenominationsWorksForAirtel() {
		$get = $this->getLocalPage('ajax/getDenominations.php', array('telco' => 'Airtel'));
		$this->checkJSON($get);
		$this->assertText("1,000");
		$this->assertText("5,000");
		$this->assertNoText(".", "No decimal places");	
	}
}
