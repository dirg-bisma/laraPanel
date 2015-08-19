<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 22:06
 */?>
@extends('admin.layouts.container')
@section('css')
    <link href="/engine/multiSelect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
@stop
@section('title')
    Create User
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}

    {{ Form::open(array('route' => 'users-create-data','role' => 'form','method' => 'PUT')) }}

    @include('auth::users.form')
    @if(Sentry::getUser()->hasAccess('users-create-data'))
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('users-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop