<?
require_once "template.php";

class Index extends Template {

	protected function content(){

?>
<script type="text/javascript" src="js/index.js"></script>
<div class="hero-unit">
<form method="post" id=TopupForm action="go.php">
	<h1>I live in Malawi, my phone uses   
		<select id=Telco name=Telco>
			<option>Airtel</option>
			<option>TNM</option>
		</select>
	</h1>
	<h1>and I would like to buy
		<select id=Amount name=Amount>
			<? include "Airtel.htm"; ?>
		</select>
	   Kwacha's worth of airtime topups.
	</h1>
	<p><input type=submit value="Show me the topups!" class="btn btn-large btn-success pull-right"></input></p>
	<p><small><span class='popoverme'>How does it work?</span></small></p>
</form>
</div>
<?
	}

}

$page = new Index();
$page->render();
