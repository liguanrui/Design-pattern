<?php
namespace system\my;

use system\core\My\TraveStrategy;
class AirPlaneStrategy implements TraveStrategy{
	
	public function travelAlgorithm(){
		echo "travel by AirPlane","<br>\r\n";
	}
}