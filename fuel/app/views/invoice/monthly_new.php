<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>
<?php echo Asset::js('panel.js'); ?>

<style>
    input{height: 17px}
</style>
<div class="main well">
    <h2>Add New Monthly Organization</h2>
    <div id="form1" style="display: block">
        <div class="grid-12-12 ">
            <div class="grid-4-12 ">
                <label>Organization Name : <em class="formee-req">*</em></label>
                <input type="text" name="org_name" class="formee-large" placeholder="Organization Name" required autofocus>
            </div>
            <div class="grid-3-12 ">
                <label>Organization Print Name : <em class="formee-req">*</em></label>
                <input type="text" name="org_print_name" class="" placeholder="PrintName" style="width: 150px" required>
            </div>
            <div class="grid-2-12 ">
                <label>Title : <em class="formee-req">*</em></label>
                <select name="title" style="width: 60px" required>
                    <option>Dr.</option>
                    <option>Mr.</option>
                    <option>Mrs.</option>
                    <option>Ms.</option>
                </select>
            </div>
            <div class="grid-3-12 ">
                <label>Client Contact : <em class="formee-req">*</em></label>
                <input type="text" name="name" class="formee-large" placeholder="Name" required>
            </div>
        </div>  
        <div class="grid-12-12 " style="margin-top: -20px">
            <div class="grid-4-12 ">
                <label>Address Line #1 : <em class="formee-req">*</em></label>
                <input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" autocomplete="off" required>
            </div>
            <div class="grid-4-12 ">
                <label>Address Line #2 : </label>
                <input type="text" name="addr_2" class="formee-large" placeholder="Address Line #2" autocomplete="off" >
            </div>
            <div class="grid-4-12 ">
                <label>Address Line #3 : </label>
                <input type="text"  name="addr_3" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
            </div>
        </div>
        <div class="grid-12-12 " style="margin-top: -20px">
            <div class="grid-4-12 ">
                <label>City : <em class="formee-req">*</em></label>
                <input type="text" name="city" class="formee-large" placeholder="City" required>
            </div>
            <div class="grid-4-12 ">
                <label>State : <em class="formee-req">*</em></label>
                <input type="text" name="state" class="formee-large" placeholder="State" required>
            </div>
            <div class="grid-4-12 ">
                <label>Pin Code : </label>
                <input type="text" name="pincode" class="formee-large" placeholder="Pin Code" >
            </div>
        </div>

        <div class="grid-12-12 " style="margin-top: -20px">
            <div class="grid-4-12 ">
                <label>Telephone : <em class="formee-req">*</em></label>
                <input type='tel' name="tele" pattern='\d{2}' placeholder='Tele: (91)' autocomplete="off" value="91" style="width: 20px" required><input type='tel' name="phone" pattern='\d{10}' style="width: 100px;margin-left: 10px" placeholder='9999999999' autocomplete="off" required>
            </div>
            <div class="grid-4-12 ">
                <label>Email : <em class="formee-req">*</em></label>
                <input type='email' name="email" placeholder='Email: example@example.com' autocomplete="off" >
            </div>
            <div class="grid-4-12 ">
                <label>Contract File : <em class="formee-req"></em></label>
                <input type="file" name="file" class="formee-large" placeholder="Contract File" required>
            </div>
        </div>
        <div class="grid-12-12 " style="margin-top: -20px">
            <div class="grid-4-12 ">
                <input type="button" class="btn btn-danger btn-large" name="Next" value="Next" onclick="showPanel()"  style="margin-left: 40px;margin-top: 20px;min-width:100px" /> 
            </div>
        </div>

        </fieldset>
    </div>
    <div id="form2" style="display: none">
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
        $len = $j;
        ?>
        <script type="text/javascript">
                    var panel = new Array();
                    panel = <?php echo json_encode((array) $panel_arr); ?>;
                    var len = <?php echo $len; ?>;
                    console.log(len);
        </script>


        <?php ?>
        <style>
            .panel_table th,td{width: 80px;border-bottom: 1px black solid;padding-bottom: 2px;padding-top: 10px}
        </style>
        <script>
            var count = 0;
        </script>
        <div class="row container">
            <h2>Monthly Panel Pricing </h2>
                <div class="span3 pull-right">

            </div>

        </div>
        <div class="row container">

            
            <form action="submit_<?php echo isset($monthly_customer_id) ? "local" : "global" ?>" method="POST">
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

           </div>
</div>
<script>
    function showPanel() {
        document.getElementById('form1').style.display = "none";
        document.getElementById('form2').style.display = "block";

    }

    function backForm() {
        document.getElementById('form1').style.display = "block";
        document.getElementById('form2').style.display = "none";

    }
</script>