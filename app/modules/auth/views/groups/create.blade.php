<?php
/**
 * User: dirg
 * Date: 05/08/2015
 * Time: 23:47
 */?>
@extends('admin.layouts.container')
@section('css')
    <link href="/engine/multiSelect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
@stop
@section('title')
    Create Group
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}

    {{ Form::open(array('route' => 'groups-create-data','role' => 'form','method' => 'PUT')) }}

    @include('auth::groups.form')

    @if(Sentry::getUser()->hasAccess('groups-create-data'))
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('permission-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop
