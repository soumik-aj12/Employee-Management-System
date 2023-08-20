
<?php
    $mail=$_GET['mail'];
    include '../connectDB.php';
    $sql= "SELECT * FROM `employee` WHERE E_email='$mail'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My Profile</title>
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

<body style="background-size: cover;background-repeat: no-repeat;background-image: url(&quot;../assets/img/y.jpg&quot;);background-color: rgb(255,255,255);">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 0px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="container" style="margin-right: 0px;">
        
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
    <div class="container-fluid" style="padding-top: 94px;">
    <center><h3 class="text-light mb-4" style="font-size:3rem"><b><?php echo $row['Fname']; ?> <?php echo $row['Lname']; ?>'s Profile</b></h3></center>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                <div class="card-body text-center shadow">
                <?php 
                    if($row['image'] == ""){
                        echo '<img class="rounded-circle mb-3 mt-4" src="../upload/default.png" width="180" height="180">';
                    }
                    else{
                    echo '<img class="rounded-circle mb-3 mt-4" width="180" height="180" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'; 
                    }
                    ?>
                        
                    </div>
                </div>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">Salary</h6>
                    </div>
                    <div class="card-body" style="height: 60px;">
                    <?php 
                    $sql = "SELECT * FROM `salary` WHERE E_email='$mail'";
                    $result = mysqli_query($con, $sql);
                    $row_salary = mysqli_fetch_assoc($result);
                    ?>
                    <legend><?php echo $row_salary['Basic_pay']; ?></legend>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0"></p>
                                        <p class="m-0"><strong></strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0"></p>
                                        <p class="m-0"><strong></strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">User Info</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>First Name</strong></label>
                                                <fieldset style="padding: 0px;height: 30px;">
                                                    <legend><?php echo $row['Fname']; ?></legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Last Name</strong></label>
                                                <fieldset style="padding: 0px;height: 30px;">
                                                    <legend><?php echo $row['Lname'] ?></legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Date of Birth</strong></label>
                                                <fieldset style="padding: 0px;height: 30px;">
                                                    <legend><?php echo $row['DOB'] ?></legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Role</strong></label>
                                                <legend><?php echo $row['Role'] ?></legend>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Contact Info</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>E-mail</strong></label>
                                                    <fieldset style="padding: 0px;height: 30px;">
                                                        <legend><?php echo $row['E_email'] ?></legend>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Phone Number</strong></label>
                                                    <fieldset style="padding: 0px;height: 30px;">
                                                        <legend><?php echo $row['Ph_no'] ?></legend>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Alternate Number</strong></label>
                                                    <fieldset style="padding: 0px;height: 30px;">
                                                        <legend><?php 
                                                            if($row['Alternate_no']==NULL)
                                                            {
                                                                echo "-";
                                                            }
                                                            else
                                                            {
                                                                echo $row['Alternate_no'];
                                                            }

                                                        ?></legend>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div><label for="address"><strong>Address</strong></label><div class="form-group">
                                                    <fieldset style="padding: 0px;height: 30px;">
                                                        <legend><?php echo $row['Address'] ?></legend>
                                                    </fieldset>
                                                </div></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="leave_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>