<?php
    include_once 'connection.php';
    
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
    
        $query="DELETE FROM `employee`  WHERE id = '$id'";
        $run=mysqli_query($conn,$query);
    
        if($run) {
            header('location:home.php');
        } else {
            echo $query;
        }
    }
?>
