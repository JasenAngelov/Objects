<?php
class Person {
	public $name;
	public $age;
	public $sex;
	public $money;
	public $car = null;
	public $friends = 'Pending...';
	public function __construct($name, $age, $sex, $money) {
		$this->name = htmlentities ( $name );
		
		if (is_numeric ( $age ) && $age > 0) {
			$this->age = $age;
		}
		if ($sex === 'M' || $sex === 'F') {
			$this->sex = $sex;
		}
		if (is_numeric ( $money ) && $money > 0) {
			$this->money = $money;
		}
	}
	public function buy_car($car) {
		if (is_object ( $car ) && get_class ( $car ) === 'Car') {
			if ($car->price > $this->money) {
				echo "Skapa e!";
			} else {
				$this->car = $car;
				$this->money -= $car->price;
				$car->owner = $this->name;
				echo "Chestito, imash nova kola!!!";
			}
		}
	}
	public function sell_car($person) {
		if (! $this->car === null) {
			$price = $this->car->price * 0.5;
			
			if (is_object ( $person )) {
				if ($person->money >= $price) {
					$person->money -= $price;
					$person->car = $this->car;
					$this->car->owner = $person->name;
					$this->money += $price;
					$this->car = $person->car;
				}
			}
		}
	}
	public function Car_for_scrap(){
		$price = $this->car->price_for_scrap();
		$this->money += $price;
		$this->car->owner = null;
		$this->car = null;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}