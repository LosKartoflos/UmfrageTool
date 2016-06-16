<?php 
namespace MySurvey;


class SurveyPage extends lib\HomePage {
	use lib\DataBase;
	protected function init(){
		session_start();
		
	}
	protected function body(){
		$ret='';
		var_dump($_POST);
		$pin=$_POST['surveypin'];
		var_dump($pin);
		$rows=self::query("select * from survey_$pin");
		$ret.='
<form action="index.php?p=survey" method="post">
<table class="table table-striped table-bordered">
 		'; 	
		foreach ($rows as $row) {
			$ret.= "
<tr>
<td>$row[Question]</td>
<td><input type='radio' name='$row[id]' value='Answer_1' $row[Answer_1]>   $row[Answer_1]</td>
<td><input type='radio' name='$row[id]' value='Answer_2' $row[Answer_2]>   $row[Answer_2]</td>
<td><input type='radio' name='$row[id]' value='Answer_3' $row[Answer_3]>   $row[Answer_3]</td>
<td><input type='radio' name='$row[id]' value='Answer_4' $row[Answer_4]>   $row[Answer_4]</td>


			";
		}
		$ret.= '
</table>
<input class="btn btn-success" type="submit" value=" Absenden " />
<input class="btn btn-warning" type="reset" value=" Abbrechen" />

</form>
		';
		return $ret;
		
		$ret.= "
		<p>Survey Page</p>";
		return $ret;
	}

}
?>