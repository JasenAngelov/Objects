<?php
class Shop {
	public $cars;
	public $money;
	public function __construct($car) {
		if (is_object ( $car ) && get_class ( $car ) === 'Car') {
			$this->cars [] = $car;
		}
	}
	public function addCars($array) {
		if (is_array ( $array )) {
			for($in = 0; $in < count ( $array ); $in ++) {
				if (is_object ( $array [$in] ) && get_class ( $array [$in] ) === 'Car') {
					$this->cars [] = $array [$in];
				}
			}
		} else {
			if (is_object ( $array ) && get_class ( $array ) === 'Car') {
				$this->cars [] = $array;
			}
		}
	}
	public function getNextCar() {
		session_start ();
		if (! isset ( $_SESSION ['in'] )) {
			$_SESSION ['in'] = 0;
			$in = $_SESSION ['in'];
		}
		$in = $_SESSION ['in'];
		$_SESSION ['in'] ++;
		if (isset ( $this->cars [$in] )) {
			
			return $this->cars [$in];
		} else {
			
			session_destroy ();
		}
	}
	public function sellNextCar($buyer) {
		if (is_object ( $buyer ) && get_class ( $buyer ) === 'Person') {
			$car = $this->getNextCar ();
			if (isset ( $car )) {
				$buyer->buy_car ( $car );
				$this->money += $car->price;
				$this->removeCar($car);
			}
		}
	}
	private function removeCar($car){
		$cars = $this->cars;
		for ($in = 0; $in < count($cars); $in++){
			if ($cars[$in] === $car){
				unset($this->cars[$in]);
			}
		}
	}
}



