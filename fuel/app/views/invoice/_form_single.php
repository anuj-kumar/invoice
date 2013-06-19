<?php echo Form::open(array("class" => "form-horizontal", "action" => "/invoice/submit_single")); ?>

<fieldset>
    <div class=" control-group pull-left">
        <?php echo Form::label('Name', 'first_name', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo Form::input('first_name', Input::post('first_name', isset($monkey) ? $monkey->first_name : ''), array('class' => 'span2', 'placeholder' => 'First Name')); ?>

        </div>
    </div>
    <div class="span6 control-group pull-right" style="margin-right: 40px">
        <?php echo Form::label('Last Name', 'last_name', array('class' => 'control-label')); ?>

        <div class="controls " >
            <?php echo Form::input('last_name', Input::post('last_name', isset($monkey) ? $monkey->last_name : ''), array('class' => 'span2', 'placeholder' => 'Last Name')); ?>

        </div>
    </div>

    <div class=" control-group pull-left">
        <?php echo Form::label('Address Line#1', 'addr_1', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo Form::input('addr_1', Input::post('addr_1', isset($monkey) ? $monkey->addr_1 : ''), array('class' => 'span2', 'placeholder' => 'Address Line 1')); ?>

        </div>
    </div>
    <div class="span6 control-group pull-right" style="margin-right: 40px">
        <?php echo Form::label('Address Line #2', 'addr_2', array('class' => 'control-label')); ?>

        <div class="controls " >
            <?php echo Form::input('addr_2', Input::post('addr_2', isset($monkey) ? $monkey->addr_2 : ''), array('class' => 'span2', 'placeholder' => 'Address Line 2')); ?>

        </div>
    </div>
    
    <div class=" control-group pull-left">
        <?php echo Form::label('Address Line#3', 'addr_3', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo Form::input('addr_3', Input::post('addr_3', isset($monkey) ? $monkey->addr_3 : ''), array('class' => 'span2', 'placeholder' => 'Address Line 3')); ?>

        </div>
    </div>
    <div class="span6 control-group pull-right" style="margin-right: 40px">
        <?php echo Form::label('City', 'city', array('class' => 'control-label')); ?>

        <div class="controls " >
            <?php echo Form::input('city', Input::post('city', isset($monkey) ? $monkey->city : ''), array('class' => 'span2', 'placeholder' => 'City')); ?>

        </div>
    </div>
<div class=" control-group pull-left">
        <?php echo Form::label('State', 'state', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo Form::input('state', Input::post('state', isset($monkey) ? $monkey->state : ''), array('class' => 'span2', 'placeholder' => 'State')); ?>

        </div>
    </div>
    <div class="span6 control-group pull-right" style="margin-right: 40px">
        <?php echo Form::label('Country', 'country', array('class' => 'control-label')); ?>

        <div class="controls " >
            <?php echo Form::input('country', Input::post('country', isset($monkey) ? $monkey->country : ''), array('class' => 'span2', 'placeholder' => 'Country')); ?>

        </div>
    </div>

<div class=" control-group pull-left">
        <?php echo Form::label('Phone Number:', 'phone', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo Form::input('phone', Input::post('phone', isset($monkey) ? $monkey->tele : ''), array('class' => 'span2', 'placeholder' => 'Phone Number')); ?>

        </div>
    </div>
    <div class="span6 control-group pull-right" style="margin-right: 40px">
        <?php echo Form::label('Email', 'email', array('class' => 'control-label')); ?>

        <div class="controls " >
            <?php echo Form::input('email', Input::post('email', isset($monkey) ? $monkey->email : ''), array('class' => 'span2 email', 'placeholder' => 'Email')); ?>

        </div>
    </div>

    <div class="control-group pull-right">
        <label class='control-label'>&nbsp;</label>
        <div class='controls'>
            <?php echo Form::submit(array('class' => 'btn btn-large btn-success','style'=> 'width:100px', 'value' => 'Next', 'name' => 'submit')); ?>			</div>
    </div>
</fieldset>
<?php echo Form::close(); ?>