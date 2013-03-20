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
$path = dirname(dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once("simpletest/web_tester.php");
require_once("simpletest/unit_tester.php");
require_once("simpletest/autorun.php");
require_once("../classes/Database.php");
require_once("../classes/Order.php");

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
