<?php echo Asset::js('panel.js'); ?>

<?php ?>
<style>
    .panel_table th,td{width: 80px;border-bottom: 1px black solid;padding-bottom: 2px;padding-top: 10px}
</style>
<script>
    var count = 0;
</script>
<div class="row container">
    <h4>Global Panel</h4>
        <div class="span3 pull-right">

    </div>
    <br /><br />
</div>
<div class="row container">
    <form action="/panel/submit_<?php echo isset($monthly_customer_id) ? "local" : "global"?>" method="POST">
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
        <input class="btn btn-danger"type="submit" value="Update"/>
    </form>

</div>
<div class="row">
    <div class="pull-right" style="margin-top:10px">
            <div class=" pull-left" style="margin-right:20px;">
            <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('panel_table', <?php echo $num_of_panels ?>)" />

        </div>
    </div>
</div>