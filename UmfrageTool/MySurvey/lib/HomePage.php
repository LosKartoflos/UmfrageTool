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
						<header>
							<nav class="top-bar"> 
        						<div class="top-bar__left">
        							<a class="top-bar__nav__item" href="index.php"> LOGO </a>
        						</div>
        						<div class="top-bar__right">
        							<div class="top-bar__nav">
            							<a class="top-bar__nav__item" href="index.php?p=login"> Log in </a>
            							<a class="top-bar__nav__item" href="sign_up.php"> Sign Up </a>
        							</div>    
        						</div>    
        					</nav>
						</header>
						<section>
						';
	}

	protected function tail(){
		return '
				</section>
				<footer>
				<div class="footbar">
				<p>&copy; '.date("Y").' by Sebastian Gritzbach & Simon Walther</p>
				</div>
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