<?php

if(isset($_POST['update'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $email = $_POST['email'];
    $dob = $_POST['DOB'];
    $Ph_no = $_POST['Ph_No'];
    $alt_no = $_POST['Alternate_no'];
    $address = $_POST['Address'];
    $role = $_POST['Role'];
    include '../connectDB.php';
    session_start();
    if($_POST['Alternate_no']!=""){
        $Alternate_no = $_POST['Alternate_no'];
        $sql= "UPDATE `employee` SET `Role`='$role',`Fname`='$Fname',`Lname`='$Lname',`E_email`='$email',`DOB`='$dob',`Ph_no`='$Ph_no',`Alternate_no`='$alt_no',`Address`='$address' WHERE E_email='$email'";

    }
    else{
        $sql= "UPDATE `employee` SET `Role`='$role',`Fname`='$Fname',`Lname`='$Lname',`E_email`='$email',`DOB`='$dob',`Ph_no`='$Ph_no',`Address`='$address' WHERE E_email='$email'";
    }
    
    $result = mysqli_query($con, $sql);

    $sql_login = "UPDATE `login` SET `Role`='$role' WHERE E_email='$email'";
    $result_login = mysqli_query($con, $sql_login);
    echo $sql;
    if($result && $result_login){
        $_SESSION['status'] = "Employee Details Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("location:search.php");
    }
    else{
        echo "data not inserted";
    }
}
?>