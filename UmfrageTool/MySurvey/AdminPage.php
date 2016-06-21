<?php 
namespace MySurvey;//Test hallo neue Version 2

class AdminPage extends lib\HomePage {
	use lib\DataBase;

	/*
	 * Beim Neuladen auswerten
	 */
	protected function init(){
		session_start();
		$rows=self::query("select * from tbl_umfragen");
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
			self::query("delete from tbl_umfragen where ID = '$id'");
			self::query("delete from tbl_beitraege where thread_ID = '$id'");
		}
		
		if (isset($_POST["newsurvey"])){//Neuer Eintrag
			$val=$_POST["newsurvey"];
			if ($val!="") {
				
				
				// Definieren, dass $options und $hits ein Array ist  
        		$options = array();  
        		$hits = array();  
      
        		// Array mit Werten füllen  
        		for($i=0; $i<4; $i++) {  
          
            	// Überprüfen, welche Felder frei gelassen wurden  
            	if($_POST["option" . $i] != "") {  
          
                $options[] = $_POST["option" . $i];  
                $hits[] = 0;  
            	}  
        		}  
          
        		// Array in String für Datenbank umwandeln  
       			$options = implode(";", $options);  
        		$hits = implode(";", $hits);  	
				
				self::query("insert into tbl_umfragen values (NULL,'$val','$options','$hits')");
				
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
		
		$rows=self::query("select * from tbl_umfragen");
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
<td>$row[name]</td>";

 $row["options"] = explode(";", $row["options"]); 
 for($i=0; $i<4; $i++) {  
      
        $ret.=' <td>' . $row["options"][$i] . '</td>';
      
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
for($i=0; $i<4; $i++) {  
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