<?php
include "connectPJ.php";

$m = $_GET["month"];
$data = "SELECT * from bills WHERE billsDate like '$m%'";
$q = $connectData->query($data);
$row = mysqli_fetch_all($q, MYSQLI_ASSOC);

//print_r($row);
echo json_encode($row, JSON_UNESCAPED_UNICODE);
?>