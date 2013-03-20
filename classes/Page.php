<?php /*
* Copyright 2013 George Nixon
* 
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
*   http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/ ?>
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
		<link rel="stylesheet" href="css/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel|Telex' rel='stylesheet' type='text/css'>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- JavaScript scripts -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/lib/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="mainwrapper" class="container">
			<div id=top class="masthead">
				<ul class="nav nav-pills pull-right">
				  <li id="HomeButton"><a href="index.php">Home</a></li>
				  <li><a href="about.php">About</a></li>
				  <li><a href="support.php">Support</a></li>
				</ul>
				<a href="index.php"><img src="img/topup.png"></img></a>
			</div>
			<div id="middle" class="">
				<?php echo $this->content()?>
			</div>
			<div id="bottom">
				<p>Created by George Nixon 2013. Open source, <a href="about.php#open">some rights reserved</a>.</p>
			</div>
		</div>
	</body>
</html>
<?php }
}
