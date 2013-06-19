
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_single")); ?>

<fieldset>
    <div class="grid-6-12 pull-left"><label>First Name : <em class="formee-req">*</em></label>
    <input type="text" class="formee-medium" value="First Name">
    </div>
    <div class="grid-6-12 pull-right"><label>Last Name : <em class="formee-req">*</em></label>
    <input type="text" class="formee-medium" value="Last Name">
    </div>
    
    <div class="grid-6-12 pull-right"><label>Last Name : <em class="formee-req">*</em></label>
    <input type="text" class="formee-medium" value="Last Name">
    </div>

</fieldset
<?php echo Form::close(); ?>