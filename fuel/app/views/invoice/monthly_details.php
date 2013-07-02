<?php echo Asset::js('validate.js'); ?>
<?php echo Asset::css('formee-structure.css'); ?>
<?php echo Asset::css('formee-style.css'); ?>
<?php echo Asset::js('formee.js'); ?>
<?php
$s = (string) $monthly_customers->customer->phone;
$country_code = $s[0] . $s[1];
$phone = $s[2] . $s[3] . $s[4] . $s[5] . $s[6] . $s[7] . $s[8] . $s[9] . $s[10] . $s[11];
?>
<style>
    .main {padding-top: 1px}
    .invoice_content_table {min-height: 250px}
    .invoice_content td,th{width: 200px;border-bottom: 1px solid black;text-align: center}
    input{height: 17px}
    .qty{width: 40px}
</style>
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

<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_monthly")); ?>
<div class="main well" >

    <h2>Monthly Details</h2>
    <div id="form1">
        <fieldset>
            <div class="grid-12-12 ">
                <div class="grid-4-12 ">
                    <label>Organization Name : <em class="formee-req">*</em></label>
                    <input type="text" id="client_name" name="org_name" class="formee-large" value="<?php echo $monthly_customers->org_name; ?>" placeholder="Organization Name" required >
                </div>
                <div class="grid-3-12 ">
                    <label>Organization Print Name : <em class="formee-req">*</em></label>
                    <input type="text" id="client_print" name="org_print_name" class="" value="<?php echo $monthly_customers->org_print_name; ?>" placeholder="PrintName" style="width: 150px" required>
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
                <div class="grid-4-12 ">
                    <label>Client Contact : <em class="formee-req">*</em></label>
                    <input type="text" id="f_name" name="f_name" id="f_name" class="formee-large" value="<?php echo $monthly_customers->customer->first_name; ?>" placeholder="Name" required>
                </div>
                <div class="grid-3-12 ">
                    <label>Client Contact : <em class="formee-req">*</em></label>
                    <input type="text" id="l_name" name="l_name" id="l_name" class="formee-large" value="<?php echo $monthly_customers->customer->last_name; ?>" placeholder="Name" required>
                </div>

            </div>  
            <div class="grid-12-12 " style="margin-top: -25px">
                <div class="grid-4-12 ">
                    <label>Address Line #1 : <em class="formee-req"></em></label>
                    <input type="text" name="addr_1" id="addr_1" class="formee-large" placeholder="Adress Line #1" value="<?php echo $monthly_customers->customer->address_line_1; ?>" autocomplete="off" required>
                </div>
                <div class="grid-4-12 ">
                    <label>Address Line #2 : <em class="formee-req">*</em></label>
                    <input type="text" name="addr_2" id="addr_2" class="formee-large" placeholder="Address Line #2" value="<?php echo $monthly_customers->customer->address_line_2; ?>" autocomplete="off" required>
                </div>
                <div class="grid-4-12 ">
                    <label>Address Line #3 : </label>
                    <input type="text" id="addr_3" name="addr_3" class="formee-large" placeholder="Address Line #3" value="<?php echo $monthly_customers->customer->address_line_3; ?>" autocomplete="off" >
                </div>
            </div>
            <div class="grid-12-12 " style="margin-top: -30px">
                <div class="grid-3-12 ">
                    <label>City : <em class="formee-req"></em></label>
                    <input type="text" name="city" id="city" class="formee-medium" placeholder="City" value="<?php echo $monthly_customers->customer->city; ?>" required>
                </div>
                <div class="grid-3-12 ">
                    <label>State : <em class="formee-req">*</em></label>
                    <input type="text" name="state" id="state" class="formee-medium" placeholder="State" value="<?php echo $monthly_customers->customer->state; ?>" required>
                </div>
                <div class="grid-3-12 ">
                    <label>Country : <em class="formee-req">*</em></label>
                    <input type="text" name="country" id="country" class="formee-medium" placeholder="country" value="<?php //echo $monthly_customers->customer->country; ?>" required>
                </div>
                <div class="grid-3-12 ">
                    <label>Pin Code : </label>
                    <input type="text" id="pincode" name="pincode" class="formee-medium" value="<?php echo $monthly_customers->customer->pincode; ?>" placeholder="Pin Code" >
                </div>
            </div>

            <div class="grid-12-12 " style="margin-top: -30px">
                <div class="grid-4-12 ">
                    <label>Telephone : <em class="formee-req">*</em></label>
                    +<input type='tel' id="country_code" name="tele" pattern='\d{2}' placeholder='Tele: (91)' autocomplete="off" value="<?php echo $country_code; ?>"  style="width: 20px" required><input type='tel' id="tele" name="tele" pattern='\d{10}' style="width: 100px;margin-left: 10px " placeholder='9999999999' autocomplete="off" value="<?php echo $phone; ?>" required>
                </div>
                <div class="grid-4-12 ">
                    <label>Email : <em class="formee-req">*</em></label>
                    <input type='email' id="email" name="email" placeholder='Email: example@example.com' value="<?php echo $monthly_customers->customer->email; ?>" autocomplete="off" >
                </div>

            </div>
            <div class="grid-12-12 " style="margin-top: -20px">
                <div class="grid-4-12 ">

                    <h4 ><?php echo Html::anchor('panel/local/' . $monthly_customers->contract_file, 'Contract File', array('class' => 'btn btn-large btn-info span2', 'style' => '')); ?></h4>
                </div>
                <div class="grid-4-12 ">
                    <input type="button" class="span2 btn btn-danger btn-large" name="Next" value="Next" onclick="showContent()" style="width:150px" />
                </div>
                <div class="grid-4-12 ">
                    <input type="hidden" value="<?php echo $monthly_customers->customer_id; ?>" name="customer_id" />
                    <h4 ><?php echo Html::anchor('panel/local/' . $monthly_customers->id, 'Panel', array('class' => 'btn btn-large btn-info span2', 'style' => '')); ?></h4>
                </div>

            </div>

        </fieldset>
        <?php echo Form::close(); ?>
    </div>

        <div id="form2" style="display:none;">

            <div class="span3 pull-right">

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
                    <input type="text" name="amount" id="total_amount" value="" required>
                </div>
                <div class="grid-4-12" style="margin-top: 0px">
                    <input type="hidden" name="payment" id="payment" />
                    <select name="payment_mode" id="payment_ddl" onchange="DropDownChanged(this);">
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque </option>
                    </select> 
                </div>
                <div class="grid-4-12">
                    <input type="text" name="cheque_number" id="payment_txt" style="display: none;" placeholder="DD / Cheque Number" />

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
                    <br />Outstanding (Rs.): <?php echo $monthly_customers->outstanding ?>
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
                            var flag = val_monthly();
                            if (flag) {
                                document.getElementById('form1').style.display = "none";
                                document.getElementById('form2').style.display = "block";
                                document.getElementById('form3').style.display = "none";
                            }
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





</script><?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>