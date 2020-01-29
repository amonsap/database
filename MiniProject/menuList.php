<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu List</title>

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
    <br>

    <?php
    include_once("connectPJ.php");
    $sql_recom = "SELECT * from menus,menucatalogs,customer where  Menu_Catalog = menucatalog_id ;";
    $connectData->set_charset("utf8");

    if (isset($_POST['submit'])) {
        $menuID =  $_POST['id_menu'];
        $cusID =  $_POST['id_cus'];
        //$select = $_POST['select'];
        $data = "INSERT INTO `cart_new`(`cus_ID`, `munu_ID`, `quantity`)  VALUES ($cusID,$menuID,'".$_POST["select"]."')";
        if ($connectData->query($data) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $data . "<br>" . $connectData->error;
        }
        echo "<br>";
        if(isset($menuID)){
            echo $menuID."<br>";
            $data = "UPDATE `cart_new` SET `munu_ID`=$menuID,`quantity`='".$_POST["select"]."' ;";
        }else{
            $data = "INSERT INTO `cart_new`(`cus_ID`, `munu_ID`, `quantity`)  VALUES ($cusID,$menuID,'".$_POST["select"]."')";
        }
        mysqli_query($connectData,$data) or die ('save error');
       // header('location:list.php');
    }
    

    ?>

    <div class="container">
        <h4>Menu List</h4><br>
        <div class="row">
            <?php
            $result = mysqli_query($connectData, $sql_recom);
            while ($objResult = mysqli_fetch_array($result)) {
                ?>
                <div class="col-xs-3 col-md-3">
                    <img src="<?php echo $objResult['Menu_Imge']; ?>" width="100%">
                    <br><br>
                    <p><?php echo $objResult['Menu_Name_Tha'] . " (" . $objResult['Menu_Name_Eng'] . ") " ?></p>
                    <p><?php echo "Menu code : " . $objResult['Menu_Id'] ?></p>
                    <h6 class="text-dark">Price : <?php echo $objResult['Menu_Price'] ?> THB</h6>
                    <br>
                    <form action="" method="post">
                        <!--Select number-->
                        <div class="form-group row">
                            <label for="select" class="col-4 col-form-label">Select :</label>
                            <div class="col-8">
                                <select id="select" name="select" class="custom-select">
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
                        <div class="form-group row">
                            <label class="col-4">Type :</label>
                            <div class="col-8">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="eatIn">
                                    <label for="checkbox_0" class="custom-control-label">Eat in</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="checkbox" id="checkbox_1" type="checkbox" class="custom-control-input" value="takeAway">
                                    <label for="checkbox_1" class="custom-control-label">Take away</label>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" name="submit" value="Save changes">

                        <input type="hidden" value="<?php echo $objResult['Menu_Id'] ?>" name="id_menu">
                        <input type="hidden" value="<?php echo  $objResult['cusID'] ?>" name="id_cus">


                    </form>
                    <br><br>
                </div>
            <?php } ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>