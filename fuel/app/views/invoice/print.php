<?php

$pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
// create new PDF document
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NeoGen Labs Pvt. Ltd.');
$pdf->SetTitle('Invoice');
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


$pdf->SetFont('dejavusans', '', 12);

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
// ---------------------------------------------------------
// set font
//$pdf->SetFont('times', 'BI', 20);
// add a page
$pdf->AddPage();


// set some text to print
// create some HTML content

$html = '
    
<style >

 .address{}
 .line{ border-bottom:4px solid black;}
</style>

<table style="height:100px">
<tr style="height:60px">
<td style="width:200px">
<img src="assets/img/Logo.jpg" height="120px" />
</td>
<td style="text-align: right;width:340px;font-size:25px">
			UCF CENTER # 84/3 Oil Mill Road (On Hennur Main Road)<br />
			Lingarajuram # Bangalore 560084 # Karnataka # India <br />	
			T: + 91 80 25805600 # F: 91 80 2580 5603 <br />
			E: info@neogenlabs.com <br />
			W: www.neogenlabs.com	
                   <br /><br /><h1>Invoice No. : 12345</h1>
</td>
</tr>

<div class="line">
</div>

</table>
<div class= "main" style="position:fixed;top:0px;width:100%;min-height:400px">
<h2 style="text-align:center"> FIRST STEP<sup>TM</sup> SALES INVOICE </h2>
<table>
<tr>
<td style="width:350px">
                       
                            <br /> ' . $invoice->customer->first_name . ' ' . $invoice->customer->last_name . '
                            <br />' . $invoice->customer->address_line_1 . '
                            <br />' . $invoice->customer->address_line_2 . '
                            <br />' . $invoice->customer->address_line_3 . '
                            <br />' . $invoice->customer->city . ", " . $invoice->customer->state . '
                            <br />' . $invoice->customer->country . ' -' . $invoice->customer->pincode . '
                       
</td>
<td style="width:100px">
Date: <br />
Invoice No: <br />
Billing Period: <br />
PAN: <br />
TIN: NA*<br /><br />
<br />
</td>
<td>
' . date("j F  Y") . ' <br/>
    ' . '12345' . ' <br />
</td>
</tr>
<tr>
<td>
Name: ' . $invoice->baby_of . '
<br />Date of Service : ' . $invoice->date_of_service . '
</td>
<td>
FP No: ' . $invoice->fp_number . ' <br />
*NA: Not Applicable
<br />
</td></tr>
</table>
<br />
<br />
<br />
<div class="" style="height:400px"></div>
<table border="1" style="text-align:center;">
<tr style="">
<td>S. No.</td>
<td>Qty.</td>
<td>Panel</td>
<td>Unit Price</td>
<td>Extended Price</td>
</tr>
</table>

';
$pdf->writeHTML($html, true, false, true, false, '');
$i = 1;
foreach ($invoice->panels as $panel):
    foreach ($panel->invoices_panels as $other):

        $html2 = '<table ><tr><td style="text-align:center">' . $i++ . '</td>
                       <td style="text-align:center">' . $other->panel_quantity . '</td>
                       <td style="text-align:center">' . $panel->name . '</td>
                       <td style="text-align:right">' .  number_format($other->panel_price,2) . '</td>        
                       <td style="text-align:right">' .  number_format($other->panel_quantity * $other->panel_price,2) . '</td>
                   </tr>
                   <hr />
             </table>
';
        $pdf->writeHTML($html2, true, false, true, false, '');
    endforeach;
endforeach;
$html1 = '
    
<table border="">
<tr  style="">
<td style=""></td>
<td style=""></td>
<td style="text-align:left">Total</td>
<td style=""></td>
<td style="text-align:right">' .  number_format($invoice->amount,2). '</td>

</tr>
</table>
<div class="" style="height:400px"></div>
<span style="text-style: underline;">Please Pay : Rupee ' . $amount_words . '</span></h5>
<div class="" style="height:400px"></div>
<table style="top:30px">
<tr>
<td style="width:100px">
Paid:
<br />
Balance:
<br />
Due Date:
<br />
</td>
<td>
'.  number_format($invoice->amount_paid,2) .'
<br /> ' .  number_format(($invoice->amount - $invoice->amount_paid),2) . '    
</td>
<td >
<p>Comment : <br />
' . $invoice->comment . '
</p>
</td>
</tr>
</table>


</div>


';
// output the HTML content

$pdf->writeHTML($html1, true, false, true, false, '');
// Print some HTML Cells
//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');
