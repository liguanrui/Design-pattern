<?php
namespace system\my;

use system\core\My\TraveStrategy;
class TrainStrategy implements TraveStrategy{
	
	public function travelAlgorithm(){
		echo "travel by Train","<br>\r\n";
	}
}