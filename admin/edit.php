<?php
include '../connectDB.php';

session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $mail=$_GET['mail'];  
    $sql= "SELECT * FROM `employee` WHERE E_email='$mail'";
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
    <title>Edit Employee Details</title>
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

<body style="background-repeat: no-repeat;background-size: cover;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 0px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1" style="padding: 0px;">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="add.php">ADD EMPLOYEE</a></li>
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
                <h2 class="text-info"><strong>Update Employee</strong></h2>
            </div>
            <form style="padding-top: 31px;max-width: 629px;width: 610px;" action="update.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Fname">First Name</label><input class="form-control item" type="text" value="<?php echo $row['Fname']; ?>" id="Fname" name="Fname" required ></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Lname">Last Name</label><input class="form-control item" type="text" value="<?php echo $row['Lname']; ?>" id="Lname" name="Lname" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col" style="width: 280px;max-width: 100%;">
                    <input type="hidden" name="email" value="<?php echo "$mail";?>">
                        <div class="form-group"><label for="Email">Email</label><input class="form-control item" disabled type="email" value="<?php echo $row['E_email']; ?>" id="Email" name="Email" required></div>
                    </div>
                    <div class="col" style="max-width: 216px;">
                        <div class="form-group"><label for="DOB">Date of Birth</label><input class="form-control" type="date" value="<?php echo $row['DOB']; ?>" id="DOB" name="DOB" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Ph_No">Phone Number</label><input class="form-control" type="number" value="<?php echo $row['Ph_no']; ?>" id="Ph_No" name="Ph_No" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Alternate_no">Alternate Number</label><input class="form-control" type="number" value="<?php echo $row['Alternate_no']; ?>" id="Alternate_no" name="Alternate_no"></div>
                    </div>
                </div>
                <div class="form-group"><label for="Address">Address</label><textarea class="form-control" id="Address"  name="Address" required><?php echo $row['Address']; ?></textarea></div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="role">Role</label>
                            <div class="form-group">
                                <select id="role" name="Role" class="form-control" data-role="select-dropdown" data-profile="minimal" class="bg-primary" required>
                                    <option class="btn" value="" disabled selected><?php echo $row['Role']; ?></option>
                                    <option class="btn" value="Manager">Manager</option>
                                    <option class="btn" value="Staff">Staff</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="col">
                    <label for="role" style="margin-bottom: 25px;"></label>
                    <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(59,153,224);"name="update">Update Employee Details</button>
                    </div>
                    

                </div>
             
            </form>

            <form action="edit_salary.php" method="get" style="padding-top: 0px; max-width: 629px;width: 610px; border-top: 2px solid white;"  >
                        <input  type="hidden" name="mail" value="<?php echo "$mail";?>">
                        <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(59,153,224);">Update Employee Salary</button>
                        
     
            </form>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>