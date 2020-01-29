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
    //query ข้อมูลจากตาราง menu และ promotion
    $sql = "SELECT * FROM menus as m
    INNER JOIN promotion_menu as p ON m.Menu_Id=p.menuID
    WHERE m.Menu_Id=$ID ";
    $result = mysqli_query($connectData, $sql) or die ("Error in query: $sql " . mysqli_error($connectData));
    $row = mysqli_fetch_array($result);
    extract($row);

    $now = date("Y-m-d");

    //echo $sql;
    //exit;
    //echo'<prev>';
    //print_r($row);
    //echo'<prev>';
    //exit;

    //การไม่แสดงข้อมูลเก่าในรายการ select
    $menuID = $row['menuID'];
    //echo $Menu_Catalog;
    //exit;

    
    
    //echo'<prev>';
    //print_r($row);
    //echo'<prev>';
?>

<h3>Edit Menu<br><br></h3>

    
    <form action="db_form_editPro.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <?php if($Promotion_End<$now AND $Promotion_End<$now){//ถ้าวันเริ่มและสิ้นสุดเลยวันปัจจุบันแล้ว ไม่สามารถแก้ไขวันสิ้นสุดได้?>
        <div class="form-group">
            <p><strong>Start Date : <?php echo $row['Promotion_Start']; ?><strong></p>  
            
        </div>
        <div class="form-group">
            <p><strong>End Date : <?php echo $row['Promotion_End']; ?><strong></p>   
        </div>
            
        <div class="form-group"><!--กรอกช่วงโปรโมชั่นใหม่-->
            <p><strong>New Start Date<strong></p>
            <input type="date" class="form-control" name="Promotion_Start" value="<?php echo $row['	Promotion_Start']; ?>" required>
        </div>
        <div class="form-group">
            <p><strong>New End Date<strong></p>
            <input type="date" class="form-control" name="Promotion_End" value="<?php echo $row['Promotion_End']; ?>" required>    
        </div>
            <input type="hidden" name="menuID" value="<?php echo $row['menuID']; ?>">
            
        <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'proPage.php';">Cancle</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div> 
        

        <?php }else if($Promotion_Start<$now){//ถ้าวันเริ่มเลยวันปัจจุบันแล้ว ไม่สามารถแก้ไขวันเริ่มได้?>
        <div class="form-group">
            <p><strong>Start Date : <?php echo $row['Promotion_Start']; ?><strong></p> 
            
        </div>
        <div class="form-group">
            <p><strong>End Date<strong></p>
            <input type="date" class="form-control" name="Promotion_End" value="<?php echo $row['Promotion_End']; ?>" required>    
        </div>
            <input type="hidden" name="	Promotion_Start" value="<?php echo $row['Promotion_Start']; ?>">
            <input type="hidden" name="menuID" value="<?php echo $row['menuID']; ?>">
            
        <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'proPage.php';">Cancle</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>

        <?php }else{?>
        <div class="form-group">
            <p><strong>Start Date<strong></p>
            <input type="date" class="form-control" name="Promotion_Start" value="<?php echo $row['Promotion_Start']; ?>" required>
        </div>
        <div class="form-group">
            <p><strong>End Date<strong></p>
            <input type="date" class="form-control" name="Promotion_End" value="<?php echo $row['Promotion_End']; ?>" required>    
        </div>

        <input type="hidden" name="menuID" value="<?php echo $row['menuID']; ?>">
            
        <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'proPage.php';">Cancle</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div> 
        <?php } ?>
    </form>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
