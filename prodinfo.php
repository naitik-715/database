<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Enter Product name :- <input type="text" name="pname"><br>
        Enter Product Qty :-  <input type="number" name="qty"><br>
        Enter Product Price :-  <input type="number" name="price"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

<?php
if(isset($_POST['submit']))
{
    $a = $_POST['pname'];
    $b = $_POST['qty'];
    $c = $_POST['price'];

    // echo $a; 
    // echo $b;
    // echo $c;

    require "main.php";
    $obj = new db();
    $r = $obj->save_productinfo($a,$b,$c);

    if($r>0)
    {
        echo "product info are saved";
    }
}


?>

</html>