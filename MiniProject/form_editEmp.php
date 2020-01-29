<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form_editMenu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
<?php 
    include('connectPJ.php');
    
    $ID = $_GET['ID'];
    //query ข้อมูลจากตาราง menu 
    $sql = "SELECT * FROM employees,belongto,departments
    WHERE employees.empID=belongto.empID AND departments.deptID = belongto.deptID";
    $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql " . mysqli_error($connectData));
    $row = mysqli_fetch_array($result);
    extract($row);
    
    //echo $sql;
    //exit;
    //echo'<prev>';
    //print_r($row);
    //echo'<prev>';
    //exit;

    //การไม่แสดงข้อมูลเก่าในรายการ select
    $deptID = $row['deptID'];
    //echo $Menu_Catalog;
    //exit;


    

    //query ข้อมูลจากตาราง menu type
    $query = "SELECT * FROM departments WHERE deptID!=$deptID";//ไม่แสดงข้อมูลเก่าในรายการ select
    $result2 = mysqli_query($connectData, $query) or die ("Error in query: $sql " . mysqli_error($connectData));
    //echo $sql;
    
    //echo'<prev>';
    //print_r($row);
    //echo'<prev>';
?>

<h3>Edit employee<br><br></h3>
<form action="db_form_editEmp.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="fistNameEmp" class="form-control" id="exampleInputEmail1" placeholder="First Name" value="<?php echo $row['fistNameEmp']; ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="lastNameEmp" class="form-control" id="exampleInputEmail1" placeholder="Last Name" value="<?php echo $row['lastNameEmp']; ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" name="empTel" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" value="<?php echo $row['empTel']; ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="empAddress" class="form-control" id="exampleInputEmail1" placeholder="Address" value="<?php echo $row['empAddress']; ?>" required>
        </div>

        <div class="form-group">
           <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control" name="typeEmp" id="exampleFormControlSelect1"  required>
                <option value="<?php echo $row['typeEmp']; ?>"><?php echo $row['typeEmp']; ?></option>
                <option value="">select Type</option>
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
            </select>
        </div>

        <input type="hidden" name="empID" value="<?php echo $row['empID']; ?>">
        
    <div class="form-group">
        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'employeePage.php';">Cancle</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
