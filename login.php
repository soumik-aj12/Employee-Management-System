<?php include "connectDB.php";
$sql = "SELECT * FROM eleave ORDER BY Leave_Id;";
$result = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($result)){
  $str_to = strtotime($row['Leave_to']);
  $str_today = strtotime(date("Y-m-d"));
  if($str_to<$str_today){
      // echo "Leave is expired";
      $Leave_Id = $row['Leave_Id'];
      $del_sql = "DELETE FROM `eleave` WHERE `Leave_Id`= '$Leave_Id';";
      $del_result = mysqli_query($con, $del_sql);
}

}
$sql = "SELECT * FROM project";
$result2 = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($result2)){
  $deadline = strtotime($row['Deadline']);
  $str_today = strtotime(date("Y-m-d"));
  if($deadline<$str_today){
      $PID = $row['PID'];
      $up_sql= "UPDATE `project` SET `status`='Complete' WHERE PID='$PID'";
      $update_result = mysqli_query($con, $up_sql);
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body style="background-image: url('assets/img/home.jpg');background-size: cover;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 200px;">
        <div class="container" style="max-width:1920px"><img src="assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        
        <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.html">About</a></li>
                </ul>
        </div>
        </div>
    </nav>
    
    <div class="login-clean" style="background-color: rgba(241,247,252,0);padding-top: 11px;">
        <form method="post" style="margin-top: 197px;height: 490px;padding-top: 36px;">
            <div class="illustration" style="margin-bottom: -23px;">
                <h1 style="color: rgba(9, 162, 255, 0.85);margin-bottom: 65px;"><strong>Login</strong></h1>
            </div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <select id="role" name="role" class="form-control" data-role="select-dropdown" data-profile="minimal" class="bg-secondary" required>
                <option class="btn" value="" disabled selected>Select Role</option>
                <option class="btn" value="Admin">Admin</option>
                <option class="btn" value="Manager">Manager</option>
                <option class="btn" value="Staff">Staff</option>
            </select>
            <br>
			<?php include "login_script.php";?>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgba(9, 162, 255, 0.85);">Log In</button></div><a class="forgot" href="#forgot_pass" data-toggle="modal" data-target="#forgot_pass">Forgot your password?</a></form>
    
    </div>
<div class="modal fade" id="forgot_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form action="forgot_pass.php" method="post" enctype="multipart/form-data">
      <div class="form-group"><input class="form-control" type="email" name="forgot_email" placeholder="Email" required></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="forgot_submit">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
    <main class="page pricing-table-page"></main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="sweetalert.js"></script>
    <?php
        if(isset($_GET['code']) && $_GET['code'] =="success"){
          echo "<script>
          swal({
          title: 'Password has been sent to your email',
          icon: 'success',
          button: 'Okay!',
        });
      </script>";
      echo "<script>setTimeout(function () {
        window.location.href= 'login.php';
     },5000);</script>";
        }
        else if(isset($_GET['code']) && $_GET['code'] =="error"){
          echo "<script>
          swal({
          title: 'Email could not be found',
          icon: 'error',
          button: 'Okay!',
        });
      </script>";
      echo "<script>setTimeout(function () {
        window.location.href= 'login.php';
     },5000);</script>";
        }
        ?>
</body>
</html>