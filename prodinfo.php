<?php
require "main.php";
$obj = new db();
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
        Enter Product name <span style="color: red;">*</span> <input type="text" name="pname" required><br>
        Enter Product Qty :-  <input type="number" name="qty"><br>
        Enter Product Price :-  <input type="text" name="price"><br>
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

    $r = $obj->save_productinfo($a,$b,$c);

    if($r>0)
    {
        echo "product info are saved";
    }
}

?>

<?php
$r = $obj->display();
// print_r($r);

echo "<table border=1>";
echo "<tr> <td>Product Id</td> <td> Product Name </td><td>Qty</td><td>Price</td><tr>";
foreach($r as $row)
{
    echo "<tr>";
    echo "<td>". $row["pid"] . "</td>";
    echo "<td>". $row["pname"] . "</td>";
    echo "<td>". $row["qty"] . "</td>";
    echo "<td>". $row["price"] . "</td>";
    echo "<td><a href=update.php?pid=".$row['pid']."> Update</a></td>";
    echo "</tr>";
   
}
echo "</table>";

?>

</html>