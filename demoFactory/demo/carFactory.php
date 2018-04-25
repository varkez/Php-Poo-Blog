<?php

class CarFactory{

    public static function getCar($type){
        $type = ucfirst($type);
        $class_name = "Car$type"; // getCar(4x4) return Car4x4
        return new $class_name();
    }
    
}


?>