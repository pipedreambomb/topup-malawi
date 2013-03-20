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
// GN - This is a sample file, I am not putting my actual details in the public
// source code repo for obvious reasons!
//
// Copy this file to db_cfg.php and overwrite it with your own MySQL values
require_once 'meekrodb.2.1.class.php';
DB::$user = 'my_database_user';
DB::$password = 'my_database_password';
DB::$dbName = 'my_database_name';
