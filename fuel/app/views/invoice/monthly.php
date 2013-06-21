
<?php //print_r($monthly_customers);
foreach ($monthly_customers as $month): ?>

<?php print_r($month->customer->first_name) ?>
<?php endforeach; ?>
<?php echo Html::anchor('invoice/monthly_new','Add New', array('class'=>'btn btn-large btn-danger' ));?>
