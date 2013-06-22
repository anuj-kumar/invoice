<div class="row" style="margin-top: 20px">
    <div class="span5 ">
        <form class="form-search">
            <div class="input-append">
                <input type="text" class="span2 search-query" name="q" value="<?php echo Session::get('query') ?>" />
                <button type="submit" class="btn">Search</button>
            </div>
        </form>

    </div>

    <div class="span2 pull-right">
        <?php echo Html::anchor('invoice/monthly_new', 'Add New', array('class' => 'btn btn-large btn-danger ')); ?>
    </div>

</div>


<style>
    .archive_view th{width: 150px;
                     border-bottom:1px solid black;
    }

    .archive_view td{width: 150px;
                     border-bottom:1px solid black;
    }
    .archive_view{margin-left: 15px;}
    .archive{height: 400px;overflow-y: visible}
    .archive td{text-align: center}
</style>

<div class="row archive">
    <table class="archive_view">
        <tr>
            <th width="40px">
                <?php echo "S. No." ?>
            </th>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Last Name
            </th>
            
        </tr>

        <?php $i = 1;
 foreach ($monthly_customers as $month):
            ?>
            <tr>
                <td>
                    <?php echo $i;
                    $i++ ?>
                </td>
                <td>
                    <?php echo $month->id ?>
                </td>
                <td>
                    <?php echo $month->customer->first_name ?>
                </td>
                <td>
                    <?php echo $month->customer->last_name ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
