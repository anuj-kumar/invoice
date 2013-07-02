<style>
    .main {padding-top: 1px}
    .invoice_content_table {min-height: 250px}
    .invoice_content td,th{width: 200px;border-bottom: 1px solid black;text-align: center}
    .qty{width: 40px}
    input{height: 17px}
</style>
<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>
<?php echo Asset::js('invoice.js'); ?>
<?php echo Asset::js('validate.js'); ?>

<?php
$i = 0;
foreach ($panels as $panel):
    $j = 0;

    foreach ($panel->global_panel_prices as $price_obj):
        $panel_arr[$i][$j]['id'] = $panel->id;
        $panel_arr[$i][$j]['name'] = $panel->name;
        $panel_arr[$i][$j]['price'] = $price_obj->price;
        $panel_arr[$i][$j]['vol_high'] = $price_obj->vol_high;
        $j++;
    endforeach;
    $i++;
endforeach;
//print_r($panel_arr);
?>
<script type="text/javascript">
    var panel = new Array();
    panel = <?php echo json_encode((array) $panel_arr); ?>;

</script>
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_single")); ?>
<div class="main well" >
    <div class="row" style="margin-top:20px">
        <div class="span4 pull-left">
            <h1>Single Invoice</h1>
        </div>
        <div class="span6 pull-right" style="column-count: 2">
            <div class="span2 pull-left" >Date: 
                <br>Invoice No: 
                <br>Billing Period: 
            </div>
            <div class="span3 pull-right">
                PAN:
                <br>TIN:
                <br>FP NO: 
            </div>
        </div>
    </div> 


    <div id="form1" style="display:block;">
        <fieldset>
            <div class="grid-12-12 ">
                <div class="grid-2-12 ">

                    <label>Title : <em class="formee-req">*</em></label>
                    <select name="title" id="id" style="width: 60px" required>
                        <option>Dr.</option>
                        <option>Mr.</option>
                        <option>Mrs.</option>
                        <option>Ms.</option>
                    </select>
                </div>
                <div class="grid-4-12 ">
                    <label>First Name : <em class="formee-req">*</em></label>
                    <input type="text" id="f_name" name="f_name" class="formee-large" placeholder="First Name" required autofocus autocomplete="off">
                </div>
                <div class="grid-4-12 ">
                    <label>Last Name : <em class="formee-req">*</em></label>
                    <input type="text" id="l_name" name="l_name" class="formee-large" placeholder="Last Name" required autocomplete="off">
                </div>
            </div>  
            <div class="grid-12-12 " style="margin-top: 0px">
                <div class="grid-4-12 ">
                    <label>Address Line #1 : <em class="formee-req">*</em> </label>
                    <input type="text" id="addr_1" name="addr_1" class="formee-large" placeholder="Adress Line #1" autocomplete="off" required>
                </div>
                <div class="grid-4-12 ">
                    <label>Address Line #2 : <em class="formee-req">*</em></label>
                    <input type="text" id="addr_2" name="addr_2" class="formee-large" placeholder="Address Line #2" autocomplete="off" >
                </div>
                <div class="grid-4-12 ">
                    <label>Address Line #3 : </label>
                    <input type="text" name="addr_3" id="addr_3" class="formee-large" placeholder="Address Line #3" autocomplete="off" >
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-3-12 ">
                    <label>City : <em class="formee-req">*</em></label>
                    <input list="city" name="city" id="city" placeholder="city" required autocomplete='off' style="width: 140px">
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
                    <input list="states" name="state" id="state" placeholder="State"  style="width: 140px" autocomplete='off'>
                    <datalist id="states">
                        <?php foreach ($states as $state): ?>
                            <option value="<?php echo $state->name; ?>">
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
                    <input type="text" name="pincode" id="pincode" class="formee-large" placeholder="Pincode" style="width:100px" onBlur="pincode_val()">
                </div>
            </div>

            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-4-12 ">
                    <label>Telephone : <em class="formee-req">*</em></label>
                    + <input type='tel' name="tele" id="country_code"  placeholder='Tele: (91)' autocomplete="off" value="91" style="width: 20px" required><input type='tel' id="tele" name="tele" pattern='\d{10}' style="width: 100px;margin-left: 10px" placeholder='9999999999' autocomplete="off" required>
                </div>
                <div class="grid-4-12 ">
                    <label>Email :</label>
                    <input type='email' id="email"  name="email" placeholder='Email: example@example.com' autocomplete="off" >
                </div>
                <div class="grid-4-12 ">
                    <input type="button" class="btn btn-danger btn-large" name="Next" value="Next" onclick="showContent();"  style="margin-top:20px; width:100px" />
                </div>
            </div>    
        </fieldset>
    </div>

        <div id="form2" style="display:none;">

            <div class="span3 pull-right">

            <input type="hidden" name="invoice_id" value="<?php echo $invoice_id ?>" />
            <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('invoice_content')" />
                <input class="btn btn-danger" type="button" value="Delete Row" onclick="deleteRow('invoice_content')" />
        </div>
        <div class="invoice_content_table">
            <table id="invoice_content" class="invoice_content">
                <th>Qty.</th>
                <th>Panel</th>
                <th>Unit Price</th>
                <th>Extended Price</th>
            </table>
             

        </div>

        <div class="row" style="border-bottom:1px solid black"></div>
        <div class="row" style="padding-top:5px">
            <div class="span2 pull-right">
                <input type="button" class="btn btn-danger btn-large" name="Next" value="Back" onclick="backSingle()" />
                <input type="button" class="btn btn-danger btn-large" name="Next" value="Next" onclick="showPayment()" />
            </div>
            <div class="span4 pull-right" style="margin-right:20px">Total Rs.<input type="text" name="amount" id="total" readonly autocomplete="off" /> </div>

        </div>
        <fieldset>
        </fieldset>
    </div>

    <div id="form3" style="display: none" >
        <fieldset>
            <div class="grid-12-12 " style="margin-top: -10px">

                <div class="grid-4-12 " style="margin-top: -20px">
                    Total Amount : <em class="formee-req">*</em>
                    <input type="text"  id="total_amount" value="" required disabled>
                </div>
                <div class="grid-4-12" style="margin-top: 0px">
                    <input type="hidden" name="payment" id="payment" />
                    <select name="payment_mode" id="payment_ddl" onchange="DropDownChanged(this);">
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque </option>
                    </select> 
                </div>
                <div class="grid-4-12">
                    <input type="text" id="cheque_number" name="payment_txt" id="payment_txt" style="display: none;" placeholder="DD / Cheque Number" />

                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-2-12 ">
                    <label>Amount Paid: <em class="formee-req">*</em></label>
                    <input type="text" name="amount_paid" id="total" value="" required style="width:50px">
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-3-12">
                    <input type="text" name="bank_name" class="formee-large" id="bank_name" style="display: none;" placeholder="Bank Name" style="width:80px"/>
                </div>
                <div class="grid-3-12">
                    <input type="text" name="bank_branch" class="formee-large" id="bank_branch" style="margin-left: 20px;display: none;" placeholder="Bank Branch" style="width:80px" />
                </div>
                <div class="grid-3-12">
                    <input type="text" name="bank_city" class="formee-large" id="bank_city" style="margin-left: 40px;display: none;" placeholder="Bank City"  style="width:80px" />
                </div>
                
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="span5 pull-left">
                   
                    <br />Current Due (Rs.):
                    <br />Due Date:

                </div>
                <div class="span4 ">
                    <label>Comment Box:</label>
                    <textarea style="height: 70px;width: 300px" name="comment" >All amounts are due within 30 days of receipt of invoice. Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea>
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-4-12 " style="float: right">
                    <input type="button" class="btn btn-danger btn-large" name="Next" value="Back" onclick="backContent();" />
                    <input  class="btn btn-large btn-danger" type='submit'  value="Preview"  onclick="val_payment();">
                </div>

            </div>
        </fieldset>
    </div>


</div> 






<script>
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

    window.onload = addRow('invoice_content');

    function showContent() {
        var flag = val_single();
        //alert(flag);
        if (flag) {
          //  alert("1");
            document.getElementById('error').innerHTML = "<h5>Errors*:</h5>";
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "block";
            document.getElementById('form3').style.display = "none";
        }
    }

    function showPayment() {
        var flag = val_invoice_panels();
        if (flag) {
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "block";
        }
    }
    function backSingle() {
        document.getElementById('form1').style.display = "block";
        document.getElementById('form2').style.display = "none";
        document.getElementById('form3').style.display = "none";
    }

    function backContent() {
        document.getElementById('form1').style.display = "none";
        document.getElementById('form2').style.display = "block";
        document.getElementById('form3').style.display = "none";
    }
    function DropDownChanged(oDDL) {
        var oTextbox = document.getElementById('payment_txt');
        var oBank_name = document.getElementById('bank_name');
        var oBank_city = document.getElementById('bank_city');
        var oBank_branch = document.getElementById('bank_branch');

        if (oTextbox) {
            oTextbox.style.display = (oDDL.value == "cheque") ? "" : "none";
            oBank_name.style.display = (oDDL.value == "cheque") ? "" : "none";
            oBank_city.style.display = (oDDL.value == "cheque") ? "" : "none";
            oBank_branch.style.display = (oDDL.value == "cheque") ? "" : "none";
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