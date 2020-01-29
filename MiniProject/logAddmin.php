<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Addmin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/stlye3.css">
</head>

<body>
    <?php
        include_once('connectPJ.php');

        if (isset($_POST['submit'])) {
                $usernam =  $_POST['username'];
                $password = $connectData->real_escape_string($_POST['password']);

                $sql = "SELECT `fistNameEmp` FROM `employees` WHERE  `fistNameEmp`= '" . $usernam . "' AND `empPassword` = '" . $password . "'  ";
                $result = $connectData->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $_SESSION["Name"] = $row["fistNameEmp"];
                    //print_r($_SESSION["Name"]);
                    header('location:HomeAdd.php');
                    /*while ($row = $result->fetch_assoc()) {
                        echo  $row["cName"];
                    }*/

                } else {
                    echo 'Username & Password is invalid';
                }               
        }
    
    ?>
    

    <div class="container-contact100">
    <div class="wrap-contact100">
                        <form class="form-signin"action="" method="POST">
                            <div class="text-center">
                                <span class="h3 mb-3 font-weight-normal">
                                    Sign in
                                </span>
                                
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="username" class="sr-only col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9 mx-auto wrap-input100 validate-input" data-validate="Please enter your name">
                                        <input class="input100"type="text" class="form-control" id="username" name="username" placeholder="username"required autofocus>
                                    </div>
                                        <!--<div class="col-sm-9 wrap-input100 validate-input" data-validate="Please enter your name">
                                        <input class="input100"type="text" class="form-control" id="username" name="username" placeholder="username">
                                        <span class="focus-input100"></span>
                                    </div>-->
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="sr-only col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9 mx-auto wrap-input100 validate-input"data-validate="Please enter your name">
                                        <input class="input100"type="password" class="form-control" id="password" name="password" placeholder="password"required >
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-success" value="Log in">
                                
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                        <p >Or can apply for an account to access manually:</p>
                        <a class="btn btn-primary" href="newCus.php" role="button">sign in</a>
                        </div>
    </div>
    </div>
    




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html> 