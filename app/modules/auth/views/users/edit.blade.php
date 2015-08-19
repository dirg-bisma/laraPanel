<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 23:12
 */?>
@extends('admin.layouts.container')
@section('css')
    <link href="/engine/multiSelect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
@stop
@section('title')
    Edit User
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}
    {{ Form::model($users, array('route' => array('users-edit-data', $users->id), 'method' => 'PUT')) }}

    @include('auth::users.form')
    @if(Sentry::getUser()->hasAccess('users-edit-data'))
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('users-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop