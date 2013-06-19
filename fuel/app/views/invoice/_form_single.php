
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_single")); ?>
<h4>Single Customer</h4>    
<fieldset>
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>First Name : <em class="formee-req">*</em></label>
            <input type="text" class="formee-large" placeholder="First Name" required>
        </div>
        <div class="grid-4-12 ">
            <label>Last Name : <em class="formee-req">*</em></label>
            <input type="text" class="formee-large" placeholder="Last Name" required>
        </div>
    </div>  
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Address Line #1 : <em class="formee-req"></em></label>
            <input type="text" class="formee-large" placeholder="Adress Line #1" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #2 : <em class="formee-req">*</em></label>
            <input type="text" class="formee-large" placeholder="Address Line #2" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #3 : </label>
            <input type="text" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
        </div>
    </div>
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>City : <em class="formee-req"></em></label>
            <input type="text" class="formee-large" placeholder="Adress Line #1" required>
        </div>
        <div class="grid-4-12 ">
            <label>State : <em class="formee-req">*</em></label>
            <input type="text" class="formee-large" placeholder="Address Line #2" required>
        </div>
        <div class="grid-4-12 ">
            <label>Pin Code : </label>
            <input type="text" class="formee-large" placeholder="Address Line #3" >
        </div>
    </div>
    
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Telephone : <em class="formee-req">*</em></label>
            <input type='tele' pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' placeholder='Tele: +99(99)9999-9999' autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Email : <em class="formee-req">*</em></label>
            <input type='email'  placeholder='Email: example@example.com' autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <input  class="btn btn-large btn-danger" type='submit'  value="Next" style="margin-left: 40px;margin-top: 20px;width:100px">
        </div>
    </div>    
</fieldset>
<?php echo Form::close(); ?>