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
    Edit Group
@stop
@section('content')
    {{ HTML::ul($errors->all() )}}
    {{ Form::model($groups, array('route' => array('groups-edit-data', $groups->id), 'method' => 'PUT')) }}

    @include('auth::groups.form')

    @if(Sentry::getUser()->hasAccess('groups-edit-data'))
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    @endif
    <a href="{{ URL::route('permission-index') }}" class="btn btn-warning">Cancel</a>
    {{ Form::close() }}
@stop