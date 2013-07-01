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
foreach ($panels as $panel):
    $j = 0;

    foreach ($panel->global_panel_prices as $price_obj):
        $panel_arr[$i][$j]['id'] = $panel->id;
        $panel_arr[$i][$j]['name'] = $panel->name;
        $panel_arr[$i][$j]['price'] = $price_obj->price;
        $panel_arr[$i][$j]['vol_high'] = $price_obj->vol_high;
        $j++;
    endforeach;
    $i++;
endforeach;
//print_r($panel_arr);
?>
<script type="text/javascript">
    var panel = new Array();
    panel = <?php echo json_encode((array) $panel_arr); ?>;

</script>
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_content")); ?>
    <div class="span3 pull-right">

    <input type="hidden" name="invoice_id" value="<?php echo $invoice_id ?>" />
    <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('invoice_content')" />
        <input class="btn btn-danger" type="button" value="Delete Row" onclick="deleteRow('invoice_content')" />
</div>
<div class="invoice_content_table">
    <table id="invoice_content" class="invoice_content">
        <th>Qty.</th>
        <th>Panel</th>
        <th>Unit Price</th>
        <th>Extended Price</th>
    </table>
     

</div>
<div class="row" style="border-bottom:1px solid black"></div>
<div class="row" style="padding-top:5px">
    <div class="span5 pull-left">
        Total Rs.<input type="text" id="total" name="total" /> 
        <br />Current Due (Rs.):
        <br />Outstanding (Rs.):
        <br />Due Date:

    </div>
    <div class="span4 ">
        <label>Comment Box:</label>
        <textarea style="height: 70px;width: 300px" >All amounts are due within 30 days of receipt of invoice. Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea>
    </div>
    <div class="span1" style="margin-top:40px;margin-left: 40px">
        <input class="btn btn-large btn-danger" type="submit" value="Next" />
    </div>
</div>
<fieldset>

</fieldset>
<?php echo Form::close(); ?>
<script>
    window.onload = addRow('invoice_content');
</script>