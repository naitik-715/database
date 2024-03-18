<?php
class db{
    var $con;

    
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=demo';
        $username = 'root';
        $pwd = '';
        $this->con = new PDO($dsn,$username,$pwd); 
    }

    function save_productinfo($a,$b,$c)
    {
        // echo $a;
        // echo $b;
        // echo $c;

        // 1.prepare statement 2.

        $qry = "insert into pro(pname,qty,price) values (:pname,:qty,:price)";
        $stmt = $this->con->prepare($qry);
        $stmt->bindParam(':pname',$a);
        $stmt->bindParam(':qty',$b);
        $stmt->bindParam(':price',$c);


        $stmt->execute();


        $r = $stmt->rowCount();

        return $r;
    }


}

?>