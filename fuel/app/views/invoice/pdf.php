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
 .header{ border-bottom:4px solid black;}
</style>

<table>
<tr>
<td style="width:220px">
<h4>NeoGen Labs Pvt. Ltd</h4>
</td>
<td style="text-align: right;width:320px">
		<p >
			UCF CENTER # 84/3 Oil Mill Road (On Hennur Main Road)<br />
			Lingarajuram # Bangalore 560084 # Karnataka # India <br />	
			T: + 91 80 25805600 # F: 91 80 2580 5603 <br />
			E: info@neogenlabs.com <br />
			W: www.neogenlabs.com	
		</p>

</td>
</tr>
</table>
<div class="header">

		<div class="address" style="position:fixed;left:50px;top:0px;text-align:right;width:500px">
		</div>
</div>

<div class= "main" style="position:fixed;top:0px;width:100%;min-height:400px">
<h4 style="text-align:center"> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
<table>
<tr>
<td style="width:400px">
Name: '.$monthly_customers->customer->first_name." ".$monthly_customers->customer->last_name.'<br />address line #1 <br />line #2<br /> city State
<br />T: #
<br />E: aa@aa.com
<br /><br />
</td>
<td>
Date: <br/>
Invoice No: <br />
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

</td></tr>
</table>
<br />
<table border="1" style="text-align:center;">
<tr>
<td></td>
<td>Qty.</td>
<td>Panel</td>
<td>Unit Price</td>
<td>Extended Price</td>
</tr>
<tr  style="background-color: grey;">
<td style="">1.</td>
<td style="">10</td>
<td style="">HS+</td>
<td style="">100</td>
<td style="">1000</td>

</tr>
<tr  style="background-color: white;">
<td style=""></td>
<td style=""></td>
<td style="">Total</td>
<td style=""></td>
<td style="">100000</td>

</tr>

</table>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<div class="" style="height:400px"></div>
<table style="top:30px">
<tr>
<td style="width:400px">
Outstanding:
<br />
Paid:
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
$pdf->writeHTML($html, true, false, true, false, '');

// Print some HTML Cells

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');
