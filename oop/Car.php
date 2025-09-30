<?php

namespace oop;

class Car{
    public $make;
    public $model;
    public $year;
    public $color;

    public $status;

    public function __construct(){

    }

    public function print(){
        echo "This car is $this->color, and is $this->status";
    }

    public function forward(){
        $this->status = "moving forward";
    }

    public function parked(){
        $this->status = "moving parked";
    }
}

$tomsCar = new Car();
$tomsCar->color = "Black";
$tomsCar->forward();

$nicksCar = new Car();
$nicksCar->color = "White";
$nicksCar->parked();

$michaelsCar = new Car();
$michaelsCar->color = "Blue";

$tomsCar->print();
$nicksCar->print();