<?php
include '../connectDB.php';
session_start();
$email = $_SESSION['email'];
$leave_query = "SELECT * FROM eleave WHERE E_email ='$email' ORDER BY Leave_Id DESC LIMIT 1;";
$leave_result = mysqli_query($con, $leave_query);
$num=mysqli_num_rows($leave_result);
if($num>0){
$leave_row = mysqli_fetch_assoc($leave_result);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['submit'])){ 
//fetching details required to insert into eleave
$Leave_type=$_POST['Leave_type'];
$Leave_from=$_POST['Leave_from'];
$Leave_to=$_POST['Leave_to'];
$Total_leave = 15;

//calculating the number of days remaining
$from_date = strtotime($Leave_from);//20
$to_date = strtotime($Leave_to);//22
$difference = $to_date - $from_date;
$Leave_requested = floor($difference / (60 * 60 * 24));//2
$Leave_taken = $leave_row['Leave_taken'];//3
$Leave_remaining = $Total_leave - ($Leave_taken+$Leave_requested);//15 -(3 +2) = 10
$Leave_taken = $Leave_taken + $Leave_requested;//3 + 2 = 5
//inserting into leave table
if(isset($_POST['Leave_cause'])){
$Leave_cause=$_POST['Leave_cause'];
echo $Leave_cause;
$sql = "INSERT INTO `eleave` (E_email,Leave_taken,Leave_remaining,Leave_requested,Leave_type,Leave_cause, Leave_from, Leave_to) VALUES ('$email','$Leave_taken','$Leave_remaining','$Leave_requested','$Leave_type','$Leave_cause', '$Leave_from', '$Leave_to')";
$result = mysqli_query($con, $sql);
print_r($sql);
if($result){
	echo 123123;
// echo "<script>$('#applyleave_modal').modal('close');</script>";
header("Location: profile.php");
}
}
else{
$sql = "INSERT INTO `eleave` (E_email,Leave_taken,Leave_remaining,Leave_type, Leave_from, Leave_to) VALUES ('$email','$Leave_taken','$Leave_remaining','$Leave_requested','$Leave_type', '$Leave_from', '$Leave_to')";
$result = mysqli_query($con, $sql);  
if($result){
	echo 123123;
// echo "<script>$('#applyleave_modal').modal('close');</script>";
header("Location: profile.php");
}
}
}
}
?>