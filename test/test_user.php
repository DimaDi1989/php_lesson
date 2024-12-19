<?php

require_once 'test_Product.php';

class User{


    use Helper;

    public function __construct(string $name, int $age){

        $this->name = $name;
        $this->age = $age;
    }
}
