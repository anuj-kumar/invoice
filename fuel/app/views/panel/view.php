<style>
    .panel_table th,td{width: 80px;border-bottom: 1px black solid;padding-bottom: 2px;padding-top: 10px}
</style>
<?php
$i = 0;
foreach ($panels as $panel):
$j = 0;

    foreach ($panel->global_panel_prices as $price_obj):
        $panel_arr[$i][$j]['id'] = $panel->id;
        $panel_arr[$i][$j]['name'] = $panel->name;
        $panel_arr[$i][$j]['price'] = $price_obj->price;
        $panel_arr[$i][$j]['vol_low'] = $price_obj->vol_low;
        $panel_arr[$i][$j]['vol_high'] = $price_obj->vol_high;
	$j++;
    endforeach;
    $i++;
endforeach;
$len=$j;
echo $len.'<br />';
?>
<script type="text/javascript">
    var panel = new Array();
    panel = <?php echo json_encode((array) $panel_arr); ?>;
    var len = <?php echo $len; ?>;
    console.log(len);
</script>

<form action="/invoice/public/panel/submit_<?php echo isset($monthly_customer_id) ? "local" : "global"?>" method="POST">
        <?php
        if (isset($monthly_customer_id)) {
            echo "<input type='hidden' name='monthly_customer_id' value='" . $monthly_customer_id . "'/>";
        }
        ?>
        <table class="panel_table" id="panel_table">
            <th>Volume</th>
            <?php
            $num_of_panels = 0;
            foreach ($panels as $panel):
                echo "<th>" . $panel->name . "</th>";
                $num_of_panels++;
            endforeach;
//            echo $count;
            ?>

        </table>
        <div class="span5 pull-right" style="margin-top:10px">
        <input class="btn btn-danger"type="submit" value="Update"/>
                <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('panel_table', <?php echo $num_of_panels ?>)" />
                <input class="btn btn-danger"type="button" value="Delete Row" onclick="deleteRow('panel_table')" />
        </div>
    </form>

</div>
<?php echo Asset::js('panel.js'); ?>
<?php echo Asset::js('build.js'); ?>

<?php 
for ($i=0;$i<$len;$i++){
?><script>
window.onload = addtable('panel_table', 9  );
</script>
<?php } ?>