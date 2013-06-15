<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo "" ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('login.css'); ?>
       
    </head>
    <body>

        <div id="header" >
        </div>
    <div class="login" >
            <h1><span id="neogen">NeoGen Labs</span></h1>
            <br />
            <?php echo Form::open('index.php/login/verify'); ?>
            <input name='name' type='text' placeholder='Name'/> 
            <br>
            <input name='password' type='password' placeholder='Password'/> 
            <br>
            <input type='submit' value='Login' class='btn'/>
            <input style="width:100px" type='' value='Forgot Password' class='btn'/>
            <?php echo Form::close(); ?>

        </div>


        <div id="footer">		
        </div>

    </body>
</html>