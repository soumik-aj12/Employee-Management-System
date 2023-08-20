<?php
if(isset($_POST['add'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    
    $email = $_POST['Email'];
    $dob = $_POST['DOB'];
    
    $Ph_No = $_POST['Ph_No'];
   
    $address = $_POST['Address'];

    $role = $_POST['Role'];
     if($role == "Admin"){
        $select = "SELECT * FROM `admin` WHERE A_email = '$email';";
        $result = mysqli_query($con,$select);
     }
     else{
        $select = "SELECT * FROM `employee` WHERE E_email = '$email';";
        $result = mysqli_query($con,$select);
     }

    if(mysqli_num_rows($result) > 0){
          echo '<p class="text-danger">Email already registered!</p>';
      }
    else{
        $_SESSION['Session_email'] = $email;
        $_SESSION['Session_Fname'] = $Fname;
        $_SESSION['Session_Lname'] = $Lname;
        $_SESSION['Session_DOB'] = $dob;
        $_SESSION['Session_Ph_No'] = $Ph_No;
        if($_POST['Alternate_no']!=""){
            $_SESSION['Session_Alternate_no'] = $_POST['Alternate_no'];
        }
        $_SESSION['Session_Address'] = $address;
        $_SESSION['Session_role'] = $role;
        
        echo "<script>window.location.href='salary.php?mail=$email';</script>";

    
    }
}

?>
