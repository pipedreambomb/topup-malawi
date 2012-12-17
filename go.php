<?
require_once "template.php";

class Go extends Template {

	protected function content(){

?>
<script type="text/javascript" src="js/go.js"></script>
<h1>Order confirmation</h1>

<table class="table">
	<tr>
		<td><strong>Provider:</strong></td>
		<td><?= $_POST['Telco'] ?></td>
	</tr>
	<tr>
		<td><strong>Amount:</strong></td>
		<td><?= $_POST['Amount'] ?>MKw</td>
	</tr>
</table>
<p>You will receive your topup voucher code(s) as soon as we receive payment from PayPal, where you will be redirected after agreeing to our terms and confirming the order. PayPal is a leading financial services provider, securely processing credit card and bank transfers without revealing your personal details or banking information.</p>
<p><strong>Please read this warning, it is important!</strong> As soon as we receive
payment, we will email you the topups in the form of code(s) to type into your phone as usual.
We get these from real scratchcards, so we <strong>cannot give refunds</strong> after we have sent them out, as we are unable to check if you make use of the code(s). All topup codes in our database are carefully verified. Customer satisfaction is our higher priority, so for any other enquiries, please do not hesitate to <a href="support.php">contact us</a>.</p>

<form class="" action="#">
	<div class="form-actions form-inline pull-right">
		<label class="control-label">
			<input type=checkbox name=Accept id=AcceptChk></input>
			I have read and accept these conditions
		</label>
		<input type=submit disabled=true id=Submit class="btn btn-warning"></input>
	</div>
</form>
		<?
	}
}

$page = new Go();
$page->render();
