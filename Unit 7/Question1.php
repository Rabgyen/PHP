<?php

// Parent Class
class Vehicle {
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getDetails() {
        return "Brand: $this->brand, Model: $this->model, Year: $this->year";
    }

    public function start() {
        return "Vehicle is starting.";
    }
}

// Child Class: Car
class Car extends Vehicle {
    private $numberOfDoors;

    public function __construct($brand, $model, $year, $numberOfDoors) {
        parent::__construct($brand, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function getCarDetails() {
        return $this->getDetails() . ", Doors: $this->numberOfDoors";
    }

    public function start() {
        return "Car engine is starting.";
    }
}

// Child Class: Motorcycle
class Motorcycle extends Vehicle {
    private $hasCarrier;

    public function __construct($brand, $model, $year, $hasCarrier) {
        parent::__construct($brand, $model, $year);
        $this->hasCarrier = $hasCarrier;
    }

    public function getMotorcycleDetails() {
        $carrier = $this->hasCarrier ? "Yes" : "No";
        return $this->getDetails() . ", Carrier: $carrier";
    }

    public function start() {
        return "Motorcycle engine is starting.";
    }
}

// Usage
$car = new Car("Toyota", "Corolla", 2022, 4);
$bike = new Motorcycle("Yamaha", "R15", 2021, false);

echo $car->getCarDetails();
echo "<br>";
echo $car->start();

echo "<br><br>";

echo $bike->getMotorcycleDetails();
echo "<br>";
echo $bike->start();

?>
