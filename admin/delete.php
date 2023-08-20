<?php
    $mail=$_GET['mail'];
    include '../connectDB.php';
    session_start();
    $sql1 = "DELETE FROM `login` WHERE E_email='$mail'";
    $sql= "DELETE FROM `employee` WHERE E_email='$mail'";

    $select1 = "SELECT * FROM `eleave` WHERE E_email = '$mail';";
    $select2 = "SELECT * FROM `project` WHERE E_email = '$mail';";
    $select3 = "SELECT * FROM `salary` WHERE E_email = '$mail';";
    
    $result = mysqli_query($con, $select1);
    
     if(mysqli_num_rows($result) > 0){
        $sql2 = "DELETE FROM `eleave` WHERE E_email='$mail'";
        echo $sql2;
        mysqli_query($con,$sql2);
     }
     $result1 = mysqli_query($con,$select2);
     if(mysqli_num_rows($result1) > 0){
        $sql3 = "DELETE FROM `project` WHERE E_email='$mail'";
        mysqli_query($con,$sql3);
     }
     $result2 = mysqli_query($con,$select3);
     if(mysqli_num_rows($result2) > 0){
        $sql4 = "DELETE FROM `salary` WHERE E_email='$mail'";
        mysqli_query($con,$sql4);
     }

    if(mysqli_query($con,$sql1)){
        if(mysqli_query($con,$sql)){
            $_SESSION['status'] = "Employee Deleted Successfully!";
            $_SESSION['status_code'] = "success";
            header("location:search.php");
        }
        
    }
    
?>