<?php



abstract class ShopProductWriter
{


    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }





    abstract public function write(): void;

}



class TextProductWriter extends ShopProductWriter
{

    public function write(): void
    {
        $str = "ТОВАРЫ:\n";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }
        print $str;
    }



}


class NewProductWriter extends ShopProductWriter
{
    public function write(): void
    {

        print_r($this->products);
    }
}



class StaticExemple
{
    public static int $aNum = 10;
    public static function sayHi()
    {
        print 'Hello world';
    }
}


class StaticExemple2
{
    public static int $aNum2 = 22;
    public static function sayHi()
    {
        self::$aNum2++;

        print "Hello " . self::$aNum2 . ' number';
    }
}

