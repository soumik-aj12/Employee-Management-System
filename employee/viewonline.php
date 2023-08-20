<?php include '../connectDB.php' ?>

<?php

session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
        $sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
        $result = mysqli_query($con, $sql);
       // $row = mysqli_fetch_assoc($result);
}


?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My salary</title>
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

<body style="background-size: cover;background-image: url(&quot;../assets/img/Employee.jpg&quot;);background-repeat: no-repeat;background-color: rgb(255,255,255);">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 110px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="padding: 0px;">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link active" href="viewonline.php">VIEW SALARY</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="view_project.php">VIEW PROJECT</a></li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <form action="../logout.php" method="post"><button class="btn btn-primary" type="submit">Logout</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background-color: rgba(246,246,246,0);padding-top: 23px;">
        <div class="container" style="padding-top: 24px;width: 1133px;">
            <div class="block-heading">
                <h2 class="text-dark"><strong>View salary</strong></h2>
            </div>
        
        <div class="container">
            <div class="row">
                <div class="col" style="background-color: #ffffff;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_fetch_array($result)!=NULL){
                                    $sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
                                    $result = mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                        echo "<th>" . "Basic_pay" . "</th>";
                                        echo "<td>" . $row['Basic_pay'] . "</td>";
  
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>" . "Dearness Aloowance" . "</th>";
                                        echo "<td>" . $row['DA'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>" . "Conveyance_Allowance" . "</th>";
                                        echo "<td>" . $row['Conveyance_Allowance'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>" . "Medical_Allowance" . "</th>";
                                        echo "<td>" . $row['Med_Allow'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>" . "Increment" . "</th>";
                                        echo "<td>" . $row['Increment'] . "</td>";
                                    echo "</tr>";
                                    }
                                   
                                }
                                else{
                                    echo "<tr>";
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
        <div style="margin-top:10px" class="mb-3">
        <div class="d-grid gap-2">
                <button class="btn btn-primary btn-block"  onclick="window.location.href='viewsalary.php'" type="submit" style="background-color: #007bff;" name="salary">Generate Salary Slip</button>
        </div>
        </div>
  
    </section>
   
    <main class="page pricing-table-page"></main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    
</body>

</html>