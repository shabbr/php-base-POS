<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
$start=$_SESSION['start'];
$end=$_SESSION['end'];
require_once('tcpdf/tcpdf.php'); // Adjust the path accordingly

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Customer Detail Report');
$pdf->SetSubject('Customer Details');
$pdf->SetKeywords('Customer, Detail, Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('times', 'B', 12);

// Set table header
$header = array('id', 'Customer name', 'Customer number', 'Salesman', 'Product name', 'Price', 'Quantity', 'Total price', 'Received', 'Status', 'Date', 'Time');
$pdf->MultiCell(0, 10, 'Customer Detail Report', 0, 'C');
$pdf->Ln();
$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0);
$pdf->SetLineWidth(0.3);
$pdf->SetX(10);

foreach ($header as $col) {
    $pdf->Cell(30, 10, $col, 1, 0, 'C', 1);
}
$pdf->Ln();

// Set font for data
$pdf->SetFont('times', '', 10);

// Fetch data from the database and populate the table
include('config.php');
$sql="SELECT * from customer_detail where `date` BETWEEN '$start' AND '$end'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $value) {
        $pdf->Cell(30, 10, $value, 1, 0, 'C');
    }
    $pdf->Ln();
}

// Output the PDF
$pdf->Output('customer_detail_report.pdf', 'D'); // 'D' to force download the PDF
}else{
    echo "<script>alert('file is empty');
        window.location.href='http://localhost/projects/POS_project1/veiw_sale.php';
         </script>";
}
?>
