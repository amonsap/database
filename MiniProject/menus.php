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


    <style>
        hr.new1 {
            border-top: 1px solid red;
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
                    <li class="nav-item">
                        <a class="nav-link" href="HomeAdd.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  active">
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
    <!--=========================================================menu catalog============================================================================-->
    <!--============================================================เค้ก&เบเกอรี่(Cakes)=======================================================================-->
    <br>

    <?php
    include_once('connectPJ.php');

    //catalog 2
    include_once('imageMenu.php');

    $sql_recom = "SELECT * from menus,menucatalogs where  Menu_Catalog = menucatalog_id";
    $connectData->set_charset("utf8");

    if (isset($_POST['submitSelect'])) {
        //echo "submit";
        //echo "submit";
        /*$cusID = $_POST['customerID'];
        echo $cusID;
        $menuID = $_POST['menuID'];
        echo $menuID;*/

        $rows = $connectData->query("SELECT * from cart_new WHERE cus_ID = " . $_POST['customerID'] . " AND munu_ID = " . $_POST['menuID'] . "");

        if ($rows->num_rows > 0) {
            // Update 
            $data = "UPDATE cart_new SET quantity = " . $_POST["select"] . " WHERE cus_ID = " . $_POST['customerID'] . " AND munu_ID = " . $_POST['menuID'];

            // PDO Style
            if ($connectData->query($data) === TRUE) {
                //echo "Update record created successfully";
            } else {
                //echo "Error: " . $data . "<br>" . $connectData->error;
            }
        } else {
            // INsert
            $data = "INSERT INTO `cart_new`(`cus_ID`, `munu_ID`, `quantity`)
                VALUES ('" . $_POST['customerID'] . "','" . $_POST['menuID'] . "','" . $_POST["select"] . "')";

            // PDO Style
            if ($connectData->query($data) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $data . "<br>" . $connectData->error;
            }
        }
    }





    ?>

    <!--------------------------------------------------MENU---------------------------------------------------------------------------->

        <div class="container">
            <h3>
                <small>Menu list</small>
            </h3>
            <!--==============================================open cart===============================================================================-->
            <a class="btn btn-warning" href="cart.php" role="button" style="float:right">openCart</a>
            <br><br>
            <!--==============================================menu list===============================================================================-->
            <div class="row">
                <?php
                $result = mysqli_query($connectData, $sql_recom);
                //$menu = mysqli_fetch_all($result,MYSQLI_ASSOC);
                while ($objResult = mysqli_fetch_array($result)) {
                //$status =  $objResult['Menu_Statu'];

                if ($objResult['Menu_Statu'] != "Hide") {
                    if ($objResult['Menu_Statu'] == "Out Of Stock") {
                        ?>
                            <div class="col-xs-3 col-md-3">
                                <img src="<?php echo $objResult['Menu_Imge']; ?>" width="180px" height="140px">
                                <br><br>
                                <p><?php echo $objResult['Menu_Name_Tha'] . " (" . $objResult['Menu_Name_Eng'] . ") " ?></p>
                                <p><?php echo "Menu code : " . $objResult['Menu_Id'] ?></p>
                                <p><?php echo "Menu status : " . $objResult['Menu_Statu'] ?></p>
                                <h6 class="text-dark">Price : <?php echo $objResult['Menu_Price'] ?> THB</h6>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary " disabled data-toggle="modal" data-target="#abc<?= $objResult['Menu_Id'] ?>">Click here</button>
                                <br><br>
                            
                        <?php } else { ?>
                            <div class="col-xs-3 col-md-3">
                                <img src="<?php echo $objResult['Menu_Imge']; ?>" width="180px" height="140px">
                                <br><br>
                                <p><?php echo $objResult['Menu_Name_Tha'] . " (" . $objResult['Menu_Name_Eng'] . ") " ?></p>
                                <p><?php echo "Menu code : " . $objResult['Menu_Id'] ?></p>
                                <p><?php echo "Menu status : " . $objResult['Menu_Statu'] ?></p>
                                <h6 class="text-dark">Price : <?php echo $objResult['Menu_Price'] ?> THB</h6>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#abc<?= $objResult['Menu_Id'] ?>">
                                    Click here
                                </button>
                                <br><br>
                            
                            <?php }
                    } ?>
                        <!-- =====================================================Modal =================================================================-->
                        <div class="container">

                            <div class="modal fade" id="abc<?= $objResult['Menu_Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">My order</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            <input type="hidden" value="<?php echo $_SESSION['cusID'] ?>" name="customerID">
                                            <input type="hidden" value="<?php echo $objResult['Menu_Id'] ?>" name="menuID">
                                            <div class="modal-body">

                                                <div class="form-group row">
                                                    <label for="select" class="col-4 col-form-label">Select number :</label>
                                                    <div class="col-7">
                                                        <select name="select" class="custom-select">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <input class="btn btn-success" type="submit" value="Save change" name="submitSelect">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php }   ?>
                <br>
            </div>
        </div>


        <!--===========================================================Search menu=========================================================================-->


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>