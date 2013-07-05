<form action="http://127.0.0.1/invoice/public/details/add" accept-charset="utf-8" method="post">
    <style> 

    </style>
    <h2>Add Details    </h2>
    <?php echo Form::open("/details/submit"); ?>

    <table>
        <tr>
            <td class="" ><label id="label_invoice_no_single" for="form_invoice_no_single">Invoice no. single</label></td>
            <td class=""><input type="text" id="form_invoice_no_single" name="invoice_no_single" value="" /> <span></span> </td>
            <td class=""><label id="label_invoice_no_monthly" for="form_invoice_no_monthly">Invoice No. Monthly</label></td>
            <td class=""><input type="text" id="form_invoice_no_monthly" name="invoice_no_monthly" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_address_line_1" for="form_address_line_1">Address_line_1</label></td>
            <td class=""><input type="text" id="form_address_line_1" name="address_line_1" value="" /> <span></span> </td>
            <td class=""><label id="label_address_line_2" for="form_address_line_2">Address_line_2</label></td>
            <td class=""><input type="text" id="form_address_line_2" name="address_line_2" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_address_line_3" for="form_address_line_3">Address_line_3</label></td>
            <td class=""><input type="text" id="form_address_line_3" name="address_line_3" value="" /> <span></span> </td>
            <td class=""><label id="label_city" for="form_city">City</label></td>
            <td class=""><input type="text" id="form_city" name="city" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_state" for="form_state">State</label></td>
            <td class=""><input type="text" id="form_state" name="state" value="" /> <span></span> </td>
            <td class=""><label id="label_country" for="form_country">Country</label></td>
            <td class=""><input type="text" id="form_country" name="country" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_phone_number" for="form_phone_number">Phone Number</label></td>
            <td class=""><input type="text" id="form_phone_number" name="phone_number" value="" /> <span></span> </td>
            <td class=""><label id="label_fax_number" for="form_fax_number">Fax Number</label></td>
            <td class=""><input type="text" id="form_fax_number" name="fax_number" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_email" for="form_email">Email</label></td>
            <td class=""><input type="email" id="form_email" name="email" value="" /> <span></span> </td>
            <td class=""><label id="label_website" for="form_website">Website</label></td>
            <td class=""><input type="text" id="form_website" name="website" value="" /> <span></span> </td>
        </tr>

        <tr>
            <td class=""><label id="label_pan" for="form_pan">PAN NUMBER:</label></td>
            <td class=""><input type="text" id="form_pan" name="pan" value="" /> <span></span> </td>
            <td class=""><label id="label_billing_period" for="form_billing_period">Billing Period</label></td>
            <td class=""><input type="text" id="form_billing_period" name="billing_period" value="" /> <span></span> </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>                     <input class="btn btn-danger" type="submit" value="Update"/></td>
        </tr>

    </table>
<?php echo Form::close(); ?>
