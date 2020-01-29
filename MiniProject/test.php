<?php
 $connectData = new mysqli("localhost","root","","myproject");
    $connectData->set_charset("utf8");
	function create_order_id($connectData){
        $data = "SELECT * FROM orders ORDER BY orderID DESC;";
        $a = $connectData->query($data);
        $row = mysqli_fetch_all($a, MYSQLI_ASSOC);
        //print_r($row);
		if(!empty($row)){
			$order_id = $row[0]['orderID'];
			
			$tmp = explode("OR",$order_id);
			$tmp[1] += 1;
			$tmp[1] = str_pad($tmp[1], 3, '0', STR_PAD_LEFT);
			$order_id = "OR".$tmp[1];
			
			return $order_id;
		}else{
			return "OR001";
		}
    }
    $orderid = create_order_id($connectData);
?>