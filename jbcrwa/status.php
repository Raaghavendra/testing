<?php
include ('conn.php');
require('fpdf.php');
$month = mysqli_real_escape_string($conn, $_POST['month']);

$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
/*
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
*/
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,15,"Month : {$month} ");
$pdf->Ln();
$pdf->Cell(20,15,"S No",1,0);
$pdf->Cell(20,15,"H-ID",1,0);
$pdf->Cell(20,15,"D No",1,0);
$pdf->Cell(30,15,"Avenue",1,0);
$pdf->Cell(60,15,"Tenant Name",1,0);
$pdf->Cell(30,15,"Phone No",1,0);
$pdf->Ln();


        $sql = "SELECT hid, doorNo, avenue, tenantName, tenantNo FROM `houses` WHERE `$month` LIKE 'not paid' ";
        $result = mysqli_query($conn, $sql);
        $No = 0;
        $pdf->SetFont('Arial','',10);

        while($rows=mysqli_fetch_array($result, MYSQLI_NUM))
        {

            $No = $No + 1;
            $b = $rows[0];
            $c = $rows[1];
            $d = $rows[2];
            $e = $rows[3];
            $f = $rows[4];
            $pdf->Cell(20,10,"{$No}",1,0);
            $pdf->Cell(20,10,"{$b}",1,0);
            $pdf->Cell(20,10,"{$c}",1,0);
            $pdf->Cell(30,10,"{$d}",1,0);
            $pdf->Cell(60,10,"{$e}",1,0);
            $pdf->Cell(30,10,"{$f}",1,0);
            $pdf->Ln();
        }

$pdf->Output();
?>
