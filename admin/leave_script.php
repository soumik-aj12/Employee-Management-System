<?php
include '../connectDB.php';
session_start();
//admin leave script
if(isset($_POST['submit'])){
    $leave_id = $_POST['Leave_Id'];
    //sql query for the last row
    $email = $_POST['E_email'];
    $sql = "SELECT * FROM eleave WHERE E_email ='$email' ORDER BY Leave_Id DESC LIMIT 1;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($result);
    $Leave_remaining = $rows['Leave_remaining'];
    $Leave_taken = $rows['Leave_taken'];
    echo $Leave_remaining;//12
    echo $Leave_taken;//3
    // if($Leave_remaining==""){
    //     echo "oh no";
    // }

    
    $leave_status = $_POST['Leave_status'];
    if($leave_status==2){
        //sql query for the original id
        $s = "SELECT * FROM `eleave` WHERE `Leave_Id` = '$leave_id'";
        $r = mysqli_query($con, $s);
        $row = mysqli_fetch_assoc($r); 
        if($r){
            $Leave_remaining = $Leave_remaining + $row['Leave_requested'];//12+3=15
            echo $Leave_remaining;
            $Leave_taken = $Leave_taken - $row['Leave_requested'];
            echo $Leave_taken;
            $LAST_Leave_Id = $rows['Leave_Id'];
            echo $LAST_Leave_Id;
            $sql1 = "UPDATE `eleave` SET `Leave_remaining`='$Leave_remaining', `Leave_taken`='$Leave_taken' WHERE `Leave_Id`='$LAST_Leave_Id';";
            if(mysqli_query($con, $sql1))
            {
                echo "success";
                $sql = "UPDATE `eleave` SET `Leave_status`='$leave_status' WHERE `Leave_Id`='$leave_id'";
                $result = mysqli_query($con, $sql);
                if($result){
                    echo "<script>window.location.href='leave.php';</script>";
                }
                else{
                    echo "SECOND UPDATE FAILED";
                    // echo "<script>window.location.href='leave.php';</script>";
                }
            }
            else
            {
                echo "error";
            }
        }
    }
    else{
        $sql = "UPDATE `eleave` SET `Leave_status`='$leave_status' WHERE `Leave_Id`='$leave_id'";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "<script>window.location.href='leave.php';</script>";
        }
        else{
            echo "UPDATE FAILED";
            // echo "<script>window.location.href='leave.php';</script>";
        }
    }

   
}

?>