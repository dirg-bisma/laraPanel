<?php
/**
 * User: dirg
 * Date: 03/08/2015
 * Time: 21:19
 */
?>
@extends('admin.layouts.container')
@section('title')
    Permision Data
@stop
@section('title_description')
    @if(Sentry::getUser()->hasAccess('permission-create-form'))
    <a href="{{ URL::route('permission-create-form') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Permision</a>
    @endif
@stop
@section('css')
    <link href="/engine/adminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="/engine/adminLTE/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/engine/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
@stop
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <section class="content">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Permission"/>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="categories-controls margin">
                        @if(Sentry::getUser()->hasAccess('permission-delete'))
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm btn_trash"><i class="fa fa-trash-o"></i></button>
                        </div><!-- /.btn-group -->
                        @endif
                    </div>
                    <div class="table-responsive categories-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <td></td>
                                <td>Value</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permission as $key => $value)
                                <tr>
                                    <!--<td>{{ $value->id }}</td>-->
                                    <td><input type="checkbox" class="categories_ids" id="categories_ids[{{ $key }}]" value="{{ $value->id }}" /></td>
                                    <td>{{ $value->value }}</td>
                                    <td>{{ $value->description }}</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        @if(Sentry::getUser()->hasAccess('permission-edit-form'))
                                        <a class="btn btn-small btn-info" href="{{ URL::route('permission-edit-form', $value->id) }}">Edit </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $permission->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')

    <script src="/engine/iCheck/icheck.min.js" type="text/javascript"></script>

    <script src="/engine/fastclick/fastclick.min.js"></script>

    <script src="/engine/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script>

        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs

            $('.categories-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            //Enable check and uncheck all functionality

            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".categories-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".categories-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });
            $('.btn_trash').click(function() {
                console.log("Checked!S");
                var $checked = $(".categories-messages input[type='checkbox']:checked:enabled");
                var $counter = $checked.length;
                $checked.each(function(index, value) {
                    $.ajax({
                        url: "{{ URL::route('permission-delete', '') }}" + '/' + $(value).val(),
                        method: 'DELETE',
                        async: false
                    });
                    if ($counter == (index+1)) {
                        $(".categories-messages input[type='checkbox']").iCheck("uncheck");
                        window.location.reload();
                    }
                });
            });

            //Handle starring for glyphicon and font awesome
            $(".categories-star").click(function (e) {
                e.preventDefault();
                //detect type
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");

                //Switch states
                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }
                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
            });
        });
    </script>
@stop

