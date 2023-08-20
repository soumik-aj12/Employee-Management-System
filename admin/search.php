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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search Employee</title>
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

<body style="background-image: url(&quot;../assets/img/y.jpg&quot;); background-size: cover;background-repeat: no-repeat;">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-bottom: 16px;padding-top: 16px;padding-right: 0px;">
        <div class="container" style="max-width:100%"><img src="../assets/img/ems.jpg" alt="e" style="width: 240px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1" style="padding: 0px;">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="add.php">ADD EMPLOYEE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link active" href="search.php">SEARCH EMPLOYEE</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="leave.php">VIEW LEAVES</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="view_project.php">VIEW PROJECT</a></li>
                </ul>
                <div class="row">
                    <div class="col"><form action="../logout.php" method="post"><button class="btn btn-primary" type="submit">Logout</button></form></div>
                </div>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="padding-top: 263px;background-color: rgba(246,246,246,0);">
        <h2 class="text-info"><strong>Search Employee</strong></h2>
        <div class="container">
            <form  method="post" action="search.php" style="width: 500px;" >
                <div class="form-group"><input class="form-control" type="text" name="search" placeholder="Enter the employee name:-">
                </div><button class="btn btn-primary btn-block" type="submit">Search</button>
            </form>
        </div>
    </section>
    <!--<section class="clean-block clean-info dark" style="background-color: rgba(246,246,246,0.39);opacity: 1;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><strong>Here are your search results:-</strong></h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col" style="background-color: #ffffff;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <!-- <th style="width: 293px;">Date of Birth</th> 
                                    <th>Role</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>-->
<?php
    include '../connectDB.php';
    if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $sql = "SELECT * FROM `employee` WHERE `Fname` LIKE '%$search%' OR `Lname` LIKE '%$search%'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
		echo "<section class='clean-block clean-info dark' style='background-color: rgba(255,255,255,1);border-radius:0;padding-bottom: 0px;'>";
        echo "<div class='container'>";
            echo "<div class='block-heading' style='padding-top: 25px;'>";
                echo "<h2 class='text-info'><strong>Here are your search results:-</strong></h2>";
            echo "</div>";
        echo "</div>";
        echo "<div class='container'>";
            echo "<div class='row'>";
                echo "<div class='col' style='background-color: #ffffff;'>";
                    echo "<div class='table-responsive'>";
		echo "<table class='table'>";
            echo "<thead>";                
                echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<th>E-mail</th>";
                    echo"<th>Role</th>";
                    echo"<th>View</th>";
                    echo"<th>Edit</th>";
                    echo "<th>Delete</th>";
                    echo "</tr>";
                    echo "</thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            $mail= $row['E_email'];
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row["Fname"] ." ". $row["Lname"] . "</td>";
            echo "<td>" . $row["E_email"] . "</td>";
            // echo "<td>" . $row["DOB"] . "</td>";
            echo "<td>" . $row["Role"] . "</td>";
            echo "<td> <a href='view.php?mail=$mail' <button type='button' class='btn btn-info'> View </button> </td>";
            echo "<td> <a href='edit.php?mail=$mail'> <button type='button' class='btn btn-warning'> Edit </button></a> </td>";
            echo "<td> <a href='delete.php?mail=$mail' <button type='button' class='btn btn-danger' onclick='return checkdel()' > Delete </button> </td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    } else {
        echo "<h3 class='text-danger text-center'>No results found</h3>";
    }
}
?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function checkdel()
        {
            return confirm("Are you sure you want to delete the record?");
        }
    </script>
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
</body>

</html>