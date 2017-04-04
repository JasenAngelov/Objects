<?php
class Model {
	public $name;
	public $type;
	public $topSpeed;
	public $price;
	public function __construct($name, $type, $topSpeed, $price) {
		if (is_numeric ( $topSpeed) && is_numeric ( $price ) && $topSpeed > 0 && $price > 0 ) {			
			$this->name = $name;
			$this->type = $type;
			$this->topSpeed = $topSpeed;
			$this->price = $price;
		}
	}
}
;