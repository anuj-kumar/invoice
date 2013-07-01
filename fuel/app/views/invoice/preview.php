
<div class="row container offset1">
    <center><div class= "main" style="width:100%;min-height:400px">
        <h4 style="text-align:center"> INVOICE PREVIEW<br /> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
        <table>
            <tr>
                <td style="width:350px;">
                    <ul style="list-style:none;padding-left: 0px">
                        <li>Name</li>
                        <li>Addr_line #1</li>
                        <li>Addr_lin #2</li>
                        <li>Addr_line #3</li>
                        <li>City State </li>
                        <li>Country Pincode</li>
                        <li>Tele:</li>
                        <li>Email:</li>

                    </ul>
                </td>
                <td>
                    Date:  <br/>
                    Invoice No: 12345 <br />
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
        <table border="3" style="text-align:center;width:500px">
            <tr style="">
                <td></td>
                <td>Qty.</td>
                <td>Panel</td>
                <td>Unit Price</td>
                <td>Extended Price</td>
            </tr>
            <tr  style="">
                <td style="">1.</td>
                <td style="">10</td>
                <td style="text-align:left">HS+</td>
                <td style="text-align:right">100.00</td>
                <td style="text-align:right">1000.00</td>

            </tr>
            <tr  style="">
                <td style=""></td>
                <td style=""></td>
                <td style="text-align:left">Total</td>
                <td style=""></td>
                <td style="text-align:right">1000.00</td>

            </tr>

        </table>
        <br />
        <br />
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
</div></center>
echo $customer->first_name . " " . $customer->last_name;
echo $customer->address_line_1 . ",<br>";
echo $customer->address_line_2 . ",<br>";
echo $customer->address_line_3 . ",<br>";
echo $customer->city . ", " . $customer->state;
echo $customer->pincode;
<br>
foreach ($invoice->panels as $panel):
    foreach ($panel->invoices_panels as $other):
        echo $panel->name . " " . $other->panel_quantity . "<br>";
    endforeach;
endforeach;
