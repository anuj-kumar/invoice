<?php echo Asset::js('panel.js'); ?>

<?php ?>
<style>
    .panel_table th,td{width: 80px;border-bottom: 1px black solid;padding-bottom: 2px;padding-top: 10px}
</style>
<div class="row container">
    <h4>Global Panel</h4>
        <div class="span3 pull-right">
        <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('panel_table')" />
        
    </div>
    <br /><br />
</div>
<div class="row container" ">
    <table class="panel_table" id="panel_table">
        <th>Volume</th>
        <?php
        foreach ($panels as $panel):
            echo "<th>" . $panel->name . "</th>";
        endforeach;
        ?>
        
    </table>
    
</div>
<div class="row">
        <div class="pull-right" style="margin-top:10px">
        <input class="btn btn-danger"type="button" value="Update"  />
                <div class=" pull-left" style="margin-right:20px;">
        <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('panel_table')" />
        
    </div>
            
        </div>
    </div>