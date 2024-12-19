<?php

include_once './trait.php';



interface Chargeable
{
    public function getPrice(): float;
}


class ShopProduct implements Chargeable
{

   

    use PriceUtilites, IdentyTrait;

    const AVAILABLE = 0;
    const OUT_OF_STOCK = 1;

    private int|float $discount = 0;
    private int $id = 0;



    public function __construct(
        private string $title,
        private string $firstName,
        private string $mainName,
        protected float $price,

    ) { {
        }
    }


    public function getSummaryLine(): string
    {
        $base = "{$this->title} ( {$this->mainName},";
        $base .= "{$this->firstName} )";

        return $base;
    }


    public function getProducer(): string
    {
        return $this->firstName . ' ' . $this->mainName;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getDiscount(): int|float
    {
        return $this->discount;
    }

    public function setDiscount(int $num)
    {
        $this->discount = $num;
    }




    public function getProducerFirstName(): string
    {
        return $this->firstName;
    }

    public function getProducerMainName(): string
    {
        return $this->mainName;
    }

    public function getPrice(): float
    {
        // return ($this->price - $this->discount);
        return $this->price;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {

        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }


        if ($row['type'] == 'book') {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['numpages']

            );
        } elseif ($row['type'] == 'cd') {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float) $row['price']
            );
        }

        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);

        return $product;

    }

}





class CDProduct extends ShopProduct
{




    public function __construct(string $title, string $firstName, string $mainName, float|int $price, private int $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);

    }


    public function getPlayLength(): int
    {
        return $this->playLength;
    }
    public function getSummaryLine(): string
    {

        $base = parent::getSummaryLine();
        $base .= ": Время звучания - {$this->playLength}";
        return $base;
    }


    public function cdInfo(CDProduct $prod): int
    {
      return   $length = $prod->getPlayLength();
    }


}


class BookProduct extends ShopProduct
{



    public function __construct(string $title, string $firstName, string $mainName, float $price, private int $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);

    }





    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }


    public function getSummaryLine(): string
    {

        $base = parent::getSummaryLine();
        $base .= ": {$this->numPages} стр.";
        return $base;
    }




}


class Shiping implements Chargeable
{
    public function __construct(private float $price)
    {

    }

    public function getPrice(): float
    {
        return $this->price;
    }
}