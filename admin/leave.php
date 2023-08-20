<?php
include '../connectDB.php';
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
}
else{
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Leaves</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
</head>

<body style="background-size: cover;background-image: url(&quot;../assets/img/y.jpg&quot;);background-repeat: no-repeat;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 0px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="add.php">ADD EMPLOYEE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="search.php">SEARCH EMPLOYEE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link active" href="leave.php">VIEW LEAVES</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="view_project.php">VIEW PROJECT</a></li>
                </ul>
                <div class="row">
                    <div class="col"><form action="../logout.php" method="post"><button class="btn btn-primary" type="submit">Logout</button></form></div>
                </div>
        </div>
        </div>
    </nav>
    <section class="clean-block clean-info dark" style="background-color: rgba(246,246,246,0);opacity: 1;padding-top: 29px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-light"><strong>Leaves</strong></h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col" style="background-color: #ffffff;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>E-mail</th>
                                    <th>Leave Remaining</th>
                                    <th style="width: 171px;">Leave Type</th>
                                    <th>Leave From</th>
                                    <th>Leave To</th>
                                    <th>Leave Cause</th>
                                    <th>Leave Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM `eleave`";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_fetch_array($result)!=NULL){
                                    $sql = "SELECT * from `eleave`;";
                                    $result = mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                        echo "<td>" . $row['E_email'] . "</td>";
                                        echo "<td>" . $row['Leave_remaining'] . "</td>";
                                        echo "<td>" . $row['Leave_type'] . "</td>";
                                        echo "<td>" . $row['Leave_from'] . "</td>";
                                        echo "<td>" . $row['Leave_to'] . "</td>";
                                       
                                    if($row['Leave_cause']==NULL){
                                        echo "<td>" . "-" . "</td>";
                                    }
                                    else{
                                        echo "<td>" . $row['Leave_cause'] . "</td>";   
                                    }
                                    echo "<td>";
                                    if($row['Leave_status']==0){
                                        echo "<form action='leave_script.php' method='POST'>";
                                        echo '<select name="Leave_status" class="form-control" data-role="select-dropdown" data-profile="minimal" class="bg-primary" required>';
                                        echo '<option value="0" disabled selected>' . "Pending" . '</option>';
                                        echo '<option value="1">' . "Approved" . '</option>';
                                        echo '<option value="2">' . "Rejected" . '</option>';
                                        echo "</select>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo '<input type="hidden" name="Leave_Id" value='. $row['Leave_Id'] .'>';
                                        echo '<input type="hidden" name="E_email" value='. $row['E_email'] .'>';
                                        echo '<input type="hidden" name="Leave_remaining" value='. $row['Leave_remaining'] .'>';
                                        echo '<input type="hidden" name="Leave_taken" value='. $row['Leave_taken'] .'>';
                                        echo "<button class='btn btn-primary' type='submit' name='submit'>Go</button>"; 
                                        echo "</form>";
                                    
                                    }
                                    
                                    else{
                                        if($row['Leave_status']==1){
                                            echo "<strong class='text-success'>" . "Approved" . "</strong>";
                                        }
                                        else{           
                                            echo "<strong class='text-danger'>" . "Rejected" . "</strong>";
                                        }
                                    }
                                   echo "</td>";
                                    echo "</tr>";
                                    }
                                   
                                }
                                else{
                                    echo "<tr>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<td>" . "-" . "</td>";
                                    echo "<tr>";

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>