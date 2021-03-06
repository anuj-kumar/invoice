<style>
    .main {padding-top: 1px}
    .invoice_content_table {min-height: 250px}
    .invoice_content td,th{width: 200px;border-bottom: 1px solid black;text-align: center}
    .qty{width: 40px}
</style>
<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>

<?php echo Asset::js('formee.js'); ?>
<?php echo Asset::js('invoice.js'); ?>
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
                <div class="grid-4-12 ">
                    <label>Organization Name : <em class="formee-req">*</em></label>
                    <input type="text" name="client_name" class="formee-large"  placeholder="Organization Name" required >
                </div>
                <div class="grid-3-12 ">
                    <label>Organization Print Name : <em class="formee-req">*</em></label>
                    <input type="text" name="client_print" class=""  placeholder="PrintName" style="width: 150px" required>
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-2-12 " >
                    <label>Title : <em class="formee-req">*</em></label>
                    <select name="title" id="title_sel" style="width: 60px" required>
                        <option>Dr.</option>
                        <option>Mr.</option>
                        <option>Mrs.</option>
                        <option>Ms.</option>
                    </select>
                    
                </div>
                <div class="grid-4-12 ">
                    <label>Client Contact First Name : <em class="formee-req">*</em></label>
                    <input type="text" name="f_name" class="formee-large"  placeholder="Name" required>
                </div>
                <div class="grid-3-12 ">
                    <label>Client Contact Last Name : <em class="formee-req">*</em></label>
                    <input type="text" name="l_name" class="formee-large"  placeholder="Name" required>
                </div>

            </div>     <div class="grid-12-12 " style="margin-top: -20px">
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
            <div class="grid-12-12 " style="margin-top: -30px">
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
                    +<input type='tel' name="tele" pattern='\d{2}' placeholder='Tele: (91)' autocomplete="off" value="91" style="width: 20px" required><input type='tel' name="phone" pattern='\d{10}' style="width: 100px;margin-left: 10px" placeholder='9999999999' autocomplete="off" required>
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
                <div class="grid-3-12  "   style="float: right">
                    <input type="button" class="btn btn-danger btn-large" name="Next" value="Next" onclick="showContent()" style="width:100px" />
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
            <div class="span4 pull-right" style="margin-right:20px">Total Rs.<input type="text" id="total" name="total" /> </div>

        </div>
        <fieldset>
        </fieldset>
    </div>

    <div id="form3" style="display: none" >
        <fieldset>
            <div class="grid-12-12 " style="margin-top: -10px">
                <h5>Outstanding:    </h5><br />
                <div class="grid-4-12 " style="margin-top: -20px">
                    Total Amount : <em class="formee-req">*</em>
                    <input type="text" name="total" id="total" value="100" required>
                </div>
                <div class="grid-4-12" style="margin-top: 0px">
                    <input type="hidden" name="payment" id="payment" />
                    <select name="payment_ddl" id="payment_ddl" onchange="DropDownChanged(this);">
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque </option>
                    </select> 
                </div>
                <div class="grid-4-12">
                    <input type="text" name="payment_txt" id="payment_txt" style="display: none;" placeholder="DD / Cheque Number" />
                    <input type="text" name="bank" id="bank" style="display: none;" placeholder="Bank Name" />
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-4-12 ">
                    <label>Amount Paid: <em class="formee-req">*</em></label>
                    <input type="text" name="paid" id="total" value="100" required>
                </div>


            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="span5 pull-left">

                    <br />Current Due (Rs.):
                    <br />Outstanding (Rs.):
                    <br />Due Date:

                </div>
                <div class="span4 ">
                    <label>Comment Box:</label>
                    <textarea style="height: 70px;width: 300px" >All amounts are due within 30 days of receipt of invoice. Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea>
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-4-12 " style="float: right">
                    <input type="button" class="btn btn-danger btn-large" name="Next" value="Back" onclick="backContent()" />
                    <input  class="btn btn-large btn-danger" type='submit'  value="Preview" >
                </div>

            </div>
        </fieldset>
    </div>


</div> 













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

                        window.onload = addRow('invoice_content');

                        function showContent() {
                            document.getElementById('form1').style.display = "none";
                            document.getElementById('form2').style.display = "block";
                            document.getElementById('form3').style.display = "none";
                        }

                        function showPayment() {
                            document.getElementById('form1').style.display = "none";
                            document.getElementById('form2').style.display = "none";
                            document.getElementById('form3').style.display = "block";
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
                            var oBank = getElementById('bank');
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



</script><?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>