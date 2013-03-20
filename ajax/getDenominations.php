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
// getDenominations.php
// @param GET telco - Name of the telco in the database
// Returns a JSON list of denominations of topups for the specified telco from the database
require_once("../classes/Ajax.php");
$ajax = new Ajax();
$ajax->getDenominations($_GET['telco']);