<?php
$login = false;
if(isset($_POST['email']) && isset($_POST['password'])){
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
if($role == "Admin"){
    $sql = "SELECT * FROM `login` where `A_email`='$email' and `Password` ='$password';";
}
else if ($role == 'Manager'){
    $sql = "SELECT * FROM `login` where `E_email`='$email' and `Password` ='$password' and `Role`='Manager'; ";
}
else{
    $sql = "SELECT * FROM `login` where `E_email`='$email' and `Password` ='$password' and `Role`='Staff'; ";
}
    // echo $sql;
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $login = true;
        $row = mysqli_fetch_assoc($result);
        if($role == 'Admin'){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $role;
        echo "<script>window.location.href='admin/profile.php';</script>";
        }
        else if($role == 'Manager'){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $role;
        echo "<script>window.location.href='manager/profile.php';</script>";
        }
        else if($role == 'Staff'){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $role;
        echo "<script>window.location.href='employee/profile.php';</script>";
        }
        else{
            echo "Error";
        }
    }
    else{
        echo '<p style="color:red;">Invalid email or password</p>';
    }


}
?>