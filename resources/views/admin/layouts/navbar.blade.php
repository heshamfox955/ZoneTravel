
<header class="main-header">

    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Z</b>ON</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Zone</b>Travel</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @include('admin.layouts.menu')
        <!-- Navbar Right Menu -->
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="max-width: 45px;max-height: 45px; min-height: 35px;" src="@if(auth()->user()->path_image != '') {{asset('upload/'. auth()->user()->path_image)}} @else {{asset('upload/def.png')}} @endif" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="text-capitalize">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Settings</li>
            <li class="active">
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i> <span>@lang('admin.dashboard')</span>
                </a>
            </li>
            <li>
                <a href="{{route('setting')}}">
                    <i class="fa fa-cogs"></i> <span>@lang('admin.setting')</span>
                </a>
            </li>
            <li>
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out"></i> <span>@lang('admin.sign-out')</span>
                </a>
            </li>
            <li class="header">@lang('admin.users')</li>
            @if(auth()->user()->permissions == 'admin')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>@lang('admin.users')</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('newUser')}}"><i class="fa fa-circle-o"></i>@lang('admin.add_user')</a></li>
                        <li><a href="{{route('viewUser')}}"><i class="fa fa-circle-o"></i>@lang('admin.view_user')</a></li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="{{route('viewModertor')}}">
                    <i class="fa fa-street-view"></i> <span>@lang('admin.moderators')</span>
                </a>
            </li>
            <li>
                <a href="{{route('viewUsers')}}">
                    <i class="fa fa-user"></i> <span>@lang('admin.users')</span>
                </a>
            </li>
            <li class="header">@lang('admin.category'), @lang('admin.posts')</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>@lang('admin.category')</span>
                    <span class="pull-right-container">
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addCategory')}}"><i class="fa fa-circle-o"></i>@lang('admin.add_category')</a></li>
                    <li><a href="{{route('viewCategory')}}"><i class="fa fa-circle-o"></i>@lang('admin.view_category')</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark-o"></i> <span>@lang('admin.posts')</span>
                    <span class="pull-right-container">
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('addPost')}}"><i class="fa fa-circle-o"></i>@lang('admin.add_post')</a></li>
                    <li><a href="{{route('viewPosts')}}"><i class="fa fa-circle-o"></i>@lang('admin.posts')</a></li>
                </ul>
            </li>
            <li class="header">@lang('admin.hotels')</li>
            <li>
                <a href="{{route('viewHotels')}}">
                    <i class="fa fa-hotel"></i> <span>@lang('admin.hotels')</span>
                </a>
            </li>
            <li>
                <a href="{{route('addHotel')}}">
                    <i class="fa fa-plus"></i> <span>@lang('admin.add_hotel')</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>



