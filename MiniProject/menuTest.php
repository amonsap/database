<?php session_start(); ?>
<?php $_SESSION = array(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .filterDiv {
            float: left;
            background-color: #383838;
            color: #ffffff;
            width: 200px;
            line-height: 200px;
            text-align: center;
            margin: 2px;
            display: none;
        }

        .show {
            display: block;
        }
    </style>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="HomeAdd.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menuCatalog_1.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotion.php">Promotion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">Order</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['Name'])) { ?>
                        <!--<li class="nav-item">
                                                                                                                                                                                                                                                                  <a href="order.php" class="nav-link btn btn-dark">
                                                                                                                                                                                                                                                                      <span>Chart</span>
                                                                                                                                                                                                                                                                      <span class="badge badge-light btn-lg">3</span>
                                                                                                                                                                                                                                                                  </a>
                                                                                                                                                                                                                                                              </li>-->
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
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="logAddmin.php">Login Addmin</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!--=========================================================menu catalog============================================================================-->
    <!--============================================================เค้ก&เบเกอรี่(Cakes)=======================================================================-->
    <br>

    <?php
    include_once('connectPJ.php');

    //catalog 2
    include_once('imageMenu.php');

    $sql_recom = "SELECT * from menus,menucatalogs,customer where  Menu_Catalog = menucatalog_id;";
    $connectData->set_charset("utf8");

    if (isset($_POST['action'])) {
        echo "action";
        
        
        if (isset($_POST['submit'])) {
            echo $_POST['number'];
            $data = "INSERT INTO `cart_new`(`cus_ID`, `munu_ID`, `quantity`)
        VALUES ('" . $_POST['customerID'] . "','" . $_POST['menuID'] . "','" . $_POST["select"] . "')";
            //$obj = mysqli_query($connectData,$data);
            if ($connectData->query($data) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $data . "<br>" . $connectData->error;
            }
        }
    }
   

    /*if (isset($_POST['submit'])) {
        echo $_POST['number'];
        /*$data = "INSERT INTO `cart_new`(`cus_ID`, `munu_ID`, `quantity`)
    VALUES ('" . $_POST['customerID'] . "','" . $_POST['menuID'] . "','" . $_POST["select"] . "')";
        //$obj = mysqli_query($connectData,$data);
        if ($connectData->query($data) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $data . "<br>" . $connectData->error;
        }
    }*/


    ?>

    <!--------------------------------------------------MENU---------------------------------------------------------------------------->

    <div class="container">
        <div class="section-intro mb-75px">
            <h3>Food Menu</h3>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <?php
                    $result = mysqli_query($connectData, $sql_recom);
                    while ($objResult = mysqli_fetch_array($result)) {
                        ?>
                        <form action="" method="post">
                            <div class="col-lg-12">
                                <div class="card-deck">
                                    <div class="card" style="width: 30rem;">
                                        <img src="<?php echo $objResult['Menu_Imge']; ?>" alt="" width="100%">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between food-card-title">
                                                <h6><?php echo $objResult['Menu_Name_Tha'] . " (" . $objResult['Menu_Name_Eng'] . ") " ?></h6>
                                                <h5 class="price-tag"><?php echo $objResult['Menu_Price'] ?> THB</h5>
                                            </div>
                                            <p>Menu code : <?php echo  $objResult['Menu_Id'] . "&nbsp;&nbsp;&nbsp; Type :" . $objResult['menucatalog_name'] ?></p>
                                            </p>
                                            <input type="hidden" value="<?php echo $objResult["cusID"] ?>" name="customerID">
                                            <input type="hidden" value="<?php echo $objResult['Menu_Id'] ?>" name="menuID">
                                        </div>
                                        <div class="card-footer">
                                            <!--<input type="submit" class="btn btn-primary " name="submitCart" value="Add to cart">-->
                                            <p><button class="button button-shadow mt-1 mt-sm-1" name="action">Add to Cart</button></p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <th>สินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th class="text-right">รวม</th>
                            <th></th>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><input style="width:50px;" class="form-control" type="number" name="number" id="number" /> </td>
                                <td class="text-right"></td>
                                <td>
                                    <!--<a class="" href="menuTest.php?action=remove&id=">Remove</a>-->
                                    <button type="button" class="btn btn-danger" name="remove">Remove</button>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <td colspan="2"><strong>รวมทั้งหมด</strong></td>
                            <td colspan="2" class="text-right"><strong>฿ 0</strong></td>
                            <td></td>
                        </tfoot>
                    </table>

                    <input class="btn btn-success mt-1 mt-sm-1" type="submit" name="submit" value="Submit Order" style="float:right" />
                </form>
            </div>
        </div>

    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>