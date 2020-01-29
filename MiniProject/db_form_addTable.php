<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>db_form_addTable</title>

</head>


<body>

    <?php
        include('connectPJ.php');

        //เช็คว่า เพิ่มค่าอะไรไปในตัวแปรใน db ใดบ้าง
        //echo'<prev>';
        //print_r($_POST);
        //echo'<prev>';
        //exit();
        
        
        

        //ประกาศตัวแปรเพื่อเก็บค่า
        $cusUsername = $_POST["cusUsername"];
        $cusPassword = $_POST["cusPassword"];

        //เพิ่มไปในฐานข้อมูล
        $sql = "INSERT INTO customer(cusTel, cusAddress, firstName, lastName, cusUsername, cusPassword, cusEmail)
                VALUES ('-','Jazz s House','Jazz s House','Jazz s House', '$cusUsername','$cusPassword','-')";
        $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql ".mysqli_error($connectData));
        
        //เช็คว่า my sql code ว่า insert ถูกต้องไหม
        //echo'<prev>';
        //echo $sql;
        //echo'<prev>';
        //exit();
        //ปิดการเชื่อมต่อ db
        mysqli_close($connectData);

        //JS แสดงข้อความเมื่อบันทึกเรียบร้อย และกระโดดไปหน้าฟอร์ม
        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('Add Table succesful');";
            echo "window.location = 'cuspage.php';";
            echo "</script>";
        }
    ?>


</body>
</html>