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
	   Kwacha airtime.
	</h1>
	<p class="center"><a href="#" id=HowWorks>How does this work?</a><input type=submit value="Go" class="btn btn-success"></input></p>
</form>
</div>
<?
	}

}

$page = new Index();
$page->render();
