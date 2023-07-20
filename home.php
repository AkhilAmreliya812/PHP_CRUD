<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img {
            width : 50pxpx;
            height : 50px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />			
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <title>Home</title>
</head>
<body>
    
    <a href="addEmployee.php" class="row justify-content-md-left btn btn-primary my-3 mx-5">Create New Employee</a>
    <div class="table">
        <table class="table table-hover mx-2" id="employeeData">
            <thead>
                <th>Id</th>
                <th>Employee Photo</th>
                <th>Name</th> 
                <th>Date Of Birth</th>
                <th>Username</th>
                <th>Salary</th>
                <th>Action</th>
            </thead>

            <tbody>

                <?php 
                    include_once 'connection.php';

                    $user = $_SESSION['user'];
                    if($user == false) {
                        header('location:index.php');
                    }
        
                    $sql="SELECT * FROM `employee`";
                    $run=mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];   
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $dob = $row['dob'];
                        $username = $row['username'];
                        $salary = $row['salary'];
                        $empPhoto = $row['empPhoto'];
                ?>

                <tr>
                    <td><?php echo $id;?></td>
                    <td><img src="<?php echo $empPhoto?>" alt="employee Photo"></td>
                    <td><?php echo $firstName;?> <?php echo $lastName;?></td>
                    <td><?php echo $dob;?></td>
                    <td><?php echo $username;?></td>
                    <td><?php echo $salary;?></td>
                    <td>
                        <a href="editEmployee.php?id=<?php echo $id;?>" class="btn btn-primary">Edit</a>
                        <a href="deleteEmployee.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>
    </div>
    
    <script>
        $(document).ready(function () {
            let table = $('#employeeData');//.DataTable();
            table.DataTable();
        } );


    </script>
</body>
</html>