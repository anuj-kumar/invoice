<?php

$pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
// create new PDF document
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NeoGen Labs Pvt. Ltd.');
$pdf->SetTitle('Invoice');
// remove default header/footer


$pdf->SetFont('dejavusans', 'C1', 11);

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
                   <br /><br /><h1>Invoice No. : ' . $invoice->id . '</h1>
</td>
</tr>

<div class="line">
</div>

</table>
<div class= "main" style="position:fixed;top:0px;width:100%;min-height:400px">
<h4 style="text-align:center"> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
<table>
<tr>
<td style="width:350px">
                            <br /> <b>' . $monthly_customer->org_name . '</b>
                            <br /> ' . $invoice->customer->title . '<br /> ' . $invoice->customer->first_name . ' ' . $invoice->customer->last_name . '
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
' .  date("j F , Y") . ' <br/>
    <b>' . $invoice->id . '</b> <br />
</td>
</tr>

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
                       <td style="text-align:right">' . $other->panel_price . '</td>        
                       <td style="text-align:right">' . number_format(($other->panel_quantity * $other->panel_price), 2) . '</td>
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
<td style="text-align:left"><b>Total</b></td>
<td style=""></td>
<td style="text-align:right"><b>' . number_format($invoice->amount, 2) . '</b></td>

</tr>
</table>
<div class="" style="height:400px"></div>
<span style="font-style: italics;">Please Pay : <b>Rupee ' . $amount_words . '</b></span></h5>
<hr /><div class="" style="height:400px"></div>
<table style="top:30px">
<tr>
<td style="width:100px">
Paid:
<br />
Balance:
<br />
Due Date:
<br />
Outstanding: 
<br />
</td>
<td>
<b>'.  number_format($invoice->amount_paid,2) .'</b>
<br /> <b>' .  number_format(($invoice->amount - $invoice->amount_paid),2) . '    </b>
<br />
<br /> <b>' .  number_format(($monthly_customer->outstanding),2) . '    </b>
</td>
<td >
<p>Terms and Conditions : <br />
' . $invoice->comment . '<br />
    
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
