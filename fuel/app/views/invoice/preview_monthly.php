<html>
    <head>
        <meta charset="utf-8">
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::css('formee-structure.css'); ?>
        <?php echo Asset::css('formee-style.css'); ?>
        <?php echo Asset::js('formee.js'); ?>
        <?php echo Asset::js('jquery.js'); ?>
        <?php echo Asset::js('bootstrap.js'); ?>

    </head>

    <div class="row container ">
        <center>
            <h4 style="text-align:center"> INVOICE PREVIEW<br /> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
            <table>
                <tr>
                    <td style="width:350px;">
                        <ul style="padding-left: 0px">
                            <li><input type="text" name="country" class="formee-large" placeholder="Organiztion Name" value="<?php echo $monthly_customer->org_name; ?>" autocomplete="off" ></li>
                            <li><input type="text" name="f_name" class="formee-small" placeholder="First Name"  value ="<?php echo $invoice->customer->first_name; ?>" required autofocus><input type="text" name="l_name" class="formee-small" placeholder="Last Name" value="<?php echo $invoice->customer->last_name ?>"" required></li>
                            <li><input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" value="<?php echo $invoice->customer->address_line_1 ?>" autocomplete="off" ></li>
                            <li><input type="text" name="addr_2" class="formee-large" placeholder="Adress Line #2" value="<?php echo $invoice->customer->address_line_2 ?>" autocomplete="off" ></li>
                            <li><input type="text" name="addr_3" class="formee-large" placeholder="Adress Line #3" value="<?php echo $invoice->customer->address_line_3 ?>" autocomplete="off" ><br /></li>
                            <li><input type="text" name="city" class="formee-medium" placeholder="City" value="<?php echo $invoice->customer->city; ?>" autocomplete="off" ><input type="text" name="pincode" class="formee-small" placeholder="Pincode" value="<?php echo $invoice->customer->pincode ?>" autocomplete="off" ><input type="text" name="state" class="formee-small" placeholder="State" value="<?php echo $invoice->customer->state ?>" autocomplete="off" ><br /></li>
                            <li><input type="text" name="country" class="formee-medium" placeholder="Country" value="" autocomplete="off" ></li><li></li>

                        </ul>
                    </td>
                    <td>
                        Date: <input type="text" class="" placeholder="" value="<?php echo date("d/m/y"); ?>" autocomplete="off" >  <br/>
                        Invoice No: <input type="text"  class="" placeholder="" value="<?php echo $invoice->id; ?>" autocomplete="off" > <br />
                        Billing Period: <input type="text"  class="" placeholder="" value="<? echo date('F-Y'); ?>" autocomplete="off" ><br />
                        PAN: <input type="text"  class="" placeholder="" value="" autocomplete="off" > <br />
                        TIN: <input type="text"  class="" placeholder=" " value="" autocomplete="off" > <br /><br />
                        <br />
                    </td>
                </tr>
                <br />

            </table>
            <br />
            <br />
            <table border="3" style="text-align:center;width:500px">
                <tr style="">
                    <td>Item</td>
                    <td>Qty.</td>
                    <td>Panel</td>
                    <td>Unit Price</td>
                    <td>Extended Price</td>
                </tr>
                <?php
                $i = 1;
                foreach ($invoice->panels as $panel):
                    foreach ($panel->invoices_panels as $other):
                        ?>

                        <tr  style="">
                            <td style=""><?php echo $i++; ?></td>
                            <td style=""><input type="text" name="" value="<?php echo $other->panel_quantity ?>" ></td>
                            <td style="text-align:left"><input type="text" name="" value="<?php echo $panel->name ?>" ></td>
                            <td style="text-align:right"><input type="text" name="" value="<?php echo $other->panel_price ?>" ></td>
                            <td style="text-align:right"><input type="text" name="" value="<?php echo number_format($other->panel_quantity * $other->panel_price, 2) ?>" disabled></td>

                        </tr>

                        <?php
                    endforeach;
                endforeach;
                ?>
                <tr  style="">
                    <td style=""></td>
                    <td style=""></td>
                    <td style="text-align:left">Total</td>
                    <td style=""></td>
                    <td style="text-align:right"><input type="text" name="" value="<?php echo number_format($invoice->amount, 2); ?>" disabled></td>

                </tr>

            </table>
            <br />
            <br />
            <table style="top:30px">
                <tr>
                    <td style="width:400px">
                        <h4>Rupee <?php echo $amount_words; ?></h4>
                        <br />
                        Total Amount :  <?php echo number_format($invoice->amount, 2); ?>
                        <br />
                        Amount Paid:  <?php echo number_format($invoice->amount - $invoice->amount_paid, 2); ?>
                        <br />
                        Due Date:<input type="" value="<?php echo date('d-m-Y', strtotime("+2 Months")); ?>" name="due_date" >
                        <br />
                        <br />
                        Outstanding :  <?php echo number_format($monthly_customer->outstanding, 2); ?>

                    </td>
                    <td>
                        <br />
                        Payment Mode : <input type="" id="payment_mode" value="<?php echo $invoice->payment_mode; ?>" name="" onchange="check_cheque()"> 
                        <br />
                        <?php if($invoice->payment_mode !="cash") { ?>
                        
                            Cheque/DD number :  <input type="" value="<?php echo $invoice->cheque_number; ?>" name="" />
                            <br />
                            Bank Name:  <input type="" value="<?php echo $invoice->bank_name; ?>" name="" />
                            <br />
                            Bank Branch :  <input type="" value="<?php echo $invoice->bank_branch; ?>" name="" />
                            <br />
                            Bank City  :  <input type="" value="<?php echo $invoice->bank_city; ?>" name="" />

                        <?php } ?>
                            <div id="cheque" style="display:none">
                                     Cheque/DD number :  <input type="" value="<?php echo $invoice->cheque_number; ?>" name="" />
                            <br />
                            Bank Name:  <input type="" value="<?php echo $invoice->bank_name; ?>" name="" />
                            <br />
                            Bank Branch :  <input type="" value="<?php echo $invoice->bank_branch; ?>" name="" />
                            <br />
                            Bank City  :  <input type="" value="<?php echo $invoice->bank_city; ?>" name="" />
                            </div>

                    </td>
                </tr>
            </table>
    </div>

    <div class="span4" style="margin-left: 47% ">
        <?php echo Html::anchor('invoice/print/' . $invoice_id, 'Print', array('class' => 'btn btn-danger', 'target' => 'blank')); ?>
        <?php echo Html::anchor('invoice/cancel/' . $invoice_id, 'Cancel', array('class' => 'btn btn-danger')); ?>
        <?php echo Html::anchor('invoice/monthly', 'Back to Home', array('class' => 'btn btn-danger')); ?>

    </div>

</center>
        <script>
            function check_cheque(){
                if(document.getElementById('payment_mode').value!="cash"){
                    document.getElementById('cheque').style.display="block";
                }
                if(document.getElementById('payment_mode').value=="cash"){
                    document.getElementById('cheque').style.display="none";
                }
            }
            </script>