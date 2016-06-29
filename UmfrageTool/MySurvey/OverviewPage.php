<?php 
namespace MySurvey;


class OverviewPage extends lib\HomePage {
	use lib\DataBase;
	protected function init(){
		//NIX
	}
	protected function body(){
		$ret='';
		$ret.= "
		<form action='index.php?p=survey' method='post'>
		<div class='survey__pin'>
			
			
			<div class='survey__pin__item'>
			
				<input class='form-control input-lg' name='surveypin' type='text' placeholder=' Survey PIN ' required/>
		
			</div>
			
			<div class='survey__pin__item'>
				<input class='btn btn-success btn-block btn-lg' type='submit' value=' Enter ' />
			</div>
		</div>		
		</form>";
		return $ret;
	}

}
?>