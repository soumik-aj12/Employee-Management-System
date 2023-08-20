<?php
include '../connectDB.php';
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
        if($row['Role']=='Employee'){
            $sql= "INSERT INTO `project` (`Pname`, `Description`, `Deadline`, `Date`, `E_email`) VALUES ('$pname','$desc', '$deadline', '$Sdate','$E_email')";
            $result = mysqli_query($con, $sql);
                if($result){
                    header("location:profile.php");
                }
        }
        else{
            echo "<script>alert('Please insert valid Employee Email!');</script>";
        }
    }
    
}

?>

