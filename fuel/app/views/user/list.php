
<div class="row span10"><span style="float: right"> <?php echo Html::anchor($prev, 'Prev') . " | " . Html::anchor($next, 'Next'); ?></span></div>

<table>
    <tr>
        <th>Name of the User</th>
        <th>Last Login At</th>
        <th>print_invoice</th>
        <th>view_archive</th>
        <th>add_panel</th>
        <th>add_monthly_customer</th>
    </tr>
    <?php foreach($users as $user) : ?>
    <tr>
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->last_login_at ?></td>

        <?php echo Form::open('/user/modify') ?>

            <input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>
            <td><input type="checkbox" name="print_invoice" value="1" <?php echo $user->access_right->print_invoice ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" name="view_archive"  value="1" <?php echo $user->access_right->view_archive ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" name="add_panel"  value="1" <?php echo $user->access_right->add_panel ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" name="add_monthly_customer" value="1" <?php echo $user->access_right->add_monthly_customer ? 'checked' : '' ?>/></td>
            <td><input name="user_rights" type="submit" value="Change Access" value="1" /></td>

        <? echo Form::close() ?>

    </tr>
    <?php endforeach; ?>
</table>

