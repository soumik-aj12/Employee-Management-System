<?php include "../connectDB.php";?>
<?php

session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
        $sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
        $result = mysqli_query($con, $sql);
       // $row = mysqli_fetch_assoc($result);
       $sql_name = "SELECT * FROM `employee` WHERE E_email = '$email';";
       $result_name = mysqli_query($con, $sql_name);
       $row_name = mysqli_fetch_assoc($result_name);
}
require('FPDF/fpdf.php');
$sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
$result = mysqli_query($con, $sql);



if(mysqli_fetch_array($result)!=NULL){
    $sql = "SELECT * FROM `salary` WHERE E_email = '$email';";
    $result = mysqli_query($con, $sql);
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',25);
    $pdf->Cell('',10,'My Salary','','1','C');
    $pdf->Cell('',10,' ','','1','C');
    while ($row=mysqli_fetch_assoc($result)) {
        
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Name','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row_name['Fname'].' '.$row_name['Lname'],'','1','J');

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Staff Email','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['E_email'],'','1','J');

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Basic Pay','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['Basic_pay'],'','1','J');

           
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Dearness Allowance','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['DA'],'','1','J');   
       
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Conveyance Allowance','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['Conveyance_Allowance'],'','1','J');   
        
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Medical Allowances','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['Med_Allow'],'','1','J');   
        
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Increment','','','J');

        $pdf->SetFont('Arial','',16);
        $pdf->Cell(40,10,$row['Increment'],'','1','J');

        
        }
        $pdf->Output();                           
}


?>






