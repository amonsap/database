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
    <title>form_editDept</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<body>
<?php 
    include('connectPJ.php');
    $deptID = $_GET['ID'];
    $empID = $_GET['empID'];
    //echo $deptID;
    //echo $empID;
    //query ข้อมูลจากตาราง: 
    $query = "SELECT * FROM belongto WHERE deptID = $deptID AND empID = $empID";
    $result = mysqli_query($connectData, $query) or die ("Error in query: $query " . mysqli_error($connectData));
    $row = mysqli_fetch_array($result);
    extract($row);
    //echo $query;

?>
<h3>Edit status of employee<br><br></h3>
<form action="db_form_editEmpstatus.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" name="statusEmp" class="form-control" id="exampleInputEmail1" placeholder="Status"
        value="<?php echo $row['statusEmp']; ?>">
    </div>
    <input type="hidden" name="empID" value="<?php echo $row['empID']; ?>">
    <input type="hidden" name="deptID" value="<?php echo $row['deptID']; ?>">
    <div class="form-group">
        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'deptPage.php?ID=<?php echo $deptID;?>&act=view';">Cancle</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
