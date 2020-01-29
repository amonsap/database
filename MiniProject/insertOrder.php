<?php

session_start();
if (isset($_SESSION['cusID']) === FALSE) {
    header("location:loginCus.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order detail</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body>
    <?php
    include_once('connectPJ.php');

    $menu = "SELECT * FROM menus,cart_new WHERE menus.Menu_Id = cart_new.munu_ID AND cart_new.cus_ID = " . $_SESSION['cusID'] . "";
    $resultMenu = mysqli_query($connectData,$menu);

    //insert
    //insert
    if (isset($_POST['saveDetail'])) {
        //echo "add";
       $rows = $connectData->query("SELECT * from orderdetails WHERE menuID = " . $_POST['menu_ID'] . ""); 
       //$orders = $connectData->query("SELECT * from orders,customer,employees WHERE orders.customerID = " . $_SESSION['cusID'] . " AND orders.empID = employees.empID");
        if(!$rows){
            echo "Error: " . $rows . "<br>" . $connectData->error;
        }else{
            //echo "connect";
            echo print_r($rows,true)."<br>";
           /* $data = "INSERT INTO `orderdetails`(`orderAmt`, `menuStatus`, `menuID`, `oderID`, `order_price`) VALUES
                 ('" . $_POST['quantity'] . "',' ','" . $_POST['menuID'] . "','" . $_POST["select"] . "')";

            // PDO Style
            if ($connectData->query($data) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $data . "<br>" . $connectData->error;
            }*/
            while($result = mysqli_fetch_array($rows)){
                echo $result['menuID'];
            }
        }

        //$row = $connectData->query("SELECT * from orderdetails WHERE menuID = " . $_POST['menuID'] . " AND ");
    }



    ?>

    <!--===========================================order detail======================================================-->
    <br>
    <div class="container">
        <h4>Order details.
            <br></h4>
        <form action="" method="post">
            <?php
            while ($obj = mysqli_fetch_assoc($resultMenu)) { ?>
                <p>menu ID : <?php echo $obj['Menu_Id'] ?>  number : <?php echo $obj['quantity']?></p>
                <input type="hidden" value="<?php echo $obj['quantity']?>" name="quantity">
                <input type="text" value=" <?php echo $obj['Menu_Id'] ?>" name="menu_ID">
            <?php
        } ?>
          <input class="btn btn-success" type="submit" value="check" name="saveDetail">
        </form>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>