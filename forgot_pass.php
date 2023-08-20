<?php
include 'connectDB.php';
if(isset($_POST['forgot_submit'])){
    session_start();
    $email = $_POST['forgot_email'];
    $sql = "SELECT * FROM `login` WHERE `E_email`='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $row = mysqli_fetch_assoc($result);
        $password = $row['Password'];
        $to_email = $email;
        $subject = "Resending your password.";
        $body = "Hi, your password is ".$password. ". Please do not share this email with anyone. Thank you.";
        $headers = "From: noreply2601@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
        // echo "<script>alert('Please check your email');</script>";
        // $_SESSION['pass_status'] = "An email has been sent to you.";
		// $_SESSION['pass_code'] = "success";
        echo "<script>window.location.href='login.php?code=success';</script>";
        } 
}
    else 
    {
        // $_SESSION['pass_status'] = "Please enter a correct e-mail address.";
		// $_SESSION['pass_code'] = "error";
        echo "<script>window.location.href='login.php?code=error';</script>";        
    } 

    
}

?>