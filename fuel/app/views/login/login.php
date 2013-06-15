<?php echo Form::open('login/verify'); ?>
    <input name='name' type='text' placeholder='Name'/> 
    <br>
    <input name='password' type='password' placeholder='Password'/> 
    <br>
    <input type='submit' value='submit' class='btn'/>
<?php echo Form::close(); ?>
