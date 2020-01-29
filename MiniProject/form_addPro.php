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
    <title>form_addMenu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<body>

    <?php
        include('connectPJ.php'); 
        //query menu ที่เป็น promotion
        $query = "SELECT * FROM menus WHERE Menu_Catalog = '24' ORDER BY Menu_Id ASC" or die("Error: ".mysqli_error($connectData));
        $result = mysqli_query($connectData, $query);
    
    ?>
    <h3>Add Promotion<br><br></h3>
    <form action="db_form_addPro.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <p><strong>Start Date<strong></p>
            <input type="date" class="form-control" name="Promotion_Start" required>
        </div>
        <div class="form-group">
            <p><strong>End Date<strong></p>
            <input type="date" class="form-control" name="Promotion_End" required>    
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Menu</label>
            <select class="form-control" name="menuID" id="exampleFormControlSelect1"  required>
                <option value="">select menu</option>
                <?php foreach($result as $results){ ?> <!--$result as $results คือการป้องกันไม่ให้เกิดข้อมูลซ้ำ-->
                <option value="<?php echo $results["Menu_Id"]; ?>"><?php echo $results["Menu_Name_Tha"]; ?></option>
                <?php } ?>
            </select>
        </div>
                        
        
        <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'proPage.php';">Cancle</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        
    </form>
 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        

</body>
</html>
