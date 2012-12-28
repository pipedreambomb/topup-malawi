<?php
error_reporting(-1);

abstract class Page {

// This is the bit that concrete subclasses use to display content.
abstract protected function content();

public function render() {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Buy Topups</title>
		<link rel="stylesheet" href="../css/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel|Telex' rel='stylesheet' type='text/css'>

		<!-- Bootstrap -->
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- JavaScript scripts -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="../js/bootstrap.js"></script>
	</head>
	<body>
		<div id="mainwrapper" class="container">
			<div id=top class="masthead">
				<ul class="nav nav-pills pull-right">
				  <li id="HomeButton"><a href="../home.php">Home</a></li>
				  <li><a href="../about.php">About</a></li>
				  <li><a href="../support.php">Support</a></li>
				</ul>
				<a href="../home.php"><img src="../img/topup.png"></img></a>
			</div>
			<div id="middle" class="">
				<?php echo $this->content()?>
			</div>
		</div>
	</body>
</html>
<?php }
}
