<ul class="nav nav-pills">
    <li class='<?php echo Arr::get($subnav, "view"); ?>'><?php echo Html::anchor('archive/view', 'View'); ?></li>
    <li class='<?php echo Arr::get($subnav, "search"); ?>'><?php echo Html::anchor('archive/search', 'Search'); ?></li>

</ul>

<table>
    <th>
    <tr>
        <td>
            <?php echo Html::anchor('archive/view/id', 'ID'); ?>
        </td>
        <td>
            <?php echo Html::anchor('archive/view/date', 'Date'); ?>
        </td>
        <td>
            <?php echo Html::anchor('archive/view/timestamp', 'Timestamp'); ?>
        </td>
        <td>
            <?php echo Html::anchor('archive/view/amount', 'Amount'); ?>
        </td>
        <td>
            <?php echo Html::anchor('archive/view/tax_2', 'Tax'); ?>
        </td>
        <td>
            <?php echo Html::anchor('archive/view/tax_3', 'ID'); ?>
        </td>
    </tr>
    </th>
   <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td>
                <?php echo $invoice->id ?>
            </td>
            <td>
                <?php echo $invoice->date ?>
            </td>
            <td>
                <?php echo $invoice->timestamp ?>
            </td>
            <td>
                <?php echo $invoice->amount ?>
            </td>
            <td>
                <?php echo $invoice->tax_1 ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>