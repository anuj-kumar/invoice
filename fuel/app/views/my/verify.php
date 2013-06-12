<?php

print_r(Input::post());
if (isset($error))
    die($error);
echo "<b>Login Successful</b><br>";
//foreach ($users as $user)
    //echo $user->name;
?>
