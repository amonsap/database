<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department Food</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  

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
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php">Employee</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Department
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="departmentFood.php">Food</a>
                            <a class="dropdown-item" href="departmentDrink.php">Drink</a>
                            <a class="dropdown-item" href="departmentBeakery.php">Bakery</a>
                            <!--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customer
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Order</a>
                            <a class="dropdown-item" href="#">Table</a>
                            
                            <!--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
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
                                <!--<a class="dropdown-item" href="#">Setting</a>
                                <a class="dropdown-item" href="#">Help</a>
                                <div class="dropdown-divider"></div>-->
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
        <h3>Department Food.</h3><br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee list</a>
            </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Employees</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Resign worker</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <br>
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Department id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <!--<th scope="row">1</th>-->
                    <td>1</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    </tr>
                  
                </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form>
                <div class="form-group row">
                    <label for="id" class="col-4 col-form-label">Employee ID</label> 
                    <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                        </div> 
                        <input id="id" name="id" type="text" class="form-control">
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstName" class="col-4 col-form-label">First name</label> 
                    <div class="col-8">
                    <input id="firstName" name="firstName" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastName" class="col-4 col-form-label">Last name</label> 
                    <div class="col-8">
                    <input id="lastName" name="lastName" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tel" class="col-4 col-form-label">Tel.</label> 
                    <div class="col-8">
                    <input id="tel" name="tel" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="typeEmployee" class="col-4 col-form-label">Type employee</label> 
                    <div class="col-8">
                    <input id="typeEmployee" name="typeEmployee" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-4 col-form-label">Address</label> 
                    <div class="col-8">
                    <textarea id="address" name="address" cols="40" rows="5" class="form-control"></textarea>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Department id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Otto</td>
                    <td><a class="btn btn-link" href="#" role="button">Link</a></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
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
</body>
</html>
