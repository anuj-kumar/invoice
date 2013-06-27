
<?php 
$content='
<style >

 .address{}
 .header{ border-bottom:1px solid black}
</style>

<div class="header">
		<div class="logo" style="position:fixed;width:200px; left:50px; top:30px"><h4>NeoGen Labs Pvt. Ltd</h4></div>
		<div class="address" style="position:fixed;left:50px;top:0px;text-align:right;width:500px">
		<p >
			UCF CENTER # 84/3 Oil Mill Road (On Hennur Main Road)<br />
			Lingarajuram # Bangalore 560084 # Karnataka # India <br />	
			T: + 91 80 25805600 # F: 91 80 2580 5603 <br />
			E: info@neogenlabs.com <br />
			W: www.neogenlabs.com	
		</p>
		</div>
</div>

<div class= "main" style="position:fixed;top:200px;width:100%">
<div style="margin-left:220px"><h4> FIRST STEP<sup>TM</sup> SALES INVOICE </h4></div>

<div id="personel_details" style="position:fixed; left:20px; width: 250px">
<div id="company_address">
name <br />address line #1 <br />line #2<br /> city State
<br />T: #
<br />E: aa@aa.com
<br /><br />
Name: B/O
<br />Date of Service : 
 </div>
</div>


<div id="invoice_details" style="position:fixed; right:20px; width: 250px">
Date: <br/>
Invoice No: <br />
Billing Period: <br />
PAN: <br />
TIN: NA*<br /><br />
<br />
FP No:<br />
*NA: Not Applicable

</div>
</div>

';
include('pdf/mpdf.php');
$mpdf=new mPDF();
//$stylesheet = file_get_contents('bootstrap.css');
//$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($content);
$mpdf->Output();
exit;



?>
