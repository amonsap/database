<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>db_form_addMenut</title>

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
        $Menu_Catalog = $_POST["Menu_Catalog"];
        $menuID = $_POST["menuID"];
        $Promotion_Start = $_POST["Promotion_Start"];
        $Promotion_End = $_POST["Promotion_End"];
        $now = date("Y-m-d");
        

        //เช็คว่ามีการเพิ่มซ้ำหรือไม่
        $check="SELECT menuID FROM promotion_menu WHERE menuID='$menuID'";
        $result1=mysqli_query($connectData, $check) or die(mysqli_error($connectData));
        //นับว่ามีชื่อในรายการสินค้าหรือยัง
        $num=mysqli_num_rows($result1);
        if($num>0)
        {
            echo "<script>";
            echo "alert('Repeat information, Please add the information again.');";
            echo "window.location = 'proPage.php?act=add';";
            echo "</script>";
        }else  if($Promotion_Start>=$now AND $Promotion_End>$now AND $Promotion_Start<$Promotion_End){//ช่วงโปรโมชั่น เริ่มต้องห้ามเกินปัจจุบันและสิ้นสุดห้ามมาก่อนปัจจุบัน และเริ่มห้ามเลยวันสิ้นสุด
            //เพิ่มไปในฐานข้อมูล
            $sql = "INSERT INTO promotion_menu (menuID,Promotion_Start,Promotion_End) 
            VALUES('$menuID','$Promotion_Start','$Promotion_End')";
            $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql ".mysqli_error($connectData));
            //เช็คว่า my sql code ว่า insert ถูกต้องไหม
            //echo'<prev>';
            //echo $sql;
            //echo'<prev>';
            //exit();
        }else{   
            echo "<script type='text/javascript'>";
            echo "alert('Error! Please check date');";
            echo "window.location = 'proPage.php?act=add';";
            echo "</script>";
        }
        
        
        
        //ปิดการเชื่อมต่อ db
        mysqli_close($connectData);

        //JS แสดงข้อความเมื่อบันทึกเรียบร้อย และกระโดดไปหน้าฟอร์ม
        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('Add promotion succesful');";
            echo "window.location = 'proPage.php';";
            echo "</script>";
        }
    ?>


</body>
</html>