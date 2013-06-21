<?php foreach ($monthly as $month): ?>

<?php echo $month->id."<br />"; ?>
<?php endforeach; ?>
<?php echo Html::anchor('invoice/monthly_new','Add New', array('class'=>'btn btn-large btn-danger' ));?>
