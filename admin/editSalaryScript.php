<?php
  include '../connectDB.php';
if(isset($_POST['up_salary'])){
    $Basic_pay = $_POST['Basic_pay'];
    $DA = $_POST['DA'];
    $ca = $_POST['Conveyance_Allowance'];
    $Med_Allow = $_POST['Med_Allow'];
    $inc = $_POST['Increment'];
    $tax = $_POST['Tax_Deduction'];
    $pf = $_POST['PF'];
    $acc = $_POST['Account'];
    $email = $_POST['email'];
    session_start();
    $select = "SELECT * FROM `salary` WHERE E_email = '$email';";
    $sql= "UPDATE `salary` SET `Basic_pay`='$Basic_pay',`DA`='$DA',`Conveyance_Allowance`='$ca',`Med_Allow`='$Med_Allow',`Increment`='$inc',`Tax_Deduction` = '$tax', `PF` = '$pf', `Account` = '$acc' WHERE `E_email` = '$email';";
    $result = mysqli_query($con,$sql);

    
        if($result){
                $_SESSION['status'] = "Employee Salary Updated Successfully!";
                $_SESSION['status_code'] = "success";
                // echo "Records updated successfully.";   
                echo "<script>window.location.href='search.php';</script>";       
            }
        else{
                echo "ERROR: Could not  to execute pass $sql. " . mysqli_error($con);
        }
    

}

?>
