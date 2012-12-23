<? 
// telcos helper - print a select box with Telcos from database
require_once('classes/database.php');
?>
<select id=Telco name=Telco>
<?
	$telcos = Database::getTelcos();
	foreach ($telcos as $telco) {
		echo sprintf("<option>%s</option>", $telco); 
	}
?>
</select>
