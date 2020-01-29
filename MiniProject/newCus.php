<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginDelivery</title>
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='./css/orderStlye.css'>
    <link rel='stylesheet' type='text/css' href='./css/buttonStlye.css'>
</head>

<body>
	<?php
		include_once('connectPJ.php');

		if(isset($_POST['submit'])){
			$strSQL = "INSERT INTO `customer`(`cusID`, `cusTel`, `cusAddress`, `firstName`, `lastName`, `cusUsername`, `cusPassword`,`cusEmail`) 
						VALUES ('','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["first-name"]."','".$_POST["last-name"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."');";
            $objQuery = mysqli_query($connectData,$strSQL);
		
			header('location:loginCus.php'); // link ไปหน้าเว็บใหม่

			mysqli_close($connectData);
			
		}
    ?>

    
	
<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="">
                <!--method="POST" action="data.php" คือการส่งข้อมูลข้ามหน้า-->
				<span class="contact100-form-title">
					Sign in 
				</span>

				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
                </div>
				
                <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="username">Username *</label>
				<div class="wrap-input100  validate-input" data-validate="Type Username">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="password">Password *</label>
				<div class="wrap-input100  validate-input" data-validate="Type password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

                <label class="label-input100" for="email">Enter your email </label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number *</label>
				<div class="wrap-input100 validate-input"data-validate = "Valid phone number is 091xxxxxxx">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
                </div>
                
                <label class="label-input100" for="address">Enter phone address *</label>
				<div class="wrap-input100 validate-input"data-validate = "Your address">
					<!--<input id="address" class="input100" type="text" name="address" placeholder="your address">-->
                    <textarea class="input100" id="address" type="text" name="address" placeholder="Your address"></textarea>
                    <span class="focus-input100"></span>
				</div>
        

				<div class="container-contact100-form-btn">
						<button type="submit" value="submit"name="submit" class="contact100-form-btn">
							Send Message
						</button>
					
				</div>
			</form>
			
			
			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
                        ร้าน Jazz house (หลังหออินเตอร์) ที่อยู่ร้าน 945 ตำบลศิลา อำเภอเมือง จังหวัดขอนแก่น 40000
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							043-202115 
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							FB : Jazz House
						</span>
					</div>
                </div>
                <div class="dis-flex size1 p-b-47">
					
					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Payment
						</span>

						<span class="txt3">
                            Cash on Delivery
						</span>
                    </div>
				</div>
			</div>
		</div>
</div>

    <div id="dropDownSelect1"></div>

    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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