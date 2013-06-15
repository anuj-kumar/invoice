<ul class="nav nav-pills">
    <li class='<?php echo Arr::get($subnav, "view"); ?>'><?php echo Html::anchor('archive/view', 'View'); ?></li>
    <li class='<?php echo Arr::get($subnav, "search"); ?>'><?php echo Html::anchor('archive/search', 'Search'); ?></li>

</ul>

<form method='GET' action='/archive/search'>
    <input type='text' name='q' <?php echo isset($query) ? "value = '" . $query . "'" : '' ?> placeholder='Enter search query...'/>
    <input type='submit' value='search'/>
</form>
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
            <?php echo Html::anchor('archive/view/name', 'Name'); ?>
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
                <?php echo $invoice->name ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<? //print_r($invoices); ?>