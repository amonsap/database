
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
    //query ข้อมูลจากตาราง menu เพื่อเรียกดูข้อมูลก่อนแก้ไข
    $sql = "SELECT * FROM menus as m
    INNER JOIN menucatalogs as t ON m.Menu_Catalog=t.menucatalog_id
    WHERE m.Menu_Id=$ID ";
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
    $menucatalog_id = $row['menucatalog_id'];
    //echo $menucatalog_id;
    //exit;


    

    //query ข้อมูลจากตาราง menu type
    $query = "SELECT * FROM menucatalogs WHERE menucatalog_id!=$menucatalog_id";//ไม่แสดงข้อมูลเก่าในรายการ select
    $result2 = mysqli_query($connectData, $query) or die ("Error in query: $sql " . mysqli_error($connectData));
    //echo $sql;
    
    //echo'<prev>';
    //print_r($row);
    //echo'<prev>';
?>

<h3>Edit Menu<br><br></h3>
<form action="db_form_editMenu.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleInputEmail1">Thai Name</label>
        <input type="text" name="Menu_Name_Tha" class="form-control" id="exampleInputEmail1" placeholder="Thai Name" value="<?php echo $row['Menu_Name_Tha']; ?>" required> 
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">English Name</label>
        <input type="text" name="Menu_Name_Eng" class="form-control" id="exampleInputEmail1" placeholder="English Name"  value="<?php echo $row['Menu_Name_Eng'];?>">
    </div>
    
    <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
        <input type="number" name="Menu_Price" class="form-control" id="exampleInputPassword1" placeholder="Price" value="<?php echo $row['Menu_Price']; ?>" required>
    </div>
                    
    <div class="form-group">
    <label for="exampleFormControlSelect1">Type</label>
        <select class="form-control" name="Menu_Catalog" id="exampleFormControlSelect1"  required>
        <option value="<?php echo $row['menucatalog_id']; ?>"><?php echo $row['menucatalog_name']; ?></option>
            <option value="">select type</option>
            <?php foreach($result2 as $results){ ?> <!--$result2 as $results คือการป้องกันไม่ให้เกิดข้อมูลซ้ำ-->
            <option value="<?php echo $results["menucatalog_id"]; ?>"><?php echo $results["menucatalog_name"]; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" name="Menu_Statu" id="exampleFormControlSelect1"  required>
        <option value="<?php echo $row['Menu_Statu']; ?>"><?php echo $row['Menu_Statu']; ?></option><!--เป็นการแสดงข้อมูลเดิมก่อนแก้ไข-->
            <option value="In Stock">In Stock</option>
            <option value="Out Of Stock">Out Of Stock</option>
            <option value="Hide">Hide</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">
    Old Image
        <br><img src="<?php echo $row['Menu_Imge']; ?>" width="100px"><br><br><br><br><br> 
    </label>
        <!--<div class="custom-file">
            <input type="file" class="custom-file-input" name="Menu_Imge" id="validatedCustomFile" accept="image/*">
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
        </div>-->
        <div class="form-group">
            <label for="exampleInputPassword1">URL Image</label>
            <input type="text" name="Menu_Imge" class="form-control" id="exampleInputPassword1" placeholder="URL" value="<?php echo $row['Menu_Imge'];?>" required>
        </div>
    </div>
        <!--<input type="hidden" name="Menu_Imge2" value="<?php// echo $row['Menu_Imge']; //ส่งค่าภาพเก่า?>">-->
        <input type="hidden" name="Menu_Id" value="<?php echo $row['Menu_Id']; ?>">
    <div class="form-group">
        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'menupage.php';">Cancle</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
