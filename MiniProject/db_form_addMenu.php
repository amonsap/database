
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
        $Menu_Name_Tha = $_POST["Menu_Name_Tha"];
        $Menu_Name_Eng	= $_POST["Menu_Name_Eng"];
        $Menu_Price = $_POST["Menu_Price"];
        $Menu_Imge = $_POST["Menu_Imge"];
        $Menu_Statu = $_POST["Menu_Statu"];

        //upload รูปภาพ
        //-สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
        /*$date1 = date("Ymd_His");
        $numrand=(mt_rand());
        $Menu_Imge = (isset($_POST['Menu_Imge']) ? $_POST['Menu_Imge'] : '');
        $upload=$_FILES['Menu_Imge']['name'];
        
        //ถ้ามีการอัพโหลดไฟล์ คือ $upload ไม่ใช่ค่าว่าง
        if($upload !='')
        {
            $path="mimg/";//Folder ที่เก็บไฟล์
            $type=strrchr($_FILES['Menu_Imge']['name'],".");//ตัดชื่อกับนามสกุลแยกออกจากกกัน เหลือแค่นามสกุลไฟล์
            $newname = $numrand.$date1.$type;//ตั้งชื่อไฟล์ใหม่จากตัวเลขที่สุ่ม ตัวเลข+วันที่
            $path_copy=$path.$newname;
            $path_link="mimg/".$newname;

            //คัดลอกไฟล์ไปยัง Folder
            move_uploaded_file($_FILES['Menu_Imge']['tmp_name'],$path_copy);
        }*/

        //เช็คว่ามีการเพิ่มซ้ำหรือไม่
        $check="SELECT Menu_Name_Tha FROM menus WHERE Menu_Name_Tha='$Menu_Name_Tha'";
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
        $sql = "INSERT INTO menus (Menu_Catalog,Menu_Name_Tha,Menu_Name_Eng,Menu_Price,Menu_Imge,Menu_Statu) 
                VALUES('$Menu_Catalog','$Menu_Name_Tha','$Menu_Name_Eng','$Menu_Price','$Menu_Imge','$Menu_Statu')";
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
            echo "window.location = 'menupage.php';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Error!');";
            echo "window.location = 'menupage.php?act=add';";
            echo "</script>";
        }
    ?>


</body>
</html>