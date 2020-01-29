<?php session_start();

if (isset($_SESSION['cusID']) === FALSE) {
    header("location:loginCus.php");
}
if ($_SESSION['admin'] === FALSE) {
    header("location: HomeAdd.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counter</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' href='./css/orderStlye.css'>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <!--header-->
    <br>
    <div class="container fixed">
        <h1 style="background-color:rgba(255, 99, 71, 0.2); text-align:center;">Jazz's House</h1><br><br>
    </div>
    <!--header-->
    <br>
    <br>

    <?php
    include_once('connectPJ.php');

    $data = "SELECT * from orderdetails,menus WHERE orderdetails.menuID = menus.Menu_Id AND orderdetails.oderID = '" . $_GET["order"] . "'";
    $q = $connectData->query($data);
    $row = mysqli_fetch_all($q, MYSQLI_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a class="list-group-item" href="cusPage.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Customer</a>
                    <a class="list-group-item" href="menupage.php"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp; Menu</a>
                    <a class="list-group-item " href="menuTypepage.php"><i class="fa fa-database" aria-hidden="true"></i>&nbsp; Menu Type</a>
                    <a class="list-group-item " href="proPage.php"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp; Promotion</a>
                    <a class="list-group-item " href="deptPage.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Department</a>
                    <a class="list-group-item " href="employeePage.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; Employee</a>
                    <a class="list-group-item active" href="orderList.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; Counter</a>
                    <a class="list-group-item " href="billTotal.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; Bills</a>
                    <?php if (isset($_SESSION['Name'])) { ?>
                        <a class="list-group-item list-group-item-danger" href="logoutCus.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Welcome..
                            <?php echo $_SESSION['Name'] ?></a>
                    <?php } else { ?>
                        <a class="list-group-item list-group-item-danger" href="logoutCus.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-9">
                <h4>Counter </h4><br>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Number</th>
                            <th scope="col">Price</th>

                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    $sum = 0;
                    $sumNum = 0;
                    ?>
                    <tbody>
                        <?php foreach ($row as $data) {
                            $i++ ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data["Menu_Name_Tha"] ?></td>
                                <td><?= $data["orderAmt"] ?></td>
                                <td><?php //echo $sum = ($data["order_price"]*$data["orderAmt"]);
                                    $price =  $data['order_price'];
                                    $number = $data['orderAmt'];
                                    $total = $price * $number;
                                    echo $price . "\t฿";
                                    $sum = $sum + $price;
                                    $sumNum = $sumNum + $i;
                                    ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                    <?php $i++;

                    ?>
                </table>
                <br>
                <h4>Total Price :&nbsp;&nbsp; <?php echo $sum . "&nbsp;&nbsp;฿" ?></h4>
                <br>
                <?php
                //insert
                $id =  $_GET['order'];
                $success = FALSE;

                $bill = "INSERT INTO `bills`(`billsDate`, `bill_totalPrice`, `OrderID`) VALUES (CURRENT_TIMESTAMP," . $sum . ",'" . $id . "')";
                $delorder = "DELETE FROM `orderdetails` WHERE oderID = '".$id."'";
                $connectData->query($delorder);
                if ($connectData->query($bill) === TRUE) {
                    //echo "Insert record created successfully";
                    $success = true;
                } else {
                    //echo "Error: " . $bill . "<br>" . $connectData->error;
                    $success = false;
                }

                $d = $connectData->query("SELECT * FROM orders,customer,employees WHERE orders.customerID = customer.cusID AND orders.empID = employees.empID AND orders.orderID = " . $id . "");
                if (isset($_POST['submit'])) {

                    $order = "UPDATE orders SET orderStatus = 'success' WHERE orders.orderID = '" . $id . "'";
                    if ($connectData->query($order)) {
                        //echo "success";
                    } else {
                        // echo "Error: " . $order . "<br>" . $connectData->error;
                    }
                }

                ?>
                <form method="post" action="">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row text-title">
                                <label for="receive" class="col-4 col-form-label">Receive :</label>
                                <div class="col-8">
                                    <input id="receive" name="receive" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <div class="col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $priceCus = $_POST['receive'];
                            $ans = 0;
                            if ($priceCus > $sum) {
                                $ans = $priceCus - $sum;
                                echo "<h5>Cash / Change : " . $ans . " </h5>";
                            } else {
                                $ans = $sum - $priceCus;
                                echo "<h5>Remaining " . $ans . " ฿ </h5>";
                            }
                        }
                        ?>
                    </div>

                </form>
                    
                <a class="btn btn-success" href="final.php?order=<?= $data['oderID'] ?>" role="button">confirm</a>


            </div>
        </div>
    </div>




            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>