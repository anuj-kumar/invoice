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
<img src="assets/img/Logo.jpg" height="140px" />
</td>
<td style="text-align: right;width:340px;">
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
<h4 style="text-align:center"> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
<table>
<tr>
<td style="width:350px">
                        <ul style="list-style:none;padding-left: 0px">
                            <br /> '. $customer->first_name . ' ' . $customer->last_name . '
                            <br />' . $customer->address_line_1 . '
                            <br />' . $customer->address_line_2 . '
                            <br />' . $customer->address_line_3 . '
                            <br />' . $customer->city . ", " . $customer->state . '
                            <br />' . $customer->pincode . '
                        </ul>
</td>
<td>
Date:  <br/>
Invoice No: '.'12345'.' <br />
Billing Period: <br />
PAN: <br />
TIN: NA*<br /><br />
<br />
</td>
</tr>
<tr>
<td>
Name: B/O
<br />Date of Service : 
</td>
<td>
FP No:<br />
*NA: Not Applicable
<br />
</td></tr>
</table>
<br />
<br />
<table border="1" style="text-align:center;">
<tr style="">
<td></td>
<td>Qty.</td>
<td>Panel</td>
<td>Unit Price</td>
<td>Extended Price</td>
</tr>
';
 $html1='   
<tr  style="">
<td style=""></td>
<td style=""></td>
<td style="text-align:left">Total</td>
<td style=""></td>
<td style="text-align:right">1000.00</td>

</tr>

</table>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<table style="top:30px">
<tr>
<td style="width:400px">
Outstanding:'. $invoice->amount  .'
<br />
Paid:'. $invoice->balance  .'
<br />
Due Date:
<br />
</td>
<td>
<p>
Comment Box ! 
</p>
</td>
</tr>
</table>


</div>


';

// output the HTML content
$pdf->wrteHTML($html, true, false, true, false, '');
$pdf->wrteHTML($html1, true, false, true, false, '');

// Print some HTML Cells

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');
