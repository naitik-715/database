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

    function display()
    {
        $qry = "select * from pro";
        $stmt = $this->con->prepare($qry);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $r;
    }

    function displayproduct($id)
    {
        $qry = "select * from pro where pid=:pid";
        $stmt = $this->con->prepare($qry);
        $stmt->bindParam(':pid',$id);
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return $r;
    }

    function updateproduct($a, $b, $c, $d)
    {
        // echo $a;
        // echo $b;
        // echo $c;
        // echo $d;
        $qry = "update pro set pname=:a,qty=:b,price=:c where pid=:d";
        $stmt = $this->con->prepare($qry);
        $stmt->bindParam(':a',$a);
        $stmt->bindParam(':b',$b);
        $stmt->bindParam(':c',$c);
        $stmt->bindParam(':d',$d);
        $stmt->execute();
        $r = $stmt->rowCount();
        return $r;
    }

}

?>