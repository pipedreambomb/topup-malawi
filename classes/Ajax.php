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
/**
 * Created by JetBrains PhpStorm.
 * User: g
 * Date: 28/12/12
 * Time: 12:03
 * To change this template use File | Settings | File Templates.
 */
require_once ("Database.php");
require_once ("MockDatabaseFactory.php");
class Ajax
{
    private $database;

    function __construct()
    {
        if (isset($_GET['test'])) {
            $this->database = MockDatabaseFactory::getInstance();
        } else {
            $this->database = new Database();
        }
    }

    private function outputJSON($str)
    {
        header('Content-Type: application/json');
        echo json_encode($str);
    }

    public function getDenominations($telco)
    {
        $denoms = $this->database->getDenominations($telco);
        $this->outputJSON($denoms);
    }


    public function getTelcos()
    {
        $this->outputJSON($this->database->getTelcos());
    }

}
