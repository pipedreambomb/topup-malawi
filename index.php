<?php
require_once('classes/database.php');
require_once "template.php";

class Index extends Template {

	protected function content(){

		$database = new Database();
?>
<script type="text/javascript" src="js/index.js"></script>

<div class="hero-unit">
<form method="post" id=TopupForm action="go.php">
	<h1>I live in <span class="text-warning">Malawi</span>, my phone uses   
		<select id=Telco name=Telco>
<?php
		// print a select box with Telcos from database
		$telcos = $database->getTelcos();
		foreach ($telcos as $telco) {
			echo sprintf("<option>%s</option>", $telco["name"]); 
		}
?>
		</select>
	</h1>
	<h1>and I would like to buy
		<select id=Amount name=Amount>
<?php
			$denoms = $database->getDenominations($telcos[0]);
			for($i = 1; $i <= 5; $i++) {
				echo sprintf("<option>%s</option>", $denoms[0]["amount"] * $i * $i); 
			}
?>	
		</select>
	   Kwacha's worth of airtime topups.
	</h1>
	<div><button type="submit" class="btn btn-large btn-success pull-right">Send me some topups! <i class="icon-download-alt icon-white"></i></button></div>
	<div><small><span class='popoverme'>How does it work?</span></small></div>
</form>
</div>
<?php
	}

}

$page = new Index();
$page->render();
