<?php
/**
 * User: dirg
 * Date: 04/08/2015
 * Time: 23:20
 */?>
@extends('admin.layouts.container')
@section('title')
    Edit Permission
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}
    {{ Form::model($permission, array('route' => array('permission-edit-data', $permission->id), 'method' => 'PUT')) }}

    @include('auth::permissions.form')

    @if(Sentry::getUser()->hasAccess('permission-edit-data'))
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('permission-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop