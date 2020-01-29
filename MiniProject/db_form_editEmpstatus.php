<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form_editDept</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<body>
<?php 
    include('connectPJ.php');
    //เช็คว่า ค่าอะไรถูกส่งมาบ้าง
        //echo'<prev>';
        //print_r($_POST);
        //echo'<prev>';
        //exit();

        //ประกาศตัวแปรเพื่อเก็บค่า
        $deptID = $_POST["deptID"];
        $empID = $_POST["empID"];
        $statusEmp = $_POST["statusEmp"];

    
        //แก้ไขข้อมูล
        $sql2 = "UPDATE belongto SET statusEmp='$statusEmp' WHERE empID=$empID AND deptID=$deptID";
        $result2 = mysqli_query($connectData, $sql2) or die ("Error in query: $sql2 ".mysqli_error($connectData));

        //ปิดการเชื่อมต่อ db
        mysqli_close($connectData);

        //JS แสดงข้อความเมื่อบันทึกเรียบร้อย และกระโดดไปหน้าฟอร์ม
        if($result2){
            echo "<script type='text/javascript'>";
            echo "alert('Edit succesful');";
            echo "window.location = 'deptPage.php?ID=$deptID&act=view';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Error!');";
            echo "window.location = 'deptPage.php?ID=$deptID&act=view';";
            echo "</script>";
        }
?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
