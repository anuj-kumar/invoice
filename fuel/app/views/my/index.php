<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('my/index','Index');?></li>
    <br>
    <p class="right"> Logged in as 
        <b><?php echo Session::get('user')->name ?></b>
    </p>
    <?php
    /*foreach ($rights as $user) {
        echo $user->id . " " . $user->user->name . "<br>";
        print_r ($right->users);
    }*/
    ?>

</ul>
<p>Index</p>