
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>db_delmenucatalogs</title>

</head>


<body>
    <?php
        include('connectPJ.php');

        //เช็คว่า เพิ่มค่าอะไรไปในตัวแปรใน db ใดบ้าง
        //echo'<prev>';
        //print_r($_GET);
        //echo'<prev>';
        //exit();
        
        
        

        //ประกาศตัวแปรเพื่อเก็บค่า
        $ID = $_GET["ID"];
        
        
        //ลบข้อมูล
        $sql = "UPDATE menus SET Menu_Catalog='25' WHERE Menu_Catalog=$ID";//Menu_Catalog 25 คือ อื่นๆ
        $sql2 = "DELETE FROM menucatalogs WHERE menucatalog_id=$ID"; 
        


        $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql ".mysqli_error($connectData));
        $result2 = mysqli_query($connectData, $sql2) or die ("Error in query: $sql2 ".mysqli_error($connectData));
        
        //เช็ค my sql code
        //echo'<prev>';
        //echo $sql;
        //echo'<prev>';
        //exit();
        
        //ปิดการเชื่อมต่อ db
        mysqli_close($connectData);

        //JS แสดงข้อความเมื่อบันทึกเรียบร้อย และกระโดดไปหน้าฟอร์ม
        if($result){
            echo "<script type='text/javascript'>";
            //echo "alert('Add menu succesful');";
            echo "window.location = 'menuTypepage.php';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Error!');";
            echo "window.location = 'menuTypepage.php';";
            echo "</script>";
        }
    ?>


</body>
</html>