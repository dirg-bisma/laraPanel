<?php
/**
 * User: dirg
 * Date: 05/08/2015
 * Time: 23:48
 */?>
<div class="box-body">

    <div class="form-group">
        {{ Form::label('name', 'Nama') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('permission', 'Permission') }}
        {{ Form::select('permission', $permission, $decode, array(
        'class' => 'form-control',
        'multiple'=>'multiple',
        'id'=> 'my-select',
        'name' => 'permission[]')) }}
    </div>

</div>
@include('auth::groups.js')