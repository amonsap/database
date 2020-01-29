<?php session_start(); 

if ($_SESSION['admin'] === TRUE) {
    header("location: menupage.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Addmin</title>

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
        .checked {
            color: orange;
        }

        hr.new1 {
            border-top: 1px solid #d9d9d9;

        }

        .centered {
            width: 100%;
            text-align: center;
            position: absolute;
            top: calc(25% + 51px);
            ;
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
                        <a class="nav-link" href="menus.php">Menu</a>
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
               

            </div>
        </div>
    </nav>
    <!--============================================================picture slide=======================================================================-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1473093226795-af9932fe5856?ixlib=rb-1.2.1&auto=format&fit=crop&w=1280&h=400&q=80" class="d-block w-100" alt="Third slide">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--============================================================ข้อความใต้รูป=======================================================================-->
    <div class="jumbotron">
        <div class="text-center">
            <h1 class="display-4">Welcome to Jazz's House!</h1><br>
            <p class="lead"> Address : ร้าน Jazz house (หลังหออินเตอร์) ที่อยู่ร้าน 945 ตำบลศิลา อำเภอเมือง จังหวัดขอนแก่น 40000</p>
            <p class="lead"> Lets Talk : 043-202115 &nbsp;&nbsp; General Support : FB : Jazz House</p>
            
            <p class="lead"> Payment : Cash on Delivery </p>
        </div>
    </div>
    <!--============================================================เมนูแนะนำ=======================================================================-->
    <?php
    include_once('connectPJ.php');

    $sql = "SELECT `Promotion_Id`, `Promotion_Name`, `Promotion_Price`, `Promotion_Start`, `Promotion_End` FROM `promotions`";
    $connectData->set_charset("utf8");
    //$menu = "SELECT `Menu_Id`,  `Menu_Promotion`,menuID FROM `menus`,orderdetails WHERE Menu_Promotion = menuID ";



    ?>

    <div class='container'>
        <h3>
            <small>Promotion Menu </small>
        </h3><br>
        <?php
        include_once('connectPJ.php');

        $sql_recom = "SELECT * from menus,menucatalogs,promotion_menu where  menucatalog_name = 'Promotion' and menus.Menu_Id = promotion_menu.MenuID;";
        $connectData->set_charset("utf8");
        ?>
        <!--ตัว card---------------------------------------------------------------------------------------------------------------------------->
        <div class='card-deck'>
            <?php
            $result = mysqli_query($connectData, $sql_recom);
            while ($objResult = mysqli_fetch_array($result)) {
                ?>
                <div class='card'>
                    <img class="card-img-top" alt="food" src='<?php echo explode('&', $objResult["Menu_Imge"])[0] . "&auto=format&fit=crop&w=600&h=300&q=90"; ?>'>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $objResult["Menu_Name_Tha"]; ?>
                            <span class="fa fa-star checked"></span>
                        </h5>
                        <p>Menu code : <?php echo $objResult["Menu_Id"], "\t\t,\t\t" . $objResult["menucatalog_name"]; ?></p>
                        <p class="font-weight-lighter"></p><?php echo $objResult["Menu_Price"], "\tบาท" ?>
                        <br><br>
                        <p class='font-weight-lightez'>No minimum</p>
                        <strong>Free</strong> | delivery
                    </div>

                    <div class="card-footer text-center">
                        <a class="btn btn-primary" href="Promotion.php" role="button">Go to promotion</a>
                    </div>

                </div>

            <?php
        }

        ?>
        </div>




        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>