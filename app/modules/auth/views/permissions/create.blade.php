<?php
/**
 * User: dirg
 * Date: 04/08/2015
 * Time: 22:54
 */?>
@extends('admin.layouts.container')
@section('title')
    Create Permission
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}

    {{ Form::open(array('route' => 'permission-create-data','role' => 'form','method' => 'PUT')) }}

    @include('auth::permissions.form')

    @if(Sentry::getUser()->hasAccess('permission-create-data'))
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('permission-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop