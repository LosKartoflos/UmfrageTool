<?php 
namespace MySurvey;


class SurveyPage extends lib\HomePage {
	use lib\DataBase;
	protected function init(){
		
	}
	
	protected function body(){
		session_start();
		if(isset($_POST["surveypin"])){
			$pin=$_POST['surveypin'];}
		else {
			$pin=$_GET['surveypin'];}
		
		//Abfrage, ob schon abgestimmt wurde
		if(isset($_SESSION['survey_'.$pin])){
			$ret='';
			$ret.='
				<div class="middle_of_screen">
						<h1>Sie haben bereits abgestimmt! <br></h1>  
				</div>
				';
				return $ret;
				
		}
		
		else {
		// Wenn abgestimmt wurde -> Datenbankeintrag  
		if(isset($_POST["option"])) {  
			$pin=$_GET['surveypin'];
			
			//Session ID blocken
			$_SESSION['survey_'.$pin] = true;

    		// Bisherige Stimmen aus der Datenbank holen  
    		$data = self::query("select * from tbl_umfragen where id='$pin'"); 
			$data = $data["0"];  

    		// String wieder zurück in ein Array einlesen  
    		$data["hits"] = explode(";", $data["hits"]);  

    		// Die Variable mit der Stimme des Users erhöhen  
    		$data["hits"][$_POST["option"]]++;  
      
    		// Array zurück in String  
    		$data["hits"] = implode(";", $data["hits"]);  
      
    		// Datenbank Update  
    		self::query("UPDATE tbl_umfragen SET hits='" . $data["hits"] . "' WHERE id='$pin'");    
      
    		// Check  
 			$ret='';
			$ret.='
			<div class="middle_of_screen">
					<h1>Vielen Dank für deine Teilnahme! <br></h1>
					<h3>Deine Stimme wurde gewertet!</h3>  
			</div>
			';
			return $ret;	
			
		}
		
		//Wenn nicht, Abstimmung!
		else{
			$ret='';
			$pin=$_POST['surveypin'];
			$rows=self::query("select * from tbl_umfragen where id='$pin'");
			
			//Abfrage, ob Umfrage existiert
			if(isset($rows['0'])){
			
				//Abfrage, ob Umfrage aktiv
				$rows_array=$rows['0'];
				if($rows_array['active']==true) {
				
					//Wenn ja, dann Abstimmung!
					$ret.='
						<form action="index.php?p=survey&surveypin='. $pin .'" method="post">
						<table class="table table-striped table-bordered">
 						'; 	


					foreach ($rows as $row) {
						$ret.= "
							<tr>
							<td>$row[name]</td>";
	
 						$row["options"] = explode(";", $row["options"]); 
						for($i=0; $i<count($row["options"]); $i++) {  
      						$ret.=' <td> <input type="radio" name="option" value="' . $i . '"> ' . $row["options"][$i] . ' </td>';
      						}
						$ret.= '
							</table>
							<input class="btn btn-success" type="submit" value=" Vote " />
							<input class="btn btn-warning" type="reset" value=" Abbrechen" />

							</form>
							';
						}
					return $ret;
					}
				
				//Wenn Umfrage nicht aktiv, dann Meldung "Umfrage ist nicht aktiv!"	
				else {
					$ret='';
					$ret.='
						<div class="middle_of_screen">
						<h1>Umfrage ist nicht aktiv!</h1> 
						</div>
						';
					return $ret;
					}	
			}
				
			//Wenn Umfrage nicht existiert, dann Meldung "Umfrage ist nicht aktiv!"	
			else {
				$ret='';
				$ret.='
					<div class="middle_of_screen">
					<h1>Umfrage ist nicht aktiv!</h1> 
					</div>
					';
				return $ret;
				}
				
		}
	}
	}
	
}
?>