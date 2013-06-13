<html>
    <head>
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <link href="http://twitter.github.io/bootstrap/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="http://twitter.github.io/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
        <script src="http://twitter.github.io/bootstrap/assets/js/bootstrap.js"></script>
        <meta charset=utf-8 />
        <title>NEOGEN</title>
    </head>
    <style>
        .link { height: 30px; width:110px;margin-top:10px ; padding:10px }

    </style>
    <body>
        <div class="top" style="position:fixed; height:100px; width:100%; background-color:#c1c1c1; color: black;z-index:100; border-bottom:3px blacksolid">
            <div class=" logo pull-left" style="margin-left:15px;margin-top:10px">
                <img src="<?php // echo Asset::img('home.jpg');                                         ?>" style="height:80px" />
            </div><div class=" span6"><h4> NEOGEN LABS PVT LTD </h4><br />  INVOICE MANAGEMENT SYSTEM ADMIN PANEL</div>
            <div class="span1 logout pull-right btn btn-info" style="margin-top:30px; margin-right:20px">Logout</div>        </div>
        <div class="left-sidebar" style="position:fixed; border-right : 3px black solid ; width:150px; background-color: #c1c1c1; height:100%">
            <div  style="margin-top:100px;margin-left:-20px">
                <ul style="list-style:none; width:140px">
                    <li class="link btn"> Single</li>
                    <li class="link btn"> Monthly</li>
                    <li class="link btn"> Panel</li>
                    <li class="link btn"> Users</li>
                    <li class="link btn"> Archives</li>
                    <li class="link btn"> System Log</li>
                </ul></div>

        </div>
        <div class="main well" style="position:fixed; left: 150px;top:100px; width:100%;height:100%">
            <?php echo $content; ?>

        </div> 

        <div class="footer" style="position: fixed; bottom: 0 ;height:40px; width:100%; background-color:#c1c1c1;border-top:3px white solid ">

            <div class="" >
                <div class="span10 offset1 " style="padding-top: 10px">
                    <p style="float:left;">NeoGen Labs Pvt Ltd.</p>   
                    <p style="float:right"><a href="#">Back to top </a></p>
                </div>


            </div>


        </div>


    </body>
</html>
