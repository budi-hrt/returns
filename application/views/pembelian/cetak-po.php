<?php
$fak = $po['no_po'];
$tgl = date('d F Y', strtotime($po['tanggal']));
$sup = $po['nama_suplier'];
$almatsup = $po['alamat_suplier'];
$telp = $po['telephone_suplier'];
$GLOBALS["faktur"] = $fak;
$GLOBALS["tanggal"] = $tgl;
$GLOBALS["suplier"] = $sup;
$GLOBALS["alamatsup"] = $almatsup;
$GLOBALS["telephone"] = $telp;


class PDF1 extends FPDF
{

    // Page header
    function Header()
    {
        // Logo
        // $this->Image('logo.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Purchase Order', 0, 0, 'C');
        $this->Line(80, 18, 130, 18, 'C');
        // Line break
        $this->Ln(20);
        $this->SetFont('Arial', '', 10);
        $this->cell(20, 5, 'Nomor PO : ', 1, 0);
        $this->cell(100, 5, $GLOBALS["faktur"], 1, 0);
        $this->cell(35, 5, 'Tanggal : ', 1, 0, 'R');
        $this->cell(32, 5, $GLOBALS["tanggal"], 1, 1);

        $this->cell(100, 5, 'From : ', 1, 0);
        $this->cell(70, 5, 'To : ', 1, 1);

        $this->SetFont('Arial', 'B', 12);
        $this->cell(100, 5, 'R.A Mart', 1, 0);
        $this->cell(70, 5, $GLOBALS["suplier"], 1, 1);

        $this->SetFont('Arial', '', 10);
        $this->cell(20, 5, 'Alamat', 1, 0);
        $this->cell(5, 5, ':', 1, 0);
        $this->cell(75, 5, 'Btn Bumi Tinggede Indah 3 Blok B No.14 Sigi', 1, 0);
        $this->cell(20, 5, 'Alamat', 1, 0);
        $this->cell(5, 5, ':', 1, 0);
        $this->cell(60, 5, $GLOBALS["alamatsup"], 1, 1);

        $this->SetFont('Arial', '', 10);
        $this->cell(20, 5, 'Telephone : ', 1, 0);
        $this->cell(5, 5, ':', 1, 0);
        $this->cell(75, 5, 'Adeeva@outlook.com', 1, 0);
        $this->cell(20, 5, 'Telephone : ', 1, 0);
        $this->cell(5, 5, ':', 1, 0);
        $this->cell(60, 5, $GLOBALS["telephone"], 1, 1);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}





// Instanciation of inherited class
$pdf = new PDF1();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);



$pdf->Output();
