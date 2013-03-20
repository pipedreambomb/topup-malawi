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
require_once('classes/Database.php');
require_once "classes/Page.php";

class Home extends Page {

	protected function content(){

		$database = new Database();
?>
<script type="text/javascript" src="js/index.js"></script>

<div class="hero-unit">
<form method="post" id=TopupForm action="go.php">
	<h1>I live in <span class="text-warning">Malawi</span>, my phone uses   
		<select id=Telco name=Telco>
            <?php $telcos = $this->printTelcosSelectOptions($database); ?>
		</select>
	</h1>
	<h1>and I would like to buy
		<select id=Amount name=Amount>
            <?php $this->printDenomSelectOptions($database, $telcos); ?>
		</select>
	   Kwacha in airtime topup vouchers.
	</h1>
	<div><button type="submit" class="btn btn-large btn-success pull-right">Send me some topups! <i class="icon-download-alt icon-white"></i></button></div>
	<div><small><span class='popoverme'>How does it work?</span></small></div>
</form>
</div>
<?php
	}

    protected function printDenomSelectOptions($database, $telcos)
    {
        $denoms = $database->getDenominations($telcos[0]);
        for ($i = 1; $i <= 5; $i++) {
            echo sprintf("<option>%s</option>", $denoms[0]["amount"] * $i * $i);
        }
    }

    protected function printTelcosSelectOptions($database)
    { // print a select box with Telcos from database
        $telcos = $database->getTelcos();
        foreach ($telcos as $telco) {
            echo sprintf("<option>%s</option>", $telco["name"]);
        }
        return $telcos;
    }

}
