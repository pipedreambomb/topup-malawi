<?
abstract class Template {

// This is the bit that concrete classes use to do their thing.
abstract protected function content();

public function render() {
?>
<html>
	<head>
		<title>Buy Topups</title>
		<link rel="stylesheet" href="style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel|Telex' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	</head>
	<body>
		<div id=mainwrapper>
			<div id=top >
				<a href="index.php"><img src=topup.png></img></a>
				<div id=topright>	
					<a href="about.html">About</a>
					<a href="support.html">Support</a>
				</div>
			</div>
			<div id=middle>
				<? echo $this->content()?>
			</div>
		</div>
	</body>
</html>
<? }
}
