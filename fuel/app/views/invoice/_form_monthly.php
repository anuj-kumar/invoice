<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>

<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_monthly")); ?>
<fieldset>
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Organization Name : <em class="formee-req">*</em></label>
            <input type="text" name="client_name" class="formee-large" value="<?php echo $monthly_customers->org_name; ?>" placeholder="Organization Name" required autofocus>
        </div>
        <div class="grid-3-12 ">
            <label>Organization Print Name : <em class="formee-req">*</em></label>
            <input type="text" name="client_print" class="" placeholder="PrintName" style="width: 150px" required>
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
            <label>Address Line #1 : <em class="formee-req"></em></label>
            <input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #2 : <em class="formee-req">*</em></label>
            <input type="text" name="addr_2" class="formee-large" placeholder="Address Line #2" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #3 : </label>
            <input type="text"  name="addr_3" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>City : <em class="formee-req"></em></label>
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
            +<input type='tel' name="tele" pattern='\d{2}' placeholder='Tele: (91)' autocomplete="off" value="91" style="width: 20px" required><input type='tel' name="tele" pattern='\d{10}' style="width: 100px" placeholder='9999999999' autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Email : <em class="formee-req">*</em></label>
            <input type='email' name="email" placeholder='Email: example@example.com' autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <input  class="btn btn-large btn-danger" type='submit'  value="Submit" style="margin-left: 40px;margin-top: 20px;min-width:100px">
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>Contract File : <em class="formee-req"></em></label>
            <input type="file" name="file" class="formee-large" placeholder="Contract File" required>
        </div>
        
    </div>

</fieldset>
<?php echo Form::close(); ?>