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

require_once(dirname(dirname(__FILE__)) . "/classes/MockDatabaseFactory.php");

class TestOfDatabase extends UnitTestCase {

    private $mockDatabase;

	function TestOfDatabase() {
		parent::__construct("Database Test Case");
	}

	function setUp() {
		$this->mockDatabase = MockDatabaseFactory::getInstance();
	}

	function testTelcoListIsNotEmpty() {
		$telcos = $this->mockDatabase->getTelcos();
		$this->assertNotNull($telcos);
		$this->assertNotEqual(count($telcos), 0, "More than zero Telcos returned");
	}

	function testDenominationsFoundForATelco() {
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertNotNull($denoms, "Found matching denoms for first telco");
	}

	function testDenominationAmountFormats() {
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertPattern("/[0-9]/", $denoms[0]['amount'], "Unformatted 'amount'");
		$this->assertPattern("/[0-9,]/", $denoms[0]['nice_amount'], "Formatted 'nice_amount'");
	}

	function testDenominationsSorting() {
		
		$denoms = $this->mockDatabase->getDenominations("Airtel");
		$this->assertTrue($denoms[0]['amount'] < $denoms[1]['amount'], "Ascending sort");
		$denoms = $this->mockDatabase->getDenominations("Airtel", "DESC");
		$this->assertFalse($denoms[0]['amount'] < $denoms[1]['amount'], "Descending sort");
		
	}

}
?>
