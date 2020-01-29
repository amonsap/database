
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>menucatalogsTable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>


<body>

    <div class="input-group margin-bottom-sm">
        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
        <input type="text" id="search" onkeyup="searchFunction()" class="form-control" placeholder="Search">
    </div>
    <br>

    <?php
        include('connectPJ.php');

        $query = "SELECT * FROM departments
        ORDER BY deptName ASC"
        or die("Error: ".mysqli_error($connectData));

        //echo $query;
        //exit;

        //เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result
        $result = mysqli_query($connectData, $query);

        //แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล
        echo"
            <table class='table table-hover table-bordered' id='deptTable'>
                <thead class='thead-dark'>
                <tr>
                    
                    <th scope='col'>Name</th>
                    <th scope='col'>Add<br>Employee</th>
                    <th scope='col'>View</th>
                    <th scope='col'>Edit</th>
                </tr>
            </thead>";
            while($row=mysqli_fetch_array($result)) {
                echo "<tbody>";
                    echo "<tr>";
                        //echo "<td>" .$row["deptID"] .  "</td> "; 
                        echo "<td>" .$row["deptName"] .  "</td> ";
                        //เพิ่ม Employee ลงใน dept
                        echo "<td align='center'><a class='btn btn-success' href='deptPage.php?ID=$row[0]&act=addemp' aria-label='Settings'>
                        <i class='fa fa-plus' aria-hidden='true'></i></a></td> ";
                        //ดูรายชื่อ Employee แต่ละแผนก
                        echo "<td align='center'><a class='btn btn-info' href='deptPage.php?ID=$row[0]&act=view' aria-label='Settings'>
                        <i class='fa fa-eye' aria-hidden='true'></i></a></td> ";
                        echo "<td align='center'><a class='btn btn-warning' href='deptPage.php?ID=$row[0]&act=edit' aria-label='Settings'>
                        <i class='fa fa-cog' aria-hidden='true'></i></a></td> ";
                    echo "</tr>";
                echo "</tbody>";
            }
            echo "</table>";
    ?>

            

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                search_table($(this).val());
            });
            function search_table(value){
                $('#deptTable tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                            found = 'true';
                        }
                    });
                    if(found == 'true')
                    {
                        $(this).show();
                        
                    }
                    else
                    {
                        $(this).hide();
                    }
                });
            }
        });
    </script>

     <script>
        function myFunction() {
        alert("Comfirm! Do you want to delete this record?");
        }
    </script>

</body>
</html>