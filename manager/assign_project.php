<?php
include '../connectDB.php';
session_start();
if(isset($_POST['assign'])){
    $pname = $_POST['pname'];
    $Sdate = $_POST['Sdate'];
    $deadline = $_POST['deadline'];
    $desc = $_POST['desc'];
    $E_email = $_POST['E_email'];
    $sql= "SELECT * FROM `employee` WHERE E_email='$E_email'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_fetch_assoc($result) != 'NULL'){
        if($row['Role']=='Staff'){
            $sql= "INSERT INTO `project` (`Pname`, `Description`, `Deadline`, `Date`, `status`, `E_email`) VALUES ('$pname','$desc', '$deadline', '$Sdate','active','$E_email')";
            echo "$sql";
            $result = mysqli_query($con, $sql);
                if($result){
                    $_SESSION['status'] = "Project assigned Successfully!";
                    $_SESSION['status_code'] = "success";
                    echo "<script>window.location.href='profile.php';</script>";
                }
                else{
                    $_SESSION['status'] = "Could not assign project Successfully!";
                    $_SESSION['status_code'] = "error";
                    echo "<script>window.location.href='profile.php';</script>";
                }
        }
        else{
            $_SESSION['status'] = "Could not assign Project! Invalid Email";
            $_SESSION['status_code'] = "error";
             header("location:profile.php");
        }
    }
    
}

?>


