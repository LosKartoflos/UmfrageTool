<?php 
namespace MySurvey;//Test hallo neue Version 2

class AdminPage extends lib\HomePage {
	use lib\DataBase;

	/*
	 * Beim Neuladen auswerten
	 */
	protected function init(){
		session_start();
		$rows=self::query("select * from tbl_surveys");
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
			self::query("delete from tbl_surveys where id = '$id'");
			self::query("delete from tbl_hits where survey_id = '$id'");
		}
		
		if (isset($_POST["newsurvey"])){//Neuer Eintrag
			$val=$_POST["newsurvey"];
			if ($val!="") {
				
        		// Daten in Datenbank schreiben  
        		/*for($i=0; $i<4; $i++) {  
          
            	// Überprüfen, welche Felder frei gelassen wurden  
            	if($_POST["option" . $i] != "") {  
          
                $option.$i = $_POST["option" . $i];    
            	}  
        		}   	
				*/
				$option1 = $_POST["option1"];
				$option2 = $_POST["option2"];
				$option3 = $_POST["option3"];
				$option4 = $_POST["option4"];
				
				self::query("insert into tbl_surveys values (NULL,'$val','$option1','$option2','$option3','$option4','0')");
				$last_ids=self::query("select * from tbl_surveys where question='$val'");
				$last_id=$last_ids["0"]["id"];
				self::query("insert into tbl_hits values (NULL,'$last_id','0','0','0','0')");
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
		
		$rows=self::query("select * from tbl_surveys");
		$ret.='
<form action="index.php?p=admin" method="post">
<table class="table table-striped table-bordered">
<tr>
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
<td>$row[question]</td>";

 for($i=1; $i<5; $i++) {  
      
        $ret.=' <td>' . $row["answer_".$i] . '</td>';
      
    }
$ret.= "
<td>L&ouml;schen?    <input type='checkbox' name='del$row[id]' value='$row[id]'/></td>
</tr>
			";
		}
		
//Neue Umfrage erstellen
		$ret.= '
</table>
<label>Neue Umfrage</label></br>
<input name="newsurvey" type="text" size="30" maxlength="90" placeholder="Frage"/>';
for($i=1; $i<5; $i++) {  
            $ret.=" <input type='text' name='option" . $i . "' placeholder='Antwort'>";  
          
        } 

$ret.='		
</br>
<input class="btn btn-success" type="submit" value=" Absenden " />
<input class="btn btn-warning" type="reset" value=" Abbrechen" />

</form>
		';
		return $ret;
	}
}
?>