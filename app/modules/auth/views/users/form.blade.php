<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 22:06
 */?>
<div class="box-body">

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div id="pass_div" class="form-group">
        {{ Form::label('pass_lbl', 'Password') }}
        {{ Form::password('password', array('id' => 'pass', 'class' => 'form-control')) }}
    </div>

    <div id="pass_cek_div" class="form-group">
        {{ Form::label('pass_cek_lbl', 'Ulangi Password') }}
        {{ Form::password('pass_cek', array('id' => 'pass_cek', 'class' => 'form-control')) }}
        <div id="pass_warning"></div>
    </div>

    <div class="form-group">
        {{ Form::label('first_name', 'Nama Depan') }}
        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Nama Belakang') }}
        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('permission', 'Permission') }}
        {{ Form::select('permission', $permission, $decodepermission, array(
        'class' => 'form-control',
        'multiple'=>'multiple',
        'id'=> 'permission',
        'name' => 'permission[]')) }}
    </div>

    <div class="form-group">
        {{ Form::label('groups', 'Group') }}
        {{ Form::select('groups', $group, $decodegroup, array(
        'class' => 'form-control',
        'multiple'=>'multiple',
        'id'=> 'group',
        'name' => 'group[]')) }}
    </div>

</div>
@include('auth::users.js')