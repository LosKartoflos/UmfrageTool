<?php 
namespace MySurvey;

class SubmissionsPage extends lib\HomePage {
	use lib\DataBase;
	/*
	 * Beim Neuladen auswerten
	*/
	protected function init(){

		if (isset($_POST["new"])){//Neuer Eintrag
			$val=mysql_real_escape_string (trim($_POST["new"])) ;
			if ($val!=""){
				session_start();
				//Entweder nur 1x
				if (isset($_SESSION['posted'.$_GET['thread']])){
					//die ("<div id='meldung'>Es wurde Bereits ein Beitrag gesendet!</div>");
					return '
							<div class="alert">
							<strong>Warnung!</strong> Es wurde Bereits ein Beitrag gesendet!
							</div>
							';
				}else {
					$_SESSION['posted'.$_GET['thread']]=true;
					//TODO: Sollte aber ohne mysql sein, besser: pdo->unquote(...)
					$thrd=mysql_real_escape_string($_GET['thread']);
					self::query("insert into tbl_beitraege values (NULL,'$thrd','$val')");
				}
			}
		}
	}
	/*
	 * Ausgabe
	*/
	
	protected function body(){
		$thrd=mysql_real_escape_string($_GET['thread']);
		$thr=self::query("select name from tbl_umfragen where ID='$thrd'");
		$ret='';
		$ret.= "
		<div class='subnav'>
		<a class='btn btn-primary' href='index.php'>&Uuml;bersicht</a>
		</div>
		<h2>{$thr[0]['name']}</h2>
		";
		$thrd=mysql_real_escape_string($_GET['thread']);
		$rows=self::query("select * from tbl_beitraege where thread_ID='$thrd'");
		$ret.= "
				<table class='table table-striped table-bordered'>
				";
		foreach ($rows as $row) {
			$ret.= "
			<tr>
			<td colspan='2'><i class='icon-envelope'></i>&nbsp;$row[2]</td>
			</tr>
			";
		}
		$ret.= "
		</table>
		<form  class='well' action='index.php?p=submissons&thread=$_GET[thread]' method='post'>
		<label><i class='icon-share'></i>&nbsp;Neuer Beitrag</label><input name='new' type='text'  style='width:100%' maxlength='120'/>
		<input type='submit'  class='btn btn-success' value='Absenden' />
		</form>
		";
		return $ret;
	}
}
?>