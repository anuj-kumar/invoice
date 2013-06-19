<?php echo Form::open(array("class" => "form-horizontal", "action" => "/invoice/submit_single")); ?>
<input name='name' type='text' placeholder='Name'/> 
<br>
<input name='password' type='password' placeholder='Password'/> 
<br>
<input type='submit' value='Login' class='btn'/>
<input style="width:100px" type='' value='Forgot Password' class='btn'/>
<?php echo Form::close(); ?>