<?
abstract class Template {

abstract protected function printMiddleSection();

public function render() {
?>
<html>
	<head>
		<title>Buy Topups</title>
		<link rel="stylesheet" href="style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel|Telex' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js.js"></script>
	</head>
	<body>
		<div id=mainwrapper>
		<div id=top >
			<img src=topup.png></img>
			<div id=topright>	
				<a href="about.html">About</a>
				<a href="support.html">Support</a>
			</div>
		</div>
		<div id=middle">
			<? echo $this->printMiddleSection()?>
		</div>
		</div>
	</body>
</html>
<? }
}
