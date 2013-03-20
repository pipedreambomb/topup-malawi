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
require_once "classes/Page.php";

class Support extends Page {

	protected function content(){
		?>
		<p>Sorry, this site is a demo, please see <a href="about.php">the About page</a> for more info and contact details of the developer.</p>
		<?php
	}

}

$page = new Support();
$page->render();
