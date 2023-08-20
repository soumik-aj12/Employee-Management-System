<?php
 include '../connectDB.php';

if(isset($_POST['salary'])){
    session_start();
    $Basic_pay = $_POST['Basic_pay'];
    $DA = $_POST['DA'];
    $ca = $_POST['Conveyance_Allowance'];
    $Med_Allow = $_POST['Med_Allow'];
    $inc = $_POST['Increment'];
    $tax = $_POST['Tax_Deduction'];
    $pf = $_POST['PF'];
    $acc = $_POST['Account'];

    //ADD SCRIPT
    $email = $_SESSION['Session_email'];
    $Fname = $_SESSION['Session_Fname'];
    $Lname = $_SESSION['Session_Lname'];
    $dob = $_SESSION['Session_DOB'];
    $Ph_No = $_SESSION['Session_Ph_No'];
    $address = $_SESSION['Session_Address'];
    $role = $_SESSION['Session_role'];
    $email = $_SESSION['Session_email'];
    echo $email;
    if($role == "Admin"){
        if(isset($_SESSION['Session_Alternate_no'])){
            $Alternate_no = $_SESSION['Session_Alternate_no'];
            $sql_add = "insert into `admin` (`Fname`,`Lname`,`A_email`,`DOB`,`Ph_No`,`Alternate_no`,`Address`,`Role`) values ('$Fname','$Lname', '$email','$dob','$Ph_No','$Alternate_no','$address','$role');";
        }
        else{
            $sql_add = "insert into `admin` (`Fname`,`Lname`,`A_email`,`DOB`,`Ph_No`,`Address`,`Role`) values ('$Fname','$Lname', '$email','$dob','$Ph_No','$address','$role');";
        }
    }
    else{
        if(isset($_SESSION['Session_Alternate_no'])){
            $Alternate_no = $_SESSION['Session_Alternate_no'];
            $sql_add = "insert into `employee` (`Fname`,`Lname`,`E_email`,`DOB`,`Ph_No`,`Alternate_no`,`Address`,`Role`) values ('$Fname','$Lname', '$email','$dob','$Ph_No','$Alternate_no','$address','$role');";

        }
        else{
            $sql_add = "insert into `employee` (`Fname`,`Lname`,`E_email`,`DOB`,`Ph_No`,`Address`,`Role`) values ('$Fname','$Lname', '$email','$dob','$Ph_No','$address','$role');";
        }
        
    }
    $add_result = mysqli_query($con,$sql_add);
    
    $sql = "insert into `salary` (`Basic_pay`,`DA`,`Conveyance_Allowance`,`Med_Allow`,`Increment`,`Tax_Deduction`,`PF`,`Account`,`E_email`) values ('$Basic_pay','$DA', '$ca','$Med_Allow','$inc','$tax','$pf','$acc','$email');";
    // echo $sql;
    $result = mysqli_query($con,$sql);

    
        if($result){
            $_SESSION['status'] = "Employee Salary Inserted Successfully!";
            $_SESSION['status_code'] = "success";
            
            if($add_result){
                function randomPassword() {
                        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`!@#$%^&_/*-+';
                        $pass = array(); // declaring $pass as an array
                        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                        for ($i = 0; $i < 8; $i++) {
                            $n = rand(0, $alphaLength);
                            $pass[] = $alphabet[$n];
                        }
                        return implode($pass); //turning array into a string
                    }
                    $password = randomPassword();
                    // echo "password is $password";
                    if($role == "Admin"){
                        $sql = "insert into `login` (`A_email`,`Password`,`Role`) values ('$email','$password','$role');";
                        $result = mysqli_query($con,$sql);
                    }
                    else{
                        $sql = "insert into `login` (`E_email`,`Password`,`Role`) values ('$email','$password','$role');";
                        $result = mysqli_query($con,$sql);
                    }
                    //sending the email
                    $to_email = $email;
                    $subject = "Welcome to our company, ".$Fname." ".$Lname." !!!";
                    $body = "Hi, your password is ".$password. ". Login with your email and the provided password through eManager. Please do not share this email with anyone. Thank you.";
                    $headers = "From: noreply2601@gmail.com";
                    
                    if (mail($to_email, $subject, $body, $headers)) {
                        echo "Email successfully sent to $to_email...";
                    } else {
                        echo "Email sending failed...";
                    } 
                    echo "Records inserted successfully.";  
                           
                }
            else{
                    echo "ERROR: Could not  to execute pass $sql. " . mysqli_error($con);
            }
            echo "<script>window.location.href='search.php';</script>";   
                  
            }
        else{
                echo "ERROR: Could not  to execute pass $sql. " . mysqli_error($con);
        }
    

}

?>
