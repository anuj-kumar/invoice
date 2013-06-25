<style>
    .main {padding-top: 1px}
    .invoice_content_table {min-height: 250px}
    .invoice_content td,th{width: 200px;border-bottom: 1px solid black;text-align: center}
    .qty{width: 40px}
</style>
<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>
<?php echo Asset::js('invoice.js'); ?>

<?php
$i = 0;
$disorder[$i] = "";
foreach ($panels as $panel):
    $disorder[$i] = $panel->name;
    $i++;
endforeach;
print_r($disorder);
?>
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_content")); ?>
Invoice Content:
    <div class="span3 pull-right">
    <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('invoice_content')" />
        <input class="btn btn-danger" type="button" value="Delete Row" onclick="deleteRow('invoice_content')" />
</div>
<div class="invoice_content_table">
    <table id="invoice_content" class="invoice_content">
        <th>Delete</th>
        <th>Qty.</th>
        <th>Panel</th>
        <th>Unit Price</th>
        <th>Extended Price</th>
     <!--   <tr id="add_row">
            <td id="serial" style="text-align:center">1.</td>
            <td id=""><input type="number" name="quantity" style="width:50px"  ></td>
            <td id = "panels" > 
                <select >
        
                </select>
            </td>
            <td id = "unit_price"></td>
            <td id = "price" style="text-align: right"></td>
            <td>Add Row</td>
        </tr>
        -->
                <TR>
                        <td><INPUT type="checkbox" name="chk"/></td>
                        <td > <INPUT class="qty" type="number" placeholder="Qty." style="width:40px" /> </td>
            <TD> <INPUT type="text"  placeholder="panel" style="width:150px" /> </TD>
            <TD> <INPUT type="text"   placeholder="unit price" style="width:100px" /> </TD>
            <TD> <INPUT type="text"  placeholder="price" style="width:100px" /> </TD>
                    </TR>

    </table>
     

</div>
<div class="row" style="border-bottom:1px solid black"></div>
<div class="row" style="padding-top:5px">
    <div class="span5 pull-left">
        Total Rs.<input type="text" /> 
        <br />Current Due ( Rs.) :
        <br />Outstanding (Rs. ):
        <br />Due Date:

    </div>
    <div class="span4 ">
        <label>Comment Box:</label>
        <textarea style="height: 70px;width: 300px" >All amounts are due within 30 days of receipt of invoice.Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea> 
    </div>
    <div class="span1" style="margin-top:40px;margin-left: 40px">
        <input class="btn btn-large btn-danger" type="submit" value="Next" />
    </div>
</div>
<fieldset>

</fieldset>
<?php echo Form::close(); ?>