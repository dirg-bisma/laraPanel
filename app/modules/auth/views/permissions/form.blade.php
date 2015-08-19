<?php
/**
 * User: dirg
 * Date: 04/08/2015
 * Time: 21:49
 */?>
<div class="box-body">

    <div class="form-group">
        {{ Form::label('value', 'Value') }}
        {{ Form::text('value', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

</div>