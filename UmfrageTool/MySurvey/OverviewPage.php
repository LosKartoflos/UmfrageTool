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
				<div class='subnav'>
				<a class='btn btn-primary' href='index.php?p=login'>login</a>
				</div>
				<h2>Hier ist eine Liste aller Umfragen:</h2>
				<table class='table table-striped table-bordered'>
				";
		$query=self::query("select * from tbl_umfragen");
		$num=0;
		$schalter=false;
		foreach ($query as $row) {
			$ret.=  "
			<tr>
			<td><i class='icon-inbox'></i>&nbsp;<a href='index.php?p=submissons&thread=$row[0]'>$row[1]</a></td>
			</tr>
			";
		}
		$ret.= '</table>';
		return $ret;
	}

}
?>