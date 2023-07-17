<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img {
            width : 75px;
            height : 75px;
        }
    </style>
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

    <a href="addEmployee.php" class="btn btn-primary mx-5 my-4">Add New Employee</a>

    <?php
        include_once 'connection.php';
        
        $sql="SELECT * FROM `employee`";
        $run=mysqli_query($conn,$sql);

    ?>

    <table class="table table-striped table-hover mx-2">
        <thead>
            <th>Id</th>
            <th>Employee Photo</th>
            <th>Name</th>
            <th>Date Of Birth</th>
            <th>Salary</th>
            <th>Action</th>
        </thead>

        <tbody>

            <?php 
                while ($raw=mysqli_fetch_array($run)) { 

                    $id = $raw['id'];
                    $firstName = $raw['firstName'];
                    $lastName = $raw['lastName'];
                    $dob = $raw['dob'];
                    $salary = $raw['salary'];
                    $empPhoto = $raw['empPhoto']
            ?>

            <tr>
                <td><?php echo $id;?></td>
                <td><img src="<?php echo $empPhoto?>" alt="employee Photo"></td>
                <td><?php echo $firstName;?> <?php echo $lastName;?></td>
                <td><?php echo $dob;?></td>
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
</body>
</html>