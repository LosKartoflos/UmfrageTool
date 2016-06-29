<?php
namespace MySurvey;//Test hallo neue Version 2

class AdminPage extends lib\HomePage {
	use lib\DataBase;

	/*
	 * Beim Neuladen auswerten
	 */
	protected function init(){
		session_start();
		$rows=self::query("SELECT * from surveys_gritzbach_walther");
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
			self::query("DELETE from surveys_gritzbach_walther where id = '$id'");
			self::query("DELETE from hits_gritzbach_walther where survey_id = '$id'");
		}

		//Umfrage Aktivieren
		if(isset($_POST["activate"])){
			$activate=$_POST['activate'];
			self::query("UPDATE surveys_gritzbach_walther SET active='1' WHERE id='$activate'");
		}

		//Umfrage Deaktivieren
		if(isset($_POST["deactivate"])){
			$deactivate=$_POST['deactivate'];
			self::query("UPDATE surveys_gritzbach_walther SET active='0' WHERE id='$deactivate'");
		}



		//Neuer Eintrag
		if (isset($_POST["newsurvey"])){
			$val=$_POST["newsurvey"];
			if ($val!="") {

				$option1 = $_POST["option1"];
				$option2 = $_POST["option2"];
				$option3 = $_POST["option3"];
				$option4 = $_POST["option4"];

				self::query("INSERT into surveys_gritzbach_walther values (NULL,'$val','$option1','$option2','$option3','$option4','0')");
				$last_ids=self::query("SELECT * from surveys_gritzbach_walther where question='$val'");
				$last_id=$last_ids["0"]["id"];
				self::query("INSERT into hits_gritzbach_walther values (NULL,'$last_id','0','0','0','0')");
			}
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
<h2>Umfragen-Verwaltung</h2>
		";

		$rows=self::query("SELECT * from surveys_gritzbach_walther");
		$ret.='
<form action="index.php?p=admin" method="post">
<table class="table table-striped">
<tr>
	<th>Survey PIN</th>
	<th>Frage</th>
	<th>Antwort 1</th>
	<th>Antwort 2</th>
	<th>Antwort 3</th>
	<th>Antwort 4</th>
	<th> </th>
</tr>
 		';
		foreach ($rows as $row) {
			$ret.= "
<tr>
<td>$row[id]</td>
<td>$row[question]</td>";

 for($i=1; $i<5; $i++) {

        $ret.=' <td>' . $row["answer_".$i] . '</td>';

    }
if ($row['active']==0){
	$ret.= "
	<td>
	<button class='btn btn-success' type='submit' name='activate' value='$row[id]'><span class='glyphicon glyphicon-off'></span>   Aktivieren</button>
	";
}
else {
	$ret.="
	<td>
	<button class='btn btn-warning' type='submit' name='deactivate' value='$row[id]'><span class='glyphicon glyphicon-off'></span> Deaktivieren</button>
	";
}

$ret.= "

<button class='btn btn-info' type='submit' name='stats' value='$row[id]'><span class='glyphicon glyphicon-stats'></span> Auswerten</button>
<button class='btn btn-danger' type='submit' name='del$row[id]' value='$row[id]'><span class='glyphicon glyphicon-trash'></span> L&ouml;schen</button>


</td>
</tr>
</form>
			";
		}

//Neue Umfrage erstellen
		$ret.= '
<form action="index.php?p=admin" method="post">
<tr>
<th></th>
<th>Neue Umfrage</th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<tr>
<td></td>
<td>
<input name="newsurvey" type="text" size="30" maxlength="90" placeholder="Frage"/>
</td>';
for($i=1; $i<5; $i++) {
            $ret.=" <td><input type='text' name='option" . $i . "' placeholder='Antwort'></td>";

        }

$ret.='
<td>
<button class="btn btn-success" type="submit" value="Absenden"><span class="glyphicon glyphicon-ok"></span> Erstellen</button>
<button class="btn btn-warning" type="reset" value="Abbrechen"><span class="glyphicon glyphicon-remove"></span> Abbrechen</button>

</td>
</tr>
</table>
</form>
		';
		return $ret;
	}
}
?>
