<?php

    $connectData = new mysqli("localhost","root","","myproject");
    $connectData->set_charset("utf8");
    
    date_default_timezone_set('Asia/Bangkok');

    //echo date('d/m/Y H:i:s');
    if($connectData->connect_errno){
        die("connection failed".$connectData->connect_error);
       
    }

?>