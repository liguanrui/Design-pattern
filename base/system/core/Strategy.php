<?php
namespace system\core;

use system\core\my\TraveStrategy;
class Strategy{
	
	private $_strategy = null;
	
	public function __construct(TraveStrategy $travel){
		$this->_strategy = $travel;
	}
	
	public function setTravelStrategy(TraveStrategy $travel){
		$this->_strategy = $travel;
	}
	
	public function travel(){
		return $this->_strategy->travelAlgorithm();
	}
}