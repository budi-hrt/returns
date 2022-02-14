<?php



// $mpdf = new \Mpdf\Mpdf();
// $mpdf->SetHTMLHeader('
// <div style="text-align: center; font-weight: bold; font-size:20px;">
//     <u>Purcase Order</u>
// </div><br>
// <table calss="table table-bordered">
//     <tr>
//         <td width="500px">Nomor : ' . $po['no_po'] . '</td>
//         <td width="150px">Tanggal : ' . $po['tanggal'] . '</td>
//     </tr>
// </table>');
// $mpdf->SetHTMLFooter('
// <table width="100%">
//     <tr>
//         <td width="33%">{DATE j-m-Y}</td>
//         <td width="33%" align="center">{PAGENO}/{nbpg}</td>
//         <td width="33%" style="text-align: right;">My document</td>
//     </tr>
// </table>');

// $mpdf->WriteHTML('<h1>Hello world!</h1>');
// $mpdf->Output();


//===========================================

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
    border: 0.1mm solid #000000;
  
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<div style="font-weight: bold; font-size: 14pt;text-align: center;"><u>PURCHASE ORDER</u></div>
<div style=" font-size: 10pt;text-align: center;">No : ' . $po['no_po'] . '</div><br/>


</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style=" font-size: 10pt;text-align: right;">Tanggal : ' . date('d F Y', strtotime($po['tanggal'])) . '</div>
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">FROM :</span><br /><br /><span style="font-weight: bold; font-size: 11pt;">R.A Pos.</span><br />Btn Bumi Tinggede Indah 3 Blok B No.14.<br />Sigi Biromaru<br /><span style="font-family:dejavusanscondensed;">&#9742; </span>0813 5438 0434</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br /><span style="font-weight: bold; font-size: 11pt;">' . $po['nama_suplier'] . '</span><br />' . $po['alamat_suplier'] . '<br />' . $po['alamat_suplier'] . '<br /><span style="font-family:dejavusanscondensed;">&#9742; </span>' . $po['telephone_suplier'] . '</td>
</tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8" >
<thead>
<tr>
<td width="5%">No.</td>
<td width="45%">Deskripsi</td>
<td width="10%">Jumlah</td>
<td width="10%">Unit</td>
<td width="15%">Harga</td>
<td width="15%">Subtotal</td>
</tr>
</thead>
<tbody>';
// ITEMS HERE -->
$no = 1;
$total = 0;
$diskon = 0;
$ppn = 0;
$Sttl = 0;
$item = 0;
foreach ($detil as $d) {


    $html .= '
<tr>
<td align="center">' . $no++ . '</td>
<td >' . $d['nama_barang'] . '</td>
<td>' . number_format($d['qty'], 0, ',', '.') . '</td>
<td class="cost">' . $d['nama_satuan'] . '</td>
<td align="right">' . number_format($d['harga_item'], 0, ',', '.') . '</td>
<td align="right">' . number_format($d['subtotal'], 0, ',', '.') . '</td>
</tr>
<tr>';
    $total += $d['subtotal'];
}
// END ITEMS HERE -->
$Sttl = $total - $diskon + $ppn;
$html .= '
<tr>
<td class="blanktotal" colspan="4" rowspan="3"><div>Terbilang : ' . ucwords(number_to_words($Sttl)) . '</div></td>
<td class="totals">Subtotal:</td>
<td class="totals" align="right">' . number_format($total, 0, ',', '.') . '</td>
</tr>
<tr>
<td class="totals">Discount:</td>
<td class="totals" align="right">' . number_format($diskon, 0, ',', '.') . '</td>
</tr>
<tr>
<td class="totals" align="right"><b>TOTAL:</b></td>
<td class="totals" align="right"><b>' . number_format($Sttl, 0, ',', '.') . '</b></td>
</tr>

</tbody>
</table>
<br />

<table  width="100%">
<tr>
<td width="70%"><div style="text-align: left; font-style: italic;">Note : ' . $po['keterangan_po'] . '</div>
</td>
<td width="30%" align="center">Mengetahui, <br /><br /><br /><br /><br /><br /><br /><span style=" font-size: 10pt;"><u>PENANDA TANGAN</u></span><br /><span style=" font-size: 10pt;">JABATAN</span>
</td>
</tr>
</table>

</body>
</html>
';
// $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
// require_once $path . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 20,
    'margin_right' => 15,
    'margin_top' => 48,
    'margin_bottom' => 25,
    'margin_header' => 25,
    'margin_footer' => 10
]);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("R.A Pos. - Purchase Order");
$mpdf->SetAuthor("Acme Trading Co.");
//$mpdf->SetWatermarkText("UnPaid");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();
