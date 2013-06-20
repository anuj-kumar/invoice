<style>
    .invoice_content_table {min-height: 200px}
    .invoice_content td,th{width: 100px;border-bottom: 1px solid black}
</style>

<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_content")); ?>
<h4>Invoice Content:</h4>    
<hr />
<div class="invoice_content_table">
    <table class="invoice_content">
        <th>S No.</th>
        <th>Qty.</th>
        <th>Panel</th>
        <th>Unit Price</th>
        <th>Extended Price</th>
        <th></th>
        <tr id="add_row">
            <td id="serial" style="text-align:center">1.</td>
            <td id=""><input type="number" name="quantity" style="width:50px"  ></td>
            <td id = "panels" > 
                <select >
                    <?php foreach ($panels as $panel) : ?>
                        <option><?php echo $panel->name; ?></option>

                    <?php endforeach; ?>
                </select>
            </td>
            <td id = "unit_price"></td>
            <td id = "price" style="text-align: right"></td>
            <td>Add Row</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td>Total:</td>
            <td></td>
            <td style="text-align: right"></td>
            <td></td>
        </tr>

    </table>
</div>
<hr />
<div class="row">Please pay Rs.<input type="text" /> </div>
<hr />
<div class="row">
    <div class="span5 pull-left">
        Current Due 
    </div>
    <div class="span5 pull-right">
        <label>Comment Box:</label>
        <textarea row="8" cols="10" >All amounts are due within 30 days of receipt of invoice.Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea> </div>
</div>
<fieldset>

</fieldset>
<?php echo Form::close(); ?>