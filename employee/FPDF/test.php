<?php
require 'fpdf.php';
     class mypdf extends FPDF
      {
         function header()
           {
                          global $title;

                // Arial bold 15
                $this->SetFont('Arial','B',20);
                // Calculate width of title and position
                $w = $this->GetStringWidth($title)+6;
                $this->SetX((210-$w)/2);
                $this->SetTextColor(26,18,183);
                // Title
                $this->Cell($w,9,$title,0,0,'C');
                // Line break
                $this->Ln(10);
              
           }
            function Footer()
                {
                    // Position at 1.5 cm from bottom
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Page number
                    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                }
      }
       
        $pdf = new mypdf('P','mm','A4');
        $title = 'ShahDeveloper Pvt';
        $pdf->SetTitle($title);
        $pdf->AliasNbpages();
        $pdf->Addpage();
        $pdf->Ln();
        $pdf->SetFont('Times','B',18);
        $pdf->SetTextColor(244,66,66);
        $pdf->Cell(15);
        $pdf->Cell(40,10,'Party',1,0,'C'); 
        $pdf->Cell(40,10,'Candidate',1,0,'C'); 
        $pdf->Cell(40,10,'National',1,0,'C');
        $pdf->Cell(40,10,'Provincial',1,1,'C');
        $pdf->SetFont('Times','',16);
    $con = new PDO('mysql:host=localhost;dbname=election','root','');
        $query = 'SELECT * FROM parties';
        $parties = $con->prepare($query);
         $parties->execute();
         if($parties->rowCount()!=0)
            {
                while($row = $parties->fetch())
                     {
                                                 $pdf->Cell(15);
                         $pdf->Cell(40,10,$row['name'],1,0,'C');
                         $pdf->Cell(40,10,$row['total_candidate'],1,0,'C');
                         $pdf->Cell(40,10,$row['national_candidate'],1,0,'C');
                         $pdf->Cell(40,10,$row['provincial_candidate'],1,1,'C');
                     }
            }   
        $pdf->Output(); 
                  
?>