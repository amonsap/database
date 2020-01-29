<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bekery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 
</head>
<body>
  
    <?php 
        include('connectPJ.php');

        $query = "SELECT m.*,t.menucatalog_name FROM menus as m
        INNER JOIN menucatalogs as t ON m.Menu_Catalog=t.menucatalog_id
        ORDER BY m.Menu_Id DESC"
        or die("Error: ".mysqli_error($connectData));

        //echo $query;
        //exit;

        //เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result
        $result = mysqli_query($connectData, $query);
    ?>
    <?php include("navbar.php")?>
    <div class="jumbotron">
        <div class="text-center">
            <h1 class="display-4">BAKERY</h1>
            <p>Open: Sunday to Friday 10.00 AM. - 22.00 PM.</p>
            <p>Contact : 043-202115</p>
            <p>Facebook : www.facebook.com/JazzHouse.KKU</p>
            <p> <i class="material-icons">wifi</i> PW : chertjazz </p>
        </div>
    </div>
        
        <div class="container">
            <div class="row">
            <?php while($row=mysqli_fetch_array($result)) { 
            if($row['Menu_Statu'] != "Hide"){
                if($row['Menu_Statu'] == "Out Of Stock")
                    {?>
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="mimg/<?php echo $row['Menu_Imge'];?>" width="70%">
                        <h4><?php echo $row['Menu_Name_Tha'] ?></h4>
                        <h5><?php echo $row['Menu_Name_Eng'] ?></h5>
                        <p>Price : <?php echo $row['Menu_Price'] ?> THB</p>
                        <button type="button" class="btn btn-danger btn-lg" disabled>Out Of Stock</button>
                        <h2><br></h2> 
                    </div>

                    <?php }else{ ?>
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="<?php echo $row['Menu_Imge'];?>" width="70%">
                        <h3><?php echo $row['Menu_Name_Tha'] ?></h3>
                        <h2><?php echo $row['Menu_Name_Eng'] ?></h2>
                        <p>Price : <?php echo $row['Menu_Price'] ?> THB</p>
                        <select name="select" class="custom-select mb-3">
                            <option selected>Select</option>
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">3</option>
                            <option value="#">4</option>
                            <option value="#">5</option>
                            <option value="#">6</option>
                            <option value="#">7</option>
                            <option value="#">8</option>
                            <option value="#">9</option>
                        </select>
                        <button type="button" class="btn btn-primary">Select</button>
                        <h2><br></h2> 
                    </div>
                    <?php } 
                } 
            }?>
            
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
