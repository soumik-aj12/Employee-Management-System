<?php
include '../connectDB.php';
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $sql = "SELECT * from employee where E_email = '$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>window.location.href='../login.php';</script>";
}
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
<style>
    .modal-content {
        width: 150% !important;
    }
</style>

<body style="background-size: cover;background-image: url(&quot;../assets/img/x.jpg&quot;);background-repeat: no-repeat;background-color: rgb(255,255,255);">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 110px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="padding: 0px;">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item item" role="presentation"><a class="nav-link active" href="profile.php">MY PROFILE</a></li>
                        <li class="nav-item item" role="presentation"><a class="nav-link" href="viewonline.php">VIEW SALARY</a></li>
                        <div class="row">
                            <div class="col">
                                <form action="../logout.php" method="post"><button class="btn btn-primary" type="submit">Logout</button></form>
                            </div>
                        </div>
                </div>

        </div>
    </nav>
    <div class="container-fluid" style="padding-top: 94px;">
       <center><h3 class="text-light mb-4" style="font-size:3rem"><b>My Profile</b></h3></center>
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
                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="file" data-toggle="modal" data-target="#change_picture">Change Photo</button></div>
                    </div>
                </div>
                <!-- Project Row -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#project_modal" style="height: 38px; ">Assign Projects</button></div>
                    </div>
                    <div class="col">
                        <div class="card shadow mb-4"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#view_project_modal" style="height: 38px;">View Projects</button></div>
                    </div>
                </div>
               
                <!-- SALARY CARD
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">Salary</h6>
                    </div>
                    <div class="card-body" style="height: 60px;">
                        <p>Rs. <?php echo $row['Salary'] ?>/-</p>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#applyleave_modal">Apply for leave</button></div>
                    </div>
                    <div class="col">
                        <div class="card shadow mb-4"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#viewleave_modal">View my leaves</button></div>
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
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">User Information</p>
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
                                <p class="text-primary m-0 font-weight-bold">Contact Information</p>
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
                                                                if ($row['Alternate_no'] == NULL) {
                                                                    echo "-";
                                                                } else {
                                                                    echo $row['Alternate_no'];
                                                                }

                                                                ?></legend>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div><label for="address"><strong>Address</strong></label>
                                        <div class="form-group">
                                            <fieldset style="padding: 0px;height: 30px;">
                                                <legend><?php echo $row['Address'] ?></legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Apply Leave Modal   -->
    <div class="modal fade" role="dialog" tabindex="-1" id="applyleave_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Apply Leave</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="apply_leave.php" method="post">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="Leave_type"><strong>Leave Type <span style="color:red">*</span></strong></label>
                                    <select class="form-control" id="Leave_type" name="Leave_type" required>
                                        <option value="" disabled selected>Select Leave Type</option>
                                        <option value="Casual Leave">Casual Leave</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Earned Leave">Earned Leave</option>
                                        <option value="Leave Without Pay">Leave Without Pay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="from_date"><strong>From Date <span style="color:red">*</span></strong></label>
                                    <input class="form-control" type="date" id="from_date" name="Leave_from" placeholder="From Date" min="<?php echo date("Y-m-d") ?>" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="to_date" ><strong>To Date <span style="color:red">*</span></strong></label>
                                    <input class="form-control" type="date" id="to_date" name="Leave_to" placeholder="To Date" min="<?php echo date("Y-m-d") ?>"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="reason" ><strong>Reason for Leave</strong></label>
                                    <textarea class="form-control" id="reason" name="Leave_cause" rows="3" placeholder="Reason"></textarea>
                                </div>
                            </div>
                        </div>
                        <?php
                        //fetching details required to update the leave history
                        $leave_query = "SELECT * FROM eleave WHERE E_email ='$email' ORDER BY Leave_Id DESC LIMIT 1;";
                        $leave_result = mysqli_query($con, $leave_query);
                        $num = mysqli_num_rows($leave_result);
                        if ($num > 0) {
                            $leave_row = mysqli_fetch_assoc($leave_result);
                        }
                        else{
                            $leave_row['Leave_remaining'] =15;
                        }
                        ?>
                        <div class="row">
                            <div class="col">
                                <h5>Leaves Taken</h5>
                                <?php
                                if ($num == 0) {
                                    echo 0;
                                } else {
                                    echo $leave_row['Leave_taken'];
                                }
                                ?>
                            </div>

                            <div class="col">
                                <h5>Leaves Remaining</h5>
                                <?php
                                if ($num == 0) {
                                    echo "<p id='Leave_remaining'>";
                                    echo 15;
                                    echo "</p>";
                                } else {
                                    echo "<p id='Leave_remaining'>";
                                    echo $leave_row['Leave_remaining'];
                                    echo "</p>";
                                }
                                ?>
                            </div>
                        </div>
                </div>
                <?php
                if ($leave_row['Leave_remaining'] == 0) {
                    echo '<div class="alert alert-danger" role="alert">
                            <strong>Sorry!</strong> You have no leaves remaining.
                        </div>';
                    echo '<div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit" name="submit" disabled>Submit</button></div>';
                } else {
                    echo '<div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit" name="submit">Submit</button></div>';
                }
                ?>

            </div>
            </form>

        </div>
    </div>
    <!--  View Leave Modal   -->
    <div class="modal fade" role="dialog" tabindex="-1" id="viewleave_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Leave</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th style="width:20%">From Date</th>
                                    <th style="width:20%">To Date</th>
                                    <th style="width:fit-content">Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `eleave` WHERE `E_email`='$email';";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_fetch_array($result) != NULL) {
                                    $sql = "SELECT * FROM `eleave` WHERE `E_email`='$email';";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td>" . $row['Leave_type'] . "</td>";
                                        echo "<td>" . $row['Leave_from'] . "</td>";
                                        echo "<td>" . $row['Leave_to'] . "</td>";
                                        if ($row['Leave_cause'] == NULL) {
                                            echo "<td>" . "-" . "</td>";
                                        } else {
                                            echo "<td>" . $row['Leave_cause'] . "</td>";
                                        }
                                        if ($row['Leave_status'] == 1) {
                                            echo "<td><strong class='text-success'>" . "Approved" . "</strong></td>";
                                        } else if ($row['Leave_status'] == 0) {
                                            echo "<td><strong class='text-secondary'>" . "Pending" . "</strong></td>";
                                            // echo "<td><span class='badge badge-warning'>Pending</span></td>";
                                        } else if ($row['Leave_status'] == 2) {
                                            echo "<td><strong class='text-danger'>" . "Rejected" . "</strong></td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
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
                    <div class="row">
                        <div class="col">
                            <h5>Leaves Taken</h5>
                            <?php
                            if ($num == 0) {
                                echo 0;
                            } else {
                                echo $leave_row['Leave_taken'];
                            }
                            ?>
                        </div>

                        <div class="col">
                            <h5>Leaves Remaining</h5>
                            <?php
                            if ($num == 0) {
                                echo 15;
                            } else {
                                echo $leave_row['Leave_remaining'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Profile Picture Modal -->
    <div class="modal fade" id="change_picture" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $sql1 = "SELECT * FROM `employee` WHERE `E_email`='$email';";
                    $result1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    ?> <?php 
                    if($row['image'] != ""){
                        echo '<img class="rounded-circle mb-3 mt-4" width="180" height="180" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'; 

                    }
                    ?>
                    <form action="image_script.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" placeholder="Choose image" required>
                        <input type="hidden" name="image_email" value="<?php echo $email ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Assign Project modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="project_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Project Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="assign_project.php" method="post">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="pname"><strong>Project Name <span style="color:red">*</span></strong></label>
                                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Project Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group" ><label  for="Sdate" ><strong class='text-success'>Starting Date <span style="color:red">*</span></strong></label>
                                    <input class="form-control"  type="date" id="Sdate" name="Sdate" placeholder="Starting Date" min="<?php echo date("Y-m-d") ?>"required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group" ><label for="deadline" ><strong class='text-danger'>Project Deadline <span style="color:red">*</span></strong></label>
                                    <input class="form-control" type="date" id="deadline" name="deadline" placeholder="Project Deadline" min="<?php echo date("Y-m-d") ?>"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="description" ><strong>Project Description <span style="color:red">*</span></strong></label>
                                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Project Description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="E_email" ><strong>Assign To: <span style="color:red">*</span></strong></label>
                                    <input type="text" class="form-control" id="E_email" name="E_email" placeholder="Enter the employee Email"required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" name="assign">Submit</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!--  View Project Modal   -->
    <div class="modal fade" role="dialog" tabindex="-1" id="view_project_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Project</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th class='text-success'>Starting Date</th>
                                    <th class='text-danger'>Deadline</th>
                                    <th>Assigned To</th>
                                    <th >Project Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `project`;";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_fetch_array($result) != NULL) {
                                    $sql = "SELECT * FROM `project`;";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Pname'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                        echo "<td>" . $row['Deadline'] . "</td>";
                                        echo "<td>" . $row['E_email'] . "</td>";
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
                                } else {
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

                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="sweetalert.js"></script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
            ?>
            <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Okay!",
              });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>

    <?php
        if(isset($_SESSION['image_status']) && $_SESSION['image_status'] != ''){
            ?>
            <script>
                swal({
                title: "<?php echo $_SESSION['image_status']; ?>",
                icon: "<?php echo $_SESSION['image_status_code']; ?>",
                button: "Okay!",
              });
            </script>
            <?php
            unset($_SESSION['image_status']);
        }
    ?>

    <script>
        var leave_remaining = document.getElementById('Leave_remaining');
        leave_remaining = parseInt(leave_remaining.innerText);

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }


        document.getElementById("from_date").onchange = function() {
            var from_date = document.getElementById("from_date").value;
            var result = new Date(from_date);

            result.setDate(result.getDate() + leave_remaining);

            var input = document.getElementById("to_date");

            input.setAttribute("min", this.value);
            console.log(this.value);
            console.log(leave_remaining);
            var formatted_date = formatDate(result);
            console.log(formatted_date);
            input.setAttribute("max", formatted_date);
        }
    </script>
    <script>
        document.getElementById("Sdate").onchange = function() {
            var input = document.getElementById("deadline");
            input.setAttribute("min", this.value);
        }
    </script>
</body>

</html>