<?php


include_once './shopProduct.php';
include_once './class1.php';

include_once './test/test_user.php';




error_reporting(-1);


$write = new TextProductWriter;
$new_write = new NewProductWriter;

$p1 = new CDProduct('my musix', 'Mylene', 'Farmer', 123, 320);

$p2 = new BookProduct('Маша и медведи', 'Ivan', 'Ivanov', 500, 99);

$p3 = new CDProduct('Lolita', 'Alizee', 'Jocotey', 700, 120);







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP объекты, шаблоны и методики программирования</title>
</head>

<body>



    </div>

    <h1><?php




    ?></h1>
    <hr>

    <div class="">

        <?php


        // echo $p1->getPrice();


        ?>


    </div>

    <hr>

    <?php



    $write->addProduct($p1);
    $write->addProduct($p2);
    $write->addProduct($p3);

    // $new_write->addProduct($p1);
    // $new_write->addProduct($p2);
    // $new_write->addProduct($p3);
     // $new_write->write();

    $write->write();
    echo '<br/>';

    echo $p1->generateID();
    echo '<br/>';
    echo $p2->calculateTax(122)





        ?>

    <hr>

    <?php






    ?>


</body>

</html>