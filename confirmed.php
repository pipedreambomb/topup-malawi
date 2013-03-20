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

class Confirmed extends Page {

	protected function content(){

?>
		<h1>Sorry, but this site is a <span class="red">demo</span>.</h1>

		<p>The <strong>bad news</strong> is that there is no business offering this service at present. What you see here was a free-time project that ended when the developer returned to the UK.</p>
		<p>The <strong>good news</strong> is that the code behind this site is <a href="about.php">available free of charge</a> to anyone who wants to turn it into a real commercial website.</p>
		<p>If you know someone who might be interested, please direct their attention to our <a href="about.php">About</a> page, where they can learn more.</p>
<?php
	}

}

$page = new Confirmed();
$page->render();
