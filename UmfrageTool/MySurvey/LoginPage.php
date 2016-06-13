<?php
namespace MySurvey;

class LoginPage extends lib\HomePage {
    use lib\DataBase;

	/*
	 * Beim Neuladen auswerten
	 */
	protected function init(){
		session_start();
		if (isset($_SESSION['loggedin'])) $this->redir();

		if (isset($_POST["user"]) && isset($_POST["pass"])){//Login?
			$user=trim($_POST["user"]);
			$pass= hash('sha256', trim($_POST["pass"]).lib\salt());//With Salt
			if ($user=='' || $pass=='') return;
			$admins=lib\admins();
			if ($admins[$user] == $pass){//OK
				error_log($user." ".$pass);
				$_SESSION['loggedin']=$user;
				$this->redir();
			}
		}
	}
	/*
	 * Redirect
	 */
	 protected function redir(){
	 	header("Location: index.php?p=admin") ;
	 }

	/*
	 * Ausgabe
	 */
	protected function body(){
		return '
<div class="subnav">
<a class="btn btn-primary" href="index.php">&Uuml;bersicht</a>
</div>
<h2>Login</h2>
<form class="well" action="index.php?p=login" method="post">
	<label>Benutzername:</label>
	<input name="user" type="text" size="20" maxlength="40"/>
	<label>Passwort:</label>
	<input name="pass" type="password" size="20" maxlength="40"/>
    <input class="btn btn-success" type="submit" value=" Login " />
</form>
		';
	}
}
?>
