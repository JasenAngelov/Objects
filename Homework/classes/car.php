<?php
class Car {
	public $name;
	public $model;
	public $type = null;
	public $color;
	public $maxSpeed = null;
	public $price = null;
	public $owner = null;
	public function __construct($name, $model, $color) {
		$this->color = $color;
		$this->name = $name;
		if (is_object ( $model )) {
			if (property_exists ( $model, 'name' )) {
				$this->model = &$model->name;
			}
			
			if (property_exists ( $model, 'topSpeed' )) {
				$this->maxSpeed = &$model->topSpeed;
			}
			if (property_exists ( $model, 'type' )) {
				$this->type = &$model->type;
			}
			if (property_exists ( $model, 'price' )) {
				$this->price = &$model->price;
			}
		}
	}
	public function compare_price($car) {
		if (is_object ( $car )) {
			$price = $car->price;
			$result = ($this->price > $price) ? $this->name : $car->name;
			
			echo $result . " e po-skypa!";
		}
	}
	public function price_for_scrap() {
		$coef = 0.2;
		if (strtolower ( $this->color ) === 'white' || strtolower ( $this->color ) === 'black') {
			$coef += 0.05;
		}
		if (strtolower ( $this->type ) === 'sport') {
			$coef += 0.05;
		}
		
		return $this->price * $coef;
	}
}
;