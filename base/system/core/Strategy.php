<?php
namespace system\core;

use system\my\TrainStrategy;
class Strategy{
	
	private $_strategy = null;
	
	public function __construct(TrainStrategy $travel){
		$this->_strategy = $travel;
	}
	
	public function setTravelStrategy(TrainStrategy $travel){
		$this->_strategy = $travel;
	}
	
	public function travel(){
		return $this->_strategy->travelAlgorithm();
	}
}