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
    <title>Projects</title>
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

<body style="background-size: cover;background-image: url(&quot;../assets/img/Employee.jpg&quot;);background-repeat: no-repeat;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 110px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="viewonline.php">VIEW SALARY</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link active" href="view_project.php">VIEW PROJECT</a></li>

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
                <h2 class="text-dark"><strong>Projects</strong></h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col" style="background-color: #ffffff;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Project Description</th>
                                    <th class='text-success'>Starting Date</th>
                                    <th class='text-danger'>Deadline</th>
                                    <th>Project Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM `project` where E_email = '$email';";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_fetch_array($result)!=NULL){
                                    $sql = "SELECT * from `project` where E_email = '$email';";
                                    $result = mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Pname'] . "</td>";
                                        echo "<td>" . $row['Description'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                        echo "<td>" . $row['Deadline'] . "</td>";
                                        
                                        echo "<td>";
                                        if($row['status']=='active'){
                                            echo "<strong class='text-success'>" . "Active" . "</strong>";
                                        }
                                        else{           
                                            echo "<strong class='text-danger'>" . "Completed" . "</strong>";
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