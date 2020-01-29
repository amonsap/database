<?php
    $host = "localhost";
    $user = "root";
    $password="";
    $database="food";

    $conn = mysqli_connect($host,$user,$password,$database);
    $conn->set_charset("utf8");
    if(!$conn){
        echo "Error to your connect";
        exit;
    }else{
        echo "Connect success! <br>";
    }
    $sql = "SELECT * FROM fooddetail";
    $result = mysqli_query($conn,$sql);
    echo "show database of food table<br>";
    while ($rs= mysqli_fetch_array($result)) {
        echo $rs["ID"]."<br>";
        echo $rs["name"]."<br>";
        echo $rs["price"]."<br>";
        echo $rs["type"]."<br>";
        }
   
?>