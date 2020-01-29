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
    <title>Order list</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
</head>

<body>
    <!--============================================================Tab menu=======================================================================-->

    <!--header-->
    <br>
    <div class="container fixed">
        <h1 style="background-color:rgba(255, 99, 71, 0.2); text-align:center;">Jazz's House</h1><br><br>
    </div>
    <!--header-->
    <br>

    <?php
    include_once('connectPJ.php');

    $data = "SELECT * from bills";
    $q = $connectData->query($data);
    $row = mysqli_fetch_all($q, MYSQLI_ASSOC);

    $i = 0;
    $newrow = [];
    foreach($row as $data){
        $date = date('Y-m-d', strtotime($data["billsDate"]));
        if(empty($newrow)){
            $newrow[$i]["newdate"] = $date;
            $i++;
        }else{
            $tmp = [];
            foreach($newrow as $newrowtmp){
                $tmp[] = $newrowtmp["newdate"];
            }
            if(!in_array($date, $tmp)){
                $newrow[$i]["newdate"] = $date;
                $i++;
            }
        }
    }

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
                    <a class="list-group-item " href="orderList.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; Counter</a>
                    <a class="list-group-item active" href="billTotal.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; Bills</a>
                    <?php if (isset($_SESSION['Name'])) { ?>
                        <a class="list-group-item list-group-item-danger" href="logoutCus.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Welcome..
                            <?php echo $_SESSION['Name'] ?></a>
                    <?php } else { ?>
                        <a class="list-group-item list-group-item-danger" href="logoutCus.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-9">
                <h5>Bills/Month.</h5>
                <br>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Choose month</label>
                </div>
                <select class="custom-select" id="month">
                    <option value="">Choose month...</option>
                    <?php foreach($newrow as $data){ ?>
                    <option><?=$data["newdate"]?></option>
                    <?php } ?>
                </select>
                </div>
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">OrderID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody id="bill-list">
                   
                </tbody>
                </table>
            </div>
            <br>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $("#month").change(function(){
            if($(this).val()==""){
                alert("Please select month!")
            }else{
                $.get("getbill.php",{
                    month: $(this).val()
                }, function(data){
                    $("#bill-list").html("");
                    var json = JSON.parse(data);
                    var total = 0;
                    for(var i=0;i<json.length;i++){
                        var obj = json[i];
                        var tmp = "<tr>";
                        tmp += "<th scope=\"row\">" + (i+1) + "</th>";
                        tmp += "<td>" + obj.OrderID + "</td>";
                        tmp += "<td>" + obj.bill_totalPrice + "</td>";
                        tmp += "<td>" + obj.billsDate + "</td>";
                        tmp += "</tr>";
                        $("#bill-list").append(tmp);
                        total = parseInt(total) + parseInt(obj.bill_totalPrice);
                    }
                    $("#bill-list").append("<tr><td colspan=\"2\">TotalAmount</td><td>" + total + "</td></tr>");
                });
            }
        });
    </script>
</body>

</html>