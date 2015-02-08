
<?php
include_once '/MPDF57/mpdf.php';
$html = "";
$html .= "
<table width='100%'>
<thead>
<tr>
<th>ID</th>
<th>บาร์โค้ด</th>
<th>สินค้า</th>
<th>ราคา</th>
</tr>
</thead>
<tbody>
";
foreach ($products as $p) {
    $html .= "
<tr>
<td>{$p->product_id}</td>
<td>{$p->product_code}</td>
<td>{$p->product_name}</td>
<td>{$p->product_price}</td>
</tr>
";
}
$html .= "</tbody>
    </table>";
$pdf = new mPDF('UTF-8');
$pdf->SetAutoFont();
$pdf->WriteHTML($html);
$pdf->Output();
?>
