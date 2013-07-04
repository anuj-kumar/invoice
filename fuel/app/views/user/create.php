<div class="span5 " >
    <h1><span id="neogen">Create User</span></h1>
    <br />
    <?php echo Form::open('user/submit'); ?>
    <input name='name' type='text' placeholder='Name'required autofocus /> 
    <br>
    <input name='password' type='password' placeholder='Password'required  /> 
    <br>
    <td><input type="checkbox" value="1" name='invoice_single'/></td>
    <td><input type="checkbox" value="1" name="invoice_monthly" /></td>
    <td><input type="checkbox" value="1" name="invoice_monthly_new" /></td>
    <td><input type="checkbox" value="1" name="invoice_monthly_details" /></td>
    <td><input type="checkbox" value="1" name="panel_global"/></td>
    <td><input type="checkbox" value="1" name="panel_local"/></td>
    <td><input type="checkbox" value="1" name="archive_single"/></td>
    <td><input type="checkbox" value="1" name="archive_monthly"/></td>
    <td><input type="checkbox" value="1"  name="user_list"/></td>
    <td><input type="checkbox" value="1"  name="user_create"/></td>
    <input type='submit' value='Create' class='btn'/>

    <?php echo Form::close(); ?>

</div>

