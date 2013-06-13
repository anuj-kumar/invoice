<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>NEOGEN</title>
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
            <div class=" logo pull-right" ><?php echo Asset::img('home.jpg',array('style' => 'height:60px')); ?></div>
            <center>
                <div id="title" class="span10 offset1">
                    <h3> INVOICE MANAGEMENT SYSTEM ADMIN PANEL</h3>
                </div>
            </center>
            <div class="logout pull-right btn btn-danger" style="">
                Logout
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
        </div>
    </body>
</html>
