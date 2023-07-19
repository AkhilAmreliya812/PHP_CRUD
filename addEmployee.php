<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">

        <h1 class="my-3 row justify-content-md-center">Create new employee</h1>

        <div class="my-4 row justify-content-md-center">
                <label for="photo" class="col-sm-2 col-form-label">Employee Photo</label>
            <div class="col-sm-3">
                <input type="file" name="fileUpload" class="form-control" id="empPhoto">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="firstName" class="col-sm-1 col-form-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" name="firstName" class="form-control" id="firstName">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="lastName" class="col-sm-1 col-form-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" name="lastName" class="form-control" id="lastName">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="dob" class="col-sm-1 col-form-label">Date Of Birth</label>
            <div class="col-sm-4">
                <input type="text" name="dob" class="form-control" id="dob">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="username" class="col-sm-1 col-form-label">Username</label>
            <div class="col-sm-4">
                <input type="text" name="username" class="form-control" id="username">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="password" class="col-sm-1 col-form-label">Password</label>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control" id="password">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="salary" class="col-sm-1 col-form-label">Salary</label>
            <div class="col-sm-4">
                <input type="text" name="salary" class="form-control" id="salary">
            </div>
        </div>

        <div class="row justify-content-md-center my-5">
            <button type="submit" name="saveEmployee" class="btn btn-primary col-sm-5 mx-3" id="saveEmp">Save</button>
        </div>
    
    </form>

    <?php

        include "connection.php";

        if(isset($_POST['saveEmployee'])) {

            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $dob = $_POST["dob"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $salary = $_POST["salary"];

            $fileName = $_FILES["fileUpload"]["name"];
            $tempName = $_FILES["fileUpload"]["tmp_name"];

            $folder = "upload/".$fileName;

            move_uploaded_file($tempName,$folder);

            $query = "INSERT INTO `employee`(`firstName`,`lastName`,`dob`,`username`,`password`,`salary`,`empPhoto`) VALUES ('$firstName','$lastName','$dob','$username','$password','$salary','$folder')";
            $run = mysqli_query($conn,$query);
            if($run) {
                header('location:login.php');
            } else {
                echo $query;
            }
        } 

    ?>
    
</body>
</html>