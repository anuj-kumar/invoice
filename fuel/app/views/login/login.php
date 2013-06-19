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
            <div class="login_alert" style="margin-left: -60px">          
                <?php if (Session::get_flash('success')): ?>
                    <div class="alert alert-success" >
                        <strong>Success</strong>
                        <p>
                            <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                    <div class="alert alert-error">
                        <strong>Error</strong>
                        <p>
                            <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <h1><span id="neogen">NeoGen Labs</span></h1>
            <br />
            <?php echo Form::open('index.php/login/verify'); ?>
            <input name='name' type='text' placeholder='Name'required autofocus /> 
            <br>
            <input name='password' type='password' placeholder='Password'required  /> 
            <br>
            <input type='submit' value='Login' class='btn'/>
            <input style="width:100px" type='' value='Forgot Password' class='btn'/>
            <?php echo Form::close(); ?>

        </div>


        <div id="footer">		
        </div>

    </body>
</html>