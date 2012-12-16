<?
require_once "template.php";

class Go extends Template {

	protected function content(){

?>
<script type="text/javascript" src="go.js"></script>
<h1>Order confirmation</h1>

<table>
	<tr>
		<td><strong>Provider:</strong></td>
		<td><?= $_POST['Telco'] ?></td>
	</tr>
	<tr>
		<td><strong>Amount:</strong></td>
		<td><?= $_POST['Amount'] ?>MKw</td>
	</tr>
</table>

<p><strong>Please read this warning, it is important!</strong> As soon as we receive
payment, we will send you the topups in the form of codes to type into your phone as usual.
We get these from real scratchcards, and we <strong>cannot give refunds</strong> after we have sent them out, as we have no way of verifying if they are used after this.</p>

<form class=alignright action="#">
	<input type=checkbox name=Accept id=AcceptChk></input>
	<label for=Accept>I have read and accept these conditions</label>
	<input type=submit disabled=true id=Submit></input>
</form>

		<?
	}

}

$page = new Go();
$page->render();
