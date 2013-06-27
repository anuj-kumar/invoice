<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>

<?php echo Form::open(array("id" => "payment_form", "class" => "payment_form", "action" => "/invoice/submit_payment")); ?>
<h4>Payment Details</h4>

<div class="row container" style="margin-top: 30px;margin-left: 20px">
    <h5>Outstanding:    </h5><br />

</div>
<fieldset>

    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            Total Amount : <em class="formee-req">*</em>
            <input type="text" name="total" id="total" value="100" required>
        </div>
    </div>
    <div class="grid-12-12 ">
        <div class="grid-4-12 ">
            <label>Amount Paid: <em class="formee-req">*</em></label>
            <input type="text" name="paid" id="total" value="100" required>
        </div>
        <div class="grid-4-12" style="margin-top: 22px">
            <input type="hidden" name="payment" />
            <select name="payment_ddl" onchange="DropDownChanged(this);">
                <option value="cash">Cash</option>
                <option value="cheque">Cheque </option>
            </select> 
        </div>
        <div class="grid-4-12">
            <input type="text" name="payment_txt" style="display: none;" placeholder="DD / Cheque Number" />
            <input type="text" name="bank" style="display: none;" placeholder="Bank Name" />
        </div>

    </div>
    <div class="grid-12-12 ">
        <div class="grid-3-12 " style="float: right">
            <input  class="btn btn-large btn-danger" type='submit'  value="Preview" style="margin-left: 40px;margin-top: 20px;width:100px">
        </div>

    </div>
</fieldset>
<?php echo Form::close(); ?>
<script>
                function DropDownChanged(oDDL) {
                    var oTextbox = oDDL.form.elements["payment_txt"];
                    var oBank = oDDL.form.elements["bank"];
                    if (oTextbox) {
                        oTextbox.style.display = (oDDL.value == "cheque") ? "" : "none";
                        oBank.style.display = (oDDL.value == "cheque") ? "" : "none";
                        if (oDDL.value == "cheque")
                            oTextbox.focus();

                    }
                }

                function FormSubmit(oForm) {
                    var oHidden = oForm.elements["payment"];
                    var oDDL = oForm.elements["payment_ddl"];
                    var oTextbox = oForm.elements["payment_txt"];
                    if (oHidden && oDDL && oTextbox)
                        oHidden.value = (oDDL.value == "") ? oTextbox.value : oDDL.value;
                }

</script>