<?php
/**
 * User: dirg
 * Date: 30/05/2015
 * Time: 15:14
 */
?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-cogs"></i> SETTING</li>
            <li><a href="{{ URL::route('permission-index') }}"><i class="fa fa-filter"></i> <span>Permission</span></a> </li>
            <li><a href="{{ URL::route('groups-index') }}"><i class="fa fa-users"></i> <span>Groups</span></a> </li>
            <li><a href="{{ URL::route('users-index') }}"><i class="fa fa-user"></i> <span>Users</span></a> </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
