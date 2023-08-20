
<?php
    $mail=$_GET['mail'];
    include '../connectDB.php';
    $sql= "SELECT * FROM `salary` WHERE E_email='$mail'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);  
?>

<!DOCTYPE html>
<html style="font-family: Montserrat, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Update salary</title>
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
                <h2 class="text-info"><strong>Update Salary</strong></h2>
            </div>
            <form style="padding-top: 31px;max-width: 629px;width: 610px;" action="editSalaryScript.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Basic_pay">Basic pay</label><input class="form-control item" type="number" id="Basic_pay" name="Basic_pay" value="<?php echo $row['Basic_pay']; ?>"></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="DA">Dearness Allowance</label><input class="form-control item" type="number" id="DA" name="DA" value="<?php echo $row['DA']; ?>"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col" style="width: 280px;max-width: 100%;">
                        <div class="form-group"><label for="Conveyance_Allowance">Conveyance_Allowance</label><input class="form-control item" type="number" id="Conveyance_Allowance" name="Conveyance_Allowance" value="<?php echo $row['Conveyance_Allowance']; ?>"></div>
                    </div>
                    <div class="col" style="max-width: 216px;">
                        <div class="form-group"><label for="Med_Allow">Medical allowance</label><input class="form-control" type="number" id="Med_Allow" name="Med_Allow" value="<?php echo $row['Med_Allow']; ?>"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Increment">Increment</label><input class="form-control" type="number" id="Increment" name="Increment" value="<?php echo $row['Increment']; ?>"></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Tax_Deduction">Tax deduction</label><input class="form-control" type="number" id="Tax_Deduction" name="Tax_Deduction" value="<?php echo $row['Tax_Deduction']; ?>"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="PF">Provident Fund</label><input class="form-control" type="number" id="PF" name="PF" value="<?php echo $row['PF']; ?>"></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Account">Account no.</label><input class="form-control" type="number" id="Account" name="Account" value="<?php echo $row['Account']; ?>"></div>
                    </div>
                </div>
                        <input type="hidden" name="email" value="<?php echo $mail ;?>">
                        <div class="form-group"><label for="Email">Employee Email</label><input class="form-control item" disabled type="email" value="<?php echo $mail ;?>" id="Email" name="Email" required></div>

                <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(59,153,224);"name="up_salary">Update salary</button></form>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>
  


</html>