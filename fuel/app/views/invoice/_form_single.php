
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_single")); ?>
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
            <input type="text" name="f_name" class="formee-large" placeholder="First Name" required autofocus autocomplete="off">
        </div>
        <div class="grid-4-12 ">
            <label>Last Name : <em class="formee-req">*</em></label>
            <input type="text" name="l_name" class="formee-large" placeholder="Last Name" required autocomplete="off">
        </div>
    </div>  
    <div class="grid-12-12 " style="margin-top: 0px">
        <div class="grid-4-12 ">
            <label>Address Line #1 : <em class="formee-req">*</em> </label>
            <input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" autocomplete="off" required>
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #2 : <em class="formee-req">*</em></label>
            <input type="text" name="addr_2" class="formee-large" placeholder="Address Line #2" autocomplete="off" >
        </div>
        <div class="grid-4-12 ">
            <label>Address Line #3 : </label>
            <input type="text" name="addr_3" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
        </div>
    </div>
    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-3-12 ">
            <label>City : <em class="formee-req">*</em></label>
            <input list="city" name="city" placeholder="city" required autocomplete='off' style="width: 140px">
            <datalist id="city">
                <option value="Kolkata">
                <option value="Delhi">
                <option value="Chennai">
                <option value="Mumbai">
                <option value="Bangalore">
                <option value="Panjim">
                <option value="Jaipur">
                <option value="Chandigarh">
            </datalist>
        </div>
        <div class="grid-3-12 ">
            <label>State : <em class="formee-req">*</em></label>
            <input list="state" name="state" placeholder="State"  style="width: 140px" autocomplete='off'>
            <datalist id="state">
                <?php foreach ( $states as $state ): ?>
                    <option value=""<?php echo state; ?>">
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="grid-3-12 ">
            <label>Country : <em class="formee-req">*</em></label>
            <input list="country" name="Country" id="country" placeholder="country" required style="width: 140px" autocomplete='off'>
            <datalist id="country">
                <option value="India">
                <option value="USA">
                <option value="">
                <option value="">
                <option value="">
                <option value="">
            </datalist>
        </div>
        <div class="grid-2-12  " style="float: right" >
            <label>Pin Code : </label>
            <input type="text" name="pin" id="pincode" class="formee-large" placeholder="Pincode" style="width:100px" onBlur="pincode_val()">
        </div>
    </div>

    <div class="grid-12-12 " style="margin-top: -20px">
        <div class="grid-4-12 ">
            <label>Telephone : <em class="formee-req">*</em></label>
            + <input type='tel' name="tele" id="country_code"  placeholder='Tele: (91)' autocomplete="off" value="91" style="width: 20px" required><input type='tel' name="tele" pattern='\d{10}' style="width: 100px;margin-left: 10px" placeholder='9999999999' autocomplete="off" required>
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

<script>
                function DropDownChanged(oDDL) {
                    var oTextbox = oDDL.form.elements["city_txt"];
                    if (oTextbox) {
                        oTextbox.style.display = (oDDL.value == "") ? "" : "none";
                        if (oDDL.value == "")
                            oTextbox.focus();
                    }
                }

                function FormSubmit(oForm) {
                    var oHidden = oForm.elements["city"];
                    var oDDL = oForm.elements["city_ddl"];
                    var oTextbox = oForm.elements["city_txt"];
                    if (oHidden && oDDL && oTextbox)
                        oHidden.value = (oDDL.value == "") ? oTextbox.value : oDDL.value;
                }

                function pincode_val() {
                    var country = document.getElementById('country').value;
                    if (country == "India" || country == "india") {
                        var pincode = document.getElementById('pincode').value;
                        if (pincode.length != 6)
                        {
                            document.getElementById('error').innerHTML = "* Pincode should be 6 characters";
                            document.getElementById('country_code').value = "91";
                            document.getElementById('pincode').focus();
                        }
                        else
                        {
                            document.getElementById('error').innerHTML = "";

                        }

                    }
                    else
                        document.getElementById('country_code').value = "";

                }


</script>