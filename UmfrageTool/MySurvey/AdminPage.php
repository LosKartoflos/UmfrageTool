<?php 
namespace MySurvey;//Test hallo neue Version 2

class AdminPage extends lib\HomePage {
	use lib\DataBase;

	/*
	 * Beim Neuladen auswerten
	 */
	protected function init(){
		session_start();
		$rows=self::query("select * from tbl_threads");
		$toDelete=[];//Leer
		foreach ($rows as $row){
			$id=$row['id'];
			if (isset($_POST["del$id"])){//Eintrag Loeschen
			error_log("ID:".$id);
				array_push($toDelete,$id);
			}
		}
		//Alle raus
		foreach ($toDelete as $id) {
			self::query("delete from tbl_threads where ID = '$id'");
			self::query("delete from tbl_beitraege where thread_ID = '$id'");
		}
		
		if (isset($_POST["newthread"])){//Neuer Eintrag
			$val=trim(mysql_real_escape_string ($_POST["newthread"]));
			if ($val!="")
				self::query("insert into tbl_threads values (NULL,'$val')");
		}
	}

	/*
	 * Ausgabe
	 */
	protected function body(){
		$ret='';
		if (!isset($_SESSION['loggedin'])) {
			die ("<div id='meldung'>Bitte anmelden!</div>");
		}
		
		$ret.= "
<div class='subnav'>
<a class='btn btn-primary' href='index.php'>&Uuml;bersicht</a>
</div>
<h2>Umfragen-Verwaltung</h2>
		";
		
		$rows=self::query("select * from tbl_umfragen");
		$ret.='
<form action="index.php?p=admin" method="post">
<table class="table table-striped table-bordered">
 		'; 	
		foreach ($rows as $row) {
			$ret.= "
<tr>
<td>$row[name]</td>
<td><input class='btn btn-default' type='button' value=' Bearbeiten ' /></td>
<td align='right'>L&ouml;schen?</td>
<td><input type='checkbox' name='del$row[id]' value='$row[id]'></td>
</tr>
			";
		}
		$ret.= '
</table>
<label>Neue Umfrage</label>
<input name="newthread" type="text" size="40" maxlength="90"/>
<input class="btn btn-success" type="submit" value=" Absenden " />
<input class="btn btn-warning" type="reset" value=" Abbrechen" />

</form>
		';
		return $ret;
	}
}
?>