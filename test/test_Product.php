<?php



trait Helper{
    private $name;
    private $age;


    public function getName():string{
        return $this->name;
    }

    public function getAge():int{
        return $this->age;
    }
}

?>