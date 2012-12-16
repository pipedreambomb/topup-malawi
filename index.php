<?
require_once "template.php";

class Index extends Template {

	protected function printMiddleSection(){

?>
<form action="go.php">
	<h1>I live in Malawi, I use  
		<select>
			<option>Airtel</option>
			<option>TNM</option>
		</select>
	</h1>
	<h1>and I would like to buy
		<select id=amountchooser class=inlinechooser>
		</select>
	   Kwacha airtime.
	<input type=submit value="Ok"></input>
	</h1>
	<p class="center"><a href="#">How does this work?</a></p>
</form>
<?
	}

}

$page = new Index();
$page->render();
