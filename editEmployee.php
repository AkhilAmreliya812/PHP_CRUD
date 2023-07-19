<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img {
            width : 75px;
            height : 75px;
        }
    </style>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php 
    include_once 'connection.php';
          
    $id = $_GET['id'];

    $selectOne = "SELECT * FROM employee WHERE id = '$id'";
    $runSelectOne = mysqli_query($conn,$selectOne);

    if ($runSelectOne) {

        while ($raw = mysqli_fetch_array($runSelectOne)) { 

            $firstName = $raw['firstName'];
            $lastName = $raw['lastName'];
            $dob = $raw['dob'];
            $salary = $raw['salary'];
            $empPhoto = $raw['empPhoto'];
            
        ?>

    <form method="POST" enctype="multipart/form-data">

        <h1 class="my-3 row justify-content-md-center">Update Employee <?php echo $id?> Data</h1>
    
        <div class="my-4 row justify-content-md-center">
                <label for="id" class="col-sm-1 col-form-label">Id</label>
            <div class="col-sm-4">
                <input type="text" name="id" value="<?php echo $id?>" class="form-control" id="firstName" readonly >
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="photo" class="col-sm-3 col-form-label"><?php echo $empPhoto?></label>
            <div class="col-sm-2">
                <input type="file" name="fileUpload" class="form-control" id="empPhoto">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="firstName" class="col-sm-1 col-form-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" name="firstName" value="<?php echo $firstName?>" class="form-control" id="firstName">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="lastName" class="col-sm-1 col-form-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" name="lastName" value=<?php echo $lastName;?> class="form-control" id="lastName">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="dob" class="col-sm-1 col-form-label">Date Of Birth</label>
            <div class="col-sm-4">
                <input type="text" name="dob" value="<?php echo $dob?>" class="form-control" id="dob">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
                <label for="salary" class="col-sm-1 col-form-label">Salary</label>
            <div class="col-sm-4">
                <input type="text" name="salary" value="<?php echo $salary?>" class="form-control" id="salary">
            </div>
        </div>

        <div class="my-4 row justify-content-md-center">
            <a href="index.php" class="btn btn-secondary col-sm-1 mx-3" id="back">Back</a>
            <button type="submit" name="updateEmployee" class="btn btn-primary col-sm-1 mx-3">Update</button>
        </div>

    </form>

    <?php
    
        }
    }
   
    if(isset($_POST['updateEmployee'])) {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $dob = $_POST["dob"];
        $salary = $_POST["salary"];

        $fileName = $_FILES["fileUpload"]["name"];
        $tempName = $_FILES["fileUpload"]["tmp_name"];

        $folder = "upload/".$fileName;

        move_uploaded_file($tempName,$folder);

        $updateQuery = "UPDATE `employee` SET `firstName`='$firstName',`lastName`='$lastName',`dob`='$dob',`salary`='$salary',`empPhoto`='$folder' WHERE `id`='$id'";

        $runUpdateQuery = mysqli_query($conn,$updateQuery);

        if($runUpdateQuery) {
            header('location:home.php');
        }
    }

    ?>

</body>
</html>