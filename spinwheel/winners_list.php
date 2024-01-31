<?php
$dbConnection = new mysqli('localhost', 'root', '', 'spin_the_wheel');

if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$sql = "SELECT * FROM winners_table";
$result = $dbConnection->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$dbConnection->close();

require_once('C:\xampp\htdocs\spinwheel\fpdf186\fpdf.php'); 

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(30, 10, '', 1);
$pdf->Cell(60, 10, 'Name of Winner', 1);
$pdf->Cell(60, 10, 'Prize Won', 1);
$pdf->Ln();

foreach ($data as $row) {
    
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(60, 10, $row['winner_name'], 1);
    $pdf->Cell(60, 10, $row['prize_name'], 1);
    $pdf->Ln();
}

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="winners_data.pdf"');

$pdf->Output('D');
?>
