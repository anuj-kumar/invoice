<?php
echo $customer->first_name . " " . $customer->last_name;
echo $customer->address_line_1 . ",<br>";
echo $customer->address_line_2 . ",<br>";
echo $customer->address_line_3 . ",<br>";
echo $customer->city . ", " . $customer->state;
echo $customer->pincode;
?>
<br>
<?php
foreach ($invoice->panels as $panel):
    foreach ($panel->invoices_panels as $other):
        echo $panel->name . " " . $other->panel_quantity . "<br>";
    endforeach;
endforeach;
?>
