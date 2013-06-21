
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_single")); ?>
<h4>Single Customer</h4>    
<fieldset>
    <div class="grid-12-12 ">
        <div class="grid-2-12 ">
            
            <label>Title : <em class="formee-req">*</em></label>
            <select name="title" style="width: 60px" required>
                <option>Dr.</option>
                <option>Mr.</option>
                <option>Mrs.</option>
                <option>Ms.</option>
            </select>
        </div>
        <div class="grid-4-12 ">
            <label>First Name : <em class="formee-req">*</em></label>
            <input type="text" name="f_name" class="formee-large" placeholder="First Name" required autofocus>
        </div>
        <div class="grid-4-12 ">
            <label>Last Name : <em class="formee-req">*</em></label>
            <input type="text" name="l_name" class="formee-large" placeholder="Last Name" required>
        </div>
    </div>  
    <div class="grid-12-12 " style="margin-top: 0px">
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
            <input type="text" name="addr_3" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>City : <em class="formee-req"></em></label>
            <input type="text" name="city" class="formee-large" placeholder="Adress Line #1" required>
        </div>
        <div class="grid-4-12 ">
            <label>State : <em class="formee-req">*</em></label>
            <input list="states" name="browser" placeholder="State" required>
<datalist id="states">
  <option value="Karnataka">
  <option value="Goa">
  <option value="Kerala">
  <option value="West Bengal">
  <option value="Tamil Nadu">
</datalist>
        </div>
        <div class="grid-4-12 " >
            <label>Pin Code : </label>
            <input type="text" name="pin" class="formee-large" placeholder="Address Line #3" >
        </div>
    </div>
    
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>Telephone : <em class="formee-req">*</em></label>
            <input type='tele' name="tele" pattern='[\+]\d{2}\d{2}\d{4}\d{4}' placeholder='Tele: +99(99)9999-9999' autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Email :</label>
            <input type='email'  name="email" placeholder='Email: example@example.com' autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <input  class="btn btn-large btn-danger" type='submit'  value="Next" style="margin-left: 40px;margin-top: 20px;width:100px">
        </div>
    </div>    
</fieldset>
<?php echo Form::close(); ?>