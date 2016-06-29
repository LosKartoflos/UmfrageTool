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
			$option=$_POST['option'];

			//Session ID blocken
			$_SESSION['survey_'.$pin] = true;

    		// Bisherige Stimmen aus der Datenbank holen
    		$data = self::query("SELECT * FROM hits_gritzbach_walther WHERE survey_id='$pin'");
			$vote=$data['0']['hits_'.$option];

			if($vote!="0"){
				$vote++;

				}
			else {
				$vote=1;
				}


    		// Datenbank Update
    		self::query("UPDATE hits_gritzbach_walther SET hits_$option='" . $vote . "' WHERE survey_id='$pin'");

    		// Ausgabe:Vielen Dank für die Teilnahme!
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
			$rows=self::query("SELECT * FROM surveys_gritzbach_walther WHERE id='$pin'");

			//Abfrage, ob Umfrage existiert
			if(isset($rows['0'])){

				//Abfrage, ob Umfrage aktiv
				$rows_array=$rows['0'];
				if($rows_array['active']==true) {

					//Wenn ja, dann Abstimmung!
					$ret.='
						<form action="index.php?p=survey&surveypin='. $pin .'" method="post">
 						';


					foreach ($rows as $row) {
						$ret.= "
							<div class='answer__array'>
							<div class='answer__array__head'>
								<h1>$row[question]</h1>

							</div>
							";

						for($i=1; $i<5; $i++) {
							if($row["answer_" . $i] != "") {

        						$ret.='
									<div class="answer__array__item">
								 	<button class="btn btn-success btn-block btn-lg" type="submit" name="option" value="' . $i . '">
										' . $row["answer_".$i] . '</button>
									</div>
									';


   							 	}
							}

						$ret.= '
							</div>
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
