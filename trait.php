<?php



trait PriceUtilites
{
    private $taxrate = 20;


    public function calculateTax(float $price): float
    {

        return ($this->taxrate / 100) * $price;


    }
}


trait IdentyTrait
{
    public function generateID():string
    {
        return uniqid();
    }
}

