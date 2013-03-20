<?php
require_once "classes/Page.php";

class Support extends Page {

	protected function content(){
		?>
		<p>Sorry, this site is a demo, please see <a href="about.php">the About page</a> for more info and contact details of the developer.</p>
		<?php
	}

}

$page = new Support();
$page->render();
