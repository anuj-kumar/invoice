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


    </head>
    <body>
        <!-- Header  -->
        <div class="top" >
            <div class=" logo pull-right" ><?php echo Asset::img('home.jpg', array('style' => 'height:60px')); ?></div>
            <center>
                <div id="title" class="span10 offset1">
                    <h3> INVOICE MANAGEMENT SYSTEM ADMIN PANEL</h3>
                </div>
            </center>
            <div class="pull-right">
                <?php
                if ($user = Session::get('user')) {
                    echo "Logged in as " . $user->name;
                    ?>
                    <div class="logout btn btn-danger" style="">
                        <?php
                        Html::anchor('login/logout', 'Logout', array('class' => 'btn btn-danger'));
                    } else {
                        echo "not logged ";
                    }
                    ?> 
                </div>
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
        <!-- Side menu bar  -->
        <div class="left-sidebar" >
            <div  style="margin-top:100px;">
                <ul class="menu">
                    <li class="item1"><a href="#">Invoice  </a>
                        <ul>
                            <li class="subitem1"><a href="#">Individual </a></li>
                            <li class="subitem2"><a href="#">Monthly</a></li>

                        </ul>
                    </li>
                    <li class="item2"><a href="#">Panels</a>
                        <ul>
                            <li class="subitem1"><a href="#">Pricing </a></li>
                            <li class="subitem2"><a href="#">Add</a></li>

                        </ul>
                    </li>
                    <li class="item3"><a href="#">Archives</a>
                    </li>
                    <li class="item4"><a href="#">Users</a>
                        <ul>
                            <li class="subitem1"><a href="#">List All Users</a></li>
                            <li class="subitem2"><a href="#">Create</a></li>

                        </ul>
                    </li>
                    <li class="item5"><a href="#">System Log</a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="main well" >
            <?php echo $content; ?> 
        </div> 
        <div class="right-sidebar" >
            Instructions: <br /> Errors* :
        </div>

        <div class="footer" >
            <div class="" >
                <div class="span10 offset1 " style="padding-top: 10px">
                </div>
            </div>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                </p>
            </footer>
        </div>
    </body>
</html>
