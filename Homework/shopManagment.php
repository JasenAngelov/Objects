<?php

function __autoload($className) {
	$className = strtolower ( $className );
	require_once 'classes/' . $className . '.php';
}
;

$mondeo = new Model ( 'Mondeo', 'Sedan', 220, 42000 );
$ford = new Car ( 'Ford', $mondeo, 'Blue' );
$quatroporte = new Model ( 'Quatroporte', 'Sport', 320, 140000 );
$maserati = new car ( 'Maserati', $quatroporte, 'Black' );
$ivan = new Person ( 'Ivan Ivanov', 23, 'M', 30000 );
$maq = new Person ( 'Maq Manolova', 55, 'F', 340000 );
$mariq = new Person ( 'Mariq Manolova', 50, 'F', 100000 );
$vera = new Person ( 'Vera Verolinova', 20, 'F', 50000 );


$transCapital = new Shop($maserati);
$bravo = new Model('Bravo', 'Hachback', 180, 18000);
$fiat = new Car('Fiat', $bravo, 'Green');

$transCapital->addCars(array($fiat, $ford));



$transCapital->sellNextCar($maq);
echo "<br /><br /><br />";
print_r($transCapital);



?>