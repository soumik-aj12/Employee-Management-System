<?php include '../connectDB.php' ?>
<?php
include '../connectDB.php';
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
        $sql = "SELECT * from admin where A_email = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
}
else{
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<!DOCTYPE html>
<html style="font-family: Montserrat, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Employee</title>
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

<body style="background-repeat: no-repeat;background-image: url(&quot;../assets/img/y.jpg&quot;);background-size: cover;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 0px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="container" style="margin-right: 0px;">
        
        <div class="collapse navbar-collapse" id="navcol-1" style="padding: 0px;">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link active" href="add.php">ADD EMPLOYEE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="search.php">SEARCH EMPLOYEE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="leave.php">VIEW LEAVES</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="view_project.php">VIEW PROJECT</a></li>
                    </ul>
                    <div class="row">
                        <div class="col"><form action="../logout.php" method="post"><button class="btn btn-primary" type="submit">Logout</button></form></div>
                    </div>
                </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background-color: rgba(246,246,246,0);padding-top: 23px;">
        <div class="container" style="padding-top: 24px;width: 1133px;">
            <div class="block-heading">
                <h2 class="text-light" style="font-size:2.5rem"><strong>Registration</strong></h2>
            </div>
            <form style="padding-top: 31px;max-width: 629px;width: 610px;" action="add.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Fname">First Name <span style="color:red">*</span></label><input class="form-control item" type="text" id="Fname" name="Fname" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Lname">Last Name <span style="color:red">*</span></label><input class="form-control item" type="text" id="Lname" name="Lname" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col" style="width: 280px;max-width: 100%;">
                        <div class="form-group"><label for="Email">Email <span style="color:red">*</span></label><input class="form-control item" type="email" id="Email" name="Email" required></div>
                    </div>
                    <div class="col" style="max-width: 216px;">
                        <div class="form-group"><label for="DOB">Date of Birth <span style="color:red">*</span></label><input class="form-control" type="date" id="DOB" name="DOB" max="2001-01-01" min="1960-01-01" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Ph_No">Phone Number <span style="color:red">*</span></label><input class="form-control" type="number" id="Ph_No" name="Ph_No" min="1" max="9999999999" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Alternate_no">Alternate Number</label><input class="form-control" type="number" id="Alternate_no" name="Alternate_no"></div>
                    </div>
                </div>
                <div class="form-group"><label for="Address">Address <span style="color:red">*</span></label><textarea class="form-control" id="Address" name="Address" required></textarea></div>
                <div class="form-row">
                    <div class="col" style="max-width: 182px;">
                        <div class="form-group"><label for="role">Role <span style="color:red">*</span></label>
                            <div class="form-group">
                                <select id="role" name="Role" class="form-control" data-role="select-dropdown" data-profile="minimal" class="bg-primary" required>
                                    <option class="btn" value="" disabled selected>Select Role</option>
                                    <option class="btn" value="Admin">Admin</option>
                                    <option class="btn" value="Manager">Manager</option>
                                    <option class="btn" value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="form-group"><label for="Salary">Salary</label><input class="form-control" type="number" name="Salary" required></div>
                    </div> -->
                </div><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(59,153,224);"name="add">Register</button></form>


                <?php include 'add_script.php' ?>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>