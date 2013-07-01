<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('template.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::js('jquery.js'); ?>
        <?php echo Asset::js('bootstrap.js'); ?>
        <?php echo Asset::js('menu.js'); ?>
        <?php echo Asset::js('template.js'); ?>
    </head>

    <body onload="ShowCurrentTime()">

        <!-- Header  -->
        <div class="top" >
            <div class=" logo pull-right" ><?php echo Asset::img('home.jpg', array('style' => 'height:60px')); ?></div>
            <center>
                <div id="title" class="span10 offset1">
                    <h3> INVOICE MANAGEMENT SYSTEM ADMIN PANEL</h3>
                </div>
            </center>

            <div class="login_info pull-right">
                <?php
                if ($user = Session::get('user')) {

                    echo Html::anchor('login/logout', 'LOGOUT | ' . $user->name, array('id' => 'logout', 'class' => 'btn  btn-danger', 'style' => 'margin-top:5px'));
                    ?>
                    <?php
                } else {
                    Response::redirect('login/login');
                }
                ?> 
            </div>    
        </div>
        <div class="container">
            <div class="span12">
                <h1><?php echo $title; ?></h1>
                <hr />
                <?php if (Session::get_flash('success')): ?>
                    <div class="alert alert-success">
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
        </div>
        <div id="time"></div>
        <!-- Side menu bar  -->

        <div class="left-sidebar" >
            <div  style="margin-top:100px;">
                <ul class="menu">
                    <li class="item1"><a href="#">Invoice  </a>
                        <ul>
                            <li class="subitem1"><?php echo Html::anchor('invoice/single', 'Single'); ?></li>
                            <li class="subitem2"><?php echo Html::anchor('invoice/monthly', 'Monthly'); ?></li>

                        </ul>
                    </li>
                    <li class="item2"><a href="#">Panels</a>
                        <ul>
                            <li class="subitem1"><?php echo Html::anchor('panel/', 'Global'); ?></li>
                            <li class="subitem2"><?php echo Html::anchor('panel/', 'Local'); ?></li>
                            <li class="subitem2"><?php echo Html::anchor('panel/add', 'Add'); ?></li>

                        </ul>
                    </li>
                    <li class="item3"><a href="#">Archive</a>
                        <ul>
                            <li class="subitem1"><?php echo Html::anchor('archive/single', 'Single'); ?></li>
                            <li class="subitem2"><?php echo Html::anchor('archive/monthly', 'Monthly'); ?></li>

                        </ul>
                    </li>
                    <li class="item4"><a href="#">Users</a>
                        <ul>
                            <li class="subitem1"><a href="#">List All Users</a></li>
                            <li class="subitem2"><a href="#">Create</a></li>

                        </ul>
                    </li>
                    <li id="item5" class="item5 "><?php echo Html::anchor('system_log/users', 'System Log', array('class' => 'single')); ?>

                    </li>
                </ul>
            </div>
        </div>
        <?php echo $content; ?> 
        
        <div class="right-sidebar" >
            <div class="instructions"><h5>Instructions: </h5><hr /></div>

            <div class="errors" id="error"><h5>Errors* :</h5><hr /></div>
        </div>

        <div class="footer" >
            <div class="" >
                <div class="span10 offset1 " style="padding-top: 10px">
                </div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
