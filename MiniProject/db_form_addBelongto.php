<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>db_form_addEmp</title>

</head>


<body>

    <?php
        include('connectPJ.php');

        //เช็คว่า เพิ่มค่าอะไรไปในตัวแปรใน db ใดบ้าง
        //echo'<prev>';
        //print_r($_POST);
        //echo'<prev>';
        //exit();
        
        
        

        //ประกาศตัวแปรเพื่อเก็บค่าที่ส่งมาจาก form_addEmp.php
        $deptID= $_POST['deptID'];
        //$deptID = $_POST['deptID'];
        $empID = $_POST["empID"];
        $startDate = $_POST["startDate"];
        $statusEmp = $_POST["statusEmp"];
        $now = date("Y-m-d");
        
        //เช็คว่ามีการเพิ่มซ้ำหรือไม่
        $check="SELECT empID,deptID FROM belongto WHERE empID ='$empID' AND deptID ='$deptID'";
        $result1=mysqli_query($connectData, $check) or die(mysqli_error($connectData));
        
        //นับว่ามีชื่อในรายการสินค้าหรือยัง
        $num=mysqli_num_rows($result1);
        if($num>0)
        {
            echo "<script>";
            echo "alert('Repeat information, Please add the information again.');";
            echo "window.location = 'deptPage.php?ID=$deptID&act=addemp';";
            echo "</script>";
        }else if($startDate<$now){//วันเริ่มน้อยกว่าวันปัจจุบัน ให้กรอกใหม่
            echo "<script type='text/javascript'>";
            echo "alert('Error! Please check date');";
            echo "window.location = 'deptPage.php?ID=$deptID&act=addemp';";
            echo "</script>";
        }else{   

        //เพิ่มไปในฐานข้อมูล
        $sql = "INSERT INTO belongto (empID,deptID,startDate,statusEmp) 
            VALUES('$empID','$deptID','$startDate','$statusEmp')";
        $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql ".mysqli_error($connectData));

        //เช็คว่า mysql code insert ถูกต้องไหม
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
            echo "alert('Add information succesful');";
            echo "window.location = 'deptPage.php?ID=$deptID&act=view';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Error!');";
            echo "window.location = 'belongtoPage.php?act=add';";
            echo "</script>";
        }
    ?>


</body>
</html>