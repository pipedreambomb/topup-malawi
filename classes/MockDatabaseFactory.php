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

require_once(dirname(dirname(__FILE__)) . '/tests/simpletest/mock_objects.php');
require_once("Database.php");

class MockDatabaseFactory {

	static function getInstance() {
		
		Mock::generate('Database');
		$res = new MockDatabase();
		$res->returns("getTelcos", array(array("name" => "Airtel"), array("name" => "TNM"), array("name" => "TestTelco")));

		$mockDenomsAsc = array(0 => array("amount" => 1000, "nice_amount" => "1,000"), 1 => array("amount" => 5000, "nice_amount" => "5,000"));
		$res->returns("getDenominations", $mockDenomsAsc, array("Airtel"));

		$mockDenomsDesc = array(0 =>array("amount" => 5000, "nice_amount" => "5,000") , 1 => array("amount" => 1000, "nice_amount" => "1,000"));
		$res->returns("getDenominations", $mockDenomsDesc, array("Airtel", "DESC"));
		return $res;
	}
}
