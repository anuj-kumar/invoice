<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>
<?php
$s = (string) $monthly_customers->customer->phone;
$country_code=$s[0].$s[1];
$phone=$s[2].$s[3].$s[4].$s[5].$s[6].$s[7].$s[8].$s[9].$s[10].$s[11];
?>
<?php echo Form::open(array("class" => "", "action" => "/invoice/u_monthly")); ?>

<fieldset>
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Organization Name : <em class="formee-req">*</em></label>
            <input type="text" name="client_name" class="formee-large" value="<?php echo $monthly_customers->org_name; ?>" placeholder="Organization Name" required >
        </div>
        <div class="grid-3-12 ">
            <label>Organization Print Name : <em class="formee-req">*</em></label>
            <input type="text" name="client_print" class="" value="<?php echo $monthly_customers->org_print_name; ?>" placeholder="PrintName" style="width: 150px" required>
        </div>
        <div class="grid-1-12 ">
            <label>Title : <em class="formee-req">*</em></label>
            <select name="title" id="title_sel" style="width: 60px" required>
                <option>Dr.</option>
                <option>Mr.</option>
                <option>Mrs.</option>
                <option>Ms.</option>
            </select>
            <script>
                var val = "<?php echo $monthly_customers->customer->title ?>", sel = document.getElementById('title_sel');
                for (var i, j = 0; i = sel.options[j]; j++) {
                    if (i.value == val) {
                        sel.selectedIndex = j;
                        break;
                    }
                }
            </script>
        </div>
        <div class="grid-3-12 ">
            <label>Client Contact : <em class="formee-req">*</em></label>
            <input type="text" name="name" class="formee-large" value="<?php echo $monthly_customers->customer->first_name . " " . $monthly_customers->customer->last_name; ?>" placeholder="Name" required>
        </div>
    </div>  
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>Address Line #1 : <em class="formee-req"></em></label>
            <input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" value="<?php echo $monthly_customers->customer->address_line_1; ?>" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #2 : <em class="formee-req">*</em></label>
            <input type="text" name="addr_2" class="formee-large" placeholder="Address Line #2" value="<?php echo $monthly_customers->customer->address_line_2; ?>" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #3 : </label>
            <input type="text"  name="addr_3" class="formee-large" placeholder="Address Line #3" value="<?php echo $monthly_customers->customer->address_line_3; ?>" autocomplete="off" >
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>City : <em class="formee-req"></em></label>
            <input type="text" name="city" class="formee-large" placeholder="City" value="<?php echo $monthly_customers->customer->city; ?>" required>
        </div>
        <div class="grid-4-12 ">
            <label>State : <em class="formee-req">*</em></label>
            <input type="text" name="state" class="formee-large" placeholder="State" value="<?php echo $monthly_customers->customer->state; ?>" required>
        </div>
        <div class="grid-4-12 ">
            <label>Pin Code : </label>
            <input type="text" name="pincode" class="formee-large" value="<?php echo $monthly_customers->customer->pincode; ?>" placeholder="Pin Code" >
        </div>
    </div>

    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>Telephone : <em class="formee-req">*</em></label>
            +<input type='tel' name="tele" pattern='\d{2}' placeholder='Tele: (91)' autocomplete="off" value="<?php echo $country_code; ?>"  style="width: 20px" required><input type='tel' name="tele" pattern='\d{10}' style="width: 100px;margin-left: 10px " placeholder='9999999999' autocomplete="off" value="<?php echo $phone; ?>" required>
        </div>
        <div class="grid-4-12 ">
            <label>Email : <em class="formee-req">*</em></label>
            <input type='email' name="email" placeholder='Email: example@example.com' value="<?php echo $monthly_customers->customer->email; ?>" autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <input  class="btn btn-large btn-danger" type='submit'  value="Next" style="margin-left: 40px;margin-top: 20px;min-width:100px">
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <h4 ><?php echo Html::anchor('panel/local'.$monthly_customers->contract_file, 'Contract File', array('style'=>'color:red')); ?></h4>
        </div>
        <div class="grid-4-12 ">
            <h4 ><?php echo Html::anchor('panel/local/'.$monthly_customers->id, 'Panel', array('style'=>'color:red')); ?></h4>
        </div>

    </div>

</fieldset>
<?php echo Form::close(); ?>
