<?php

// echo $_GET['pid'];
$a = $_GET['pid'];
require "main.php";
$obj = new db();
$r = $obj->displayproduct($a);
// print_r($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post">
        Enter Product name <span style="color: red;">*</span> <input type="text" name="pname" required  value="<?php echo $r['pname'] ?>"><br>
        Enter Product Qty :-  <input type="number" name="qty"  value="<?php echo $r['qty'] ?>"><br>
        <input type="hidden" name="pid" value="<?php echo $r['pid'] ?>">
        Enter Product Price :-  <input type="text" name="price"  value="<?php echo $r['price'] ?>"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

<?php

if(isset($_REQUEST['submit']))
{
    $pname = $_REQUEST['pname'];
    $qty = $_REQUEST['qty'];
    $price = $_REQUEST['price'];
    $pid = $_REQUEST['pid'];

    $r = $obj->updateproduct($pname, $qty, $price, $pid);
    if($r >0)
    {
        header("location:prodinfo.php");
    }
}
?>

</html>