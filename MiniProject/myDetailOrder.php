<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyDetail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='./css/orderStlye.css'>
    <link rel='stylesheet' type='text/css' href='./css/buttonStlye.css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
    
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Jazz's House</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Food</a>
                            <a class="dropdown-item" href="#">Drink</a>
                            <a class="dropdown-item" href="#">Bakery</a>
                            <!--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
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
                        <li class="nav-item">
                            <a href="order.php" class="nav-link btn btn-dark">
                                <span>Chart</span>
                                <span class="badge badge-light btn-lg">3</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome..<?php echo $_SESSION['Name']?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Setting</a>
                                <a class="dropdown-item" href="#">Help</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logoutCus.php">Logout</a>
                            </div>
                        </li>
                        
                    <?php } else {?>
                            <li class="nav-item">
                                <a class="nav-link" href="loginCus.php">Login</a>
                            </li>
                    <?php } ?>     
                </ul>

            </div>
        </div>
    </nav>

    <br>
    <div class="container">
        <nav class="nav pill-nav nav-fill">
                <a class="nav-item nav-link disabled" href="#">My order</a>
                <a class="nav-item nav-link disabled" href="#">Login</a>
                <a class="nav-item nav-link active" href="#">My detail</a>
                
        </nav>
    </div>
    <br>
    <div class="container">
        <form action=""method="POST">
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact"  placeholder="Phone number / E-mail"required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3"required></textarea>
            </div> 
            <div class="form-group">
                <label for="address">Payment</label>
                <p>Cash on Delivery</p>
            </div> 
            <div class="container-contact100-form-btn">
				<button type="submit" value="submit"name="submit" class="contact100-form-btn">
				    Send Message
				</button>
					
			</div>   
        </form>
        

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

        <script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>

<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
    <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="js/main.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
</script>
</body>
</html>