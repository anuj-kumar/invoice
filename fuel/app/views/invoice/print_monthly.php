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


$pdf->SetFont('dejavusans', 'C1', 10);

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
if($invoice->customer->country=="India" || $invoice->customer->country=="india"){
    $str=$invoice->customer->pincode;
    $pincode=$str[0].$str[1].$str[2].'  '.$str[3].$str[4].$str[5];
    
}
else {
    $pincode=$invoice->customer->pincode;
}
// set some text to print
// create some HTML content
$addr = "<br /> <b>" . $invoice->customer->title . "" . $invoice->customer->first_name . " " . $invoice->customer->last_name . "</b>"."<br />  ". $monthly_customer->org_name."<br />" . $invoice->customer->address_line_1;
$addr2='';
$addr3='';
if($invoice->customer->address_line_2!=""){
    $addr2="<br />" . $invoice->customer->address_line_2;
}
if($invoice->customer->address_line_3!=""){
    $addr3="<br />" . $invoice->customer->address_line_3 ;
}
$addr6=$addr.$addr2.$addr3."<br />" . $invoice->customer->city . " " . $pincode . ' '.$invoice->customer->state."<br />T : +91 ". $invoice->customer->phone."<br />";
if($invoice->customer->address_line_3!=""){
    $addr5="E : ". $invoice->customer->email;
}
else {
    $addr5="";
}
$addr4=$addr6.$addr5;


$html = '

<style >

.address{}
.line{ border-bottom:4px solid black;
}
</style>

<table style = "height:100px">
<tr style = "height:60px">
<td style = "width:200px">
<img src = "assets/img/Logo.jpg" height = "120px" />
</td>
<td style = "text-align: right;width:340px;font-size:25px">
UCF CENTER # 84/3 Oil Mill Road (On Hennur Main Road)<br />
Lingarajuram # Bangalore 560084 # Karnataka # India <br />	
T: + 91 80 25805600 # F: 91 80 2580 5603 <br />
E: info@neogenlabs.com <br />
W: www.neogenlabs.com


</td>
</tr>
</table>
<div class = "main" style = "position:fixed;top:0px;width:100%;min-height:400px">
<h1 style = "text-align:center"> FIRST STEP<sup>TM</sup> SALES INVOICE </h1>

<table>
<tr>
<td style = "width:300px">
'. $addr4 .'
</td>
<td style = "width:100px">
Date: <br />
Invoice No: <br />
Billing Period: <br />
PAN: <br />
TIN: NA*<br /><br />
<br />
</td>
<td>
' . date("F j, Y") . ' <br/>
<b>' . $invoice->invoice_no . '</b> <br />
</td>
</tr>

</table>

<br />
<br />
<br />
<div class="" style="height:400px"></div>
<hr />
<table  style="text-align:center;background-color: #f7f7f7">
<tr style="">
<td>Item</td>
<td>Qty.</td>
<td>Description</td>
<td>Unit Price</td>
<td>Extended Price</td>
</tr>
</table>
<hr />

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
                   
             </table>
             <hr />
';
        $pdf->writeHTML($html2, true, false, true, false, '');
    endforeach;
endforeach;

$dos = $monthly_customer->duedate;
$myDateTime = DateTime::createFromFormat('Y-m-d', $dos);
$newDateString = $myDateTime->format('F j, Y');


$html1 = '
   <hr />
<table border = "">
<tr style = "">
<td style = ""></td>
<td style = ""></td>
<td style = "text-align:left"><b>Total</b></td>
<td style = ""></td>
<td style = "text-align:right"><b>' . number_format($invoice->amount, 2) . '</b></td>

</tr>
</table>
<div class = "" style = "height:400px"></div>
<span style = "font-style: italics;">Please Pay : <b> '.$invoice->currency.' ' . $amount_words . ' Only</b></span></h5>
<hr /><div class = "" style = "height:400px"></div>
<table style = "top:30px">
<tr>
<td style = "width:100px">
Paid ('.$invoice->currency.'):
<br />
Balance ('.$invoice->currency.'):
<br />
Due Date:
<br />
Outstanding ('.$invoice->currency.'):
</td>
<td style = "text-align: right;width:140px">
<b> ' . number_format($invoice->amount_paid, 2) . '</b>
<br /> <b> '. number_format(($invoice->amount - $invoice->amount_paid), 2) . '</b>
<br />' . $newDateString . '
<br /> <b>' .  number_format(($monthly_customer->outstanding),2) . '</b>
</td>
<td style = "width:60px"></td>
<td style = "width:250px" >
<p>Terms and Conditions : <br />
' . $invoice->comment . '<br />

</p>
</td>
</tr>
</table>
<hr />
<div class = "" style = "height:400px"></div>

Please make Cheques and DD payable at Bangalore to <b> NeoGen Labs Pvt. Ltd </b>

</div>


';
// output the HTML content

$pdf->writeHTML($html1, true, false, true, false, '');
// Print some HTML Cells
//Close and output PDF document
$file_name=$invoice->invoice_no;
$pdf->Output($file_name, 'I');
