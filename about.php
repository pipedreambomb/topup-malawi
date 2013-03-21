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

class About extends Page {

	protected function content(){ ?>

		<p>This is a <strong>demo site</strong>, and you <strong>cannot</strong> actually purchase topups here, unfortunately. It was developed as a free-time project by a <a href="http://www.georgenixon.co.uk/category/malawi">software developer who was volunteering</a> for a while in Malawi at the <a href="http://www.jc-hem.org">Jesuit Commons Higher Education in the Margins</a> project in Dzaleka refugee camp as their IT co-ordinator.</p>
		<p>This website could be a viable business - the user interface and some database work has been done, and it just needs some work on handling payments over the internet and fulfilling orders by sending the topup voucher codes. It would only suit someone in Malawi who can keep a stock of the topup cards and add them to the database manually.</p>
		<p>Whether you are interested in taking this project forward in Malawi or making something similar to fill the gap for another country, the source code is <a href="https://github.com/pipedreambomb/topup-malawi">available on GitHub</a>, along with some instructions on how to set up a copy. The developer can be contacted through his GitHub profile for arranging some freelance support if needed. It is open source under an <a href="http://en.wikipedia.org/wiki/Apache_License#Licensing_conditions">Apache 2.0 license</a>, so you are free to do anything with it, so long as you attribute the original developer if redistributing the code.</p> 
<?	}

}

$page = new About();
$page->render();
