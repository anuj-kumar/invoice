<style>
    table th,td{ border-bottom : 2px solid grey; text-align: center;width:200px}
    table td{ border-left : 1px dotted grey; text-align: center;width:200px}
</style>
<div class="row span10" ><span style="float: right"> <?php echo Html::anchor($prev, 'Prev') . " | " . Html::anchor($next, 'Next'); ?></span></div>
<div class="row" style="overflow-x: none">

    <table >
        <tr>
            <th>Username</th>

            <th>invoice single</th>
            <th>invoice monthly</th>
            <th>invoice monthly new</th>
            <th>invoice monthly details</th>
            <th>panel global</th>
            <th>panel local</th>
            <th>archive single</th>
            <th>archive monthly</th>
            <th>user list</th>
            <th>user create</th>
            <th>Last Log</th>
            <th>Button</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td style="color: rgb(82, 165, 255); "><h4><?php echo $user->name ?></h4></td>


                <?php echo Form::open('/user/modify') ?>

            <input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>
            <td><input type="checkbox" value="1" name="invoice_single" <?php echo $user->access_right->invoice_single ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="invoice_monthly" <?php echo $user->access_right->invoice_monthly ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="invoice_monthly_new" <?php echo $user->access_right->invoice_monthly_new ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="invoice_monthly_details" <?php echo $user->access_right->invoice_monthly_details ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="panel_global" <?php echo $user->access_right->panel_global ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="panel_local" <?php echo $user->access_right->panel_local ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="archive_single" <?php echo $user->access_right->archive_single ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="archive_monthly" <?php echo $user->access_right->archive_monthly ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="user_list" <?php echo $user->access_right->user_list ? 'checked' : '' ?>/></td>
            <td><input type="checkbox" value="1" name="user_create" <?php echo $user->access_right->user_create ? 'checked' : '' ?>/></td>
            <td><?php echo $user->last_login_at ?></td>
            <td><input type="submit" value="Change Access"/></td>
            <? echo Form::close() ?>

            </tr>
        <?php endforeach; ?>
    </table>
</div>

