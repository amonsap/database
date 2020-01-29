<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>db_form_addmenucatalogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <?php
        include('connectPJ.php');

        ////เช็คว่า เพิ่มค่าอะไรไปในตัวแปรใน db ใดบ้าง
        //echo'<prev>';
        //print_r($_POST);
        //echo'<prev>';
        //exit();

        //ประกาศตัวแปรเพื่อเก็บค่า
        $menucatalog_name = $_POST["menucatalog_name"];

        //เช็คว่ามีการเพิ่มซ้ำหรือไม่
        $check="SELECT menucatalog_name FROM menucatalogs WHERE menucatalog_name='$menucatalog_name'";
        $result1=mysqli_query($connectData, $check) or die(mysqli_error($connectData));
        //นับว่ามีชื่อในรายการสินค้าหรือยัง
        $num=mysqli_num_rows($result1);
        if($num>0)
        {
            echo "<script>";
            echo "alert('Repeat information, Please add the information again.');";
            echo "</script>";
        }else{
            
        //เพิ่มไปในฐานข้อมูล
        $sql = "INSERT INTO menucatalogs (menucatalog_name) 
                VALUES('$menucatalog_name')";
        $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql ".mysqli_error($connectData));
        
        //เช็คว่า my sql code ว่า insert ถูกต้องไหม
        //echo'<prev>';
        //echo $sql;
        //echo'<prev>';
        //exit();
        }
        //ปิดการเชื่อมต่อ db
        mysqli_close($connectData);

        //JS แสดงข้อความเมื่อบันทึกเรียบร้อย และกระโดดไปหน้าฟอร์ม
        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('Add menu succesful');";
            echo "window.location = 'menuTypepage.php';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Error!');";
            echo "window.location = 'menuTypepage.php?act=add';";
            echo "</script>";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $('#DataTable').DataTable();
    </script>

</body>
</html>