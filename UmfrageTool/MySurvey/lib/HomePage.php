<?php
namespace MySurvey\lib;

//require_once ('lib/DataBase.php');

abstract class HomePage {

	protected $name;

	//Ueberschreiben
	abstract protected function body();

	abstract protected function init();

	function __construct($name) {
		$this->name=$name;
	}
	protected function head(){
		return '
				<!DOCTYPE html>
				<html lang="de">
				<head>
				<!--[if lt IE 9]>
				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
				<![endif]-->
				<title>'.$this->name.'</title>
						<link rel="stylesheet" type="text/css" href="lib/style.css" />
						</head>
						<body>
						<div class="container">
						<header  id="overview" class="hero-unit">
						<h1>My Survey</h1>
						<p class="lead">Das Instant-Umfrage-Tool</p>
						</header>
						<section>
						';
	}

	protected function tail(){
		return '
				</section>
				<footer>
				<p>&copy; '.date("Y").' by Sebastian Gritzbach & Simon Walther</p>
				</footer>
				</div>
				</body>
				</html>
				';
	}
	public function display(){
		$msg= $this->init();
		echo $this->head();
		echo $msg;
		echo $this->body();
		echo $this->tail();
	}
}
?>