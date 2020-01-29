<?php session_start();

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
    <title>Order</title>
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

    <!--============================================================Tab menu=======================================================================-->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Jazz's House</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="HomeAdd.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menus.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotion.php">Promotion</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="order.php">Order</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['Name'])) { ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome..<?php echo $_SESSION['Name'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logoutCus.php">Logout</a>
                            </div>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="loginCus.php">Login</a>
                        </li>
                    <?php } ?>

                </ul>


            </div>
        </div>
    </nav>

    <br>
    <?php
    include_once('connectPJ.php');

    function create_order_id($connectData)
    {
        $data = "SELECT * FROM orders ORDER BY orderID DESC;";
        $a = $connectData->query($data);
        $row = mysqli_fetch_all($a, MYSQLI_ASSOC);

        if (!empty($row)) {
            $order_id = $row[0]['orderID'];

            $tmp = explode("OR", $order_id);
            $tmp[1] += 1;
            $tmp[1] = str_pad($tmp[1], 3, '0', STR_PAD_LEFT);
            $order_id = "OR" . $tmp[1];

            return $order_id;
        } else {
            return "OR001";
        }
    }
    $inorder = false;
    $orderid = create_order_id($connectData);

    //echo "order.php <br>";
    //employee counter
    $empData = "SELECT * FROM `belongto`,employees WHERE employees.empID = belongto.empID AND belongto.deptID = 3";
    $result = mysqli_query($connectData, $empData);

    //order
    $order = "SELECT * FROM customer,cart_new WHERE customer.cusID = cart_new.cus_ID AND customer.cusID = " . $_SESSION['cusID'] . " ";

    $resultOrder = mysqli_query($connectData, $order);
    //orderType
    if (!$resultOrder) {
        echo "Error: " . $resultOrder . "<br>" . $connectData->error;
    }

    //echo "<br><br>";
    $rows = $connectData->query("SELECT * FROM orders,employees WHERE orders.customerID = " . $_SESSION['cusID'] . " AND orders.empID = employees.empID ");
    $uporder = false;
    if (!$rows) {
        echo "Error: " . $rows . "<br>" . $connectData->error;
    } else {
        //ได้ cusID แล้ว
        /*while ($obj = mysqli_fetch_array($rows)) {
            echo print_r($obj) . "<br>";
        }*/
        if (isset($_POST['save'])) {
            if ($rows->num_rows > 0) {
                //echo "yees <br>";
                //update
                if(empty($_POST['tableNo'])){
                    $_POST['tableNo'] = "";
                }
                $data = "UPDATE orders SET tableNo = '" . $_POST['tableNo'] . "' , orderStatus = 'status', orderType = '" . $_POST['orderType'] . "'
           WHERE orders.customerID = '" . $_POST['customerID'] . "' ";

                // PDO Style
                if ($connectData->query($data) === TRUE) {
                    //echo "Update record created successfully <br>";
                    $tmprow = mysqli_fetch_all($rows, MYSQLI_ASSOC);
                    $order_tmp =  $tmprow[0]["orderID"];
                    $uporder = true;
                } else {
                    //echo "Error: " . $data . "<br>" . $connectData->error;
                }

                

            } else {
                //echo "no rows";

                //insert
                
                if(empty($_POST['tableNo'])){
                    $_POST['tableNo'] = "";
                }

                $data = "INSERT INTO `orders`(`orderID`,`orderDate`, `tableNo`, `orderStatus`, `customerID`, `empID`, `orderType`) 
                    VALUES('" . $orderid . "', CURRENT_TIMESTAMP,'" . $_POST['tableNo'] . "',' ','" . $_SESSION['cusID'] . "','" . $_POST['empID'] . "','" . $_POST['orderType'] . "' )";
                if ($connectData->query($data) === TRUE) {
                    //echo "Insert record created successfully";
                    $inorder = true;
                } else {
                    //echo "Error: " . $data . "<br>" . $connectData->error;
                    $inorder = false;
                }
            }
        }
    }

    $detail = "SELECT * FROM `orderdetails`LEFT JOIN orders ON orderdetails.oderID = orders.orderID WHERE  orders.customerID = " . $_SESSION['cusID'] . " ";

    $resultDetail = mysqli_query($connectData, $detail);

    if (!$resultDetail) {
        // echo "Error: " . $resultDetail . "<br>" . $connectData->error;
    } else {

        //echo "order Detail <br>";
        while ($obj = mysqli_fetch_array($resultDetail)) {
            //echo print_r($obj) . "<br>";
        }
        //check row in orderDatails

        $rows_detail = $connectData->query("SELECT * FROM orderdetails,orders WHERE orderdetails.oderID = orders.orderID AND orders.customerID = " . $_SESSION['cusID'] . " ");
        $rows_detail2 = $connectData->query("SELECT * FROM cart_new WHERE cart_new.cus_ID = " . $_SESSION['cusID'] . " ");

        $objD = mysqli_fetch_all($rows_detail, MYSQLI_ASSOC);
        $objD2 = mysqli_fetch_all($rows_detail2, MYSQLI_ASSOC);

        foreach ($objD as $tmp) {
            $row_menu = $connectData->query("SELECT * FROM menus WHERE Menu_Id = " . $tmp["menuID"]);
            $tmp_row = mysqli_fetch_all($row_menu, MYSQLI_ASSOC);
            for ($i = 0; $i < count($objD); $i++) {
                if ($objD[$i]["menuID"] == $tmp["menuID"]) {
                    $objD[$i]["Menu_Name_Tha"] = $tmp_row[0]["Menu_Name_Tha"];
                    $objD[$i]['Menu_Statu'] = $tmp_row[0]['Menu_Statu'];
                }
            }
        }

        foreach ($objD2 as $tmp) {
            $row_menu = $connectData->query("SELECT * FROM menus WHERE Menu_Id = " . $tmp["munu_ID"]);
            $tmp_row = mysqli_fetch_all($row_menu, MYSQLI_ASSOC);
            for ($i = 0; $i < count($objD2); $i++) {
                if ($objD2[$i]["munu_ID"] == $tmp["munu_ID"]) {
                    $objD2[$i]["price"] = $tmp_row[0]["Menu_Price"];
                }
            }
        }

        /* echo "<pre>";
        print_r($tmp_row);
        echo "</pre>";*/

        if (!$rows_detail) {
            echo "Error: " . $resultDetail . "<br>" . $connectData->error;
        } else {
            //echo "rows detail from cart_new <br>";


            //delete
            if (isset($_POST['deleteCart'])) {
                //echo "remove";

                //delete
                $del = "DELETE FROM `orderdetails` WHERE orderdetails.menuID = " . $_POST['menuID'] . "  ";
                if ($connectData->query($del) === TRUE) {
                    //echo "Record Deleted.";
                    echo "ok";
                } else {
                    // echo "Error: " . $del . "<br>" . $connectData->error;
                    echo "not";
                }
            }


            //insert
            if ($inorder == true) {
               
                foreach ($objD2 as $tmp) {
                    $data = "INSERT INTO `orderdetails` VALUES (" . $tmp["quantity"] . ", '', " . $tmp["munu_ID"] . ", '" . $orderid . "', " . $tmp["price"] * $tmp["quantity"] . ")";
                    if ($connectData->query($data)) {
                        $data = "DELETE FROM cart_new WHERE cart_new.cus_ID = ' " . $tmp["cus_ID"] . "'";
                        $connectData->query($data);
                       
                    }
                }

                echo "<script>location.replace('order.php');</script>";
            }

            if($uporder==true){
                foreach ($objD2 as $tmp) {
                    $data = "INSERT INTO `orderdetails` VALUES (" . $tmp["quantity"] . ", '', " . $tmp["munu_ID"] . ", '".$order_tmp."', " . $tmp["price"] * $tmp["quantity"] . ")";
                    if ($connectData->query($data)) {
                        $data = "DELETE FROM cart_new WHERE cart_new.cus_ID = ' " . $tmp["cus_ID"] . "'";
                        $connectData->query($data);
                    }
                }
                echo "<script>location.replace('order.php');</script>";

            }

            if (isset($_POST['out'])) {
                echo "out";
            }
        }
    }






    ?>

    <!--==============================================================order detail===================================================================-->
    <div class="container">
        <br>
        <h3 class="text-center">My order</h3>
        <br>
        <p class="text-center text-muted">ที่อยู่ร้าน 945 ตำบลศิลา อำเภอเมือง จังหวัดขอนแก่น 40000</p>
        <form action="" method="post">
            <?php while ($obj = mysqli_fetch_array($result)) {
                ?>
                <p class="text-center text-muted">พนักงานเคาร์เตอร์ : <?php echo $obj["fistNameEmp"] . "&nbsp;&nbsp;" . $obj["lastNameEmp"]; ?></p>
                <p class="text-center text-muted">รหัสพนักงานเคาร์เตอร์ : <?php echo $obj["empID"]; ?></p>
                <input type="hidden" value="<?php echo $obj['empID'] ?>" name="empID">

            <?php } ?>
            <p class="text-center text-muted">Date : <?php echo date('m-d-Y') ?></p>
            <br>

            <div class="row">

                <div class="col">
                    <h5>Order detail</h5>
                    <br>
                    <!--loop order-->
                    <?php while ($obj = mysqli_fetch_array($rows)) { ?>
                        <input type="hidden" value="<?php echo $obj['customerID'] ?>" name="customerID">
                        
                        <input type="hidden" name="orderID" value="<?php echo $obj['orderID'] ?>">

                    <?php } ?>
                    <div class="form-group row">
                        <label for="orderType" class="col-3 col-form-label">Order type</label>
                        <div class="col-8">
                            <div class="form-group row">
                                <div class="col-8">
                                    <!--<input id="orderType" name="orderType" type="text" class="form-control " placeholder="Eat in / Take away">-->
                                    <select id="ordertype" name="orderType" class="custom-select">
                                        <option>Choose type...</option>
                                        <option>Eat in</option>
                                        <option>Take away</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--<input class="btn btn-success" type="submit" value="Submit" name="typeSubmit">-->
                    </div>

                    <div class="form-group row" style="display:none" id="se-table">
                        <label for="orderType" class="col-3 col-form-label">Table number</label>
                        <div class="col-8">
                            <div class="form-group row">
                                <div class="col-8">
                                    <!--<input type="text" name="tableNo" pattern="[0-9 1]{2}" title="please enter is 01-09" class="form-control">-->
                                    <select id="selectTable" name="tableNo" class="custom-select">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>

                <div class="col">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Number</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>

                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        $sum = 0;
                        $sumNum = 0;
                        foreach ($objD as $obj) { ?>
                            <tbody>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $obj['Menu_Name_Tha'] ?></td>
                                <td><?php echo  $obj['orderAmt'] ?></td>
                                <td><?php echo $price =  $obj['order_price'];
                                    $number = $obj['orderAmt'];
                                    $total = $price * $number;
                                    //echo $total . "\t฿";
                                    $sum = $sum + $price;
                                    $sumNum = $sumNum + $i;
                                    ?></td>
                                <td><?php echo $obj['Menu_Statu'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="delorder(<?= $obj['menuID'] ?>)">
                                        <i class='fa fa-trash' aria-hidden='true'></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>record deleted successfully !!</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" name="deleteCart">Save change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tbody>
                            <?php $i++;
                        } ?>
                    </table>
                    <br>
                    <h4>Total Price :&nbsp;&nbsp; <?php echo $sum . "&nbsp;&nbsp;฿" ?></h4>
                </div>

            </div>
            <input type="submit" class="btn btn-secondary" name="save" value="Save changes">
            <!--<a class="btn btn-success" href="HomeAdd.php" role="button" style="float:right">Comfirm</a>-->
           
        </form>
      


    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function delorder(id) {
            $.post("order.php", {
                    deleteCart: "ok",
                    menuID: id
                },
                function(data) {
                    location.reload();
                    //alert(data)
                });
        }
    </script>
     <script>
        $("#ordertype").change(function(){
            if($(this).val()=="Eat in"){
                $("#se-table").show(500);
            }else{
                $("#se-table").hide(500);
            }
        });
    </script>
</body>

</html>