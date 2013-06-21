<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>

<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_payment")); ?>
<h4>Payment Details</h4>    
<fieldset>
    
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Total Amount : <em class="formee-req">*</em></label>
            <input type="number" name="total" id="total" value="100" required>
        </div>
        <div class="grid-4-12 ">
            <label>Discount :</label>
            <input type='number'  name="discount" placeholder='Discount %' autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <input  class="btn btn-large btn-danger" type='submit'  value="Next" style="margin-left: 40px;margin-top: 20px;width:100px">
        </div>
    </div>    
</fieldset>
<?php echo Form::close(); ?>