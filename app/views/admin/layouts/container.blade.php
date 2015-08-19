<?php
/**
 * User: dirg
 * Date: 30/05/2015
 * Time: 14:49
 */?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>RS PARU | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    @include('admin.layouts.header')
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ URL::route('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>RS Paru Jember</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>RS Paru Jember</b></span>
        </a>

        <!-- Header Navbar -->
    @include('admin.layouts.navbarHeader')
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.sideMenu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('title_description')</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            @yield('content')

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
            <ol class="breadcrumb">
                <li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">@yield('title')</li>
            </ol>

        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="http://rspjember.com">LARAPANEL</a></strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <!--  include('admin.layouts.controlSideBar')-->
    <div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->
    @include('admin.layouts.footer')
</body>
</html>