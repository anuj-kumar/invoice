<html>
    <head>
        <meta charset="utf-8">
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('template.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::css('formee-structure.css'); ?>
        <?php echo Asset::css('formee-style.css'); ?>
        <?php echo Asset::js('formee.js'); ?>
        <?php echo Asset::js('jquery.js'); ?>
        <?php echo Asset::js('bootstrap.js'); ?>
        <?php echo Asset::js('menu.js'); ?>
        <?php echo Asset::js('template.js'); ?>

    </head>

    <div class="row container ">
        <center>
                <h4 style="text-align:center"> INVOICE PREVIEW<br /> FIRST STEP<sup>TM</sup> SALES INVOICE </h4>
                <table>
                    <tr>
                        <td style="width:350px;">
                            <ul style="padding-left: 0px">

                                <li><input type="text" name="f_name" class="formee-small" placeholder="First Name"  value ="<?php echo $invoice->customer->first_name; ?>" required autofocus><input type="text" name="l_name" class="formee-small" placeholder="Last Name" value="<?php echo $invoice->customer->last_name ?>"" required></li>
                                <li><input type="text" name="addr_1" class="formee-large" placeholder="Adress Line #1" value="<?php echo $invoice->customer->address_line_1 ?>" autocomplete="off" ></li>
                                <li><input type="text" name="addr_2" class="formee-large" placeholder="Adress Line #2" value="<?php echo $invoice->customer->address_line_2 ?>" autocomplete="off" ></li>
                                <li><input type="text" name="addr_3" class="formee-large" placeholder="Adress Line #3" value="<?php echo $invoice->customer->address_line_3 ?>" autocomplete="off" ><br /></li>
                                <li><input type="text" name="city" class="formee-medium" placeholder="State" value="<?php echo $invoice->customer->city; ?>" autocomplete="off" ><input type="text" name="state" class="formee-small" placeholder="State" value="<?php echo $invoice->customer->state ?>" autocomplete="off" ><br /></li>
                                <li><input type="text" name="country" class="formee-small" placeholder="Country" value="" autocomplete="off" ></li><li><input type="text" name="pincode" class="formee-small" placeholder="Pincode" value="<?php echo $invoice->customer->pincode ?>" autocomplete="off" ></li>

                            </ul>
                        </td>
                        <td>
                            Date: <input type="text" class="" placeholder="" value="" autocomplete="off" >  <br/>
                            Invoice No: <input type="text"  class="" placeholder="" value="" autocomplete="off" > <br />
                            Billing Period: <input type="text"  class="" placeholder="" value="" autocomplete="off" ><br />
                            PAN: <input type="text"  class="" placeholder="" value="" autocomplete="off" > <br />
                            TIN: <input type="text"  class="" placeholder=" " value="" autocomplete="off" > <br /><br />
                            <br />
                        </td>
                    </tr>
                    <br />
                    <tr>
                        <td>
                            Name: B/O <input type="text"  class="" placeholder="" value="" autocomplete="off" >
                            <br />Date of Service :  <input type="text"  value="" autocomplete="off" >
                        </td>
                        <td>
                            FP No: <input type="text" name="country" class=""  value="" autocomplete="off" ><br />
                            <br />
                        </td></tr>
                </table>
                <br />
                <br />
                <table border="3" style="text-align:center;width:500px">
                    <tr style="">
                        <td></td>
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
                                <td style=""><?php echo $other->panel_quantity ?></td>
                                <td style="text-align:left"><?php echo $panel->name ?></td>
                                <td style="text-align:right"><?php echo $other->panel_price ?></td>
                                <td style="text-align:right"><?php echo $other->panel_quantity * $other->panel_price ?></td>

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
                        <td style="text-align:right"><?php echo $invoice->amount; ?></td>

                    </tr>

                </table>
                <br />
                <br />
                <table style="top:30px">
                    <tr>
                        <td style="width:400px">
                            <h5><span style="text-transform: uppercase;">Rupee <?php echo $amount_words; ?></span></h5>
                            <br />
                            Amount Paid:  <?php echo $invoice->amount - $invoice->amount_paid; ?>
                            <br />
                            Due Date:
                            <br />
                        </td>
                        <td>
                            <p>
                                Comments:<br /> <?php echo $invoice->comment; ?> 
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
    
        <div class="span4" style="margin-left: 47% ">
            <?php echo Html::anchor('invoice/print/'.$invoice_id, 'Print'); ?>
        </div>
        
</center>