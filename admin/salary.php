<?php include '../connectDB.php';
      $mail=$_GET['mail'];
 ?>

<!DOCTYPE html>
<html style="font-family: Montserrat, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add salary</title>
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
   
    <section class="clean-block clean-form dark" style="background-color: rgba(246,246,246,0);padding-top: 23px;">
        <div class="container" style="padding-top: 24px;width: 1133px;">
            <div class="block-heading">
                <h2 class="text-info"><strong>Salary</strong></h2>
            </div>
            <form style="padding-top: 31px;max-width: 629px;width: 610px;" action="salary_script.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Basic_pay">Basic pay</label><input class="form-control item" type="number" id="Basic_pay" name="Basic_pay" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="DA">Dearness Allowance</label><input class="form-control item" type="number" id="DA" name="DA" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col" style="width: 280px;max-width: 100%;">
                        <div class="form-group"><label for="Conveyance_Allowance">Conveyance_Allowance</label><input class="form-control item" type="number" id="Conveyance_Allowance" name="Conveyance_Allowance" required></div>
                    </div>
                    <div class="col" style="max-width: 216px;">
                        <div class="form-group"><label for="Med_Allow">Medical allowance</label><input class="form-control" type="number" id="Med_Allow" name="Med_Allow" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="Increment">Increment</label><input class="form-control" type="number" id="Increment" name="Increment" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Tax_Deduction">Tax deduction</label><input class="form-control" type="number" id="Tax_Deduction" name="Tax_Deduction"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="PF">Provident Fund</label><input class="form-control" type="number" id="PF" name="PF" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="Account">Account no.</label><input class="form-control" type="number" id="Account" name="Account"></div>
                    </div>
                </div>
                        <input type="hidden" name="email" value="<?php echo $mail ;?>">
                        <div class="form-group"><label for="Email">Employee Email</label><input class="form-control item" disabled type="email" value="<?php echo $mail ;?>" id="Email" name="Email" required></div>
                
                <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(59,153,224);"name="salary">Register salary</button></form>


                <?php include 'salary_script.php' ?>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>